<?php
/* @var $this LogBookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Books',
);

$this->menu=array(
	array('label'=>'Create LogBook', 'url'=>array('create')),
	array('label'=>'Manage LogBook', 'url'=>array('admin')),
);
?>

<h1>Log Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
	var_dump($dataProvider);
?>
