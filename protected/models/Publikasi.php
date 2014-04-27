<?php

/**
 * This is the model class for table "Publikasi".
 *
 * The followings are the available columns in table 'Publikasi':
 * @property integer $id
 * @property integer $tahun
 * @property string $pengarang
 * @property string $judul
 * @property integer $id_lab
 *
 * The followings are the available model relations:
 * @property Lab $idLab
 * @property User[] $users
 */
class Publikasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Publikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tahun, pengarang, judul', 'required'),
			array('tahun, id_lab', 'numerical', 'integerOnly'=>true),
			array('pengarang', 'length', 'max'=>100),
			array('judul', 'length', 'max'=>100),
			array('judul', 'safe'),
			array('judul','file','types'=>'xls, doc, txt, pdf, xlsx, docx', 'maxSize'=>10*1024*1024,'allowEmpty'=>true),
			array('judul', 'length', 'max'=>255, 'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tahun, pengarang, judul, id_lab', 'safe', 'on'=>'search'),
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
			'users' => array(self::MANY_MANY, 'User', 'Publikasi_User(id_publikasi, id_user)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tahun' => 'Tahun',
			'pengarang' => 'Pengarang',
			'judul' => 'Judul',
			'id_lab' => 'Id Lab',
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
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('pengarang',$this->pengarang,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('id_lab',$this->id_lab);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Publikasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
