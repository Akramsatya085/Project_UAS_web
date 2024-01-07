<?php
require_once BASE_PATH . "Controllers/BaseController.php";

class ToiletController extends BaseController
{
    protected $toilet_model;
    protected $title;

    public function __construct()
    {
        $this->toilet_model = new Toilets();
        $this->title = "Toilets";
    }

    public function index()
    {
        $title = $this->title;
        $title_page = "Toilet Managements";
        $title_breadcrumb = "Toilet List";

        $toilets = $this->toilet_model->get_toilets();

        require_once BASE_PATH . "Views/toilets/index.php";
    }

    public function checklist($date = NULL)
    {
        $title = $this->title;
        $title_page = "Checklist Toilet";
        $title_breadcrumb = "Toilet CheckList";

        if (!$date) {
            $date = date('Y-m-d');
        }

        $unchecked_toilets = $this->toilet_model->get_unchecked_toilets($date);
        $minus_toilets = $this->toilet_model->get_minus_toilets($date);

        require_once BASE_PATH . "Views/toilets/check.php";
    }

    public function get_detail($id)
    {
        $toilet = $this->toilet_model->get_toilets(['id' => $id], NULL, NULL, 1);

        echo json_encode($toilet);
    }

    public function get_check() {
        $input = $_GET;
        $toilet = $this->toilet_model->get_check_toilet($input);
        
        echo json_encode($toilet);
    }

    public function check_toilet() {        
        $type = "danger";
        $message = "Something went wrong";
        $input = $_POST;
        $input['toilet_id'] = $input['id'];
        $input['date'] = date('Y-m-d H:i:s');
        $input['user_id'] = $_SESSION['user']['id'];
        unset($input['id']);
        
        $add_check = $this->toilet_model->process_add_toilet($input, 'checklists');

        if ($add_check) {
            $toilet = $this->toilet_model->get_toilets(['id' => $input['toilet_id']], NULL, NULL, 1);
            $type = "success";
            $message = "Berhasil check <b>{$toilet['location']}</b> untuk tanggal " . date('d M Y', strtotime($input['date']));
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: /toilet/toilet/checklist");
        exit;
    }

    public function add_toilet()
    {
        $type = "danger";
        $message = "Something went wrong";

        $input = $_POST;
        $input['location'] = ucwords(strtolower($input['location']));

        if (!empty($this->toilet_model->get_toilets(['location' => $input['location']]))) {
            $message = "Toilet sudah terdaftar! Gunakan nama lain";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/toilet");
            exit;
        }

        $add_toilet = $this->toilet_model->process_add_toilet($input);

        if ($add_toilet) {
            $type = "success";
            $message = "Berhasil menambahkan toilet <b>{$input['location']}</b>";
        } else {
            $message = "Gagal menambahkan toilet {$input['location']}";
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: /toilet/toilet");
        exit;
    }

    public function delete($id)
    {
        if ($this->toilet_model->process_delete_toilet($id)) {
            $_SESSION['alert'] = ['warning', "Berhasil menghapus toilet"];
        } else {
            $_SESSION['alert'] = ['danger', "Gagal menghapus toilet"];
        }

        header('Location: /toilet/toilet');
        exit;
    }

    public function edit_toilet()
    {
        $type = "danger";
        $message = "Something went wrong";

        $input = $_POST;
        $input['location'] = ucwords(strtolower($input['location']));

        $id = $input['id'];
        unset($input['id']);

        if (!empty($this->toilet_model->get_toilets(['location' => $input['location']], NULL, ['id' => $id]))) {
            $message = "Toilet sudah terdaftar! Gunakan nama lain";
            $_SESSION['alert'] = [$type, $message];
            header("Location: /toilet/toilet");
            exit;
        }

        $edit_toilet = $this->toilet_model->process_edit_toilet($id, $input);

        if ($edit_toilet) {
            $type = "success";
            $message = "Berhasil mengedit toilet <b>{$input['location']}</b>";
        } else {
            $message = "Gagal mengedit toilet {$input['location']}";
        }

        $_SESSION['alert'] = [$type, $message];
        header("Location: /toilet/toilet");
        exit;
    }
}
