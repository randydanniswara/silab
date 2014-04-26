<?php
/* @var $this DokumenController */
/* @var $model Dokumen */

$this->breadcrumbs=array(
	'Dokumens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dokumen', 'url'=>array('index')),
	array('label'=>'Manage Dokumen', 'url'=>array('admin')),
);
?>

<h1>Create Dokumen</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lab'=>$lab)); ?>