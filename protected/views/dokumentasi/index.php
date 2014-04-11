<?php
/* @var $this DokumentasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dokumentasis',
);

$this->menu=array(
	array('label'=>'Create Dokumentasi', 'url'=>array('create')),
	array('label'=>'Manage Dokumentasi', 'url'=>array('admin')),
);
?>

<h1>Dokumentasis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
