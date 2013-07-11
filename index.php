<?php

/*

Plugin Name: Affiliate Link Manager

Plugin URI: http://plugin-wp.net/affiliate-link-manager

Description: Manage all of your affiliate links easily, short links using your own domain, see report of all views and more...

Author: Anderson Makiyama

Version: 1.1

Author URI: http://plugin-wp.net


*/


class Anderson_Makiyama_Affiliate_Link_Manager{



	const CLASS_NAME = 'Anderson_Makiyama_Affiliate_Link_Manager';

	public static $CLASS_NAME = self::CLASS_NAME;

	const PLUGIN_ID = 6;

	public static $PLUGIN_ID = self::PLUGIN_ID;

	const PLUGIN_NAME = 'Affiliate Link Manager';

	public static $PLUGIN_NAME = self::PLUGIN_NAME;

	const PLUGIN_PAGE = 'http://plugin-wp.net/affiliate-link-manager';

	public static $PLUGIN_PAGE = self::PLUGIN_PAGE;

	const PLUGIN_VERSION = '1.0';

	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;

	public $plugin_basename;

	public $plugin_path;

	public $plugin_url;

	

	public function get_static_var($var) {

        return self::$$var;

    }


	public function activation(){

	}

	
	public function Anderson_Makiyama_Affiliate_Link_Manager(){ //__construct()


		$this->plugin_basename = plugin_basename(__FILE__);

		$this->plugin_path = dirname(__FILE__) . "/";

		$this->plugin_url = WP_PLUGIN_URL . "/" . basename(dirname(__FILE__)) . "/";


		load_plugin_textdomain( self::CLASS_NAME, false, strtolower(str_replace(" ","-",self::PLUGIN_NAME)) . '/lang' );	


	}

	



	public function settings_link($links) { 

		global $anderson_makiyama;

		$settings_link = '<a href="options-general.php?page='. self::CLASS_NAME .'">'. __('Settings',self::CLASS_NAME) . '</a>'; 

		array_unshift($links, $settings_link); 

		return $links; 

	}	



	public function options(){


		global $anderson_makiyama, $user_level;

		get_currentuserinfo();

		if (function_exists('add_options_page')) { //Adiciona pagina na seção Configurações

			add_options_page(self::PLUGIN_NAME, self::PLUGIN_NAME, 1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));

		}

		if (function_exists('add_submenu_page')){ //Adiciona pagina na seção plugins

			add_submenu_page( "plugins.php",self::PLUGIN_NAME,self::PLUGIN_NAME,1, self::CLASS_NAME, array(self::CLASS_NAME,'options_page'));			  

		}

  		 add_menu_page(self::PLUGIN_NAME, self::PLUGIN_NAME,1, self::CLASS_NAME,array(self::CLASS_NAME,'options_page'), plugins_url('/images/icon.png', __FILE__));

		 add_submenu_page(self::CLASS_NAME, self::PLUGIN_NAME,__('Report',self::CLASS_NAME),1, self::CLASS_NAME . "_Report", array(self::CLASS_NAME,'report_page'));
		 
