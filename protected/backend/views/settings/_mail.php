<?php foreach ($values as $key => $val): ?>
    <div class="control-group">
        <?php echo CHtml::label($model->getAttributesLabels($key), $key); ?>
        <?php 
        if($key === 'ssl')
            echo CHtml::checkBox(get_class($model) . '[' . $category . '][' . $key . ']', $val);
        elseif($key === 'contentFront'){
            echo CHtml::textArea(get_class($model) . '[' . $category . '][' . $key . ']', $val, array('class'=>'span5', 'style'=>'height:100px'));
            echo ("<br/>The 'contentFront' is used to send to the user who are just Registered on your website .Which is used to show in the front of the activation URL<br/> ");
        }
        elseif($key === 'contentBack'){
            echo CHtml::textArea(get_class($model) . '[' . $category . '][' . $key . ']', $val, array('class'=>'span5', 'style'=>'height:100px'));
            echo ("<br/>The 'contentBack' is used to send to the user who are just Registered on your website.Which is used to show in the back of the activation URL<br/>");
        }
        else
            echo CHtml::textField(get_class($model) . '[' . $category . '][' . $key . ']', $val, array('class'=>'input-xxlarge')); 
 
        ?>
        <?php echo CHtml::error($model, $category); ?>
    </div>
<?php endforeach; ?>