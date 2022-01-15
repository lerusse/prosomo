<?php
Yii::import('application.models.FileUpload');
$this->breadcrumbs=array(
	'File Upload',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'fileUpload',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    // 'focus'=>array($model,'file'),
    'method'=>'post',
    'htmlOptions'=>array(
	'enctype'=>'multipart/form-data'
	),
    
));
// echo $form->fileField($model, 'file' );

?>
<div class="form-group">
	<?php echo $form->labelEx($model,$model->sumittedFile); ?>
	<?php echo $form->fileField($model,'sumittedFile',array( 'class'=>"form-control")); ?>
	<?php echo $form->error($model,'sumittedFile'); ?>
</div>
<div class="form-group">
		<?php echo CHtml::submitButton("Enregistrer", array( 'class'=>"btn btn-primary")); ?>
</div>


<?php $this->endWidget(); ?>