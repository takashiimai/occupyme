<?php

class Db_items_model extends DB_Model {

    /**
     * construct
     * @param
     * @return
     */
    public function __construct() {
        parent::__construct();

        $this->tbl = 'items';
    }
}
