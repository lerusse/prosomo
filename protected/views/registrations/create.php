<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */
$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Registrations', 'url'=>array('index')),
	array('label'=>'Manage Registrations', 'url'=>array('admin')),
);
?>

<h1>Create Registrations</h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'countries'=>$countries,

)); ?>