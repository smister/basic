<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="row span10">
                <section class="offset2 block well">
                    <?php $this->beginContent('//layouts/errorBox', array('errors' =>$errors));$this->endContent();?>
<form action="" method="POST" class="form-horizontal">
    <legend><h3>免注册购买</h3></legend>
    <div class="control-group">
        <label class="control-label">收货人</label>
        <div class="controls">
            <input type="text" name="user[username]" value="" placeholder="长度请不要超过5位" class="title">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">邮箱</label>
        <div class="controls">
            <input type="text" name="user[email]" placeholder="请确保邮箱地址正确" value="" class="email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">详细地址</label>
        <div class="controls">
            <input type="text" name="user[address]" placeholder="请确认门牌号正确" class="title">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">手机号码</label>
        <div class="controls">
            <input type="text" name="user[number]" placeholder="请确保是11位手机号" class="title">
        </div>
    </div>
<!--    <div class="control-group">-->
<!--        <label class="control-label">验证码</label>-->
<!--        <div class="controls">-->
<!--            --><?php //$this->widget('CCaptcha',array(
//                'showRefreshButton'=>true,
//                'clickableImage'=>true,
//                'buttonLabel'=>'刷新验证码',
//                'imageOptions'=>array(
//                    'alt'=>'点击换图',
//                    'title'=>'点击换图',
//                    'style'=>'cursor:pointer',
//                    'padding'=>'10')
//            )); ?>
<!--            <input type="text" name="user[varifyCode]" placeholder="验证码" >-->
<!--        </div>-->
    </div>
    <div class="form-actions">
        <input type="submit" value="保存收货人信息" class="btn btn-primary">
    </div>
</form>
</section>
</div>
</div>
</div>
</div>
