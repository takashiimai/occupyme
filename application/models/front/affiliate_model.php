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
            array(
             'field'   => 'name', 
             'label'   => '購入時のお名前', 
             'rules'   => 'trim|htmlspecialchars|max_length[255]',
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            front_layout_view('affiliate_index');
        } else {
            // 登録
            $this->load->model('db/member_model');
            $params = array(
                'email'                 => $this->input->post('email'),
                'passwd'                => $this->input->post('passwd'),
                'vip_flg'               => strlen($this->session->userdata('buy_auth')) ? 1 : 0,
                'parent_affiliate_auth' => $this->session->userdata('affiliate_auth') == FALSE ? '' : $this->session->userdata('affiliate_auth'),
                'affiliate_auth'        => md5( rand(1000,9999) . '-' . time()),
                'name'                  => $this->input->post('name'),
            );
            $this->member_model->insert($params);

            // 購入用セッションを削除
            $this->session->unset_userdata('buy_auth');

            // アフィリエイト用セッションを削除
            $this->session->unset_userdata('affiliate_auth');

            // ログインフラグON
            $this->session->set_userdata('login', $this->input->post('email'));

            front_layout_view('affiliate_post');
        }
    }

    public function do_vip() {
		$affiliate_auth = $this->session->userdata('affiliate_auth');

    	$fee = NULL;
    	if ($affiliate_auth != FALSE) {
			$params = array(
				$affiliate_auth,
			);
			$sql = "SELECT vip_flg FROM member WHERE affiliate_auth = ?";
			$res = $this->db->query($sql, $params);
            if ($res->num_rows() > 0) {
                $row = $res->row_array();
                $fee = $row['vip_flg'];
            }
		}

		if (in_array($_SERVER['QUERY_STRING'], $this->accept)) {
			;
		} else {
			$affiliate_auth = FALSE;
			$fee = NULL;
		}

        $this->load->model('db/purchase_model');
        $params = array(
            'affiliate_auth'   => $affiliate_auth == FALSE ? '' : $affiliate_auth,
			'fee' => $fee,
        );
        $this->purchase_model->insert($params);
        $this->session->unset_userdata('affiliate_auth');

        loginfo("refferer:", $_SERVER['HTTP_REFERER']);
        // セッションに "buy_aoth" があったら VIP登録
        if (1) {
            $this->session->set_userdata('buy_auth', md5(time()));
        } else {
            $this->session->unset_userdata('buy_auth');
        }

        redirect('/affiliate');
	}
}
