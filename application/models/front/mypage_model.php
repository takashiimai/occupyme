<?php

class Mypage_model extends FRONT_Model {

    protected $user = array();

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('db/member_model');

        $email = $this->session->userdata('login');
        if (!$email) {
			$this->session->unset_userdata('login');
            redirect('/member/login');
        } else {
            $params = array(
                $email,
            );

            $sql = 'SELECT * FROM member WHERE email = ?';
            $res = $this->db->query($sql, $params);

            if ($res->num_rows() > 0) {
                $this->user = $res->row_array();
                $this->viewVar['user'] = $this->user;
            } else {
				$this->session->unset_userdata('login');
                redirect('/member/login');
            }
        }
    }

    /**
     * index 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_index() {
        front_layout_view('mypage_index', $this->viewVar);
    }

    public function do_report() {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        if ($year > 0 && $month > 0) {
            $this->load->model('db/access_model');

            // 当月LPアクセス集計
            $this->viewVar['access'] = 0;
            $params = array(
                $this->user['affiliate_auth'],
                $year . '-' . substr('00'.$month, -2) . '%',
            );
            $sql  = 'SELECT COUNT(*) AS cnt FROM access ';
            $sql .= 'WHERE affiliate_auth = ? AND create_date LIKE ? ';
            $res = $this->db->query($sql, $params);
            if ($res->num_rows() > 0) {
                $result = $res->row_array();
                $this->viewVar['access'] = $result['cnt'];
            }

            // 当月売り上げ件数
            $this->load->model('db/purchase_model');
            $this->viewVar['purchase_normal'] = 0;
            $this->viewVar['purchase_vip'] = 0;
            $params = array(
                $this->user['affiliate_auth'],
                $year . '-' . substr('00'.$month, -2) . '%',
            );
            $sql  = 'SELECT count( CASE WHEN fee=0 THEN 1 ELSE null END ) as normal, ';
            $sql .= 'count( CASE WHEN fee=1 THEN 1 ELSE null END ) as vip ';
            $sql .= 'FROM purchase ';
            $sql .= 'WHERE affiliate_auth = ? AND create_date LIKE ? ';
            $res = $this->db->query($sql, $params);
            if ($res->num_rows() > 0) {
                $result = $res->row_array();
                $this->viewVar['purchase_normal'] = $result['normal'];
                $this->viewVar['purchase_vip'] = $result['vip'];
            }
        }

        //総合レポート
        $this->viewVar['total_access'] = 0;
        $params = array(
            $this->user['affiliate_auth'],
        );
        $sql  = 'SELECT COUNT(*) AS cnt FROM access ';
        $sql .= 'WHERE affiliate_auth = ? ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $this->viewVar['total_access'] = $result['cnt'];
        }

        // 総合売り上げ件数
        $this->load->model('db/purchase_model');
        $this->viewVar['purchase_total_normal'] = 0;
        $this->viewVar['purchase_total_vip'] = 0;
        $params = array(
            $this->user['affiliate_auth'],
        );
        $sql  = 'SELECT count( CASE WHEN fee=0 THEN 1 ELSE null END ) as normal, ';
        $sql .= 'count( CASE WHEN fee=1 THEN 1 ELSE null END ) as vip ';
        $sql .= 'FROM purchase ';
        $sql .= 'WHERE affiliate_auth = ? ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $this->viewVar['purchase_total_normal'] = $result['normal'];
            $this->viewVar['purchase_total_vip'] = $result['vip'];
        }
        

        // 出金可能額
        $this->load->model('db/purchase_model');
        $this->viewVar['payable_normal'] = 0;
        $this->viewVar['payable_vip'] = 0;
        $params = array(
            $this->user['affiliate_auth'],
            0,
        );
        $sql  = 'SELECT count( CASE WHEN fee=0 THEN 1 ELSE null END ) as normal, ';
        $sql .= 'count( CASE WHEN fee=1 THEN 1 ELSE null END ) as vip ';
        $sql .= 'FROM purchase ';
        $sql .= 'WHERE affiliate_auth = ? AND pay_flg = ? ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $this->viewVar['payable_normal'] = $result['normal'];
            $this->viewVar['payable_vip'] = $result['vip'];
        }

        // 出金依頼額
        $this->load->model('db/purchase_model');
        $this->viewVar['requestpay_normal'] = 0;
        $this->viewVar['requestpay_vip'] = 0;
        $params = array(
            $this->user['affiliate_auth'],
            1,
        );
        $sql  = 'SELECT count( CASE WHEN fee=0 THEN 1 ELSE null END ) as normal, ';
        $sql .= 'count( CASE WHEN fee=1 THEN 1 ELSE null END ) as vip ';
        $sql .= 'FROM purchase ';
        $sql .= 'WHERE affiliate_auth = ? AND pay_flg = ? ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $this->viewVar['requestpay_normal'] = $result['normal'];
            $this->viewVar['requestpay_vip'] = $result['vip'];
        }

		// すでに出金依頼中かチェック
        $params = array(
            $this->user['affiliate_auth'],
        );
        $sql  = 'SELECT count(*) AS count FROM request ';
        $sql .= 'WHERE affiliate_auth = ? AND complete_date IS NULL ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            if ($result['count'] > 0)
	            $this->viewVar['request'] = TRUE;		// 出金依頼中
			else
	            $this->viewVar['request'] = FALSE;		// 出金依頼無し
        }

        front_layout_view('mypage_report', $this->viewVar);
    }

    public function do_config() {
        $this->load->library('form_validation');

        if ($this->input->post('mode') == "regist") {

            $config = array(
                array(
                 'field'   => 'id', 
                 'label'   => 'ID', 
                 'rules'   => 'trim',
                ),
                array(
                 'field'   => 'email', 
                 'label'   => 'メールアドレス', 
                 'rules'   => 'required|valid_email|max_length[255]',
                ),
                array(
                 'field'   => 'passwd', 
                 'label'   => 'パスワード', 
                 'rules'   => 'required|min_length[4]|max_length[32]',
                ),
                array(
                 'field'   => 'bank', 
                 'label'   => '銀行名', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'bank_kana', 
                 'label'   => '銀行名（ひらがな）', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'branch', 
                 'label'   => '支店名', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'branch_kana', 
                 'label'   => '支店名（ひらがな）', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'account_type', 
                 'label'   => '預金種別', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'account', 
                 'label'   => '口座番号', 
                 'rules'   => 'trim|htmlspecialchars|max_length[255]',
                ),
                array(
                 'field'   => 'vip_flg', 
                 'label'   => '口座番号', 
                 'rules'   => 'trim',
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->viewVar['error'] = "入力した内容にエラーが発生しました。内容をご確認ください。";
            } else {
                // 登録
                $this->load->model('db/member_model');
                $params = array(
                    'id'             => $this->input->post('id'),
                    'email'          => $this->input->post('email'),
                    'passwd'         => $this->input->post('passwd'),
                    'bank'           => $this->input->post('bank'),
                    'bank_kana'      => $this->input->post('bank_kana'),
                    'branch'         => $this->input->post('branch'),
                    'branch_kana'    => $this->input->post('branch_kana'),
                    'account_type'   => $this->input->post('account_type'),
                    'account'        => $this->input->post('account'),
                );
                $this->member_model->update_by_id($params);

                $this->viewVar['success'] = "登録しました。";
            }
            foreach ($config as $row) {
                $this->viewVar['post'][ $row['field'] ] = $this->input->post($row['field']);
            }

        } else {
            $this->viewVar['post'] = $this->user;
        }

        front_layout_view('mypage_config', $this->viewVar);
    }

    public function do_request() {
        // 出金可能額
        $money = 0;
        $this->load->model('db/purchase_model');
        $params = array(
            $this->user['affiliate_auth'],
            0,
        );
        $sql  = 'SELECT count( CASE WHEN fee=0 THEN 1 ELSE null END ) as normal, ';
        $sql .= 'count( CASE WHEN fee=1 THEN 1 ELSE null END ) as vip ';
        $sql .= 'FROM purchase ';
        $sql .= 'WHERE affiliate_auth = ? AND pay_flg = ? ';
        $res = $this->db->query($sql, $params);
        if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $money = $result['normal'] * 2000 + $result['vip'] * 10000;
        }
        if ($money < 30000) {
            $this->viewVar['error'] = "出金可能金額に達していません。";
        } else {
            // 登録
            $this->load->model('db/request_model');

            $this->db->trans_start();

            $params = array(
                'affiliate_auth'       => $this->user['affiliate_auth'],
                'request_date'         => date("Y-m-d H:i:s"),
                'request_money'        => $money,
            );
            $this->request_model->insert($params);

            $sql = 'UPDATE purchase SET pay_flg = 1 WHERE affiliate_auth = "' . $this->user['affiliate_auth'] . '" AND pay_flg = 0';
            $this->db->query($sql, $params);

            $this->db->trans_complete();

            $this->viewVar['success'] = "出金依頼をおこないました。";
        }

        front_layout_view('mypage_request', $this->viewVar);
    }

    public function do_faq() {
        front_layout_view('mypage_faq', $this->viewVar);
    }

    public function do_logout() {
        $this->session->unset_userdata('login');

        front_layout_view('mypage_logout', $this->viewVar);
    }
}
