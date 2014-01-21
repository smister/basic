<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-11-14
 * Time: 上午9:29
 * To change this template use File | Settings | File Templates.
 */

?>
<div class="view1">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->title), "#"); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('pic_url')); ?>:</b>
    <?php echo '</br>'; ?>
    <?php echo CHtml::encode($data->pic_url); ?>
    <br/>

</div>