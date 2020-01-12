<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends FRONT_Controller {

    function __construct()
    {
        parent::__construct();

        // モデル
        $this->load->model("front/member_model");
    }

    // トップ画面
    public function login()
    {
        try {
            $this->member_model->do_login();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/front/top.php */