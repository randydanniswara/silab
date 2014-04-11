<?php
/* @var $this DokumentasiController */
/* @var $model Dokumentasi */

$this->breadcrumbs=array(
	'Dokumentasis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dokumentasi', 'url'=>array('index')),
	array('label'=>'Create Dokumentasi', 'url'=>array('create')),
	array('label'=>'Update Dokumentasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dokumentasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dokumentasi', 'url'=>array('admin')),
);
?>

<h1>View Dokumentasi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'waktu',
		'id_lab',
	),
)); ?>
