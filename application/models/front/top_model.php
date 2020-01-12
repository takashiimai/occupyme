<?php

class Top_model extends FRONT_Model {

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
        front_layout_view('top_index', $this->viewVar);
    }

    public function do_buy($name = NULL) {
        $this->load->model('db/items_model');

        $params = array(
            $name,
        );
        $sql = "SELECT url FROM items WHERE name = ?";
        $res = $this->db->query($sql, $params);

        if ($res->num_rows() > 0) {
            $row = $res->row_array();
            redirect($row['url']);
        } else {
            redirect("/top");
        }
    }
}
