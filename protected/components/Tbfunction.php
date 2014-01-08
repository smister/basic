<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-12-30
 * Time: 上午9:32
 * To change this template use File | Settings | File Templates.
 */

class Tbfunction {
    static public function add_goods($id)
    {
        echo  CHtml::link('<div class="btn btn-primary">Add</div>',array('create','item_id'=>$id));
    }

    public function add_user($id)
    {
        echo  CHtml::link('<div class="btn btn-primary">Add</div>',array('create','user_id'=>$id));
    }

    public function view_user($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function state($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function ReturnStatus(){
        return array('0' => '无效', '1' => '有效');
    }

    public function ReturnPayStatus(){
        return array('0' => '待支付', '1' => '已支付');
    }

    public function ReturnShipStatus(){
        return array('0' => '未发货', '1' => '已发货');
    }

    public function ReturnRefundStatus(){
        return array('0' => '未发货', '1' => '已发货');
    }
}