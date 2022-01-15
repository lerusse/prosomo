<?php
/* @var $this RegistrationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registrations',
);

$this->menu=array(
	array('label'=>'Create Registrations', 'url'=>array('create')),
	array('label'=>'Manage Registrations', 'url'=>array('admin')),
);
?>

<h1>Registrations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
