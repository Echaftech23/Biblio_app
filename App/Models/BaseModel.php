<?php
    namespace MyApp\Models;

    use MyApp\DataBase\Connection;
    use MyApp\Classes\Base;
    use PDO;

    class BaseModel extends Base
    {

        private $connexion;
        public function __construct($tableName, $columns = ['*'], $data = NULL, $condition = NULL)
        {
            $this->connexion = Connection::dbConnect();
            parent::__construct($tableName, $columns, $data, $condition);
        }
        

        public function insertData()
        {
            $columns = implode(', ', array_keys($this->data));
            $symbols = ':' . implode(', :', array_keys($this->data));

            $stmt = $this->connexion->prepare("INSERT INTO $this->tableName ($columns) VALUES ($symbols)");

            foreach ($this->data as $key => $value) {
                $stmt->bindParam(":$key", $value);
            }

            $stmt->execute();
            return $stmt;
        }

        public function selectData()
        {
            if (count($this->columns) > 1) {
                $columnsPart = implode(', ', $this->columns);
            } else {
                $columnsPart = reset($this->columns);
            }

            //For Conditions :
            $result = array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($this->data));

            $wherePart = !empty($this->condition) ? "WHERE " . implode(' AND ', $result) : '';
            $stmt = $this->connexion->prepare("SELECT $columnsPart FROM $this->tableName $wherePart");

            if ($this->condition) {
                foreach ($this->condition as $key => $value) {
                    $stmt->bindParam(":$key", $value);
                }
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        public function updateData()
        {
            //For data :
            $this->columns = array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($this->data));
            $setPart = implode(', ', $this->columns);

            //For Conditions :
            $result = array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($this->condition));
            $conditionPart = !empty($this->condition) ? "WHERE " . implode(' AND ', $result) : '';

            $stmt = $this->connexion->prepare("UPDATE $this->tableName SET $setPart  $conditionPart");

            // Bind parameters for SET part
            foreach ($this->data as $key => $value) {
                $stmt->bindParam(":$key", $value);
            }

            // Bind parameters for WHERE part
            foreach ($this->condition as $key => $value) {
                $stmt->bindParam(":$key", $value);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        public function deleteData()
        {
            //For Conditions :
            $result = array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($this->condition));
            $conditionPart = !empty($this->condition) ? "WHERE " . implode(' AND ', $result) : '';

            $stmt = $this->connexion->prepare("DELETE FROM $this->tableName $conditionPart");

            foreach ($this->condition as $key => $value) {
                $stmt->bindParam(":$key", $value);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
