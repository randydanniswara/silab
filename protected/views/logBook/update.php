<?php
/* @var $this LogBookController */
/* @var $model LogBook */

$this->breadcrumbs=array(
	'Log Books'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogBook', 'url'=>array('index')),
	array('label'=>'Create LogBook', 'url'=>array('create')),
	array('label'=>'View LogBook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogBook', 'url'=>array('admin')),
);
?>

<h1>Update LogBook <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>