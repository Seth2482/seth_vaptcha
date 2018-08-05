<?php
/**
 * Created by PhpStorm.
 * Author: Seth
 * E-mail: mail@imseth.cn
 * Date: 17-4-23
 * Time: 下午7:18
 */
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}

$s = option::pget('seth_vaptcha');
?>
<h2>Vaptcha 验证码设置</h2>

<p>
<h4>
    请在以下填写您在<a href="https://www.vaptcha.com/">Vaptcha</a>的信息
</h4>
</p>

<br/>

<form action="setting.php?mod=plugin:seth_vaptcha" method="post">
    <div class="input-group">
        <span class="input-group-addon">VID</span>
        <input type="text" class="form-control" name="id" value="<?php echo empty($s['id']) ? "" : $s['id'] ?>">
    </div>
    <br/>
    <div class="input-group">
        <span class="input-group-addon">KEY</span>
        <input type="text" class="form-control" name="key" value="<?php echo empty($s['key']) ? "" : $s['key'] ?>">
    </div>
    <br/>
    <div>
        <strong>注册验证</strong>&nbsp;&nbsp;
        <label class="radio-inline">
            <input type="radio" name="register" value="1" <?php echo $s['register'] == 1 ? 'checked' : '' ?>> 是
        </label>
        <label class="radio-inline">
            <input type="radio" name="register" value="0" <?php echo $s['register'] == 0 ? 'checked' : '' ?>> 否
        </label>
    </div>
    <br/>
    <div>
        <strong>登录验证</strong>&nbsp;&nbsp;
        <label class="radio-inline">
            <input type="radio" name="login" value="1" <?php echo $s['login'] == 1 ? 'checked' : '' ?>> 是
        </label>
        <label class="radio-inline">
            <input type="radio" name="login" value="0" <?php echo $s['login'] == 0 ? 'checked' : '' ?>> 否
        </label>
    </div>
    <br/>
    <button type="submit" class="btn btn-primary">保存</button>
</form>
