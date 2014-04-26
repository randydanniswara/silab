<?php

/**
 * This is the model class for table "Profil".
 *
 * The followings are the available columns in table 'Profil':
 * @property integer $id
 * @property string $nama_depan
 * @property string $nama_belakang
 * @property string $ttl
 * @property string $alamat
 * @property string $telp
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property User $id0
 * @property User[] $users
 * @property User[] $users1
 */
class Profil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Profil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, nama_depan, nama_belakang', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('nama_depan, nama_belakang, avatar', 'length', 'max'=>20),
			array('ttl', 'length', 'max'=>32),
			array('alamat', 'length', 'max'=>50),
			array('telp', 'length', 'max'=>15),
			array('avatar','file','types'=>'jpg, gif, png', 'maxSize'=>1*1024*1024,'allowEmpty'=>true),
			array('avatar', 'length', 'max'=>255, 'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_depan, nama_belakang, ttl, alamat, telp, avatar', 'safe', 'on'=>'search'),
		);
	}

public function getDetail() {
		$x = array();
		$x['id'] = $this->id;
		$x['nama_depan'] = $this->nama_depan;
		$x['nama_belakang'] = $this->nama_belakang;
		$x['ttl'] = $this->ttl;
		$x['alamat'] = $this->alamat;
		$x['telp'] = $this->telp;
		$x['avatar'] = $this->avatar;
		return $x;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'id0' => array(self::BELONGS_TO, 'User', 'id'),
			'users' => array(self::MANY_MANY, 'User', 'Profil_Anggota(id_profil, id_user)'),
			'users1' => array(self::MANY_MANY, 'User', 'Profil_Ketua(id_profil, id_user)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_depan' => 'Nama Depan',
			'nama_belakang' => 'Nama Belakang',
			'ttl' => 'Ttl',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'avatar' => 'Foto Profil',
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
		$criteria->compare('nama_depan',$this->nama_depan,true);
		$criteria->compare('nama_belakang',$this->nama_belakang,true);
		$criteria->compare('ttl',$this->ttl,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
