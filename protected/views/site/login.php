<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
// $this->breadcrumbs=array(
// 	'Login',
// );
?>



<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>



	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4" style="margin: auto;">

		
		<h4  style="margin: auto;">Connexion</h4>
			<div class="form-group">
				<?php echo $form->textField($model,'username',array( 'class'=>"form-control", 'placeholder'=>'Nom d\'utilsiateur')); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->passwordField($model,'password',array( 'class'=>"form-control", 'placeholder'=>'Mot de passe')); ?>
				<?php echo $form->error($model,'password'); ?>
				
			</div>

			<div class="form-group">
				<?php echo $form->checkBox($model,'rememberMe', array( 'class'=>"checkbox-inline form-control")); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Connexion',array( 'class'=>"btn btn-primary btn-large")); ?>
			</div>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->
