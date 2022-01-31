<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */

$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Liste des enregistrements', 'url'=>array('index')),
	array('label'=>'Créer un enregistrement', 'url'=>array('create')),
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

Yii::app()->clientScript->registerScript('show', "
$('tbody tr').click(function(){
	$('#firstcomment').prop('aria-hidden',false);
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
	'model'=>$model
)); ?>
</div><!-- search-form -->
<div class="modal fade" id="firstcomment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <?php	echo $model->firstcomment?>
      </div>
    </div>
  </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registrations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,

	'columns'=>array(
		array(
			'selectableRows'=>2,
			'class'=>'CCheckBoxColumn',
			'id'=>'selections' // the columnID for getChecked
		),
		
		array(
			'name'=>'lastname',
			'value'=>'$data->lastname',
			'filter'=>false,
		),
		array(
			'name'=>'fisrtname',
			'value'=>'$data->fisrtname',
			'filter'=>false,
		),
		array(
			'name'=>'email',
			'value'=>'$data->email',
			'filter'=>false,
		),
		array(
			'name'=>'phone',
			'value'=>'$data->phone',
			'filter'=>false,
		),
		array(
			'name'=>'postalcode',
			'value'=>'$data->postalcode',
			'filter'=>false,
		),

		array(
			'name'=>'town',
			'value'=>'$data->town',
		),
		array(
			'name'=>'province',
			'value'=>'$data->province',
		),
		
	
		array(
			'name'=>'relatedcountry',
			'value'=>'$data->relatedcountry->nicename',
			'htmlOptions'=>array('maxlength'=>'60',)
			
			),
		array(
			'class'=>'CButtonColumn',
		),
		array(
			
			'value'=>'$data->id',
			'htmlOptions'=>array(
				'type'=>'img', 
				'class'=>'"accordion_icon fa fa-plus',
				'data-toggle'=>'collapse',
				'data-target'=> '$data->id',				
				)
			
		),
	),
)); 

echo CHtml::ajaxSubmitButton(
	'Supprimer', Yii::app()->createUrl('registrations/deletions'),
		
        array(
           'type'=>'POST',
          
           'data'=>'js:{ids : $.fn.yiiGridView.getChecked("registrations-grid","selections").toString()}',
		   'beforeSend'=>'js:function(){
			var response=confirm("Voulez vous vraiment supprimer les données ?")
			if(!response){
				return false
			}
        }',   
		'success' => 'js:function(data){
			$.fn.yiiGridView.update("registrations-grid");
			}' 
		),
		array(
			'class' => 'btn btn-delete',
		)

   );
?>

