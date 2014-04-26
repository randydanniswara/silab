<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs=array(
	'Profils'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List Profil', 'url'=>array('index')),
	array('label'=>'Create Profil', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#profil-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3>Update your profile</h3>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */?>
<div class="search-form" style="display:none">
<?php 
/*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama_depan',
		'nama_belakang',
		'ttl',
		'alamat',
		'telp',
		'avatar',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
