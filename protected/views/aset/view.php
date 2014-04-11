<?php
/* @var $this AsetController */
/* @var $model Aset */

$this->breadcrumbs=array(
	'Asets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Aset', 'url'=>array('index')),
	array('label'=>'Create Aset', 'url'=>array('create')),
	array('label'=>'Update Aset', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Aset', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aset', 'url'=>array('admin')),
);
?>

<h1>View Aset #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'jumlah',
		'tahun',
		'id_lab',
	),
)); ?>
