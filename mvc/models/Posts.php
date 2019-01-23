<?php
include_once 'C:\wamp64\www\php2lygis\mvc\libs\Database.php';
class Posts 
{
	public function getAllPosts(){
		$db = new Database();
		$db->selectEverything()->from('posts');
		return $db->get();
	}
	public function getPostById($id){
		//$id = $_GET['edit'];
		$db = new Database();
		$db->selectEverything('*')->from('`table`')->where('id', $id);
		return $db->get();
	}
	public function getPostBySlug($slug){
		$db = new Database();
		$db->select()->from('posts')->where('SLUG',$slug);
		return $db->get();
	}
	public function insertPost($title, $image, $checkbox, $select, $textarea){
		$db = new Database();
		$db->insert('table')
		   ->Column('`title`, `image`, `checkbox`, `select`, `textarea`')
		   ->values("'$title', '$image', '$checkbox', '$select', '$textarea'");
		return $db->get();

	}
	public function updatePost($id){
		$db = new Database();
		$db->update('table')->set('`title`,`a`')->where('id',$id);
		return $db->get();
	}
	public function deletePost($id){
		$db = new Database();
		$db->delete()->from('`table`')->where('id',$id);
		return $db->get();
	}
}