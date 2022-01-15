<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */

$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Registrations', 'url'=>array('index')),
	array('label'=>'Create Registrations', 'url'=>array('create')),
	array('label'=>'View Registrations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Registrations', 'url'=>array('admin')),
);
?>

<h1>Update Registrations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>