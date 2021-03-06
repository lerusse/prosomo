<?php
/* @var $this RegistrationsController */
/* @var $model Registrations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registrations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champ marqués  <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group" >
	<?php echo $form->labelEx($model,'Prénom <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'lastname',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>		

	<div class="form-group">
		<?php echo $form->labelEx($model,'Nom <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'fisrtname',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'fisrtname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Courriel <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'email',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Téléphone <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'phone',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Ville <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'town',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Province <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'province',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Pays <span class="required">*</span> '); ?>
		<?php echo $form->dropDownList($model,'country',$countries, array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Code Postal <span class="required">*</span> '); ?>
		<?php echo $form->textField($model,'postalcode',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'postalcode'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Commentaire 1'); ?>
		<?php echo $form->textArea($model,'firstcomment',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'firstcomment'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Commentaire 2'); ?>
		<?php echo $form->textArea($model,'secondcomment',array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'secondcomment'); ?>
	</div>

	<div class="row buttons form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enregistrer' : 'Modifier', array( 'class'=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->