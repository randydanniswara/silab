<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

<table>

<tr>
	<td style="width:70px;"><b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b></td>
	<td>:&nbsp;&nbsp;<?php echo CHtml::encode($data->id); ?></td>
</tr>
<tr>
	<td style="width:70px;"><b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?></b></td>
	<td>:&nbsp;&nbsp;<?php echo CHtml::encode($data->username); ?></td>
</tr>

<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?></b></td>
	<td>:&nbsp;&nbsp;<?php echo CHtml::encode($data->email); ?></td>
</tr>

<tr>
	<td><b><?php echo $data->getAttributeLabel('role'); ?></b></td>
	<td>:&nbsp;&nbsp;<?php 
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
	</td>
</tr>
</table>

<?php echo CHtml::link('Update User',array('user/update','id'=>$data->id),array('class'=>'button'));  ?>

</div>