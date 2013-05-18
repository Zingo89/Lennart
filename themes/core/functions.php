<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

/**
* Create a url by prepending the base_url.
*/
function base_url($url) {
  return CLennart::Instance()->request->base_url . trim($url, '/');
}

/**
* Return the current url.
*/
function current_url() {
  return CLennart::Instance()->request->current_url;
}
/**
* Helpers for the template file.
*/
$le->data['header'] = '<h1>Header: Lennart</h1>';
$le->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
$le->data['footer'] = '<p>Footer: ';


/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $le = CLennart::Instance();
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($le->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($le->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($Lennart->request, true)) . "</pre>";
  return $html;
}