<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/js/login_nav.js");
?>

<div class="top_right">
                <span>您好，欢饮来到皮雕软包耗材批发商城！</span>
    <?php if (Yii::app()->user->isGuest) { ?>
        <div class="login-nav"><?php echo CHtml::link('登录', array('/user/login')) ?>
            |<?php echo CHtml::link('注册', array('/user/registration')) ?></div>
    <?php } else { ?>
        <div class="login-nav">Welcome，<?php echo Yii::app()->user->name ?></div>
        <div class="login-nav2"><?php $this->widget('zii.widgets.CMenu', array(
                'htmlOptions'=>array("style"=>"margin: 0; padding: 0;"),
                'items'=>array(
                    array('label'=>'Member Center', 'url'=>array('//member'),'itemOptions'=>array('class'=>'personal-center')),
                    array('label'=>'personal data', 'url'=>array('//user/profile/edit'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'delivery address', 'url'=>array('//member/delivery_address/admin'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'my order', 'url'=>array('//member/orderlist/admin'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'my collect', 'url'=>array('//member/wishlist/admin'),'itemOptions'=>array('class'=>'personal-list')),
                ),
            ));
            ?></div>
        <div class="login-nav"><?php echo CHtml::link('log out', array('/user/logout')) ?></div>
    <?php } ?>
    <div class="top_daohang">网站导航<i>arrow</i></div>
</div>