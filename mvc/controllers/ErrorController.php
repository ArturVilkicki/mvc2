<?php 
include_once 'C:\wamp64\www\php2lygis\mvc\libs\Controller.php';
class ErrorController extends Controller {
	public function error404() {
		$this->view->render('error');
		
	}
}