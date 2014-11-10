<?php

class AuthController extends Controller
{
    public $layout = 'application.modules.admin.views.layouts.admin_main';

	public function actionIndex()
	{
        if(Yii::app()->user->isGuest) {

        }
	}

       public function actionLogin()
       {
           $model = new LoginForm;

             // collect user input data
             if (Yii::app()->request->getPost('username') && Yii::app()->request->getPost('password')) {
                 $model->attributes = array(
                     'username' => Yii::app()->request->getPost('username'),
                     'password' => Yii::app()->request->getPost('password')
                 );
                 // validate user input and redirect to the previous page if valid
                 if ($model->validate() && $model->login()){
                     $this->redirect(Yii::app()->createAbsoluteUrl('admin/products/admin'));
                 }
             }
             // display the login form
             $this->render('login', array('model' => $model));

       }

       public function actionLogout()
      	{
      		Yii::app()->user->logout();
           $this->redirect(Yii::app()->createAbsoluteUrl('admin/auth/login'));
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
}