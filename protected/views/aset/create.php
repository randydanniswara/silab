<?php
/* @var $this AsetController */
/* @var $model Aset */

$this->breadcrumbs=array(
	'Asets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aset', 'url'=>array('index')),
	array('label'=>'Manage Aset', 'url'=>array('admin')),
);
?>

<h1>Create Aset</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>