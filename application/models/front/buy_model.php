<?php

class Buy_model extends FRONT_Model {

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
    }

    /**
     * index 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_index() {
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
        if (1) {
            $this->session->set_userdata('buy_auth', md5(time()));
        } else {
            $this->session->unset_userdata('buy_auth');
        }

        redirect('/affiliate');
    }

}
