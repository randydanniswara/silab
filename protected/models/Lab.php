<?php

/**
 * This is the model class for table "Lab".
 *
 * The followings are the available columns in table 'Lab':
 * @property integer $id
 * @property string $nama
 * @property string $profil
 * @property integer $id_ketua
 *
 * The followings are the available model relations:
 * @property Kegiatan[] $kegiatans
 * @property Aset[] $asets
 * @property User[] $users
 * @property Dokumentasi[] $dokumentasis
 * @property User $idKetua
 * @property Publikasi[] $publikasis
 * @property LogBook[] $logBooks
 */
class Lab extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Lab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('id_ketua', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>50),
			array('profil', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, profil, id_ketua', 'safe', 'on'=>'search'),
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
			'kegiatans' => array(self::HAS_MANY, 'Kegiatan', 'id_lab'),
			'asets' => array(self::HAS_MANY, 'Aset', 'id_lab'),
			'users' => array(self::MANY_MANY, 'User', 'Lab_User(id_lab, id_user)'),
			'dokumentasis' => array(self::HAS_MANY, 'Dokumentasi', 'id_lab'),
			'idKetua' => array(self::BELONGS_TO, 'User', 'id_ketua'),
			'publikasis' => array(self::HAS_MANY, 'Publikasi', 'id_lab'),
			'logBooks' => array(self::HAS_MANY, 'LogBook', 'id_lab'),
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
			'profil' => 'Profil',
			'id_ketua' => 'Id Ketua',
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
		$criteria->compare('profil',$this->profil,true);
		$criteria->compare('id_ketua',$this->id_ketua);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lab the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAnggota($id_lab) {
		$lab = new Lab();
		
		$sql = 'SELECT * FROM "Profil" WHERE "id" IN 
					(SELECT "id" FROM "User" WHERE "id" IN 
						(SELECT "id_user" FROM "Lab_User" WHERE "id_lab"='.$id_lab.'))'; 
		$command = Yii::app()->db->createCommand($sql);
		return $command->query();
	}

	public function getAllAnggota() {
		$tmp = array();
		$lab = self::model()->findAll();
		foreach ($lab as $key) {
			$x = $key->id;
			//echo $x." ";
			$an = LabUser::model()->findAll('id_lab='.$x);
			//echo "<br>Untuk Lab ".$key->nama."<br>";
			$kumpulanAnggota = array();
			foreach ($an as $key) {
				foreach ($key as $m=>$v) {
					if ($m == 'id_user') {
						//echo $v."<br>";
						$po = Profil::model()->find("id=".$v);
						$g = $po->getDetail();
						$nama_lengkap = $g['nama_depan']." ".$g['nama_belakang']; 
						//echo $nama_lengkap."<br>";
						$kumpulanAnggota[] = $nama_lengkap;
					}
				}
				//echo var_dump($kumpulanAnggota);
				$tmp[$x] = $kumpulanAnggota;
				
			}
		}
		return $tmp;
	} 

}
