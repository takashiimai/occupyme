<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends FRONT_Controller {

    function __construct()
    {
        parent::__construct();

        // モデル
        $this->load->model("front/top_model");
    }

    // トップ画面
    public function index()
    {
        try {
            $this->top_model->do_index();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/front/top.php */