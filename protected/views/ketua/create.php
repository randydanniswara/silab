<?php
/* @var $this KetuaController */
/* @var $model Ketua */

$this->breadcrumbs=array(
	'Ketuas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ketua', 'url'=>array('index')),
	array('label'=>'Manage Ketua', 'url'=>array('admin')),
);
?>

<h1>Create Ketua</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>