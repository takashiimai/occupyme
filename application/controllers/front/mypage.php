<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mypage extends FRONT_Controller {

    function __construct()
    {
        parent::__construct();

        // モデル
        $this->load->model("front/mypage_model");
    }

    // トップ画面
    public function index()
    {
        try {
            $this->mypage_model->do_index();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function report()
    {
        try {
            $this->mypage_model->do_report();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function config()
    {
        try {
            $this->mypage_model->do_config();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function faq()
    {
        try {
            $this->mypage_model->do_faq();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function request()
    {
        try {
            $this->mypage_model->do_request();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function logout()
    {
        try {
            $this->mypage_model->do_logout();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/front/top.php */