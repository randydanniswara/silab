<?php
/* @var $this PublikasiController */
/* @var $model Publikasi */

$this->breadcrumbs=array(
	'Publikasis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Publikasi', 'url'=>array('index')),
	array('label'=>'Manage Publikasi', 'url'=>array('admin')),
);
?>

<h1>Create Publikasi</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lab'=>$lab)); ?>