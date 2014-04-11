<?php
/* @var $this ProfilController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profils',
);

?>


<h1>Profil Anda</h1>

<?php 
$c = 1;
	foreach ($model as $key => $value) {
		// if ($c == 1) echo $value."<br>";
		if ($c == 2) echo "Nama : ".$value." ";
		if ($c == 3) echo $value."<br>";
		if ($c == 4) echo "Tempat tanggal lahir : ".$value."<br>";
		if ($c == 5) echo "Alamat :".$value."<br>";
		if ($c == 6) echo "Telp : ".$value;
		$c++;
	}
echo "<br>";
echo CHtml::link('Update profile',array('profil/update','id'=>Yii::app()->user->id),array('class'=>'search-button')); 

?>
