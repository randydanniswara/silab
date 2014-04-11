<?php
	class ExtUser extends CWebUser {
		protected $_model;
 
	    function getRole()
	    {
	        if ( $this->_model === null ) {
	                $this->_model = User::model()->findByPk($this->id);
	        }
	        $user = $this->_model;
	        if($user) {
	        	return $user->role;
	        }
	        return 3;
	    }

	    function isAdmin($id){
	    	$kelas = Admin::model()->findByPk($id);
	    	if ($kelas === null) return false;
	    	return true;
	    }

	    function isKetua($id){
	    	$kelas = Ketua::model()->findByPk($id);
	    	if ($kelas === null) return false;
	    	return true;
	    }

	    function isAnggota(){
	    	$kelas = Anggota::model()->findByPk($id);
	    	if ($kelas === null) return false;
	    	return true;
	    }
	}
?>
