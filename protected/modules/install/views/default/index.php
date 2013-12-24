<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
    'About',
);
?>

<head>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/backend/css/style.css"  />
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
    </div>
    <div class="pright">
        <div class="pr-title"><h3>Read the license agreement</h3></div>
        <div class="pr-agreement">
            <p> </p>
            <p>Copyright (c) 2003-2011, fanhao All rights reserved. </p>
            <p>The form of electronic text licensing agreement signed written agreement of the parties as the same, with full and equal legal effect. Once you begin to confirm that this Agreement and install , shall be deemed to fully understand and accept the terms of this agreement, in the enjoyment of the provision grants the power at the same time, by the relevant constraints and limitations. Outside the scope of license behavior, will be in direct violation of the license agreement and constitute an infringement, we have the right to terminate the authorization, shall be ordered to stop the damage, and retain the power to hold related responsibilities</p>

            <p> </p>




        </div>
        <div class="btn-box">
            <input name="readpact" type="checkbox" id="readpact" value="" /><label for="readpact"><strong class="fc-690 fs-14">I have read and agree to this agreement</strong></label>
            <input type="button"   value="Next" onclick="document.getElementById('readpact').checked ?window.location.href='<?php echo $this->createUrl('Default/step1'); ?>' : alert('You must agree to the software license agreement to install!');" />
        </div>
    </div>
</div>

<div class="foot">

</div>

</body>
</html>