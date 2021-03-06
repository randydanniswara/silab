<?php

/**
 * This is the model class for table "Aktivitas".
 *
 * The followings are the available columns in table 'Aktivitas':
 * @property integer $id
 * @property string $isi
 * @property string $waktu
 * @property integer $id_logbook
 * @property string $kategori
 *
 * The followings are the available model relations:
 * @property LogBook $idLogbook
 */
class Aktivitas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Aktivitas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, isi, waktu, id_logbook, kategori', 'required'),
			array('id, id_logbook', 'numerical', 'integerOnly'=>true),
			array('waktu, kategori', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, isi, waktu, id_logbook, kategori', 'safe', 'on'=>'search'),
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
			'idLogbook' => array(self::BELONGS_TO, 'LogBook', 'id_logbook'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'isi' => 'Isi',
			'waktu' => 'Waktu',
			'id_logbook' => 'Id Logbook',
			'kategori' => 'Kategori',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('id_logbook',$this->id_logbook);
		$criteria->compare('kategori',$this->kategori,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aktivitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
