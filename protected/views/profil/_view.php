<?php
/* @var $this ProfilController */
/* @var $data Profil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_depan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_depan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_belakang')); ?>:</b>
	<?php echo CHtml::encode($data->nama_belakang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ttl')); ?>:</b>
	<?php echo CHtml::encode($data->ttl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp')); ?>:</b>
	<?php echo CHtml::encode($data->telp); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>



</div>