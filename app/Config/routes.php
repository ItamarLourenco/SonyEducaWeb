<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'Usuarios', 'action' => 'login', 'home'));
	Router::connect('/painel', array('controller' => 'usuarios', 'action' => 'login', 'painel'));
	Router::connect('/videos/temas/add', array('controller' => 'videos', 'action' => 'add_tema', 'painel'));
	Router::connect('/videos/temas/edd/*', array('controller' => 'videos', 'action' => 'edit_tema'));
	Router::connect('/videos/temas/ws/*', array('controller' => 'videos', 'action' => 'temasWs'));
	Router::connect('/videos/ws/id/*', array('controller' => 'videos', 'action' => 'videoById'));
	Router::connect('/cadastros/add/ws/*', array('controller' => 'cadastros', 'action' => 'saveWs'));
	Router::connect('/compras/ws/check', array('controller' => 'compras', 'action' => 'check'));
	Router::connect('/compras/ws/add', array('controller' => 'compras', 'action' => 'saveWs'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';