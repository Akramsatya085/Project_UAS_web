<?php

require_once BASE_PATH . "Controllers/BaseController.php";

class ReportController extends BaseController
{
    protected $title;
    protected $toilet_model;

    public function __construct() {
        $isLoginRequired = (isset($_SESSION['is_login']) && $_SESSION['is_login']);

        if (!$isLoginRequired) {
            $_SESSION['alert'] = ['danger', 'Harap login terlebih dahulu 😉'];
            header("Location: /toilet/auth/login");
            exit();
        }

        $this->title = "Report";
        $this->toilet_model = new Toilets;
    }

    public function index($date = NULL) {
        $title = $this->title;
        $title_page = "Reports Toilets";
        $title_breadcrumb = "Toilets Reports";

        if (!$date) {
            $date = date('Y-m-d');
        }

        $toilet_checked = $this->toilet_model->get_unchecked_toilets($date);
        $toilet_worst = $this->toilet_model->get_worst_toilet($date);

        require_once BASE_PATH . "Views/reports/index.php";
    }
}
