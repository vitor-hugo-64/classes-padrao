<?php 

namespace NAMESPACE_DO_PROJETO;

use Rain\Tpl;

class Page
{
	private $config;
	private $tpl;

	function __construct()
	{
		$config = array( 
							'tpl_dir' => 'views'.DIRECTORY_SEPARATOR, 
							'cache_dir' => 'views-cache'.DIRECTORY_SEPARATOR 
						);

		Tpl::configure( $config );
		
		$this->tpl = new Tpl();
		$this->tpl->draw('header');
	}

	function __destruct()
	{
		$this->tpl->draw('footer');	
	}

	public function drawPage($files = array(null), $params = array(null))
	{
		foreach ($params as $key => $value) {
			$this->tpl->assign( $key, $value);
		}
		
		foreach ($files as $value) {
			$this->tpl->draw($value);
		}
	}
}