<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="sidebar-content">
        <div class="row-fluid">
            <div class="span12">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links' => $this->breadcrumbs,
                    ));
                ?><!-- breadcrumbs -->
                <?php endif ?>
            </div>
        </div>
        <div class="auth-module">

            <?php $this->widget(
                'bootstrap.widgets.TbNav',
                array(
                    'type' => TbHtml::NAV_TYPE_TABS,
                    'items' => array(
                        array(
                            'label' => Yii::t('AuthModule.main', 'Assignments'),
                            'url' => array('/auth/assignment/index'),
                            'active' => $this instanceof AssignmentController,
                        ),
                        array(
                            'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_ROLE, true)),
                            'url' => array('/auth/role/index'),
                            'active' => $this instanceof RoleController,
                        ),
                        array(
                            'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_TASK, true)),
                            'url' => array('/auth/task/index'),
                            'active' => $this instanceof TaskController,
                        ),
                        array(
                            'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_OPERATION, true)),
                            'url' => array('/auth/operation/index'),
                            'active' => $this instanceof OperationController,
                        ),
                    ),
                )
            );?>

            <?php echo $content; ?>

        </div>
    </div>
<?php $this->endContent(); ?>