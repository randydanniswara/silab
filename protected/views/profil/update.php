<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs=array(
	'Profils'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profil', 'url'=>array('index')),
	array('label'=>'Create Profil', 'url'=>array('create')),
	array('label'=>'View Profil', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Profil', 'url'=>array('admin')),
);
?>

<h1>Update Profil</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>