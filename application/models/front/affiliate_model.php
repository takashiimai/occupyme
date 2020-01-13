<?php

class Affiliate_model extends FRONT_Model {

	// 商品購入後のVIP登録リンクで有効なパラメータ
	// http://occupyme.dip.jp/affiliate/vip?xxxxxxxxxxxxxxxxxxxx
	protected $accept = array(
		'7fc56270e7a70fa81a5935b72eacbe29',
	);

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
    }

    /**
     * index 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_index() {
        front_layout_view('affiliate_index', $this->viewVar);
    }

    public function do_post() {
        $config = array(
            array(
             'field'   => 'email',
             'label'   => 'メールアドレス',
             'rules'   => 'required|valid_email|max_length[255]|is_unique[member.email]',
            ),
            array(
             'field'   => 'passwd',
             'label'   => 'パスワード',
             'rules'   => 'required|min_length[4]|max_length[32]',
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            front_layout_view('affiliate_index');
        } else {
            // 登録
            $this->load->model('db/db_member_model');
            $params = array(
                'email'                 => $this->input->post('email'),
                'passwd'                => $this->input->post('passwd'),
                'member_type'           => 0,
                'parent_affiliate_auth' => $this->session->userdata('affiliate_auth') == FALSE ? '' : $this->session->userdata('affiliate_auth'),
                'affiliate_auth'        => md5( $this->input->post('email') . rand(1,100000000)),
            );
            $this->db_member_model->insert($params);

            // ログインフラグON
            $this->session->set_userdata('login', $this->input->post('email'));

            redirect('/affiliate/complete');
        }
    }
}
