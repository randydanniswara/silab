<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Daftar Akun SILAB</h1>

<?php echo CHtml::link('(+) Create User',array('user/create'),array('class'=>'button'));  ?>
<?php
	// echo "huwala huwala : ".$test;
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

?>
