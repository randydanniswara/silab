<?php
/* @var $this LabController */
/* @var $data Lab */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profil')); ?>:</b>
	<?php echo CHtml::encode($data->profil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ketua')); ?>:</b>
	<?php echo CHtml::encode($data->id_ketua); ?>
	<br />

	<b> Daftar Anggota Lab:</b><br>
	<ul>
	<?php $list = $this->listAnggota;
		foreach ($list as $k => $v) {
			if ($k == $data->id){
				foreach ($v as $nama) {
					echo "<li>$nama</li>";
				}
			}
		}

	?>
	</ul>

</div>