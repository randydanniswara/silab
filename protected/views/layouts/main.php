<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'active',
  			'activateParents'=>true,
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index'),
					'itemOptions'=>array('class'=>'dropdown'),
					'items'=>array(
						array('label'=>'Home - 1', 'url'=>array('/site/page', 'view'=>'aas')),
						array('label'=>'Home - 2', 'url'=>array('/site/page', 'view'=>'asdasd')),
						array('label'=>'Home - 3', 'url'=>array('/site/page', 'view'=>'qweqwe')),
					), 
				),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Aset', 'url'=>array('/aset/index')),
				array('label'=>'Labs', 'url'=>array('/lab/index'),'visible'=>Yii::app()->user->getRole()<=2),
				array('label'=>'Profil','url'=>array('/profil/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User','url'=>array('/user/index'),'visible'=>Yii::app()->user->getRole()<=2),
				array('label'=>'Dokumen','url'=>array('/dokumen/index'),'visible'=>Yii::app()->user->getRole()==2),
				array('label'=>'Publikasi','url'=>array('/publikasi/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Kegiatan','url'=>array('/kegiatan/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'LogBook','url'=>array('logbook/index'),'visible'=>Yii::app()->user->getRole()==3 && !Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
