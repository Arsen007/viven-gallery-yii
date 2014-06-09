<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $categories;
    public $currentCategory;
    public $currentCategorylabel;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view','ViewProductsByCategory', 'search'),
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
        $this->layout = '//layouts/main';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionViewProductsByCategory()
    {
        $this->currentCategory = $_GET['category'];
        $categories = new ProductCategories;
        $currentCategoryObj = $categories->findAllByAttributes(array('name' => $this->currentCategory));
        $currentCategoryId = null;
        if(!empty($currentCategoryObj)){
            foreach($currentCategoryObj as $category){
                $currentCategoryId = $category->id;
                $this->currentCategorylabel = $category->label;

            }
        }
//            var_dump($category);die;
        $dataProvider = new CActiveDataProvider('Products',array(
            'criteria'=>array(
                    'condition'=>'category_id='.$currentCategoryId,
                ),
        ));
        $this->categories = $categories;
        $this->render('category_index', array(
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'currentCategory'=> $this->currentCategory
        ));
    }


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Products');
        $categories=new ProductCategories;
        $this->categories = $categories;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'categories' => $categories
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByAttributes(array('url_name'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($searchmodel)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionSearch() {
        if(!isset($_GET["search"]) || $_GET["search"]==''){
            return false;
        }
        $text = strtolower($_GET["search"]);
        $dataProvider = new CActiveDataProvider('Products',array(
            'criteria'=>array(
            'condition'=>"(LOWER(`name`) like '%". $text ."%') or (LOWER(`url_name`) like '%". $text ."%')",
           
        ),
        ));
        
        $categories=new ProductCategories;
        $this->categories = $categories;
		$this->render('search',array(
                    'search_text' => $text,
			'dataProvider'=>$dataProvider,
            'categories' => $categories
		));
        
        
}
}