		 add_submenu_page(self::CLASS_NAME, self::PLUGIN_NAME,__('Help page',self::CLASS_NAME),1, self::CLASS_NAME . "_Help", array(self::CLASS_NAME,'help_page'));

	}	


	public function options_page(){


		global $anderson_makiyama, $wpdb, $user_ID, $user_level, $user_login;

		get_currentuserinfo();


		if ($user_level < 10) { //Limita acesso para somente administradores

			return;

		}	

		$options = get_option(self::CLASS_NAME . "_options");
		$duplicado = false;


		if ($_POST['submit']) {

			$_POST['url_afiliado'] = trim($_POST['url_afiliado']);
			$_POST['palavra_chave'] = trim($_POST['palavra_chave']);

			if(empty($_POST['url_afiliado']) || empty($_POST['palavra_chave'])){
				
				echo '<div id="message" class="error">';
	
				echo '<p><strong>'. __('Affiliate url and keyword cannot be empty!',self::CLASS_NAME) . '</strong></p>';
	
				echo '</div>';	
			
				
			}else{
				
				//Verifica se o link ou palavra-chave já existe
				foreach($options['afiliados'] as $aff){
				
					if($aff[0] == $_POST['url_afiliado']){
						
						echo '<div id="message" class="error">';
			
						echo '<p><strong>'. __('The Affiliate Url already exists!',self::CLASS_NAME) . '</strong></p>';
			
						echo '</div>';		
						
						$duplicado = true;
						
					}
					
					if($aff[1] == $_POST['palavra_chave']){
						
						echo '<div id="message" class="error">';
			
						echo '<p><strong>'. __('The Keyword already exists!',self::CLASS_NAME) . '</strong></p>';
			
						echo '</div>';
						
						$duplicado = true;
						
					}
				
				}
				//

				if(!$duplicado){ //Adiciona o novo url e palavra-chave
					
					$options['afiliados'][] = array($_POST['url_afiliado'],$_POST['palavra_chave'],0);
		
					update_option(self::CLASS_NAME . "_options", $options);
				
					/*
					echo '<div id="message" class="updated">';
		
					echo '<p><strong>'. __('Settings has been saved successfully!',self::CLASS_NAME) . '</strong></p>';
		
					echo '</div>';	
					*/
					//header("Location: admin.php?page=Anderson_Makiyama_Affiliate_Link_Manager_Report");
					
					echo "<script>window.onload = function(){document.location='admin.php?page=Anderson_Makiyama_Affiliate_Link_Manager_Report';}</script>";
				
				}


			}

		}

		include("templates/options.php");

	}		


	public function help_page(){

		global $anderson_makiyama;

		include("templates/help.php");

	}	


	public function report_page(){


		global $anderson_makiyama;

		$options = get_option(self::CLASS_NAME . "_options");
		
		//Verifica se é para excluir e se for, exclui
		if ($_POST['submit'] && $_POST['keyword']) {

			
			$keyword = trim($_POST["keyword"]);
			
			if(empty($keyword)) return;
			
			$afiliados = $options["afiliados"];
			
			foreach($afiliados as $key => $aff){
				
				if($keyword == $aff[1]){
					
					unset($afiliados[$key]);
					
					$afiliados = array_values($afiliados);
					
					$options['afiliados'] = $afiliados;
					
					update_option(self::CLASS_NAME . "_options", $options);
					
				}
			}
		}
		//--

		if(!isset($options["afiliados"])){

			$afiliados = array();

		}else{

			$afiliados = $options["afiliados"];
		}
		
		if(!isset($options["last_1000_views"])){
			   

			$last_1000_views = array();


		}else{

			$last_1000_views = $options["last_1000_views"];

		}
		
		$last_1000_views = array_reverse($last_1000_views);

		$afiliados = array_reverse($afiliados);

		include("templates/report.php");

	}		


	public function my_css($hook) {
		
		if($hook != 'affiliate-link-manager_page_Anderson_Makiyama_Affiliate_Link_Manager_Report') return;
		
		/** Register */
		wp_register_style(self::CLASS_NAME . '_admin', plugins_url('styles/style-admin.css', __FILE__), array(), '1.0.0', 'all');
	 
		/** Enqueue */
		wp_enqueue_style(self::CLASS_NAME . '_admin');
	 
	}


	public static function make_data($data, $anoConta,$mesConta,$diaConta){


	   $ano = substr($data,0,4);

	   $mes = substr($data,5,2);

	   $dia = substr($data,8,2);

	   return date('Y-m-d',mktime (0, 0, 0, $mes+($mesConta), $dia+($diaConta), $ano+($anoConta)));	

	}


	public function log_views(){

		$parts = explode('/', $_SERVER['REQUEST_URI']);
		$last = end($parts);
		

		if(empty($last)){
			
			$request_url = substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])-2);

			$parts = explode('/', $request_url);
			$last = end($parts);
		
		}
			
		if(empty($last)) return;
		
		if(strpos($last,'aff_') === false) return;

		$keyword = str_replace('aff_','',$last);
		
		if(empty($keyword)) return;
		
		
		$options = get_option(self::CLASS_NAME . "_options");
		
		
		//Verifica se existe o afiliado e incrementa os views
		
		$is_aff = false;
		$link_do_afiliado = '';
		
		foreach($options['afiliados'] as $key => $aff){
			
			if($aff[1] == $keyword){
				
				$options['afiliados'][$key][2] = $aff[2] + 1;
				
				$is_aff = true;
				
				$link_do_afiliado = $aff[0];
				
				break;
				
			}
			
		}
		//--
		
		
		if(!$is_aff) return;

		if(!isset($options["last_1000_views"])){
			   

			$last_1000_views = array();


		}else{

			$last_1000_views = $options["last_1000_views"];

		}
	

		$ip = $_SERVER['REMOTE_ADDR'];

		$today = date("d/m/Y H:i:s");
			
		$referrer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'Direct Access';


		$last_1000_views[] = array($keyword,$today,$referrer);

		
		if(count($last_1000_views)>1000) $last_1000_views = array_slice($last_1000_views,-1,1000);


		$options["last_1000_views"] = $last_1000_views;

		
		update_option(self::CLASS_NAME . "_options",$options);

		//Redireciona para o Link do afiliado
		
		if(!empty($link_do_afiliado)) header("Location: $link_do_afiliado");
		exit;

	}

	

	public static function get_data_array($data,$part=''){


	   $data_ = array();

	   $data_["ano"] = substr($data,0,4);

	   $data_["mes"] = substr($data,5,2);

	   $data_["dia"] = substr($data,8,2);

	   if(empty($part))return $data_;

	   return $data_[$part];

	}	



	public static function is_checked($vl1,$vl2){

		if($vl1==$vl2) return " checked=checked ";

		return "";

	}	


	public static function is_selected($vl1, $vl2){

		if($vl1==$vl2) return " selected=selected ";

		return "";

	}	


}



if(!isset($anderson_makiyama)) $anderson_makiyama = array();

$anderson_makiyama_indice = Anderson_Makiyama_Affiliate_Link_Manager::PLUGIN_ID;

$anderson_makiyama[$anderson_makiyama_indice] = new Anderson_Makiyama_Affiliate_Link_Manager();

add_filter("plugin_action_links_". $anderson_makiyama[$anderson_makiyama_indice]->plugin_basename, array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'settings_link') );

add_filter("admin_menu", array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'options'),30);

add_action( 'admin_enqueue_scripts', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'my_css') );

register_activation_hook( __FILE__, array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'activation') );

add_action( 'plugins_loaded', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'log_views') );


?>