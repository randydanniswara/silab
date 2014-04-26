<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'new password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verify new password'); ?>
		<?php echo $form->passwordField($model,'samePassword',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'samePassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->dropDownList($model,'role', array(1=>"Admin",2=>"Ketua",3=>"Anggota")); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($lab,'id_lab'); ?>
		<?php echo $form->dropDownList($lab,'id_lab',CHtml::listData(Lab::model()->findAll(),'id','nama'), array('empty'=>'Pilih Lab Anda!')); ?>
		<?php echo $form->error($lab,'id_lab'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">
	// $("#User_role").click(function(){
	// 	var x  = $("#User_role").val();
	// 	console.log(x);
	// });
	// var val;
	// $('#User_role').change(function() {
	//  var newVal = $(this).val();
	//  console.log(newVal);
	//  for(var i=0; i<newVal.length; i++) {
	//      if($.inArray(newVal[i], val) == -1)
	//        alert($(this).find('option[value="' + newVal[i] + '"]').text());
	//  }
	//  val = newVal;
	// }); ​
</script>
