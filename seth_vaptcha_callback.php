<?php
/**
 * Created by PhpStorm.
 * Author: Seth
 * E-mail: mail@imseth.cn
 * Date: 17-4-27
 * Time: 下午8:21
 */

function callback_init()
{
    $data = [
        'id' => '',
        'key' => '',
        'login' => 0,
        'register' => 0
    ];
    option::pset('seth_vaptcha', $data);

}
