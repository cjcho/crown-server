<?php

/**
 * This is the model class for table "Servers".
 *
 * The followings are the available columns in table 'Servers':
 * @property integer $id
 * @property string $host_name
 * @property string $ip_address
 * @property string $info
 * @property string $operating_system
 * @property string $cpu_ram
 * @property string $comment
 * @property string $guest_name
 */
class Servers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Servers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Servers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('host_name, ip_address, info, operating_system, cpu_ram, guest_name', 'length', 'max'=>255),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, host_name, ip_address, info, operating_system, cpu_ram, comment, guest_name', 'safe', 'on'=>'search'),
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
			'host_name' => 'Host Name',
			'ip_address' => 'Ip Address',
			'info' => 'Info',
			'operating_system' => 'Operating System',
			'cpu_ram' => 'Cpu Ram',
			'comment' => 'Comment',
			'guest_name' => 'Guest Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('host_name',$this->host_name,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('operating_system',$this->operating_system,true);
		$criteria->compare('cpu_ram',$this->cpu_ram,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('guest_name',$this->guest_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}