<?php
/* @var $this KetuaController */
/* @var $model Ketua */

$this->breadcrumbs=array(
	'Ketuas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ketua', 'url'=>array('index')),
	array('label'=>'Create Ketua', 'url'=>array('create')),
	array('label'=>'Update Ketua', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ketua', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ketua', 'url'=>array('admin')),
);
?>

<h1>View Ketua #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>
