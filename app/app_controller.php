<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	/*
	 public $components = array('Auth' => array(
	 //'loginRedirect'=>'/admin/articles',
	 'loginAction' => array('controller' => 'users',
	 'action' => 'login',
	 'plugin' => false,
	 'admin' => false)));
	 */

	public $components = array('Acl', 'Auth', 'Session');

	function check_if_spider() {
		$spiders = array('Googlebot', 'Yammybot', 'Openbot', 'Yahoo', 'Slurp', 'msnbot', 'ia_archiver', 'Lycos', 'Scooter', 'AltaVista', 'Teoma', 'Gigabot', 'Googlebot-Mobile');
		foreach($spiders as $spider) {
			if(eregi($spider, $_SERVER['HTTP_USER_AGENT'])) {
				return TRUE;
			}
		}
		return FALSE;
	}

	function Truncate($string, $length, $stopanywhere = false) {
		//truncates a string to a certain char length, stopping on a word if not specified otherwise.
		if(strlen($string) > $length) {
			//limit hit!
			$string = substr($string, 0, ($length - 3));
			if($stopanywhere) {
				//stop anywhere
				$string .= '...';
			} else {
				//stop on a word.
				$string = '...' . substr($string, 0, strrpos($string, ' '));
			}
		}
		return $string;
	}

	public function checkAccess($params = null) {
		$params = isset($params) ? $params : $this -> params;
		$AllowedActions = array();
		if($params['controller'] != 'searches') {
			$AllowedActions['admin_edit'] = $this -> Acl -> check($this -> Session -> read('User.role'), 'controllers' . '/' . $params['controller'] . '/' . 'admin_edit', 'update');
			$AllowedActions['admin_delete'] = $this -> Acl -> check($this -> Session -> read('User.role'), 'controllers' . '/' . $params['controller'] . '/' . 'admin_delete', 'update');
			$this -> set(compact('AllowedActions'));
		}

	}

	function beforeFilter() {

		 
		
			
		//Configure AuthComponent
		$this -> Auth -> actionPath = 'controllers/';
		$this -> Auth -> authorize = 'actions';
		$this -> Auth -> loginAction = array('controller' => 'users', 'plugin' => false, 'action' => 'login', 'admin' => false);
		$this -> Auth -> userScope = array('User.disabled' => false);
		//$this->Auth->allow('show') ;
		$this -> Auth -> allow(array("show_test","admin_sitemap", "show_media_page", 'insertemail','show_list_milafat','show_list_Rss','flux','show_author','generate_sitemap','show','show_article', 'show_searches','show_info','sitemap','sitemaptwodays','sitemapsixmonths',"show_list","sitemapgooglenews","show_journaliste","show_pdf_alhayat","show_article_milafat","show_gallery"));
		if($this -> params['url']['url'] == 'admin' || $this -> params['url']['url'] == 'admin/') {
			$this -> redirect(array("admin" => true, "controller" => "articles"));
		}
		if(str_replace("admin", '', $this -> params['url']['url']) != $this -> params['url']['url']) {
			$this -> checkAccess();
			Configure::write('Config.language', $this -> Session -> read("Auth.User.lang"));
		}else {
			Configure::write('Config.language', 'arb');
		}

	}

}
