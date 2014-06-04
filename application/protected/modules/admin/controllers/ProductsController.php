<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout = 'application.modules.admin.views.layouts.admin_main';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ImageUpload','test'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Products;
		$modelAttributes=new ProductAttributes;
        $modelCategories=new ProductCategories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
            $custom_attributes = array();
            if(isset($_POST['Products-custom-attributes'])){
                $custom_attributes = array('custom_attributes'=>serialize($_POST['Products-custom-attributes']));
            }

            $attributes = array_merge($custom_attributes,$_POST['Products']);
			$model->attributes=$attributes;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'attributes' => $modelAttributes,
            'categories' => $modelCategories
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $modelAttributes=new ProductAttributes;
        $modelCategories=new ProductCategories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
            $custom_attributes = array();
            if(isset($_POST['Products-custom-attributes'])){
                $custom_attributes = array('custom_attributes'=>serialize($_POST['Products-custom-attributes']));
            }else{
                $custom_attributes = array('custom_attributes'=>serialize(array()));
            }

            $attributes = array_merge($custom_attributes,$_POST['Products']);
			$model->attributes=$attributes;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
            'attributes' => $modelAttributes,
            'categories'=>$modelCategories,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionImageUpload()
        {
            $pathToOrigin = Yii::getPathOfAlias('webroot').'/images/uploads/products/origins/';
            $pathToThumbs = Yii::getPathOfAlias('webroot').'/images/uploads/products/thumbs/';

            Yii::import("ext.EAjaxUpload.qqFileUploader");
            // $folder=Yii::app()->basePath.'/../images/';// folder for uploaded files
            $folder =  Yii::getPathOfAlias('webroot').'/images/uploads/products/origins/';
            //  $folder ='files/';
            $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);

            $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
            $fileName=$result['filename'];//GETTING FILE NAME
            $name = 'aa.jpg';
                 $image = new EasyImage($pathToOrigin.$fileName);
                 $image->resize(200, 200);
                 $image->save($pathToThumbs.$fileName);
            $result['thumb'] = Yii::app()->getBaseUrl(true).'/images/uploads/products/thumbs/'.$fileName;
            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $result;// it's array
        }

    public function actionTest(){


//        echo Yii::app()->easyImage->thumbOf(Yii::getPathOfAlias('webroot').'/images/uploads/products/thumbs/thumb.jpg',
//            array('crop' => array('width' => 100, 'height' => 100)));
    }
}
