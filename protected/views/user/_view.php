<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">



	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('role'));*/ echo $data->getAttributeLabel('role'); ?>:</b>
	<?php 
		$role = "Anggota";
		$x = intval($data->role);
		if ($x == 1) {
			$role = "Admin";
		} else if ($x == 2) {
			$role = "Ketua";
		}
		$data->role = $role;

		echo CHtml::encode($data->role); 
	?>
	<br />


</div>