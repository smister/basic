<?php
$this->breadcrumbs = array(
    '我的订单' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">管理订单</div>
    <div class="box-content">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'order_id',
                array(
                    'name' => 'status',
                    'value' => '$data->showStatus()',
                    'filter' => Tbfunction::ReturnStatus(),
                ),
                'total_fee',
                'ship_fee',
                'pay_fee',
                array(
                    'name' => 'pay_status',
                    'value' => '$data->showPayStatus()',
                    'filter' => Tbfunction::ReturnPayStatus(),
                ),
                array(
                    'name' => 'ship_status',
                    'value' => '$data->showShipStatus()',
                    'filter' => Tbfunction::ReturnShipStatus(),
                ),
                array(
                    'name' => 'payment_method_id',
                    'value' => '$data->showPayMethod()',
                    'filter' => Tbfunction::ReturnPayMethod(),
                ),
                /*
                  'pay_method',
                  'ship_method',
                  'receiver_name',
                  'receiver_country',
                  'receiver_state',
                  'receiver_city',
                  'receiver_district',
                  'receiver_address',
                  'receiver_zip',
                  'receiver_mobile',
                  'receiver_phone',
                  'memo',
                  'pay_time',
                  'ship_time',
                  'create_time',
                  'update_time',
                 */
                array(
                    'value' => 'Tbfunction::view_user($data->order_id)',
                ),
            ),
        ));
        ?>
    </div>
</div>