<?php

class Purchase_model extends FRONT_Model {
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
     * keyholder 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_keyholder() {
        $this->viewVar['image'] = '/images/item_keyholder.jpg';
        front_layout_view('purchase_index', $this->viewVar);
    }

    /**
     * keyholder 用モデル
     * @param
     * @return boolean チェック結果
     */
    public function do_badge() {
        $this->viewVar['image'] = '/images/item_badge.jpg';
        front_layout_view('purchase_index', $this->viewVar);
    }

    public function do_post() {
        if ($this->session->userdata('login')) {
            $config = array(
                array(
                 'field'   => 'name',
                 'label'   => '名前',
                 'rules'   => 'required|max_length[200]',
                ),
                array(
                 'field'   => 'address',
                 'label'   => '住所',
                 'rules'   => 'required|max_length[200]',
                ),
                array(
                 'field'   => 'phone',
                 'label'   => '電話番号',
                 'rules'   => 'required|max_length[200]',
                ),
            );
        } else {
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
                 'label'   => '名前',
                 'rules'   => 'required|max_length[200]',
                ),
                array(
                 'field'   => 'address',
                 'label'   => '住所',
                 'rules'   => 'required|max_length[200]',
                ),
                array(
                 'field'   => 'phone',
                 'label'   => '電話番号',
                 'rules'   => 'required|max_length[200]',
                ),
            );
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            front_layout_view('purchase_index');
        } else {
            // 登録
            $this->load->model('db/member_model');
            $this->load->model('db/purchase_model');
            if (!$this->session->userdata('login')) {
                $params = array(
                    'email'                 => $this->input->post('email'),
                    'passwd'                => $this->input->post('passwd'),
                    'member_type'           => 0,
                    'parent_affiliate_auth' => $this->session->userdata('affiliate_auth') == FALSE ? '' : $this->session->userdata('affiliate_auth'),
                    'affiliate_auth'        => md5( $this->input->post('email') . rand(1,100000000)),
                );
                $this->member_model->insert($params);
                $member_id = $this->member_model->get_last_insert_id();
            } else {
                $params = array(
                    $email,
                );
                $sql = 'SELECT * FROM member WHERE email = ?';
                $res = $this->db->query($sql, $params);
                if ($res->num_rows() > 0) {
                    $user = $res->row_array();
                    $member_id = $user['id'];
                }
            }
            $userinfo = [
                'name'    => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'phone'   => $this->input->post('phone'),
            ];
            $params = array(
                'member_id'             => $this->member_model->get_last_insert_id(),
                'affiliate_auth'        => $this->session->userdata('affiliate_auth') == FALSE ? '' : $this->session->userdata('affiliate_auth'),
                'fee'                   => 0,
                'pay_flg'               => 0,
                'userinfo'              => json_encode($userinfo, JSON_UNESCAPED_UNICODE),
            );
            $this->purchase_model->insert($params);

            // ログインフラグON
            $this->session->set_userdata('login', $this->input->post('email'));

            front_layout_view('purchase_post');
        }
    }

}
