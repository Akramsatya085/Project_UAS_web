<?php
require_once BASE_PATH . "Controllers/BaseController.php";

class HomeController extends BaseController
{
    protected $title;

    public function __construct()
    {
        $isLoginRequired = (isset($_SESSION['is_login']) && $_SESSION['is_login']);

        if (!$isLoginRequired) {
            $_SESSION['alert'] = ['danger', 'Harap login terlebih dahulu 😉'];
            header("Location: /toilet/auth/login");
            exit();
        }
        
        $this->title = "Home";
    }

    public function index()
    {

        $title = $this->title;
        $title_page = "Dashboard";

        require_once BASE_PATH . "Views/home/index.php";
    }
}
