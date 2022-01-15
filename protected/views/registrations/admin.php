<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */

$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Registrations', 'url'=>array('index')),
	array('label'=>'Create Registrations', 'url'=>array('create')),
	array('label'=>'Téléverser', 'url'=>array('/fileUpload/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registrations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Registrations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registrations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lastname',
		'fisrtname',
		'email',
		'phone',
		'town',
		/*
		'province',
		'country',
		'firstcomment',
		'secondcomment',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
