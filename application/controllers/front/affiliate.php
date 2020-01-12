<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affiliate extends FRONT_Controller {

    function __construct()
    {
        parent::__construct();

        // モデル
        $this->load->model("front/affiliate_model");
    }

    // トップ画面
    public function index()
    {
        try {
            $this->affiliate_model->do_index();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function post()
    {
        try {
            $this->affiliate_model->do_post();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function vip()
    {
        try {
            $this->affiliate_model->do_vip();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/front/top.php */