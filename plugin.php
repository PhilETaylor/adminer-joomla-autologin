<?php
require_once dirname(__FILE__).'/configuration.php';
$config = new JConfig();
$_GET['username'] = '';
$_GET['db']= $config->db;

function adminer_object() {

    class AdminerSoftware extends Adminer {

        function name() {
            // custom name in title and heading
            return 'MyJoomla';
        }

        function permanentLogin($g = false) {
            // key used for permanent login
            return md5('myjoomla-mysql');
        }

        function credentials() {
            $config = new JConfig();
            return array($config->host, $config->user, $config->password);
        }

        function serverName($server)
        {
            $config = new JConfig();
            parent::serverName($config->host);
        }

        function login($login, $password) {
            // validate user submitted credentials
            return true;
        }

        function databases($flush = true) {
            $config = new JConfig();
            return array($config->db);
        }
    }

    return new AdminerSoftware;
}
?>