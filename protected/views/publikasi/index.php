<?php
/* @var $this PublikasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publikasis',
);

?>

<h1>Publikasis</h1>
<br>
<?php echo CHtml::link('(+) Create File',array('publikasi/create'),array('class'=>'button'));  ?>
<br>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	'itemView'=>'_view',
)); ?>
