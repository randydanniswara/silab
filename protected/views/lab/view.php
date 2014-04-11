<?php
/* @var $this LabController */
/* @var $model Lab */

$this->breadcrumbs=array(
	'Labs'=>array('index'),
	$model->id,
);
$this->menu=array(
	array('label'=>'List Lab', 'url'=>array('index')),
	array('label'=>'Create Lab', 'url'=>array('create')),
	array('label'=>'Update Lab', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lab', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lab', 'url'=>array('admin')),
);
?>

<h1>View Lab #<?php echo $model->id; ?></h1>

<?php $model->setAttributes("blah","zaka");$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'profil',
		'blah',
	),
)); ?>

<?php
	
	//var_dump($model);
	$c = 1;
	foreach($anggota as $row){
		if ($c++ != 1) echo ", ";
		echo $row['nama_depan']." ".$row['nama_belakang'];
	}
	echo "<br>";
?>
