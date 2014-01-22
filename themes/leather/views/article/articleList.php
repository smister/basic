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
    <img class="chenyu" src=" <?php echo $data->pic_url; ?>" />
    <div class="wangjingye grid_4"><?php echo CHtml::link(CHtml::encode($data->title), "#"); ?></div>
    <?php echo '</br>'; ?>
    <br/>

</div>

