<?php
/* @var $this AsetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asets',
);

$this->menu=array(
	array('label'=>'Create Aset', 'url'=>array('create')),
	array('label'=>'Manage Aset', 'url'=>array('admin')),
);
?>

<h1>Daftar Aset</h1>

<?php 
$model = Aset::model();
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
    'columns'=>array(
        array('name'=>'Nama',  'value'=>'$data->nama'),   
        array('name'=>'Jumlah',  'value'=>'$data->jumlah'), 
        array('name'=>'Tahun',  'value'=>'$data->tahun'),
        array('name'=>'Lab',  'value'=>'$data->idLab->nama'), 
     ),
)); ?>
