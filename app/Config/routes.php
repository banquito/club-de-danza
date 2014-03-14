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
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'inicio'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	# Audiciones y Convocatorias
	Router::connect('/audiciones', array('controller' => 'auditionsearches', 'action' => 'index'));
	Router::connect('/audiciones/editar', array('controller' => 'auditions', 'action' => 'edit'));
	Router::connect('/audiciones/listar', array('controller' => 'auditions', 'action' => 'index'));
	Router::connect('/audiciones/nueva', array('controller' => 'auditions', 'action' => 'add'));
	Router::connect('/busquedaslaborales/editar', array('controller' => 'jobs', 'action' => 'edit'));
	Router::connect('/busquedaslaborales/listar', array('controller' => 'jobs', 'action' => 'index'));
	Router::connect('/busquedaslaborales/nueva', array('controller' => 'jobs', 'action' => 'add'));
	Router::connect('/castings/editar', array('controller' => 'castings', 'action' => 'edit'));
	Router::connect('/castings/listar', array('controller' => 'castings', 'action' => 'index'));
	Router::connect('/castings/nuevo', array('controller' => 'castings', 'action' => 'add'));
	Router::connect('/convocatorias/editar', array('controller' => 'calls', 'action' => 'edit'));
	Router::connect('/convocatorias/listar', array('controller' => 'calls', 'action' => 'index'));
	Router::connect('/convocatorias/nueva', array('controller' => 'calls', 'action' => 'add'));

	# Mapa de la Danza
	Router::connect('/mapadeladanza', array('controller' => 'mapsearches', 'action' => 'index'));
	Router::connect('/accesorios/editar', array('controller' => 'accessories', 'action' => 'edit'));
	Router::connect('/accesorios/listar', array('controller' => 'accessories', 'action' => 'index'));
	Router::connect('/accesorios/nuevo', array('controller' => 'accessories', 'action' => 'add'));
	Router::connect('/estudios/editar', array('controller' => 'estudies', 'action' => 'edit'));
	Router::connect('/estudios/listar', array('controller' => 'estudies', 'action' => 'index'));
	Router::connect('/estudios/nuevo', array('controller' => 'estudies', 'action' => 'add'));
	Router::connect('/salasdeensayo/editar', array('controller' => 'practicerooms', 'action' => 'edit'));
	Router::connect('/salasdeensayo/listar', array('controller' => 'practicerooms', 'action' => 'index'));
	Router::connect('/salasdeensayo/nueva', array('controller' => 'practicerooms', 'action' => 'add'));

	# Banners
	Router::connect('/banners/nuevo', array('controller' => 'banners', 'action' => 'add'));
	Router::connect('/banners/editar/*', array('controller' => 'banners', 'action' => 'edit'));
	Router::connect('/banners/ver/*', array('controller' => 'banners', 'action' => 'view'));

	# Confirmación de Correo
	Router::connect('/confirmacion/*', array('controller' => 'users', 'action' => 'confirm'));
	Router::connect('/confirmatucorreo', array('controller' => 'pages', 'action' => 'display', 'confirmatucorreo'));
	
	# Notas
	Router::connect('/notas', array('controller' => 'notes', 'action' => 'inicio'));
	Router::connect('/notas/editar/*', array('controller' => 'notes', 'action' => 'edit'));
	Router::connect('/notas/listar', array('controller' => 'notes', 'action' => 'index'));
	Router::connect('/notas/nueva', array('controller' => 'notes', 'action' => 'add'));
	Router::connect('/notas/ver/*', array('controller' => 'notes', 'action' => 'view'));

	Router::connect('/proximamente', array('controller' => 'pages', 'action' => 'display', 'proximamente'));
	Router::connect('/registro', array('controller' => 'users', 'action' => 'add'));
	
	Router::connect('/sliders/nuevo', array('controller' => 'sliders', 'action' => 'add'));
	Router::connect('/sliders/editar/*', array('controller' => 'sliders', 'action' => 'edit'));
	Router::connect('/sliders/ver/*', array('controller' => 'sliders', 'action' => 'view'));
	
	Router::connect('/usuarios/listar', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/perfil/*', array('controller' => 'users', 'action' => 'view'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	

	Router::redirect('/perfil/*', array('controller' => 'pages', 'action' => 'display', 'proximamente'));

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
