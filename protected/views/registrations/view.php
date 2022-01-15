<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */

$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Registrations', 'url'=>array('index')),
	array('label'=>'Create Registrations', 'url'=>array('create')),
	array('label'=>'Update Registrations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Registrations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registrations', 'url'=>array('admin')),
);
?>

<h1>View Registrations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lastname',
		'fisrtname',
		'email',
		'phone',
		'town',
		'province',
		'country',
		'firstcomment',
		'secondcomment',
	),
)); ?>
