<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
));
echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, '<p class="help-block">带 <span class="required">*</span> 的字段为必填项.</p>');
$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
        array('label' => '基本信息', 'content' => $this->renderPartial("_form_base", array('model' => $model, 'form' => $form), true), 'active' => true),
        array('label' => '详细描述', 'content' => $this->renderPartial("_form_desc", array("model" => $model, 'form' => $form), true)),
        array('label' => '其他信息', 'content' => $this->renderPartial("_form_other", array("model" => $model, 'form' => $form), true)),
        array('label' => '商品类型', 'content' => $this->renderPartial("_form_type", array("model" => $model, 'form' => $form), true)),
        array('label' => '商品图片', 'content' => $this->renderPartial("_form_image", array('model' => $model, 'form' => $form), true)),
    ),
));
echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
));
$this->endWidget();

Yii::app()->getClientScript()->registerScript("ppsc",'
	var global = {
		prop: {},		
		skus : {},
		category_url: "'.$this->createUrl('/mall/itemCategory/getPropValues').'"	
	}
',CClientScript::POS_HEAD );

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .  '/js/jquery.json-2.4.min.js');

if (!$model->isNewRecord){
	
	Yii::app()->getClientScript()->registerScript('gjjs','
	    $.ajax
		    ({
			type: "POST",
			data: { "item_id":"' . $model->item_id. '", "YII_CSRF_TOKEN":$("[name=YII_CSRF_TOKEN]").val()},
			url: "'.$this->createUrl('/mall/item/getPropValues').'",
			dataType: "json",
			success: function(res)
			{
			   var props = res.props, skus = res.skus;
			   $.each(props, function(k, pitem){
				   
				   add_attribute_form(pitem);
				   global.prop[pitem.item_prop_id]= pitem.prop_name;
				   
				});
				
				 $.each(skus, function(k, pitem){
				   
				   add_options_form(pitem);  
				   global.skus[pitem.item_prop_id]= pitem.prop_name;
				   add_thread_th(pitem.item_prop_id,pitem.prop_name);			  
				   
				});			
				
			}
		});	
	');
} else {
	
	Yii::app()->getClientScript()->registerScript('gjjs','
	if ($("#Item_category_id").find("option:selected").val() > 0) {
	    $("#item_prop_values").show();
	    var Tid = $("#Item_category_id").find("option:selected").val();
		
		 $.ajax
		    ({
			type: "POST",
			data: { "category_id":Tid, "YII_CSRF_TOKEN":$("[name=YII_CSRF_TOKEN]").val()},
			url: "'.$this->createUrl('/mall/itemCategory/getPropValues').'",
			dataType: "json",
			success: function(res)
			{
			   var props = res.props, skus = res.skus;
			   $.each(props, function(k, pitem){
				   
				   add_attribute_form(pitem);
				   global.prop[pitem.item_prop_id]= pitem.prop_name;
				   
				});
				
				 $.each(skus, function(k, pitem){
				   
				   add_options_form(pitem);  
				   global.skus[pitem.item_prop_id]= pitem.prop_name;
				   add_thread_th(pitem.item_prop_id,pitem.prop_name);
				   //renderTable();			  
				   
				});

				
			}
		});	
	}
	');
	
}
?>
