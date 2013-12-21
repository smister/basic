<?php
/* @var $this Step3Controller */

$this->breadcrumbs=array(
    'Step3',
);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/css/style.css"  />
</head>
<body>
<div id='postloader' class='waitpage'></div>
<form method="post" action="<?php echo $this->createUrl('Default/step3'); ?>">

    <div class="main">
        <div class="pleft">
            <dl class="setpbox t1">
                <dt>Installation Steps</dt>
                <dd>
                    <ul>
                        <li class="now"><h6>License Agreement</h6></li>
                        <li><h6>EnvironmentalTesting</h6></li>
                        <li><h6>ParameterConfiguration</h6></li>
                        <li><h6>Installing</h6></li>
                        <li><h6>Installation complete</h6></li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="pright">
            <div class="pr-title"><h3>Database Settings</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>Database Host：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbhost'); ?>
                        <small>Example： localhost</small></td>
                </tr>
                <tr>
                    <td class="onetd"><strong>Database Users：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbuser'); ?>
                </tr>
                <tr>
                    <td class="onetd"><strong>Database Password：</strong></td>
                    <td>
                        <div style='float:left;margin-right:3px;'><?php echo CHtml::activeTelField($model, 'dbpwd'); ?></div>
                        <div style='float:left' id='dbpwdsta'></div>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>Table Prefix：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'dbprefix'); ?>
                        <small>If there is no special need, please do not modify</small></td>
                </tr>
                <tr>
                    <td class="onetd"><strong>The database name：</strong></td>
                    <td>
                        <div style='float:left;margin-right:3px;'><?php echo CHtml::activeTelField($model, 'dbname'); ?></div>
                        <div style='float:left' id='havedbsta'></div>
                    </td>
                </tr>
            </table>

            <div class="pr-title"><h3>The initial administrator password</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>User name：</strong></td>
                    <td>
                        <?php echo CHtml::activeTelField($model, 'adminuser'); ?>
                        <p><small>ONLY USE'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'</small></p>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>Password：</strong></td>
                    <td><?php echo CHtml::activeTelField($model, 'adminpwd'); ?> </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>Cookie Encryption：</strong></td>
                    <td><input name="cookieencode" type="text" value="<?php echo $rnd_cookieEncode; ?>" class="input-txt" /></td>
                </tr>
            </table>

            <div class="pr-title"><h3>Site Settings</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td class="onetd"><strong>Web Name：</strong></td>
                    <td>
                        <?php echo CHtml::activeTelField($model, 'webname'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="onetd"><strong>adminmail：</strong></td>
                    <td> <?php echo CHtml::activeTelField($model, 'adminmail'); ?></td>
                </tr>
            </table>

            <div class="pr-title"><h3>Installation and testing experience data</h3></div>
            <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
                <tr>
                    <td width="168"><strong>
                            Experience initialization data packet</strong>：</td>
                    <?php
                    if($isdemosign == 0)
                    {
                        ?>
                        <td width="558"><div class="olink" id="_remotesta"><div style="float:left">&nbsp; <font color="red">[×]</font> 不存在</div><a href="javascript:GetRemoteDemo()">远程获取</a></div></td>
                    <?php
                    } else {
                        ?>
                        <td width="558">&nbsp; <font color="green">[√]</font> Exist (you can choose to install to experience)</td>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="2"><label for="installdemo"><strong>
                                Setup Initialization data experience</strong>(Experience with application data will contain most of the features of the operating examples)</label></td>
                </tr>
            </table>

            <div class="btn-box">
                <input type="button"  value="Back" onclick="window.location.href='<?php echo $this->createUrl('Default/step1'); ?>';" />
                <input type="submit" value="Install"  />
            </div>
        </div>
    </div>
    <div class="foot">
    </div>
</form>
</body>
</html>