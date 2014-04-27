<?php
/* @var $this PublikasiController */
/* @var $model Publikasi */

$this->breadcrumbs=array(
	'Publikasis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Publikasi', 'url'=>array('index')),
	array('label'=>'Create Publikasi', 'url'=>array('create')),
	array('label'=>'View Publikasi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Publikasi', 'url'=>array('admin')),
);
?>

<h1>Update Publikasi <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lab'=>$lab)); ?>