<?php
//
// PHASE: BOOTSTRAP
//
define('LENNART_INSTALL_PATH', dirname(__FILE__));
define('LENNART_SITE_PATH', LENNART_INSTALL_PATH . '/site');

require(LENNART_INSTALL_PATH.'/src/bootstrap.php');

$le = CLennart::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$le->FrontControllerRoute();
//
// PHASE: THEME ENGINE RENDER
//
$le->ThemeEngineRender();