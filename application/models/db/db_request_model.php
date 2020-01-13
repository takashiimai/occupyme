<?php

class Db_request_model extends DB_Model {

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();

        $this->tbl = 'request';
    }
}
