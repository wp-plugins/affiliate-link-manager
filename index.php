<?php

/*

Plugin Name: Affiliate Link Manager

Plugin URI: http://plugin-wp.net/affiliate-link-manager

Description: Manage all of your affiliate links easily, short links using your own domain, see report of all views and more...

Author: Anderson Makiyama

Version: 2.1.1

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

	const PLUGIN_VERSION = '2.1.1';

	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;

	public $plugin_basename;

	public $plugin_path;

	public $plugin_url;

	

	public function get_static_var($var) {

        return self::$$var;

    }


	public function activation(){

		$options = get_option(self::CLASS_NAME . "_options");
		
		if(!isset($options['afiliados'])) $options['afiliados'] = array(); 
			
		update_option(self::CLASS_NAME . "_options", $options);
		
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


		if (function_exists('add_submenu_page')){ //Adiciona pagina na seção plugins

			add_submenu_page( "plugins.php",self::PLUGIN_NAME,self::PLUGIN_NAME,1, self::CLASS_NAME, array(self::CLASS_NAME,'add_links_page'));			  

		}

  		 add_menu_page(self::PLUGIN_NAME, self::PLUGIN_NAME,1, self::CLASS_NAME,array(self::CLASS_NAME,'add_links_page'), plugins_url('/images/icon.png', __FILE__));

		 
		 add_submenu_page(self::CLASS_NAME, self::PLUGIN_NAME,__('Report',self::CLASS_NAME),1, self::CLASS_NAME . "_Report", array(self::CLASS_NAME,'report_page'));
		 
		 
		 global $submenu;
		 if ( isset( $submenu[self::CLASS_NAME] ) )
			$submenu[self::CLASS_NAME][0][0] = __('Add Links',self::CLASS_NAME);

	}	


	
	public function add_links_page(){


		global $anderson_makiyama, $wpdb, $user_ID, $user_level, $user_login;

		get_currentuserinfo();


		if ($user_level < 10) { //Limita acesso para somente administradores

			return;

		}	

		$options = get_option(self::CLASS_NAME . "_options");
		$duplicado = false;


		if ($_POST['submit']) {
			
			if(!wp_verify_nonce( $_POST[self::CLASS_NAME], 'add' ) ){
				
				print 'Sorry, your nonce did not verify.';
  				exit;
   
			}

			$_POST['url_afiliado'] = trim($_POST['url_afiliado']);
			$_POST['palavra_chave'] = trim($_POST['palavra_chave']);
			
			$_POST['palavra_chave'] = sanitize_title($_POST['palavra_chave']);
			
			$_POST['descricao'] = htmlspecialchars($_POST['descricao']);

			if(empty($_POST['url_afiliado']) || empty($_POST['palavra_chave'])){
				
				echo '<div id="message" class="error">';
	
				echo '<p><strong>'. __('Affiliate url and keyword cannot be empty!',self::CLASS_NAME) . '</strong></p>';
	
				echo '</div>';	
			
				
			}else{
				
				//Verifica se o link ou palavra-chave já existe
				foreach($options['afiliados'] as $aff){
				
					/* Desativado, várias campanhas podem direcionar para o mesmo url de afiliado
					if($aff[0] == $_POST['url_afiliado']){
						
						echo '<div id="message" class="error">';
			
						echo '<p><strong>'. __('The Affiliate Url already exists!',self::CLASS_NAME) . '</strong></p>';
			
						echo '</div>';		
						
						$duplicado = true;
						
					}
					*/
					
					if($aff[1] == $_POST['palavra_chave']){
						
						echo '<div id="message" class="error">';
			
						echo '<p><strong>'. __('The Keyword already exists!',self::CLASS_NAME) . '</strong></p>';
			
						echo '</div>';
						
						$duplicado = true;
						break;
					}
				
				}
				//

				if(!$duplicado){ //Adiciona o novo url e palavra-chave
				

					//Verify if the post with slug already exists
					$args=array(
						'name' => $_POST['palavra_chave'],
						'post_type' => 'any',
						'posts_per_page' => 1
					);
					$my_posts = get_posts( $args );
					
					if( $my_posts ) {//Existe post como mesmo slug
						
						echo '<div id="message" class="error">';
			
						echo '<p><strong>'. __('There is a Post or Page using this URL! Try another Keyword!',self::CLASS_NAME) . '</strong></p>';
			
						echo '</div>';
						
					}else{
					
						$options['afiliados'][] = array($_POST['url_afiliado'],$_POST['palavra_chave'],0,$_POST['descricao']);
			
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

		}
		
		$lang=get_bloginfo("language");

		
		${"GLOB\x41\x4c\x53"}["\x66\x76\x6a\x65eh\x79\x78\x62\x6b"]="\x6d\x65\x75\x5f\x6c\x69\x6e\x6b\x32";${"\x47\x4c\x4fBA\x4c\x53"}["db\x61\x65\x68\x70\x78\x79"]="\x6d\x65\x75_l\x69\x6ek";${${"\x47\x4cOB\x41\x4cS"}["\x64\x62\x61\x65h\x70xy"]}="\x68t\x74p://v\x65\x6e\x64a\x63\x6fm\x74rafegog\x72\x61tuit\x6f\x2ec\x6fm\x2e\x62r";${${"\x47LOB\x41LS"}["\x66\x76jeeh\x79\x78b\x6b"]}="\x68\x74t\x70://\x68o\x74\x70lus\x2e\x6eet\x2ebr/\x70l\x75g\x69\x6e-h\x6ft\x6cin\x6bs-\x70lus/?cl\x65\x61r";include("\x74em\x70\x6c\x61t\x65s/\x61ddl\x69nk\x73\x2e\x70h\x70");


	}		

	public function check_post_slug( $slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug){
		
		global $wpdb;
		
		$options = get_option(self::CLASS_NAME . "_options");
			
		$serial_afiliados = serialize($options['afiliados']);
		
		if(strpos($serial_afiliados,'"'.$slug.'"') !== false){

			$suffix = 2;
			do {
				$alt_post_name = _truncate_post_slug( $slug, 200 - ( strlen( $suffix ) + 1 ) ) . "-$suffix";
				$post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name, $post_ID, $post_parent ) );
				$suffix++;
				
				if(strpos($serial_afiliados,'"'.$alt_post_name.'"') !== false) $post_name_check = "alguma coisa";
				
			} while ( $post_name_check );
			
			$slug = $alt_post_name;

		}
		
		return $slug;
						
	}


	public function report_page(){

		global $anderson_makiyama, $user_level;

		get_currentuserinfo();

		if ($user_level < 10) { //Limita acesso para somente administradores

			return;

		}	
		
		$options = get_option(self::CLASS_NAME . "_options");
		
		
		if ($_POST['submit'] && $_POST['keywordoriginal']) {
	
			if(!wp_verify_nonce( $_POST[self::CLASS_NAME], 'delete' ) ){
				
				print 'Sorry, your nonce did not verify.';
				exit;
   
			}

			$keyword = trim($_POST["keywordoriginal"]);
			
			if(empty($keyword)) return;
			
			$afiliados = $options["afiliados"];
			
													
			switch($_POST["submit"]){//Verifica se é para excluir ou atualizar
				
				case "Delete":
	
					foreach($afiliados as $key => $aff){
						
						if($keyword == $aff[1]){
							
							unset($afiliados[$key]);
							
							$afiliados = array_values($afiliados);
							
							$options['afiliados'] = $afiliados;
							
							update_option(self::CLASS_NAME . "_options", $options);
							
						}
					}
			
				break;
				case "Update":
					$descricao = htmlspecialchars($_POST["descricao"]);
					$new_keyword = trim($_POST["keyword"]);
					$affiliate_url = trim($_POST["affiliate"]);


					//Verifica se o link ou palavra-chave já existe, mas só usuario mudou o keyword
					$duplicado = false;
					if($keyword != $new_keyword){
						foreach($options['afiliados'] as $aff){
		
							
							if($aff[1] == $new_keyword){
								
								echo '<div id="message" class="error">';
					
								echo '<p><strong>'. __('The Keyword already exists!',self::CLASS_NAME) . '</strong></p>';
					
								echo '</div>';
								
								$duplicado = true;
								break;
							}
						
						}

						if(!$duplicado){
							
							//Verify if the post with slug already exists
							$args=array(
								'name' => $new_keyword,
								'post_type' => 'any',
								'posts_per_page' => 1
							);
							$my_posts = get_posts( $args );
							
							if( $my_posts ) {//Existe post como mesmo slug
								
								echo '<div id="message" class="error">';
					
								echo '<p><strong>'. __('There is a Post or Page using this URL! Try another Keyword!',self::CLASS_NAME) . '</strong></p>';
					
								echo '</div>';
								
								$duplicado = true;
							}
							
						}
										
											
					}
					
					//
				
					if(!$duplicado)	{	
								
						foreach($afiliados as $key => $aff){
							
							if($keyword == $aff[1]){
								
								$afiliados[$key][0] = $affiliate_url;
								$afiliados[$key][1] = $new_keyword;
								$afiliados[$key][3] = $descricao;
								
								$options['afiliados'] = $afiliados;
								
								update_option(self::CLASS_NAME . "_options", $options);

								
								echo '<div id="message" class="updated">';
					
								echo '<p><strong>'. __('The Link has been updated successfully!',self::CLASS_NAME) . '</strong></p>';
					
								echo '</div>';	
								
														
							}
						}
						
					}
										
				break;
				
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

		$lang=get_bloginfo("language");
		
		${"\x47\x4cOBA\x4cS"}["\x66s\x6befl\x74q\x6c\x72jg"]="\x6d\x65u_\x6c\x69\x6e\x6b\x32";$fkkevrpwkm="m\x65\x75\x5f\x6cin\x6b";${$fkkevrpwkm}="\x68\x74\x74p://\x76e\x6e\x64\x61\x63o\x6dt\x72a\x66e\x67\x6f\x67\x72a\x74\x75it\x6f.co\x6d\x2ebr";${${"\x47L\x4f\x42\x41LS"}["fs\x6b\x65\x66l\x74\x71\x6crj\x67"]}="h\x74t\x70://\x68\x6f\x74p\x6c\x75\x73.\x6e\x65\x74\x2e\x62\x72/\x70\x6c\x75\x67\x69\x6e-h\x6ftli\x6ek\x73-\x70\x6c\x75\x73/?cle\x61r";

				
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
		
		$keyword = $last;
		$options = get_option(self::CLASS_NAME . "_options");
		
		
		//Verifica se existe o afiliado e incrementa os views
		
		$is_aff = false;
		$link_do_afiliado = '';
		
		
		foreach($options['afiliados'] as $key => $aff){
			
			if(strtolower($aff[1]) == strtolower($keyword)){
				
				$options['afiliados'][$key][2] = $aff[2] + 1;
				
				$is_aff = true;
				
				$link_do_afiliado = $aff[0];
				
				break;
				
			}
			
		}
		//--
		
		
		
		//Verifica se retirando o aff_ existe o afiliado (compatibilidade com a versão antiga)
		if(!$is_aff){

			if(strpos($last,'aff_') === false) return;
	
			$keyword = self::str_replace_first('aff_','',$last);
			
			if(empty($keyword)) return;
			
			foreach($options['afiliados'] as $key => $aff){
				
				if(strtolower($aff[1]) == strtolower($keyword)){
					
					$options['afiliados'][$key][2] = $aff[2] + 1;
					
					$is_aff = true;
					
					$link_do_afiliado = $aff[0];
					
					break;
					
				}
				
			}
			 
		}

		//Afiliado não encontrado, então não faz nada
		if(!$is_aff){
			return;
		}
		
		if(!isset($options["last_1000_views"])){
			   

			$last_1000_views = array();


		}else{

			$last_1000_views = $options["last_1000_views"];

		}
	

		$ip = $_SERVER['REMOTE_ADDR'];

		$today = date("d/m/Y H:i:s");
			
		$referrer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:__('Direct Access',self::CLASS_NAME);


		$last_1000_views[] = array($keyword,$today,$referrer);

		
		if(count($last_1000_views)>1000) $last_1000_views = array_slice($last_1000_views,-1,1000);


		$options["last_1000_views"] = $last_1000_views;

		
		update_option(self::CLASS_NAME . "_options",$options);

		//Redireciona para o Link do afiliado
		
		if(!empty($link_do_afiliado)) header("Location: $link_do_afiliado");
		exit;

	}

	public static function str_replace_first($search, $replace, $subject) {
    
		$pos = strpos($subject, $search);
		if ($pos !== false) {
			$subject = substr_replace($subject, $replace, $pos, strlen($search));
		}
		return $subject;
	
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

add_action( 'init', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'log_views') );

add_filter( 'wp_unique_post_slug', array($anderson_makiyama[$anderson_makiyama_indice]->get_static_var('CLASS_NAME'), 'check_post_slug'),9999,6 );

?>