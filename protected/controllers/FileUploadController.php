<?php
// Yii::import('application.models.FileUpload');
// Yii::import('application.models.Upload');

class FileUploadController extends Controller
{
	public function actionIndex()
	{
		
		$model=new FileUpload;
		if(isset($_POST['FileUpload']))
		{
		$model->attributes=$_POST['FileUpload'];
		//0.0 Retrieve file
		$file=CUploadedFile::getInstance($model,'sumittedFile');

		//0.1 get the name of the temporary file
		$tempName=$file->getTempName();
		
		if($model->rules()){
		
		$tempName=$file->getTempName();
		$fh = fopen($tempName, "r");
		if ($fh === false) { exit("Erreur d'ouverture du fichier temporaire"); }
		$keys=array("lastname", "fisrtname", "email", "phone", "town", "province","postalcode", "country", "firstcomment", "secondcomment");
		$counter=0;
		while (($row = fgetcsv($fh)) !== false) {
			
			if($counter!==0){
				$registration=new Registrations;				
				$modelValues=array_combine($keys, $row);			
				
				//1.1 Set Registrations Model from input
				$registration->setAttributes($modelValues);
				$country=Countries::findByNiceName( $registration->country);
				//1.2 Validate the model
				if($country!==null&&$registration->validate()){
				//1.3 If the model is ok I save it to the database 
					$registration->country=$country->id;
					$registration->save();
				}else{
				//1.3 Get all errors for the current items				
				$errors=$registration->getErrors();
				//1.3.1 write to log while specifying line
				foreach($errors as $key=>$value){
					
				}
				
				
					
				}
				
				var_dump($registration); die('Model values');
				
				

				
			}
			$counter++;
		  }
		}
		}
		$this->render('index', ["model"=>$model]);
	}



	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}