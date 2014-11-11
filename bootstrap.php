<?php

namespace Framework\Bootstrap;


class Bootstrap {
	
	public static function launch()
	{
		require_once '../control/controller.php';
		\Framework\Control\Controller::launch();
	}
	
}

?>