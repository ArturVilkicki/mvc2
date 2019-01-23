<?php
include_once 'C:\wamp64\www\php2lygis\mvc\libs\Controller.php';
class PageController extends Controller {
	public function index(){
		$this->view->title = 'Page layout';
		$this->view->render('header');
		$this->view->render('content');
		$this->view->render('footer');

	}
}