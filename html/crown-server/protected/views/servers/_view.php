<?php
/* @var $this ServersController */
/* @var $data Servers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('host_name')); ?>:</b>
	<?php echo CHtml::encode($data->host_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
	<?php echo CHtml::encode($data->info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operating_system')); ?>:</b>
	<?php echo CHtml::encode($data->operating_system); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpu_ram')); ?>:</b>
	<?php echo CHtml::encode($data->cpu_ram); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('guest_name')); ?>:</b>
	<?php echo CHtml::encode($data->guest_name); ?>
	<br />

	*/ ?>

</div>