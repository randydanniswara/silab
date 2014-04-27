<?php

class ProfilController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				'expression'=>'$user->getID()==Yii::app()->user->id',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		//if ($id != Yii::app()->user->id) $this->redirect(array('profil/index'));
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
		$model=new Profil;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$URL_AVATAR = '/../assets/avatar/';
		if(isset($_POST['Profil']))
		{
			$model->attributes=$_POST['Profil'];
			//echo var_dump($model);return;
			$model->id = Yii::app()->user->id;	
	        $model->avatar = CUploadedFile::getInstance($model, 'avatar');
	        // echo var_dump($model);return;
			if($model->validate()){
	           $model->avatar->saveAs(Yii::app()->basePath .$URL_AVATAR."Profil_".$model->id.".".$model->avatar->getExtensionName());
	           Yii::app()->user->setFlash('upload','File '.$model->avatar->getName().' telah terupload.');  
	           $model->avatar = "Profil_".$model->id.".".$model->avatar->getExtensionName();    
		    }
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));

			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if ($id != Yii::app()->user->id || Yii::app()->user->getRole() == 3) $this->redirect(array('profil/index'));
		$URL_AVATAR = '/../assets/avatar/';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if ($id != (int)Yii::app()->user->id) 
			$this->redirect(array('update','id'=>(int)Yii::app()->user->id));

		if(isset($_POST['Profil']))
		{
			$model->attributes=$_POST['Profil'];
			// $prof
			//echo var_dump($_POST);return;
			if($model->validate()){
			   $profil = Profil::model()->find("id=".Yii::app()->user->id);
			   $link = Yii::app()->basePath.$URL_AVATAR.$profil->avatar;
			   
			   if (file_exists($link) and is_dir($link) and strlen($profil->avatar)!=0) {
    				unlink($link);         
			   } 
	           $model->avatar = CUploadedFile::getInstance($model, 'avatar');
	           $model->avatar->saveAs(Yii::app()->basePath .$URL_AVATAR."Profil_".$model->id.".".$model->avatar->getExtensionName());
	           Yii::app()->user->setFlash('upload','File '.$model->avatar->getName().' telah terupload.');      
   	           $model->avatar = "Profil_".$model->id.".".$model->avatar->getExtensionName();
		    }
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));

			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		//'users.id=:id',array(":id"=>Yii::app()->user->id)
		$lab = Lab::model()->with('users')->findAll('users.id='.Yii::app()->user->id);
		//echo var_dump($lab);return;
		$dataProvider= Profil::model()->findByPk((int)Yii::app()->user->id);
		if ($dataProvider == NULL) $this->redirect(array('create','id'=>(int)Yii::app()->user->id));
		$this->render('index',array(
			'model'=>$dataProvider,
			'lab'=>$lab,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Profil('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Profil']))
			$model->attributes=$_GET['Profil'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Profil the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Profil::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Profil $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profil-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
