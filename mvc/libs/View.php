<?php
class View {
	private $viewCatalogPath = 'C:\wamp64\www\php2lygis\mvc\views\\';
	public function render($templatePath){
		// require($this->viewCatalogPath.'header.php');

		require ($this->viewCatalogPath.$templatePath.'.php');
		// require($this->viewCatalogPath.'footer.php');
	}
}