<?php

class DashboardController extends Controller
{
    public $layout = 'application.modules.admin.views.layouts.admin_main';
    public $homeUrl="/admin/";


    public function filters()
   	{
   		return array(
   			'accessControl', // perform access control for CRUD operations
   			'postOnly + delete', // we only allow deletion via POST request
   		);
   	}

    public function accessRules()
	{
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
        if(Yii::app()->user->isGuest){
            $this->redirect(array('auth/login'));
        }
		$this->render('index');
	}

       public function actionLogout()
      	{
      		Yii::app()->user->logout();
           $this->redirect(Yii::app()->createAbsoluteUrl('admin/login'));
      	}

       public function actionDashboard(){
           $this->render('dashboard');

       }
       public function actionProducts(){
           $this->render('products');

       }
       public function addProduct(){

       }

       public function editProduct(){

       }

    public function actionError()
   	{
   		if($error=Yii::app()->errorHandler->error)
   		{
   			if(Yii::app()->request->isAjaxRequest)
   				echo $error['message'];
   			else
   				$this->render('error', $error);
   		}
   	}
}