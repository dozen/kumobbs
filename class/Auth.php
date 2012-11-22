<?php

/**
 * CSRF対策
 *
 * @author dozen
 */
class Auth {

    private $authCode, $screenName, $mem;
    static private $prefix;

    /**
     * CSRF対策
     */
    function __construct() {
        $this->mem = Singleton::Memcached();

        /*
         * 接頭辞を定義します。
         * Config::NAME_SPACEの中身が空かどうかで処理を変える。
         */
        if (Config::NAME_SPACE !== '') {
            self::$prefix = Config::NAME_SPACE . ':' . Config::SERVICE_NAME . ':Auth:';
        } else {
            self::$prefix = Config::SERVICE_NAME . ':Auth:';
        }
    }

    /**
     * 認証キーを発行。
     * @param type $screenName
     */
    function issueAuthCode($screenName) {
        $this->authCode = Functions::randomString();
        $this->mem->set(self::$prefix . $this->authCode, $screenName, 3600);
    }

    /**
     * issueAuthCode()で発行した認証キーを取得
     * @return string キーを返す
     */
    function getAuthCode() {
        return $this->authCode;
    }

    /**
     * check()するまえに値をセットすること。
     * @param string $screenName
     */
    function setData($screenName) {
        $this->authCode = Functions::getPOST('auth');
        $this->screenName = $screenName;
        if (empty($this->authCode) || empty($this->screenName)) {
            throw new Exception('CSRF対策です', 400);
        }
    }

    /**
     * 登録されたキーかチェックする。事前にsetData()を実行しておく
     */
    function check() {
        $result = $this->mem->get(self::$prefix . $this->authCode);
        if ($result !== $this->screenName) {
            throw new Exception('CSRF対策です。', 400);
        }
        $this->mem->delete(self::$prefix . $this->authCode);
    }

}
