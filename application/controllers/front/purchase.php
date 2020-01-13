<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends FRONT_Controller {

    function __construct()
    {
        parent::__construct();

        // モデル
        $this->load->model("front/purchase_model");
    }

    // キーホルダー購入
    public function keyholder()
    {
        try {
            $this->purchase_model->do_keyholder();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    // バッヂ購入
    public function badge()
    {
        try {
            $this->purchase_model->do_badge();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

    public function post()
    {
        try {
            $this->purchase_model->do_post();
        } catch (Exception $e) {
            $this->_show_error($e->getMessage());
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/front/top.php */