<?php
/* @var $this LogBookController */
/* @var $model LogBook */

$this->breadcrumbs=array(
	'Log Books'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LogBook', 'url'=>array('index')),
	array('label'=>'Create LogBook', 'url'=>array('create')),
	array('label'=>'Update LogBook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LogBook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogBook', 'url'=>array('admin')),
);
?>

<h1>View LogBook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama_anggota',
		'judul',
		'id_lab',
		'isi',
	),
)); ?>
