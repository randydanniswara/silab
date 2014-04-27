<?php

class AsetController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view'),
				'expression'=>'$user->getRole()<=3',
			),
			array ('allow',
				'actions'=>array('admin','delete','create','update'),
				'expression'=>'$user->getRole()<=2',
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
		if (Yii::app()->user->getRole()>2) redirect(array("/site/index"));
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
		$model=new Aset;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$id_ketua = Yii::app()->user->id;
		if (Yii::app()->user->getRole() == 1)
			throw new CHttpException(403,'Sorry, this page is only for the Head of Laboratory');	
		$lab = Lab::model()->find("id_ketua=:x",array("x"=>$id_ketua));
		if(isset($_POST['Aset']))
		{
			$model->attributes=$_POST['Aset'];
			$model->id_lab = $lab->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'lab'=>$lab,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$id_ketua = Yii::app()->user->id;	
		$lab = Lab::model()->find("id_ketua=:x",array("x"=>$id_ketua));
		
		if(isset($_POST['Aset']))
		{
			$model->attributes=$_POST['Aset'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'lab'=>$lab,
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
		if (Yii::app()->user->getRole() == 1) $this->redirect(array("/site/index"));
		$dataProvider=new CActiveDataProvider('Aset');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Aset('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Aset']))
			$model->attributes=$_GET['Aset'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Aset the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Aset::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Aset $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aset-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
