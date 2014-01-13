<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-12-30
 * Time: 上午9:32
 * To change this template use File | Settings | File Templates.
 */

class Tbfunction
{
    static public function add_button()
    {
        echo '<button class="btn btn-primary">Add</button>';
    }

    public function add_user($id)
    {
        echo CHtml::link('Add', array('create', 'user_id' => $id), array('class' => 'btn btn-primary'));
    }

    public function getUser($user_id)
    {
        $user = Users::model()->findByAttributes(array('id' => $user_id));
        return $user->username;
    }
    public function showUser()
    {
        $data_user=array();

         $users= Users::model()->findAll();
        foreach($users as $user){
            if($user->superuser!=1){
            $data_user[$user->id]=$user->username;}
        }
        return $data_user;
    }

    static public function deliver_goods()
    {
        echo '<a  href="javascript:void(0)" class="btn btn-danger" id="deliverGoods">发货</a>';
    }
}
