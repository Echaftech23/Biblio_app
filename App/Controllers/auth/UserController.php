<?php

    use App\Models\User;
    require_once '../../../vendor/autoload.php';

    class UserController
    {

        public function register($username, $email, $phone, $password)
        {

            $user = new User('', $email, '', '');
            $result = $user->getUerByEmail();

            if ($result !== false) {

                echo "Email Already Registered";
            } 
            else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $user->setPassword($hashedPassword);
                $user1 = new User($username, $email, $phone, $hashedPassword);
                $user_id = $user1->insertUser();

                if ($user_id !== false) {
                    echo "Registered Successfully";
                } else {
                    echo "Something went wrong";
                }
            }
        }

        public function login($email, $password)
        {
            $user = new User('', $email, '', $password);
            $row = $user->selectUser();

            if ($row) {

                if (password_verify($password, $row['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['auth_user'] = [
                        'username' => $row['username'],
                        'email' => $row['email']
                    ];

                    $_SESSION['message'] = "Logged In Successfully"; 
                    
                    if ($row['role'] === "admin") {
                        $_SESSION['isAdmin'] = true;
                        header('Location: ../../../Views/dashboard.php');
                    } else {
                        header('Location: ../../../Views/index.php');
                    }
                } else {
                    $_SESSION['message'] = "Password Incorrect"; 
                    header('Location: ../../../Views/auth/index.php');
                }
            } else {
                $_SESSION['message'] = "Invalid Credentials"; 
                header('Location: ../../../Views/auth/index.php');
            }
        }
        public function logout()
        {

            unset($_SESSION['auth']);
            unset($_SESSION['auth_user']);
            unset($_SESSION['isAdmin']);

            $_SESSION['message'] = "Logged Out Successfully ";
            header('Location: ../../../Views/auth/login.php');
        }
    }

    if (isset($_POST['action'])) {

        if($_POST['action'] == "register"){

            $userRegister = new UserController();

            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $userRegister->register($username, $email, $phone, $password);
        }
    }

    if (isset($_POST['login'])) {

        $userLogin = new UserController();

        $email = $_POST['email'];
        $password = $_POST['password'];
        $userLogin->login($email, $password);
    }

    if (isset($_GET['logout'])) {
        $userLogout = new UserController();
        // $userLogout->logout();
    }