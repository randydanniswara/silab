<?php
/* @var $this AsetController */
/* @var $model Aset */

$this->breadcrumbs=array(
	'Asets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aset', 'url'=>array('index')),
	array('label'=>'Create Aset', 'url'=>array('create')),
	array('label'=>'View Aset', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Aset', 'url'=>array('admin')),
);
?>

<h1>Update Aset <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'lab'=>$lab)); ?>