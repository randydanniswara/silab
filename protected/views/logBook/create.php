<?php
/* @var $this LogBookController */
/* @var $model LogBook */

$this->breadcrumbs=array(
	'Log Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogBook', 'url'=>array('index')),
	array('label'=>'Manage LogBook', 'url'=>array('admin')),
);
?>

<h1>Create LogBook</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>