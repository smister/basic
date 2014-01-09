<div class="wide form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $users->normalusers(),
        'filter' => $users,
        'columns' => array(
            'id',
            array(
                'name' => 'username',
                'value'=>'Tbfunction::add_user($data->id)'
            ),

            'email',
            'create_at',
//            array(
//                'class' => 'bootstrap.widgets.TbButtonColumn',
//                'template' => 'choose',
//                'buttons' => array(
//                    'link' => $data->userlink() ,
//                ),
//            ),
        ),
    ));
    ?>

</div>