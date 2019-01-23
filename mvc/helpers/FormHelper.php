<?php

class FormHelper{
	private $form = '';

	public function __construct($method, $action){
		$this->form .= '<form method="' .$method. '" action="' .$action. '">';
	}

	public function input($attributes){
		$this->form .= '<input ';
		foreach ($attributes as $key => $attr) {
			$this->form .= $key. '="' .$attr. '" ';
		}
		$this->form .= '>';
		return $this;

	}
	public function select($name, $elements, $style){
		$this->form .= '<select name="' .$name .'" style="' .$style.'">';
		//$this->form .= '<option ';
		foreach ($elements as $key => $element) {
			$this->form .= '<option value="' .$key .'">' .$element . '</option>' ;
		}

		//$this->form .= '>';
		//$this->form .= '</option>';
		$this->form .= '</select>';
		return $this;

	}
	public function textarea($name, $rows, $cols, $text){
		$this->form .= '<textarea name="' .$name.'" rows="' .$rows.'" cols="' .$cols.'">' .$text . '</textarea>';
		return $this;

	}
	public function get(){
		$this->form .= '</form>';
		return $this->form;
	}
}

