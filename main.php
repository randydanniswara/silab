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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropdown.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title>Sistem Informasi Laboraorium Fasilkom UI</title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<?php
		   	if (!Yii::app()->user->isGuest){ ?>
				<div><img src='images/rd.jpg' id="foto"></div>
				<div id="log">
					<?php echo 'Hello, '.Yii::app()->user->name.''?>
			   		</br>You're logged on as Ketua Lab
			   		</br></br></br></br></br><a href="">Change Password</a>
				</div>
		<?php } ?>
		<div id="logo">
			<img src='images/SILAB.png'>
		</div>

	</div><!-- header -->

	<div id='cssmenu'>
		<ul>
		   <li class='active'><a href='index.html'><span><img src='data:image/png;base64,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'></span></a></li>
			<?php
		   	if (!Yii::app()->user->isGuest){ ?>
		   		<li class='has-sub'><a href='#'><span>Account</span></a>
			      <ul>
			         <li><a href='#'><span>Create Account</span></a></li>
			         <li class='last'><a href='#'><span>List Account</span></a></li>
			      </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span>Lab</span></a>
			      <ul>
			         <li><a href='#'><span>Create Lab</span></a></li>
			         <li class='last'><a href='#'><span>List Lab</span></a></li>
			      </ul>
			   </li>
			<?php } else if (Yii::app()->user->isGuest){ ?>
				 <li><a href='#'><span>Lab</span></a></li>
			<?php } ?>
		   	<li><a href='#'><span>Dokumen</span></a></li>
		   	<?php
		   	if (!Yii::app()->user->isGuest){ ?>
		   		<li><a href='#'><span>Pesan</span></a></li>
		   		<li class='last'><a href='index.php?r=site/logout'><span>Logout</span></a></li>  					
			<?php } else if (Yii::app()->user->isGuest){ ?>
				<li class='last'><a href='index.php?r=site/login'><span>Login</span></a></li>
			<?php } ?>
		</ul>
	</div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer-up"> 
        <a href="http://www.cs.ui.ac.id/id" title="Fakultas Ilmu Komputer - Universitas Indonesia">
            <h1><b>Fakultas Ilmu Komputer</b> Universitas Indonesia</h1>
        </a>
        <p class="contact-information">
            Kampus UI Depok, Indonesia 16424    <b><i>Telp:</i> +62 21 786 3419</b> <b><i>Fax:</i> +62 21 786 3415</b><br>
            <b><i>Email:</i> humasfasilkom@cs.ui.ac.id</b>
			<b><i>Twitter:</i><a href="https://twitter.com/FASILKOM_UI"> @FASILKOM_UI</a></b>
        </p>
	</div>
	<div id="footer-down">
		Copyright &copy; <?php echo date('Y'); ?> by Propensi B05<br/>
	</div><!-- footer -->
	
</div><!-- page -->

</body>
</html>
