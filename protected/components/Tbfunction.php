<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-12-30
 * Time: 上午9:32
 * To change this template use File | Settings | File Templates.
 */

class Tbfunction {
    static public function add_button()
    {
        echo '<button class="btn btn-primary">Add</button>';
    }
    public function add_user($id)
    {
        echo  CHtml::link('Add',array('create','user_id'=>$id),array('class'=>'btn btn-primary'));
    }
    public function view_user($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function state($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function ReturnStatus(){
        return array('0' => '未提交', '1' => '有效');
    }

    public function ReturnPayStatus(){
        return array('0' => '待支付', '1' => '已支付');
    }

    public function ReturnShipStatus(){
        return array('0' => '未发货', '1' => '已发货');
    }

    public function ReturnRefundStatus(){
        return array('0' => '未退款', '1' => '已退款');
    }

    public function ReturnShipMethod(){
        return array('0' => '未设置', '1' => '平邮', '2' => '快递', '3' => 'EMS');
    }

    public function ReturnPayMethod(){
        return array('0' => '请选择', '1' => '支付宝', '2' => '银行卡');
    }

    public function getUser($user_id)
    {
        $user = Users::model()->findByAttributes(array('id' => $user_id));
        return $user->username;
    }

    public function showRefundStatus($status){
        $order_status = Tbfunction::ReturnRefundStatus();
        return isset($order_status[$status]) ? $order_status[$status] : $status;
    }
}
