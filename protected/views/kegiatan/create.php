<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */

$this->breadcrumbs=array(
	'Kegiatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kegiatan', 'url'=>array('index')),
	array('label'=>'Manage Kegiatan', 'url'=>array('admin')),
);
?>

<h1>Create Kegiatan Lab <?php echo $lab->nama; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'lab'=>$lab::model())); ?>