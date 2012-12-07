<?php
/**
 * ZModelBuildController
 * 给指定目录下的model创建metadata缓存
 * ==============================================
 * File encoding: UTF-8 PHP
 * ----------------------------------------------
 * ZModelBuildController.php
 * ==============================================
 * @data 2012-12-7
 * @author YangDongqi <yangdongqi@gmail.com>
 * @version
 */
class ZModelBuildController extends CController {
	
	public $defaultAction = 'index';
	
	/**
	 * 你所指定的model目录，这里写yii的alias
	 * @var array
	 */
	public $modelPath = array(
		'application.models',
	);
	
	public function actionIndex() {
		$modelPath = $this->modelPath;
		$message = '';
		foreach($modelPath as $path) {
			$message .= 'building path "'.$path.'" ...'."<br/>";
			$dir = Yii::getPathOfAlias($path);
			$files = CFileHelper::findFiles($dir, array(
				'fileTypes' => array('php'),
			));
			foreach($files as $file) {
				$pi = pathinfo($file);
				$classname = $pi['filename'];
				$rc = new ReflectionClass($classname);
				if($rc->isSubclassOf('CActiveRecord')) {
					$rc->newInstance();
				}
			}
		}
		$message .= 'build completed!';
		$this->render('index', array(
			'message' => $message,
		));
	}
	
}

?>