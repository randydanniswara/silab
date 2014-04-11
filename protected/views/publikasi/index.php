<?php
/* @var $this PublikasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publikasis',
);

$this->menu=array(
	array('label'=>'Create Publikasi', 'url'=>array('create')),
	array('label'=>'Manage Publikasi', 'url'=>array('admin')),
);
?>

<h1>Publikasis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
