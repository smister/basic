<?php

class ItemCategoryController extends MallBaseController
{
	
	 /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array_merge(array(
                array('allow',
                    'users' => array('@'),
                )
            ), parent::accessRules()
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Category('create');
        $action = 'category';

        if (isset($_POST['Category'])) {
            //Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);
            $model->attributes = $_POST['Category'];
            $parent_node = $_POST['Category']['node'];
            if ($parent_node != 0) {
                $node = Category::model()->findByPk($parent_node);
                $model->appendTo($node);
            }
            if ($model->saveNode()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        $action = 'category';

        if (isset($_POST['Category'])) {
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);
            $model->attributes = $_POST['Category'];
            $parent_node = $_POST['Category']['node'];
            if ($parent_node != 0) {
                $node = Category::model()->findByPk($parent_node);
                $parent = $model->parent()->find();
                if ($node->category_id !== $model->category_id && $node->category_id !== $parent->category_id) {
                    $model->moveAsLast($node);
                }
            } else {
                if (!$model->isRoot()) {
                    $model->moveAsRoot();
                }
            }

            if ($model->saveNode()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->deleteNode();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->render('admin');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Category::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
	
	
	
	
	public function actionGetPropValues(){
		
		if (!Yii::app()->request->isAjaxRequest) {
			exit();
		}
				
		$category_id = $_POST["category_id"];
		
		
		$cri = new CDbCriteria(array('condition' => 'is_key_prop=1 and category_id =' . $category_id));
        $props = ItemProp::model()->findAll($cri);
		
		$key_props =  array();
		
		 foreach ($props as $p) {
			$tmpData = $p->attributes;
			$values =  ItemProp::get_option_values_data($p->item_prop_id);
			$selected = array();
			
			$tmpData['values'] = $values;
			$tmpData['selected'] = $selected ;
			$key_props[] = $tmpData;	
			 
		 }
		
		
		
		
		$cri = new CDbCriteria(array(
            'condition' => 'is_key_prop=0 and is_sale_prop=0 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);
		
		$common_props =  array();
		
		 foreach ($props as $p) {
			$tmpData = $p->attributes;
			$values =  ItemProp::get_option_values_data($p->item_prop_id);
			$selected = array();
			
			$tmpData['values'] = $values;
			$tmpData['selected'] = $selected ;
			$common_props[] = $tmpData;	
		 }
		
		
		$cri = new CDbCriteria(array(
            'condition' => 'is_sale_prop=1 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);

		
		$skus =  array();
		
		 foreach ($props as $p) {
			 
			$tmpData = $p->attributes;
			$values =  ItemProp::get_option_values_data($p->item_prop_id);
			$selected = array();
			
			$tmpData['values'] = $values;
			$tmpData['selected'] = $selected ;
			$skus[] = $tmpData;	
			 
		 }
		
		$arr = array("props"=>CMap::mergeArray($key_props, $common_props), 'skus'=>$skus);
		
		echo CJSON::encode($arr);	
		
		Yii::app()->end();			
		
	}


}
