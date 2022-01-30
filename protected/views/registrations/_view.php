<?php
/* @var $this RegistrationsController */
/* @var $data Registrations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prénom')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nom')); ?>:</b>
	<?php echo CHtml::encode($data->fisrtname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Courriel')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Téléphone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ville')); ?>:</b>
	<?php echo CHtml::encode($data->town); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstcomment')); ?>:</b>
	<?php echo CHtml::encode($data->firstcomment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secondcomment')); ?>:</b>
	<?php echo CHtml::encode($data->secondcomment); ?>
	<br />

	*/ ?>

</div>