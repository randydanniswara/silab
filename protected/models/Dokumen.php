<?php

/**
 * This is the model class for table "Dokumen".
 *
 * The followings are the available columns in table 'Dokumen':
 * @property integer $id
 * @property string $nama
 * @property string $waktu
 * @property integer $id_lab
 * @property string $isi
 *
 * The followings are the available model relations:
 * @property Lab $idLab
 * @property Kategori[] $kategoris
 */
class Dokumen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Dokumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, waktu,id_lab', 'required'),
			array('id_lab', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>30),
			array('waktu', 'length', 'max'=>20),
			array('isi', 'safe'),
			array('isi','file','types'=>'xls, doc, txt, pdf, xlsx, docx', 'maxSize'=>10*1024*1024,'allowEmpty'=>true),
			array('isi', 'length', 'max'=>255, 'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, waktu, id_lab, isi', 'safe', 'on'=>'search'),
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
			'idLab' => array(self::BELONGS_TO, 'Lab', 'id_lab'),
			'kategoris' => array(self::MANY_MANY, 'Kategori', 'Kategori_Dokumentasi(id_dokumentasi, id_kategori)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'waktu' => 'Waktu',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('waktu',$this->waktu,true);
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
	 * @return Dokumen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
