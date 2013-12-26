<?php
$cs = Yii::app()->clientScript;
//$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/product.options.js', CClientScript::POS_END);
?>
<style>
    table{width:100%}
    td{height:25px;}
	#hint-contentbox{
	display: none;
	}
</style>

<div class="row" style='margin-bottom:10px'>
    <?php echo $form->labelEx($model, 'category_id', array('class' => 'span2 control-label')); ?>
    <div class="span5">
	<?php echo $form->dropDownList($model, 'category_id', $model->attrCategory(3)); ?>
    </div>
    <?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="row" style='margin-bottom:10px'>
    <div id="item_prop_values">

    </div>
   
</div>  

<div class="row">
    <label class="span2 control-label" for="">商品规格</label>
    <div class="span9">
        <div id="sku-wrap" class="sku-wrap">
    
        </div>
        
        
        <p id="output"></p>
    </div>       
</div>

<div class="row">
    <div class="span2"></div>
    <div class="span9" style="padding-left:0">
      <div id="skuTable" class="sku-map">
      
      </div>
    </div>
</div>
 <input type="hidden" id="currentRow"  value="0"/>
    <input type="hidden" id="skus_info" data-id="<?php echo ($model->item_id)? $model->item_id : 0; ?>" data-url="<?php echo Yii::app()->createUrl('/mall/item/ajaxGetSkus'); ?>" value=""/>

<div id="hint-contentbox">  
 <div class="batch-body row-fluid">
 </div>	
  <div class="batch-foot"><a class="btn btn-success" id="btnPopSub" href="javascript:void(0)">确定</a>  <a class="btn btn-info cancel" id="btnPopCancel" href="javascript:void(0)">取消</a></div>
</div>


