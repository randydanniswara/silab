<?php
/* @var $this KetuaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ketuas',
);

$this->menu=array(
	array('label'=>'Create Ketua', 'url'=>array('create')),
	array('label'=>'Manage Ketua', 'url'=>array('admin')),
);
?>

<h1>Ketuas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
