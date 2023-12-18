<?php
    namespace MyApp\App\Classes;

    class Base
    {
        protected $tableName, $data, $condition, $columns;

        public function __construct($tableName, $columns = ['*'], $data = NULL, $condition = NULL)
        {
            $this->tableName = $tableName;
            $this->columns = $columns;
            $this->data = $data;
            $this->condition = $condition;
        }
    }
