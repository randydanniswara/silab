<?php
/* @var $this PublikasiController */
/* @var $model Publikasi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publikasi-form',
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
		<?php echo $form->labelEx($model,'tahun'); ?>
		<select name="Publikasi[tahun]" id="Publikasi_tahun">
			<?php for ($i = intval(date('Y'));$i>=1945;--$i) {?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php } ?>
		</select>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pengarang'); ?>
		<?php echo $form->textField($model,'pengarang',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pengarang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'File Publikasi'); ?>
		<span style="color:blue;">pastikan nama file sesuai dengan isi file yang akan diunggah</span><br>
		<?php echo $form->fileField($model,'judul'); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nama Lab'); ?>
		<?php echo $form->textField($model,'id_lab',array('value'=>$lab->nama,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'id_lab'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->