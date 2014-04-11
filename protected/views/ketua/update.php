<?php
/* @var $this KetuaController */
/* @var $model Ketua */

$this->breadcrumbs=array(
	'Ketuas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ketua', 'url'=>array('index')),
	array('label'=>'Create Ketua', 'url'=>array('create')),
	array('label'=>'View Ketua', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ketua', 'url'=>array('admin')),
);
?>

<h1>Update Ketua <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>