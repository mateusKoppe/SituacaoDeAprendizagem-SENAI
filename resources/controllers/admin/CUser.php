<?php 

namespace controllers\admin;

use controllers\Controller;

class CUser extends Controller{

	public function ALogout(){
		unset($_SESSION['user']);
		$this->redirect('../../');
	}

}