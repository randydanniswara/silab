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
	    	if ($id == 1) return true;
	    	return false;
	    }

	    function isKetua($id){
	    	if ($id == 2) return true;
	    	return false;
	    }

	    function isAnggota($id){
	    	if ($id == 3) return true;
	    	return false;
	    }
	}
?>
