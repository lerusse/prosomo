<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */
$this->layout='admin';
$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Liste des enregistrements', 'url'=>array('index')),
	array('label'=>'Créer un enregistrement', 'url'=>array('create')),
	array('label'=>'Téléverser', 'url'=>array('/fileUpload/index')),
);
$url=Yii::app()->request->baseUrl."/assets/js/manageTab.js";
Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_END);  
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
", CClientScript::POS_END);

Yii::app()->clientScript->registerScript('showFirstComment', "
$('tbody tr .checkbox-column').click(function(){
	const value=$(this).closest('tr').data('firstcomment')
	$('#modalbody').html(value)
	$('#firstcomment').modal();
});
", CClientScript::POS_END);



Yii::app()->clientScript->registerScript('ShowSecondComment', "
$('tbody td .oi').click(function(e){
	
	let currentRow= ($(this).closest('tr'))[0]
	
	let clickable= ($(($(currentRow).children().last())[0]).children().last())
	
	const content=$(currentRow).data('secondcomment')
	console.log(clickable)
	const additionnalRow= $('<tr class=\"secondcomment\" ><td colspan=\"11\" style=\"text-align: right;\"></td></tr>')
	const data=($(additionnalRow).children().last())[0]
	if(clickable.hasClass('oi-plus')){
		$(clickable).removeClass('oi-plus')
		$(clickable).addClass('oi-minus')	
		$(data).html(content)
		currentRow.after(additionnalRow.get(0));
	
	}else{
		$(clickable).removeClass('oi-minus')
		$(clickable).addClass('oi-plus')
		$(additionnalRow.get(0)).html('')
		$(currentRow).next().remove();
	}
});
", CClientScript::POS_END);
?>

<h1>Manage Registrations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Recherche avançée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model
)); ?>
</div><!-- search-form -->
 <!-- The Modal -->
 <div class="modal fade" id="firstcomment">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h6 class="modal-title">Commentaire 1</h6>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <p class="modal-body" id="modalbody" style="overflow: auto;">
          
        </p>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
        </div>
        
      </div>
    </div>
  </div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registrations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'htmlOptions'=> array('class'=>"table table-sm table-condensed table-hover table-striped table-responsive"),
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
		// array(
		// 	'name'=>'firstcomment',
		// 	'visible'=>false,
		// 	'value'=>'$data->firstcomment',
		// 	'htmlOptions'=>array(
		// 		'maxlength'=>'60',
		// 		'display'=>'none',
		// 		 )
			
		// 	),
		array(
			'class'=>'CButtonColumn',
		// 	array(

		// 		"viewButtonOptions"=>array(
		// 			"htmlOptions"=>array(
						
		// 				'class'=>'oi oi-plus',
		// 			)
		// 		),
		// 	// 	"updateButtonOptions"=>array(

		// 	// 	),
		// 	// 	"deleteButtonOptions"=>array(

		// 	// 	),
		// 	// ),
		
		),
		array(
			'type'=>'raw',			
            'value' => function ($data) {
				return '<span class="oi oi-plus"></span>';
			}
		),
		
	),
	'rowHtmlOptionsExpression' => '[ "data-firstcomment" => $data->firstcomment, "data-secondcomment" => $data->firstcomment,]'
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
			'class' => 'btn btn-danger',
		)

   );
?>

