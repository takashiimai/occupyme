<?php

class Member_model extends FRONT_Model {

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
    public function do_login() {
        $this->viewVar['post']['email'] = '';
        if ($this->session->userdata('login')) {
            redirect('/mypage');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($email && $password) {
                $this->load->model('db/db_member_model');

                $params = array(
                    $email,
                    $password,
                );

                $sql = 'SELECT COUNT(*) as cnt FROM member WHERE email = ? AND passwd = ?';
                $res = $this->db->query($sql, $params);

                if ($res->num_rows() > 0) {
                    $row = $res->row_array();
                    if ($row['cnt']) {
                        $this->session->set_userdata('login', $email);
                        redirect('/mypage');
                    }
                }
                $this->viewVar['post']['email'] = $email;
                $this->viewVar['error'] = 'メールアドレス、まはたパスワードが違います。';
            }
        }
        front_layout_view('member_login', $this->viewVar);
    }

    public function do_logout() {
        $this->session->unset_userdata('login');

        front_layout_view('member_logout', $this->viewVar);
    }
}
