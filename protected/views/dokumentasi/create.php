<?php
/* @var $this DokumentasiController */
/* @var $model Dokumentasi */

$this->breadcrumbs=array(
	'Dokumentasis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dokumentasi', 'url'=>array('index')),
	array('label'=>'Manage Dokumentasi', 'url'=>array('admin')),
);
?>

<h1>Create Dokumentasi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>