<?php

class InstallModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'install.models.*',
			'install.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            return true;
           // $env = Yii::getPathOfAlias('application') . '/config/main-env.php';
           // return !file_exists($env);
		}
		else
			return false;
	}
}
