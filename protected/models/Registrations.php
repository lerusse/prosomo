<?php

/**
 * This is the model class for table "registrations".
 *
 * The followings are the available columns in table 'registrations':
 * @property integer $id
 * @property string $lastname
 * @property string $fisrtname
 * @property string $email
 * @property string $phone
 * @property string $town
 * @property string $province
 * @property string $country
 * @property string $firstcomment
 * @property string $postalcode
 * @property string $secondcomment
 */
class Registrations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registrations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lastname, fisrtname, email, phone, town, province, postalcode, country', 'required'),
			array('lastname, fisrtname', 'length', 'max'=>30),
			array('email, town, province', 'length', 'max'=>50),
			array('phone', 'length', 'max'=>15),
			array('country', 'length', 'max'=>2),
			array('firstcomment, secondcomment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lastname, fisrtname, email, phone, town, province, country, firstcomment, secondcomment', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lastname' => 'Lastname',
			'fisrtname' => 'Fisrtname',
			'email' => 'Email',
			'phone' => 'Phone',
			'town' => 'Town',
			'province' => 'Province',
			'postalcode' => 'Code Postal',
			'country' => 'Country',
			'firstcomment' => 'Firstcomment',
			'secondcomment' => 'Secondcomment',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		// $criteria->compare('id',$this->id);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('fisrtname',$this->fisrtname,true);
		// $criteria->compare('email',$this->email,true);
		// $criteria->compare('phone',$this->phone,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('country',$this->country,true);
		// $criteria->compare('firstcomment',$this->firstcomment,true);
		// $criteria->compare('secondcomment',$this->secondcomment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registrations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
