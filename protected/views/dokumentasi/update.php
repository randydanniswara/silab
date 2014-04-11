<?php
/* @var $this DokumentasiController */
/* @var $model Dokumentasi */

$this->breadcrumbs=array(
	'Dokumentasis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dokumentasi', 'url'=>array('index')),
	array('label'=>'Create Dokumentasi', 'url'=>array('create')),
	array('label'=>'View Dokumentasi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dokumentasi', 'url'=>array('admin')),
);
?>

<h1>Update Dokumentasi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>