<?php
/* @var $this PublikasiController */
/* @var $model Publikasi */

$this->breadcrumbs=array(
	'Publikasis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Publikasi', 'url'=>array('index')),
	array('label'=>'Create Publikasi', 'url'=>array('create')),
	array('label'=>'Update Publikasi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Publikasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Publikasi', 'url'=>array('admin')),
);
?>

<h1>View Publikasi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tahun',
		'pengarang',
		'judul',
		'id_lab',
	),
)); ?>
