<?php
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

use Vaptcha\Vaptcha;

function login_show()
{
    if (option::xget('seth_vaptcha', 'login') != 0) {
        show();
    }

}

function register_show()
{
    if (option::xget('seth_vaptcha', 'register') != 0) {
        show();
    }

}

function login_check()
{
    if (option::xget('seth_vaptcha', 'login') != 0) {
        if (!check()) {
            redirect('index.php?mod=login&error_msg=' . urlencode('请完成验证！'));
            die;
        }
    }
}

function register_check()
{
    if (option::xget('seth_vaptcha', 'register') != 0) {
        if (!check()) {
            msg('请完成验证！');
        }
    }
}

function check()
{
    session_start();
    $data = $_POST;
    $wcurl = new wcurl("http://api.vaptcha.com/v2/validate");
    $result = $wcurl->post([
        'id' => option::xget('seth_vaptcha','id'),
        'secretkey' => option::xget('seth_vaptcha', 'key'),
        'token' => $data['vaptcha_token'],
        'ip' => $_SERVER['REMOTE_ADDR']
    ]);
    $result = json_decode($result, true);
    return $result['success'] === 1? true : false;
}

function show()
{
    include SYSTEM_ROOT . '/plugins/seth_vaptcha/js.php';
}

addAction('login_page_2', 'login_show');
addAction('reg_page_2', 'register_show');
addAction('admin_login_1', 'login_check');
addAction('admin_reg_1', 'register_check');
