<?php
require_once BASE_PATH . "Controllers/BaseController.php";

class UsersController extends BaseController
{
    protected $title;
    protected $user_model;

    public function __construct() {
        $this->title = "Users";
        $this->user_model = new Users();
    }

    public function index()
    {
        $title = $this->title;
        $title_page = "Users Management";
        $title_breadcrumb = "Users List";

        $users = $this->user_model->get_users();

        require_once BASE_PATH . "Views/users/index.php";
    }

    public function add_user() {
        $type = "danger";
        $message = "Something went wrong";

        $input = $_POST;
        $input['name'] = ucwords(strtolower($input['name']));
        $input['status'] = 1;
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

        if (!empty($this->user_model->get_users(['username' => $input['username']]))) {
            $message = "Username sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: toilet/users");
            exit;
        }
        
        if (!empty($this->user_model->get_users(['email' => $input['email']]))) {
            $message = "Email sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: toilet/users");
            exit;
        }

        $add_user = $this->user_model->process_add_user($input);
        
        if ($add_user) {
            $type = "success";
            $message = "Berhasil menambahkan user <b>{$input['name']}</b>";
        } else {
            $message = "Gagal menambahkan user {$input['name']}";
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: toilet/users");
        exit;
    }

    public function get_detail($id) {
        $user = $this->user_model->get_users(['id' => $id], NULL, NULL, 1);

        echo json_encode($user);
    }

    public function active($id) {
        $update = ['status' => 1];

        $user = $this->user_model->process_edit_user($id, $update);

        if ($user) {
            $_SESSION['alert'] = ['success', "Berhasil mengaktifkan user"];
        } else {
            $_SESSION['alert'] = ['danger', "Gagal mengaktifkan user"];
        }
        
        header("Location: /toilet/users");
        exit;
    }

    public function non_active($id) {
        $update = ['status' => 2];

        $user = $this->user_model->process_edit_user($id, $update);

        if ($user) {
            $_SESSION['alert'] = ['warning', "Berhasil menonaktifkan user"];
        } else {
            $_SESSION['alert'] = ['danger', "Gagal menonaktifkan user"];
        }
        
        header("Location: /toilet/users");
        exit;
    }

    public function edit_user() {
        $type = "danger";
        $message = "Something went wrong";

        $input = $_POST;
        $id = $input['id']; 
        unset($input['id']);
        $input['name'] = ucwords(strtolower($input['name']));
        $input['status'] = 1;

        if (!empty($input['password'])) {
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        } else {
            unset($input['password']);
        }

        if (!empty($this->user_model->get_users(['username' => $input['username']], NULL, ['id' => $id]))) {
            $message = "Username sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: toilet/users");
            exit;
        }
        
        if (!empty($this->user_model->get_users(['email' => $input['email']], NULL, ['id' => $id]))) {
            $message = "Email sudah digunakan!";
            $_SESSION['alert'] = [$type, $message];
            header("Location: toilet/users");
            exit;
        }

        $edit_user = $this->user_model->process_edit_user($id, $input);
        
        if ($edit_user) {
            $type = "success";
            $message = "Berhasil mengedit user <b>{$input['name']}</b>";
        } else {
            $message = "Gagal mengedit user {$input['name']}";
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: toilet/users");
        exit;
    }

    public function logout() {
        unset($_SESSION['user'], $_SESSION['is_login']);

        $_SESSION['alert'] = ['primary', 'Berhasil logout, have a nice days😊'];

        header("Location: /toilet/auth/login");
        exit;
    }
}
