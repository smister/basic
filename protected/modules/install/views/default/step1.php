
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/css/style.css"  />


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


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
    </div>    <div class="pright">
        <div class="pr-title"><h3>Server Information</h3></div>
        <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
            <tr>
                <th width="300" align="center"><strong>Parameter</strong></th>
                <th width="424"><strong>Value</strong></th>
            </tr>
            <tr>
                <td><strong>Server domain name</strong></td>
                <td><?php echo $sp_name; ?></td>
            </tr>
            <tr>
                <td><strong>Server operating system</strong></td>
                <td><?php echo $sp_os; ?></td>
            </tr>
            <tr>
                <td><strong>Server interprets engine</strong></td>
                <td><?php echo $sp_server; ?></td>
            </tr>
            <tr>
                <td><strong>PHP version</strong></td>
                <td><?php echo $phpv; ?></td>
            </tr>
            <tr>
                <td><strong>System installation directory</strong></td>
                <td><?php echo ROOT; ?></td>
            </tr>
        </table>
        <div class="pr-title"><h3>Environmental Monitoring System</h3></div>
        <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;">
            System environment requires all of the following conditions must be met, otherwise the system or the system will not be able to use some features。
        </div>
        <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
            <tr>
                <th width="200" align="center"><strong>Need to open a variable or function</strong></th>
                <th width="80"><strong>Require</strong></th>
                <th width="400"><strong>The actual status and recommendations</strong></th>
            </tr>
            <tr>
                <td>allow_url_fopen</td>
                <td align="center">On </td>
                <td><?php echo $sp_allow_url_fopen; ?> <small>(Does not meet the requirements will result in the collection, remote data localization functions can not be applied)</small></td>
            </tr>
            <tr>
                <td>safe_mode</td>
                <td align="center">Off</td>
                <td><?php echo $sp_safe_mode; ?> <small>(The system does not support the<span class="STYLE2">Win a host of non-safe mode</span>run)</small></td>
            </tr>

            <tr>
                <td>GD Support </td>
                <td align="center">On</td>
                <td><?php echo $sp_gd; ?> <small>(
                        Do not support the cause of most of the features associated with the pictures can not be used or raises a warning)</small></td>
            </tr>
            <tr>
                <td>MySQL Support </td>
                <td align="center">On</td>
                <td><?php echo $sp_mysql; ?> <small>(This system does not support can not be used)</small></td>
            </tr>
        </table>


        <div class="pr-title"><h3>Directory permissions detection</h3></div>
        <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;">
            System requirements must meet all the following directory permissions can read and write all the requirements to use the other applications can be installed in the directory management background detection。
        </div>
        <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
            <tr>
                <th width="300" align="center"><strong>Directory name</strong></th>
                <th width="212"><strong>Read permission</strong></th>
                <th width="212"><strong>Write permissions</strong></th>
            </tr>
            <?php
            foreach($sp_testdirs as $d)
            {
                ?>
                <tr>
                    <td><?php echo $d; ?></td>
                    <?php
                    $fulld = ROOT.str_replace('/*','',$d);
                    $rsta = (is_readable($fulld) ? '<font color=green>[√]read</font>' : '<font color=red>[×]read</font>');
                    $wsta = (is_writable($fulld) ? '<font color=green>[√]write</font>' : '<font color=red>[×]write</font>');
                    echo "<td>$rsta</td><td>$wsta</td>\r\n";
                    ?>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="btn-box">
            <input type="button"  value="Back" onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';" />
            <input type="button"  value="Next" onclick="window.location.href='<?php echo $this->createUrl('Default/step2'); ?>'" />
        </div>
    </div>
    </div>
</div>

<div class="foot">

</div>

</body>
</html>