<?php
session_start();
require_once "model/ValidationModel.php";

class AuthController {

    public function register() {
        $errors = [];
        $old = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validator = new ValidationModel();
            $errors = $validator->validateRegistration($_POST);
            $old = $_POST;

            if (empty($errors)) {
                $_SESSION['user'] = $_POST['username'];
                $_SESSION['login_time'] = date("Y-m-d H:i:s");

                // store user (simple demo using session)
                $_SESSION['registered'] = $_POST;

                header("Location: index.php?page=dashboard");
                exit();
            }
        }

        include "view/register.php";
    }

    public function login() {
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reg = $_SESSION['registered'] ?? null;

            if ($reg && $_POST['email'] == $reg['email'] && $_POST['password'] == $reg['password']) {
                $_SESSION['user'] = $reg['username'];
                $_SESSION['login_time'] = date("Y-m-d H:i:s");

                header("Location: index.php?page=dashboard");
                exit();
            } else {
                $error = "Invalid credentials";
            }
        }

        include "view/login.php";
    }

    public function dashboard() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit();
        }

        include "view/dashboard.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
    }
}
?>