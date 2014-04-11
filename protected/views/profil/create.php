<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs=array(
	'Profils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Profil', 'url'=>array('index')),
	array('label'=>'Manage Profil', 'url'=>array('admin')),
);
?>

<h1>Create Profil</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'id'=>Yii::app()->user->id,)); ?>