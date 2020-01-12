<?php

class Lp_model extends FRONT_Model {

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * index 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_index() {
        $this->load->model('db/access_model');

        $affiliate_auth = $_SERVER['QUERY_STRING'];
        if (!preg_match('/^[a-zA-Z0-9]{32}$/', $affiliate_auth)) {
            $affiliate_auth = '';
            $this->session->unset_userdata('affiliate_auth');
        } else {
            $this->session->set_userdata('affiliate_auth', $affiliate_auth);
        }

        $params = array(
            'affiliate_auth'   => $affiliate_auth,
            'ip'        => $_SERVER['REMOTE_ADDR'],
        );
        $this->access_model->insert($params);
        redirect('/top');
    }

}
