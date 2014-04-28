<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $id
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property Admin $admin
 * @property Ketua $ketua
 * @property Anggota $anggota
 * @property Lab[] $labs
 * @property Pesan[] $pesans
 * @property Profil $profil
 * @property Profil[] $profils
 * @property LogBook[] $logBooks
 * @property Publikasi[] $publikasis
 * @property Publikasi[] $publikasis1
 */
class User extends CActiveRecord
{
	public $oldPassword;
	public $checkPassword;
	public $samePassword;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email', 'required'),
			array('username','unique','message'=>'Username sudah terdaftar'),
			array('email','email','message'=>'Email tidak valid'),
			array('email','unique','message'=>'Email sudah terdaftar'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>32),
			array('samePassword','length','max'=>32,'min' => 6),
			array('samePassword','compare','compareAttribute'=>'password'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, email, id, role', 'safe', 'on'=>'search'),
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
			'admin' => array(self::HAS_ONE, 'Admin', 'id'),
			'ketua' => array(self::HAS_ONE, 'Ketua', 'id'),
			'anggota' => array(self::HAS_ONE, 'Anggota', 'id'),
			'labs' => array(self::MANY_MANY, 'Lab', 'Lab_User(id_user, id_lab)'),
			'pesans' => array(self::HAS_MANY, 'Pesan', 'id_user'),
			'profil' => array(self::HAS_ONE, 'Profil', 'id'),
			'profils' => array(self::MANY_MANY, 'Profil', 'Profil_Ketua(id_user, id_profil)'),
			'logBooks' => array(self::MANY_MANY, 'LogBook', 'LogBook_Angoota(id_user, id_logbook)'),
			'publikasis' => array(self::MANY_MANY, 'Publikasi', 'Publikasi_Ketua(id_user, id_publikasi)'),
			'publikasis1' => array(self::MANY_MANY, 'Publikasi', 'Publikasi_Anggota(id_user, id_publikasi)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'id' => 'ID',
			'role' => 'Role',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password) {
		return md5($password) === $this->password;
	}

	public function hashPassword($password) {
		return md5($password);
	}

	protected function beforeValidation() {
		$this->checkPassword = $this->hashPassword($this->checkPassword);
	}

	protected function afterFind() {
		$this->oldPassword = $this->password;
	}

	protected function beforeSave() {
		if ($this->password == NULL || $this->password == ''){
			$this->password = $this->oldPassword;
		}
		$this->checkPassword = $this->hashPassword($this->checkPassword);
		$this->password = $this->hashPassword($this->password);
		$this->samePassword = $this->hashPassword($this->samePassword);
		
		return true;
	}

	public function getAllKetua() {
		$x = User::model()->findAll('role=:p',array('p'=>'2'));
		$list = array();
		 foreach ($x as $key) {
		 	if ($key->profil) {
			 	$m = $key->profil->getDetail();
			 	$tmp = ""; $po=0;
			 	foreach ($m as $k => $v) {
			 		if ($k == "id") $po = $v;  
			 		if ($k =="nama_depan" || $k == "nama_belakang")	
			 			$tmp= $tmp." ".$v;
			 	}
			 	$list[$po] = $tmp;
			}
		}

		return $list;
	}


}
