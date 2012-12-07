<?php

class ZZaeToolModule extends CWebModule {
	public $defaultController = 'default';
	public $layout = '/layouts/column2';
	
	public function init() {
		$this->setImport(array(
			'zaetool.controllers.*',
		));
		$this->controllerMap = array(
			'modelBuild' => 'ZModelBuildController',
		);
	}
}

?>