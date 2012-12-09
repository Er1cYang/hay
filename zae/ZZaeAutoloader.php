<?php
/**
 * ZZaeAutoloader
 * <pre>
 * 在ZAE环境中，有些YII的类是不能直接使用的，所以我们利用PHP
 * 的autoload特性，拦截这些类，让它加载的时候，使用我们的实现。
 * </pre>
 * ==============================================
 * File encoding: UTF-8 
 * ----------------------------------------------
 * ZZaeImporter.php
 * ==============================================
 * @author YangDongqi <yangdongqi@gmail.com>
 * @copyright Copyright &copy; 2008-2012 Hayzone IT LTD.
 * @version $id$
 */
class ZZaeAutoloader {
	
	public static function register() {
		// 将loader放到栈顶
		spl_autoload_register(array('ZZaeAutoloader', 'autoload'), false, true);
	}
	
	public static function autoload($name) {
		if(isset(self::$_classes[$name])) {
			require self::$_classes[$name];
		}
	}
	
	private static $_classes = array(
		'CActiveRecord' => '/db/ar/ZActiveRecord.php',
		'CActiveForm' => '/web/widgets/ZActiveForm.php',
	);
	
}

?>