<html>

<head>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/css/style.css"/>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.js'); ?>
</head>
<body>


<div class="main">
    <div class="pleft">
        <dl class="setpbox t1">
            <dt>Installation Steps</dt>
            <dd>
                <ul>
                    <li><h6>License Agreement</h6></li>
                    <li><h6>EnvironmentalTesting</h6></li>
                    <li><h6>ParameterConfiguration</h6></li>
                    <li class="now"><h6>Installing</h6></li>
                    <li><h6>Installation complete</h6></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="pright">
        <div class="pr-title"><h3>instaling</h3></div>
        <div class="install-msg">

        </div>
    </div>
    <div class="goto">
        <div class="btn-box" style="display: none">
            <td width="558"><input type="button" value="go to front"
                                   onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';"/></td>
            <td width="558"><input type="button" value="go to back"
                                   onclick="window.location.href='<?php echo $this->createUrl('index'); ?>';"/></td>
        </div>
    </div>
    <div class="foot">
    </div>

</body>
<script language="JavaScript">
    $(document).ready(function () {
        n = 1;
        var config = <?php echo CJSON::encode($config); ?>;
        var reloads = function () {
            if (n > 5) return;
            $.post('<?php echo Yii::app()->createUrl('install/Default/step3'); ?>', { config: config, step: n, 'is-ajax': true }, function (response) {
                if (response.error) {
                    $('.install-msg').append('<label style="color: red; display: block">' + response.msg + '<label>');
                }
                if (response.complete) {
                    $('.install-msg').append('<label style="color: greed; display: block">' + response.msg + '<label>');
                    var now = $('.now');
                    now.removeClass('now');
                    now.parent().find('li:last-child').addClass('now');
                    $('.btn-box').show();
                }
                else {
                    $('.install-msg').append('<label style="color: greed; display: block">' + response.msg + '<label>');
                    reloads();
                }
            }, 'json');
            n++;

        }
        reloads();
    })
</script>
</html>
