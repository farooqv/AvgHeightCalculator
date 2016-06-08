<?php
ini_set("auto_detect_line_endings", true);
spl_autoload_register('appAutoloader');


	function appAutoloader($className)
	{
		include $className.'.php';
	}
	
	//currently no db interface, owasp/min requirement sanitize filters to be apply for all user inputs
	if(isset($_GET['height']) && isset($_GET['sex'])) {
		$height = $_GET['height'];	
		$sex = $_GET['sex'];
		
		$list = array (
				array($height, $sex)
				);

		$filename = "Height.csv";
				
		$datasource = new CsvDataSource();
		$component = new HeightCalculate($datasource);
		$component->calculateProcess($filename,$list);	
	}
	return false;
?>