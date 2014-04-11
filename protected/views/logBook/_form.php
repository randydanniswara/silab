<?php
/* @var $this LogBookController */
/* @var $model LogBook */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-book-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_anggota'); ?>
		<?php echo $form->textField($model,'nama_anggota',array(
			'size'=>50,
			'maxlength'=>50,
			'disabled'=>true,
			'value'=>Yii::app()->user->name,
		)); ?>
		<?php echo $form->error($model,'nama_anggota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'judul'); ?>
		<?php echo $form->textField($model,'judul',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_lab'); ?>
		<?php echo $form->dropDownList($model,'id_lab',CHtml::listData(Lab::model()->findAll(),'id','nama'), array('empty'=>'Pilih Lab Anda!')); ?>
		<?php echo $form->error($model,'id_lab'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isi'); ?>
		<?php echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'isi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->