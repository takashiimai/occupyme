<?php
class MY_Model extends CI_Model {}

class FRONT_Model extends CI_Model {
    protected $viewVar;

    public function __construct() {
        parent::__construct();
    }
}


// データベース用モデル
class DB_Model extends CI_Model {

    // モデル名から取得したテーブル名
    protected $tbl;

    // 取得件数
    protected $found_rows = 0;

    // auto increment id
    protected $last_id = 0;

     public function __construct() {
        parent::__construct();

        // Model名からテーブル名取得
        $this->tbl = substr(strtolower(get_class($this)), 0, -6);
    }

    /**
     * テーブルの全件数を返却する
     * @param 
     * @return integer  件数
     */
    public function get_found_rows() {
        return $this->found_rows;
    }

    /**
     * autoincrement IDを返却する
     * @param 
     * @return integer  件数
     */
    public function get_last_insert_id() {
        return $this->last_id;
    }

    /**
     * テーブルデータ件数
     * @param   
     * @param   
     * @return  
     */
    public function select_count() {
        $res = $this->db->query("SELECT COUNT(id) AS count FROM " . $this->tbl);
        if ($res === FALSE) {
            logerr($params, $query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }

        $result = $res->row_array();
        return $result['count'];
    }

    /**
     * テーブルデータ削除
     * @param   
     * @param   
     * @return  
     */
    public function truncate() {
        $this->db->query("TRUNCATE TABLE " . $this->tbl);
    }

    /**
     * 全件取得する
     * @param string    テーブル名
     * @return boolean 実行結果
     */
    public function select_all($tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;

        $params = array(
            DATA_VALID, // 削除フラグ
        );

        $sql =  "SELECT * FROM `" . $tbl ."` ";
        $sql .= "WHERE delete_flg = ? ";
        $sql .= "ORDER BY orderby ASC, id ASC";

        $res = $this->db->query($sql, $params);
        if ($res === FALSE) {
            logerr($params, $query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }

        return $res->result_array();
    }

    /**
     * IDを指定して1件取得する
     * @param integer   id
     * @param string    テーブル名
     * @return array    取得結果
     */
    public function select_by_id($id, $tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;

        $params = array(
            $id,        // ID
            DATA_VALID, // 削除フラグ
        );

        $sql =  "SELECT * FROM `". $tbl . "` ";
        $sql .= "WHERE id = ? AND delete_flg = ? ";

        $res = $this->db->query($sql, $params);
        if ($res === FALSE) {
            logerr($params, $query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }

        return $res->row_array();
    }

    /**
     * idをアップデートする
     * @param array POSTデータ
     * @param string テーブル名
     * @return boolean 実行結果
     */
    public function update_by_id($params, $tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;

        // regist_date, regist_user_id は念のため削除する
        //if (isset($params['regist_date'])) unset($params['regist_date']);
        //if (isset($params['regist_user_id'])) unset($params['regist_user_id']);

        // クエリー作成
        $query = $this->db->update_string($tbl, $params, 'id = '.$params['id']);

        if (FALSE === $this->db->query($query)) {
            logerr($query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }
    }

    /**
     * 新規追加
     * @param array POSTデータ
     * @param string テーブル名
     * @return boolean 実行結果
     */
    public function insert($params = array(), $tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;

        // id は念のため削除しておく
        if (isset($params['id'])) unset($params['id']);

        // 新規追加時は、regist_dateはNULLにする
        $params['create_date'] = NULL;
//        $params['update_date'] = NULL;

        // クエリー作成
        $query = $this->db->insert_string($tbl, $params);

        if (FALSE === $this->db->query($query)) {
            logerr($query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }

        $query = 'SELECT last_insert_id() AS id FROM ' . $tbl;
        $res = $this->db->query($query);
        if (FALSE === $res) {
            logerr($query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }
        $result = $res->row_array();
        $this->last_id = $result['id'];
    }

    /**
     * 新規追加(orderbyを考慮)
     * @param array POSTデータ
     * @param string テーブル名
     * @return boolean 実行結果
     */
    public function insert_orderby($params = array(), $cond = NULL, $tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;

        // orderby, id は念のため削除
        if (isset($params['orderby'])) unset($params['orderby']);
        if (isset($params['id'])) unset($params['id']);

        // 新規追加時は、regist_dateはNULLにする
        $params['regist_date'] = NULL;
        $params['update_date'] = NULL;

        $keys = array_keys($params);
        $values = array_values($params);
        $binds = str_repeat("?, ", count($keys));

        $query = sprintf("INSERT INTO %s (%s, orderby) SELECT %s %s FROM %s WHERE %s = %s AND delete_flg = %s",
                    $tbl,
                    implode(', ', $keys),
                    $binds,
                    'COALESCE(MAX(orderby)+1, 1)',
                    $tbl,
                    ($cond == NULL ? '1' : $cond), 
                    ($cond == NULL ? '1' : $params[ $cond ]),
                    DATA_VALID
               );

        if (FALSE === $this->db->query($query, $values)) {
            logerr($values, $query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }

        $query = 'SELECT last_insert_id() AS id FROM ' . $tbl;
        $res = $this->db->query($query);
        if (FALSE === $res) {
            logerr($query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }
        $result = $res->row_array();
        $this->last_id = $result['id'];
    }

    /**
     * 1件削除（削除フラグを立てる）
     * @param interger 削除するid
     * @param string 削除するidに対するカラム名
     * @param string テーブル名
     * @return boolean 実行結果
     */
    public function delete($id, $key = NULL, $tbl = NULL) {
        $tbl = empty($tbl) ? $this->tbl : $tbl;
        $key = empty($key) ? 'id' : $key;

        // 削除パラメータ設定
        $params['delete_date'] = date("Y-m-d H:i:s");
        $params['delete_flg'] = DATA_DELETED;

        // クエリー作成
        $query = $this->db->update_string($tbl, $params, $key . ' = ' . $id);

        if (FALSE === $this->db->query($query)) {
            logerr($params, $query);
            throw new Exception(ERROR_DATABASE . my_trace());
        }
    }

    /**
     * idの表示順を下げる
     * @param integer
     * @param string
     * @param integer
     * @return
     */
    public function orderdown($id, $key, $value) {
        // idのページ情報を取得
        $res = $this->select_by_id($id);

        // 教材が同じで表示順が1つ前のページ情報を取得する
        if (isset($res['orderby']) && $res['orderby'] > 0) {
            $query  = 'SELECT * FROM '. $this->tbl . ' ';
            $query .= 'WHERE ' . $key . ' = ? AND delete_flg = ? AND orderby > ? ';
            $query .= 'ORDER BY orderby ASC, id ASC ';

            $params = array(
                $value,
                DATA_VALID,
                $res['orderby'],
            );
            $other = $this->db->query($query, $params);

            // 表示順入れ替え
            $this->swap_orderby($res, $other->row_array());
        } else {
            throw new Exception(ERROR_DATABASE . my_trace());
        }
    }

    /**
     * idの表示順を上げる
     * @param integer
     * @return array    取得結果
     */
    public function orderup($id, $key, $value) {
        // idのページ情報を取得
        $res = $this->select_by_id($id);

        // 教材が同じで表示順が1つ前のページ情報を取得する
        if (isset($res['orderby']) && $res['orderby'] > 0) {
            $query  = 'SELECT * FROM '. $this->tbl . ' ';
            $query .= 'WHERE ' . $key . ' = ? AND delete_flg = ? AND orderby < ? ';
            $query .= 'ORDER BY orderby DESC, id ASC';

            $params = array(
                $value,
                DATA_VALID,
                $res['orderby'],
            );
            $other = $this->db->query($query, $params);

            // 表示順入れ替え
            $this->swap_orderby($res, $other->row_array());
        } else {
            throw new Exception(ERROR_DATABASE . my_trace());
        }
    }

    /**
     * ２つのページの表示順を入れ変える
     * @param array
     * @param array
     * @return 
     */
    protected function swap_orderby($page, $other) {

        if (empty($page) || empty($other)) {
            logdebug('empty');
            return FALSE;
        }

        // 表示順を入れ替える
        $update_page = array(
            'orderby' => $other['orderby']
        );
        $query_update_page = $this->db->update_string($this->tbl, $update_page, 'id = '.$page['id']);

        $update_other = array(
            'orderby' => $page['orderby']
        );
        $query_update_other = $this->db->update_string($this->tbl, $update_other, 'id = '.$other['id']);

        // クエリ発行
        $this->db->trans_start();
        $this->db->query($query_update_page);
        $this->db->query($query_update_other);
        $this->db->trans_complete();

        if (FALSE === $this->db->trans_status()) {
            throw new Exception(ERROR_DATABASE . my_trace());
        } else {
            return TRUE;
        }
    }
}

