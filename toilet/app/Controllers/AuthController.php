<?php

class AuthController
{
    protected $user_model;

    public function __construct()
    {
        $isLoginRequired = (isset($_SESSION['is_login']) && $_SESSION['is_login']);

        if ($isLoginRequired) {
            header("Location: /toilet/");
            exit();
        }

        $this->user_model = new Users();
    }

    public function login()
    {
        $title = "Login";

        require_once BASE_PATH . "Views/auth/login.php";
    }

    public function register()
    {

        require_once BASE_PATH . "Views/auth/register.php";
    }

    public function process_login()
    {
        $input = $_POST;

        $type = "danger";
        $message = "Something went wrong";

        $user = $this->user_model->get_users(NULL, ['username' => $input['username'], 'email' => $input['username']], NULL, 1);
        $user['role'] = $user['role'] == 1 ? "Admin" : "User";

        if (empty($user) OR $user['status'] == 2) {
            $message = "User tidak ditemukan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/auth/login");
            exit;
        }

        if (!password_verify($input['password'], $user['password'])) {
            $message = "Password salah!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/auth/login");
            exit;
        }

        $_SESSION['is_login'] = TRUE;
        $_SESSION['user'] = $user;
        $type = "primary";
        $message = "Berhasil login, selamat datang {$user['name']}";

        $_SESSION['alert'] = [$type, $message];
        header("Location: /toilet/");
        exit;
    }

    public function process_register() {
        $type = "danger";
        $message = "Something went wrong";

        $input = $_POST;
        $input['name'] = ucwords(strtolower($input['name']));
        $input['role'] = 2;
        $input['status'] = 1;
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

        if (!empty($this->user_model->get_users(['username' => $input['username']]))) {
            $message = "Username sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/auth/register");
            exit;
        }
        
        if (!empty($this->user_model->get_users(['email' => $input['email']]))) {
            $message = "Email sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/auth/register");
            exit;
        }

        $add_user = $this->user_model->process_add_user($input);

        if ($add_user) {
            $type = "success";
            $message = "<b>{$input['name']}</b> berhasil mendaftar";
        } else {
            $message = "Gagal menambahkan user {$input['name']}";
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: /toilet/auth/login");
        exit;
    }
}
