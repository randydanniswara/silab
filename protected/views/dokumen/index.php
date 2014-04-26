<?php
/* @var $this DokumenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dokumens',
);

$this->menu=array(
	array('label'=>'Create Dokumen', 'url'=>array('create')),
	array('label'=>'Manage Dokumen', 'url'=>array('admin')),
	array('label'=>'Download PDF', 'url'=>array('pdf')),
);
?>

<h1>Dokumens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
