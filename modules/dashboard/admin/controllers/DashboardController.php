<?php

class DashboardController extends Controller
{
    function runBeforeAction()
    {
        if ($_SESSION['is_admin'] ?? false == true) {
            return true;
        };
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
        if ($action != 'login') {
            header('Location: /admin/index.php?module=dashboard&action=login');
        } else {
            return true;
        }
    }

    function defaultAction(): void
    {
        echo "Welcome to Dashboard Controller";
    }

    function loginAction()
    {
        if ($_POST['postAction'] ?? 0 == 1) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $auth = new Auth();
            $validation = new Validation();

            /*if (!$validator->validatePassword($password)) {
                $_SESSION['validation_rules']['errors'] = 'Wrong password';
            }*/

            if (!$validation
                ->addRule(new ValidateMinimum(3))
                ->addRule(new ValidateMaximum(20))
                ->addRule(new ValidateNoEmptySpaces())
                ->addRule(new ValidateSpecialChar())
                ->validate($password)) {
                $_SESSION['validation_rules']['errors'] = $validation->getErrorMessages();
            }
            if (!$validation
                ->addRule(new ValidateMinimum(3))
                ->addRule(new ValidateEmail())
                ->validate($username)) {
                $_SESSION['validation_rules']['errors'] = $validation->getErrorMessages();
            }


            if (($_SESSION['validation_rules']['errors'] ?? '') == '') {
                if ($auth->checkLogin($username, $password)) {
                    $_SESSION['is_admin'] = 1;
                    header('Location: /admin/');
                    exit();
                } else {
                    $_SESSION['validation_rules']['errors'] = 'Username or password is incorrect';
                }
            }

        }
        include VIEW_PATH . 'admin/login.html';
        unset($_SESSION['validation_rules']['errors']);
    }
}