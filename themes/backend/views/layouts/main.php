<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
    <?php Yii::app()->getClientScript()->registerCssFile(F::themeUrl() . '/css/styles.css'); ?>
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/common.css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/common.js"></script>
</head>
<body screen_capture_injected="true">

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'color' => TbHtml::NAVBAR_COLOR_INVERSE,
    'brandLabel' => '后台管理',
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => '商城管理', 'url' => '#', 'items' => array(
                    array('label' => 'ITEM'),
                    array('label' => '商品属性', 'url' => array('/mall/itemProp/admin')),
                    array('label' => '商品列表', 'url' => array('/mall/item/admin')),
                    array('label' => '图片空间', 'url' => array('/mall/elfinder/admin')),
                    array('label' => 'Service'),
                    array('label' => '发货单', 'url' => array('/mall/shipping/admin')),
                    array('label' => '退货单', 'url' => array('/mall/refund/admin')),
                ), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '用户控制', 'url' => '#', 'items' => array(
                    array('label' => '会员列表', 'url' => array('/user/admin/admin')),
                    array('label' => '管理员列表', 'url' => array('/adminUser/admin')),
                    array('label' => '权限管理', 'url' => array('/auth/assignment/index')),
                ), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '插件列表', 'url' => array('/plugin/pluginmanage/index'), 'visible' => !Yii::app()->user->isGuest),
            ),
        ),

        array(
            'class' => 'bootstrap.widgets.TbNav',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => '网站前台', 'url' => Yii::app()->request->hostInfo . Yii::app()->baseUrl),
                array('label' => '站点配置', 'url' => array('/settings/index'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '登录', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::app()->user->name, 'url' => '#', 'items' => array(
                    array('label' => '个人资料', 'icon' => 'user', 'url' => '#'),
                    array('label' => '退出', 'icon' => 'off', 'url' => array('/site/logout'))
                ), 'visible' => !Yii::app()->user->isGuest),
            ),
        ),
    )));
?>

<div class="container-fluid" id="page">

    <?php echo $content; ?>

    <div class="clear"></div>

    <footer>
        <div class="row-fluid">
            <div class="span12">
                <p class="powered"><?php echo Yii::powered(); ?>
                    / <?php echo CHtml::link('Yincart', 'http://yincart.com'); ?>
                    <span class="copy">Copyright &copy; <?php echo date('Y'); ?> by <?php echo F::sg('site', 'name'); ?>
                        . All Rights Reserved.</span>
                </p>
            </div>
        </div>
    </footer>
    <!-- footer -->

</div>
<!-- page -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.dynotable.js');
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/skus.js', CClientScript::POS_END); ?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common.js"></script>
</body>
</html>
