<?php

class KegiatanController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','pdf'),
				'expression'=>'$user->getRole()==2',
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
		$model=new Kegiatan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$id_ketua = Yii::app()->user->id;	
		$lab = Lab::model()->find("id_ketua=:x",array("x"=>$id_ketua));

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
			$model->waktu = date('Y-m-d h:i:s');
			$model->id_lab = $lab->id;
			//echo var_dump($model->attributes);return;
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
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

		if(isset($_POST['Kegiatan']))
		{
			$model->attributes=$_POST['Kegiatan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Kegiatan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kegiatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kegiatan']))
			$model->attributes=$_GET['Kegiatan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kegiatan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kegiatan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kegiatan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPdf(){
		$id_ketua = Yii::app()->user->id;
 		$lab = Lab::model()->find("id_ketua=:x",array("x"=>$id_ketua));
        $pdf = new ToPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase','autoload'));
        $pdf->SetCreator(PDF_CREATOR);  
 		$pdf->SetAuthor('Propensi B05');
        $pdf->SetTitle("List Kegiatan Lab ".$lab->nama);                
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "List Kegiatan Lab ".$lab->nama);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(80,80,80);
        $pdf->AddPage();
 		$html = "                                            ";
        $html .= "<h1 style='margin-bottom:100px;'>List Kegiatan Lab&nbsp;".$lab->nama."</h1><br>";
        $pdf->writeHTML($html, true, false, true, false, 'C');
        $header = array('ID', 'Judul', 'Waktu', 'Nama Lab', 'Isi Dokumen'); //TODO:you can change this Header information according to your need.Also create a Dynamic Header.
 

        // data loading
        $data = $pdf->LoadData(Yii::getPathOfAlias('ext.tcpdf').DIRECTORY_SEPARATOR.'examples\data\table_data_demo.txt'); //This is the example to load a data from text file. You can change here code to generate a Data Set from your model active Records. Any how we need a Data set Array here.
        // print colored table
        $p = Kegiatan::model()->findAll();
        $a = array();
        $tmp = "";
        foreach ($p as $key) {
        	
        	$tmp .= "<h3>$key->id.".$key->nama."</h3><br>";
        	$tmp .= "<span><h5><i>$key->waktu</i></h5></span><br>";
        	$tmp .= "<div>".$key->deskripsi."</div><br><hr>";
        	//$key->id,$key->nama,$key->waktu,$lab->nama,$key->isi	
        }

        $pdf->writeHTML($tmp,true,false,true,false,'L');

        //$pdf->ColoredTable($header, $a);
        $pdf->lastPage();
 
        //Close and output PDF document
        $pdf->Output('Dokumen-'.$lab->nama.'.pdf', 'I');
        Yii::app()->end();
 
    }
}
