<?php
/* @var $this ServersController */
/* @var $model Servers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'host_name'); ?>
		<?php echo $form->textField($model,'host_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'host_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_address'); ?>
		<?php echo $form->textField($model,'ip_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ip_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textField($model,'info',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operating_system'); ?>
		<?php echo $form->textField($model,'operating_system',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'operating_system'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpu_ram'); ?>
		<?php echo $form->textField($model,'cpu_ram',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cpu_ram'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guest_name'); ?>
		<?php echo $form->textField($model,'guest_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'guest_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->