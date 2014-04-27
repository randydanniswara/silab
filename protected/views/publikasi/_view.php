<?php
/* @var $this PublikasiController */
/* @var $data Publikasi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengarang')); ?>:</b>
	<?php echo CHtml::encode($data->pengarang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lab')); ?>:</b>
	<?php echo CHtml::encode($data->id_lab); ?>
	<br /><br/>

	<a class="button" href="/propensi/assets/publikasi/<?php echo $data->id_lab."/".$data->judul;?>">Download Dokumen</a>
	<?php echo CHtml::link('Update File',array('publikasi/update','id'=>$data->id),array('class'=>'button'));  ?>
</div>