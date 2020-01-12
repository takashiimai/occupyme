<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BATCH_Controller extends CI_Controller {

    // 設定情報
    public $configVar = array();

    protected $script_info = "";

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();

        $this->config->load('my_config', TRUE);
        $this->configVar = $this->viewVar['config'] = $this->config->item('my_config');

        ini_set('display_errors', 1);

        // エラーレベルセット
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

        $this->script_info = ' ' . $_SERVER['argv'][1] . '/' . $_SERVER['argv'][2];

        $this->load->model("sendmail_model");
        $this->sendmail_model->set_to($this->viewVar['config']['mail']['to']);
        $this->sendmail_model->set_from($this->viewVar['config']['mail']['from']);

    }
    /**
     * メイン処理等を呼び出す（テンプレートメソッド）
     *
     */
    public function execute()
    {
        // 開始ログ出力
        $this->_startLog();

        //バッファを制御開始
        ob_start();

        // メイン処理を実行
        $this->_main();

        // 終了ログ出力
        $this->_endLog();
    }

    /**
     * バッチ開始ログを出力します。
     */
    protected function _startLog()
    {
        logbatch("[BATCH START]" . $this->script_info);
    }

    /**
     * バッチ終了ログを出力します。
     */
    protected function _endLog()
    {
        logbatch("[BATCH END]" . $this->script_info);
    }

    /**
     * ログ出力
     * @param unknown $message
     */
    public function writeLog($message)
    {
        logbatch("[BATCH INFO]" . $this->script_info, $message);
    }

    /**
     * 報告メールを送信先設定
     * @param string $addr
     */
    public function setMailTo($addr)
    {
        $this->sendmail_model->set_to($addr);
    }

    /**
     * 報告メールを送信元設定
     * @param string $addr
     */
    public function setMailFrom($addr)
    {
        $this->sendmail_model->set_from($addr);
    }

    /**
     * 報告メールを送信する
     * @param string $message メール本文
     * @param string $subject メール件名
     */
    public function reportMail($message, $subject)
    {
        $message = $this->createMailMessage($message);
        $hostname = $this->getHostname();
        $this->sendmail_model->set_subject('[INFO]' . $subject . " - " . $hostname);
        $this->sendmail_model->set_message($message);
        $this->sendmail_model->send();
    }

    /**
     * 警告メールを送信する
     * @param string $message メール本文
     * @param string $subject メール件名
     */
    public function alertMail($message, $subject)
    {
        $message = $this->createMailMessage($message);
        $hostname = $this->getHostname();
        $this->sendmail_model->set_subject('[ALERT]' . $subject . " - " . $hostname);
        $this->sendmail_model->set_message($message);
        $this->sendmail_model->send();
    }

    /**
     * ホスト名を取得する
     *
     * @return string $hostname ホスト名
     */
    protected function getHostname()
    {
        $hostname = exec("/bin/hostname");
        return $hostname;
    }

    /**
     * メール本文を作成する
     *
     * @param string $message メールの本文
     */
    protected function createMailMessage($message)
    {
        // 時間
        $start_time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $end_timestamp = time();
        $end_time = date('Y-m-d H:i:s', $end_timestamp);
        $took_time = date('H:i:s', strtotime(date('Y-m-d')) + $end_timestamp - $_SERVER['REQUEST_TIME']);

        // 実行ファイル
//        $script_name = realpath($_SERVER['argv'][0]);
        $script_name = $this->script_info;

        // ホスト名
        $hostname = $this->getHostname();

        $macro =
                array(
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'took_time' => $took_time,
                    'hostname' => $hostname,
                    'script_name' => $script_name,
                    'message' => $message,
        );
        $message = $this->getMailTemplate();
        foreach ($macro as $key => $val) {
            $message = str_replace("%{$key}%", $val, $message);
        }
        return $message;
    }

    /**
     * メールのテンプレートを取得する
     *
     * @return string $template メールのテンプレート
     */
    protected function getMailTemplate()
    {
        $template = <<<EOF
%message%

■ 実行時間
------------------------------------------
実行開始：%start_time%
実行終了：%end_time%
実行時間：%took_time%
------------------------------------------

■ 実行プログラム
------------------------------------------
実行ホスト：%hostname%
実行プログラム：%script_name%
------------------------------------------
EOF;
        return $template;
    }
}



class FRONT_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ビューレイアウト
        $this->load->helper(array('front_layout'));

		if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {
	        $this->output->enable_profiler(TRUE);
	    }

    }
}


