<?php
/**
 * Created by PhpStorm.
 * Author: Seth
 * E-mail: mail@imseth.cn
 * Date: 17-4-27
 * Time: 下午7:16
 */
?>
<!--该网站正在使用 seth_vaptcha 插件-->

<style>
  .vaptcha-init-main {
    display: table;
    width: 100%;
    height: 100%;
    background-color: #EEEEEE;
  }
​
  .vaptcha-init-loading {
    display: table-cell;
    vertical-align: middle;
    text-align: center
  }
​
  .vaptcha-init-loading>a {
    display: inline-block;
    width: 18px;
    height: 18px;
    border: none;
  }
​
  .vaptcha-init-loading>a img {
    vertical-align: middle
  }
​
  .vaptcha-init-loading .vaptcha-text {
    font-family: sans-serif;
    font-size: 12px;
    color: #CCCCCC;
    vertical-align: middle
  }
</style>
<!-- 点击式按钮建议高度介于36px与46px  -->
<!-- 嵌入式仅需设置宽度，高度根据宽度自适应，最小宽度为200px -->
<div id="vaptcha-container" class="vaptcha-container" style="width:300px;height:36px;">
  <div class="vaptcha-init-main">
    <div class="vaptcha-init-loading">
      <a href="https://vaptcha.com" target="_blank">
        <img src="https://cdn.vaptcha.com/vaptcha-loading.gif" />
      </a>
      <span class="vaptcha-text">VAPTCHA启动中...</span>
    </div>
  </div>
</div>

<script src="https://cdn.vaptcha.com/v2.js"></script>
<script type="text/javascript">
    $(function () {
        $('.login-button button').attr('disabled', true);
	      vaptcha({
	          //配置参数
	          vid: '<?=option::xget('seth_vaptcha', 'id')?>', // 验证单元id
	          type: 'click', // 展现类型 点击式
	          container: '#vaptcha-container' // 按钮容器，可为Element 或者 selector
	      }).then(function (vaptchaObj) {
              vaptchaObj.renderTokenInput('form[name=f]')
	            vaptchaObj.render()// 调用验证实例 vaptchaObj 的 render 方法加载验证按钮
              vaptchaObj.listen('pass', function() {
                  $('.login-button button').attr('disabled', false);
              })
	      })
    })        
</script>
<br />
