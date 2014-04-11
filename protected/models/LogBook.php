<?php

/**
 * This is the model class for table "LogBook".
 *
 * The followings are the available columns in table 'LogBook':
 * @property integer $id
 * @property string $nama_anggota
 * @property string $judul
 * @property integer $id_lab
 * @property string $isi
 *
 * The followings are the available model relations:
 * @property Aktivitas[] $aktivitases
 * @property User[] $users
 * @property Lab $idLab
 */
class LogBook extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LogBook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_anggota, judul, id_lab', 'required'),
			array('id, id_lab', 'numerical', 'integerOnly'=>true),
			array('nama_anggota', 'length', 'max'=>50),
			array('judul', 'length', 'max'=>30),
			array('isi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_anggota, judul, id_lab, isi', 'safe', 'on'=>'search'),
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
			'aktivitases' => array(self::HAS_MANY, 'Aktivitas', 'id_logbook'),
			'users' => array(self::MANY_MANY, 'User', 'LogBook_Angoota(id_logbook, id_user)'),
			'idLab' => array(self::BELONGS_TO, 'Lab', 'id_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_anggota' => 'Nama Anggota',
			'judul' => 'Judul',
			'id_lab' => 'Id Lab',
			'isi' => 'Isi',
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
		$criteria->compare('nama_anggota',$this->nama_anggota,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('id_lab',$this->id_lab);
		$criteria->compare('isi',$this->isi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogBook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
