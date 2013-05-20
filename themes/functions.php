<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $ly = CLennart::Instance();  
  if(empty($le->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($le->config['debug']['db-num-queries']) && $le->config['debug']['db-num-queries'] && isset($le->db)) {
    $flash = $le->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $le->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($le->config['debug']['db-queries']) && $le->config['debug']['db-queries'] && isset($le->db)) {
    $flash = $le->session->GetFlash('database_queries');
    $queries = $le->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($le->config['debug']['timer']) && $le->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $le->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($le->config['debug']['lydia']) && $le->config['debug']['lydia']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLennart:</p><pre>" . htmlent(print_r($ly, true)) . "</pre>";
  }    
  if(isset($le->config['debug']['session']) && $le->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CLennart->session:</p><pre>" . htmlent(print_r($ly->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CLennart::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
 * Prepend the base_url.
 */
function base_url($url) {
  return CLennart::Instance()->request->base_url . trim($url, '/');
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $le = CLennart::Instance();
  return "{$le->request->base_url}themes/{$le->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
function current_url() {
  return CLennart::Instance()->request->current_url;
}

/**
* Render all views.
*/
function render_views() {
  return CLennart::Instance()->views->Render();
}

