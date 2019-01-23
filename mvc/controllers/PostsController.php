<?php 
include_once 'C:\wamp64\www\php2lygis\mvc\libs\Controller.php';
include_once 'C:\wamp64\www\php2lygis\mvc\models\Posts.php';
include_once 'C:\wamp64\www\php2lygis\mvc\helpers\FormHelper.php';
include_once 'C:\wamp64\www\php2lygis\mvc\helpers\Helper.php';
//include_once 'C:\wamp64\www\php2lygis\mvc\libs\Database.php';
class PostsController extends Controller{

	public function index(){
		echo "Veikia index metodas";
		//$posts = new Posts();

		//$this->view->posts = $posts->getAllPosts();
		//$this->view->posts = $posts-> deletePost();
		//$this->view->posts = $posts->insertPost();
		//$this->view->title = '8 ==D';
		//$this->view->headline = 'Musu headline';
		//$this->view->render('header');
		//$this->view->render('posts');

		// $DB = new Database();
		// $DB->select('id, name');
		// $DB->from('posts');
		// $DB->where('id', '1', '=');
		// $DB->whereAnd('name', 'JOhanatas', '=');
		// $DB->get();
		/*$DB->get();
		print_r($DB);*/
		
	}
	/*public function show($id){
		echo $id;
	}*/

	public function add(){
		$form = new FormHelper('POST', 'http://localhost/php2lygis/mvc/index.php/posts/store');
		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title'
		])->input([ 
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL'
		])->input([
			'name' => 'public',
			'type' => 'checkbox',
			'value' => 1
		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'
		]);
		$form->select('sada',[
			'volvo' => 'Volvo',
			'bmw' => 'BMW'
		],'display:block; clear:both;');
		$form->textarea('textarea', '4', '50', 't w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.');
		echo $form->get();
	}

	public function store(){
		$title = $_POST['title'];
		$image = $_POST['image'];
		$checkbox = $_POST['public'];
		$select = $_POST['sada'];
		$textarea = $_POST['textarea'];
		$post = new Posts();
		$post->insertPost($title, $image, $checkbox, $select, $textarea);
	}
	public function edit($id){
		$post = new Posts();
		$getPost = $post->getPostById($id)->fetch_assoc();
		$form = new FormHelper('POST', 'http://localhost/php2lygis/mvc/index.php/posts/store');
		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title',
			'value' => $getPost['title']
		])->input([ 
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL',
			'value' => $getPost['image']
		])->input([
			'name' => 'public',
			'type' => 'checkbox',
			'value' => $getPost['checkbox']
		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'
		]);
		$form->select('sada',[
			'volvo' => 'Volvo',
			'bmw' => 'BMW'
		],'display:block; clear:both;', $getPost['select']);
		$form->textarea('textarea', '4', '50', $getPost['textarea']);;
		echo $form->get();
		
	}
	public function update($id){
		$post = new Posts();
		$getPost = $post->updatePost($id);
		echo "Record updated";
	}
	public function delete($id){
		$post = new Posts();
		$getPost = $post->deletePost($id);
		echo "Record was deleted";
	}

	public function test(){
		$slug = Helper::getSlug('Posto Pavadinimas');

		echo $slug;
	}
	// public function select(){
	// 	$form2 = new FormHelper('POST', '');
	// 	$form2->select('sada',[
	// 		'volvo' => 'Volvo',
	// 		'bmw' => 'BMW'
	// 	]);
	// 	echo $form2->get();
	// }

	// public function textarea(){
	// 	$form3 = new FormHelper('POST', '');
	// 	$form3->textarea('textarea', '4', '50', 't w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.');
	// 	echo $form3->get();
	// }
	
}