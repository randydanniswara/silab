<?php
/* @var $this DokumenController */
/* @var $data Dokumen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lab')); ?>:</b>
	<?php echo CHtml::encode($data->id_lab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isi')); ?>:</b>
	<?php echo CHtml::encode($data->isi); ?>
	<br /><br/>

	<a class="button" href="/propensi/assets/dokumen/<?php echo $data->id_lab."/".$data->isi;?>">Download Dokumen</a>
	<?php echo CHtml::link('Update Dokumen',array('dokumen/update','id'=>$data->id),array('class'=>'button'));  ?>
</div>