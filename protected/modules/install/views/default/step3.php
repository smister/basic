
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/css/style.css"  />
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.js'); ?>
</head>
<body>


<div class="main">
    <div class="pleft">
        <dl class="setpbox t1">
            <dt>Installation Steps</dt>
            <dd>
                <?php
                if($success == 0)
                {
                    ?>
                    <ul>
                        <li><h6>License Agreement</h6></li>
                        <li><h6>EnvironmentalTesting</h6></li>
                        <li><h6>ParameterConfiguration</h6></li>
                        <li class="now"><h6>Installing</h6></li>
                        <li><h6>Installation complete</h6></li>
                    </ul>
                <?php
                } else {
                    ?>
                    <ul>
                        <li><h6>License Agreement</h6></li>
                        <li><h6>EnvironmentalTesting</h6></li>
                        <li><h6>ParameterConfiguration</h6></li>
                        <li><h6>Installing</h6></li>
                        <li class="now"><h6>Installation complete</h6></li>
                    </ul>
                <?php
                }
                ?>
            </dd>
        </dl>
    </div>
    <div class="pright">
        <div class="pr-title"><h3>instaling</h3></div>
        <div class="install-msg">

        </div>
    </div>
    <div class="goto">
        <div class="btn-box">
            <?php
            if($success == 0)
            {
                ?>
                <td width="558"><input type="button"  value="go to front" onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';" /></td>
                <td width="558"><input type="button"  value="go to back" onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';" /></td>
            <?php
            } else {
                ?>
                <td width="558"><input type="button"  value="go to back" onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';" /></td>
            <?php
            }
            ?>
    </div>
</div>
<div class="foot">
</div>

</body>
<script language="JavaScript">
$(document).ready(function() {
    n=1;
    var config = <?php echo CJSON::encode($config); ?>;
    var reloads = function() {
        if (n > 5) return;
        $.post('<?php echo Yii::app()->createUrl('install/Default/step3'); ?>', { config: config, step: n, 'is-ajax': true }, function(response) {
            if (response.error) {
                $('.install-msg').append('<label style="color: red; display: block">'+response.msg+'<label>');
            } else {
                $('.install-msg').append('<label style="color: greed; display: block">'+response.msg+'<label>');
                reloads();
            }
        }, 'json');
        n++;

    }
    reloads();
})
</script>
</html>
