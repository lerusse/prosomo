<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">

<div class="col-md-2  hidden-sm">
	<?php
		if(!Yii::app()->user->isGuest){
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		}
		
	?>
</div>

<div class="col-md-10 ">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
</div>
<?php $this->endContent(); ?>