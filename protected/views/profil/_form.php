<?php
/* @var $this ProfilController */
/* @var $model Profil */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profil-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=> array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nama_depan'); ?>
		<?php echo $form->textField($model,'nama_depan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nama_depan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_belakang'); ?>
		<?php echo $form->textField($model,'nama_belakang',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nama_belakang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ttl'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',
		     array(
		          'name'=>'ttl',
		          'attribute'=>'ttl', // Model attribute filed which hold user input
		          'model'=>$model,            // Model name
		          'value'=>date('Y-m-d'),
		          'htmlOptions'=>array('size'=>32),
		         )
		    );
		?>
		<?php //echo $form->textField($model,'ttl',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'ttl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telp'); ?>
		<?php echo $form->textField($model,'telp',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->fileField($model,'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->