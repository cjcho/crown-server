<?php
/* @var $this ServersController */
/* @var $model Servers */

$this->breadcrumbs=array(
	'Servers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Servers', 'url'=>array('index')),
	array('label'=>'Create Servers', 'url'=>array('create')),
	array('label'=>'Update Servers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Servers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servers', 'url'=>array('admin')),
);
?>

<h1>View Servers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'host_name',
		'ip_address',
		'info',
		'operating_system',
		'cpu_ram',
		'comment',
		'guest_name',
	),
)); ?>
