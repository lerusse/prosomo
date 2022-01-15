<?php
Yii::import('system.web.CFormModel');


/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FileUpload extends CFormModel
{
	public $sumittedFile;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(  
			array('sumittedFile', 'file', 
								'types'=>'csv',
								'maxSize'=>1024 * 1024 *50, // 10MB
								'tooLarge'=>'Le fichier est supérieur à 10MB. Prière de choisir un fichier de taille approrié.',
								'allowEmpty' => false
							 ),
			array('sumittedFile', 'required'),
							);
			
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'sumittedFile'=>'Fichier',
		);
	}


	
}