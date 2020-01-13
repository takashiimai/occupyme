<?php

class Db_member_model extends DB_Model {

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();

        $this->tbl = 'member';
    }
}
