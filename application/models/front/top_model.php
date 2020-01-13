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
}
