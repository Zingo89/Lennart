<?php
/**
* Holding a instance of CLennart to enable use of $this in subclasses.
*
* @package LennartCore
*/
class CObject {

   /**
    * Members
    */
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
   

   /**
    * Constructor
    */
   protected function __construct() {
    $le = CLennart::Instance();
    $this->config   = &$le->config;
    $this->request  = &$le->request;
    $this->data     = &$le->data;
    $this->db       = &$le->db;
    $this->views    = &$le->views;
    $this->session  = &$le->session;
  }

 /**
   * Redirect to another url and store the session
   */
  protected function RedirectTo($url) {
    $le = CLennart::Instance();
    if(isset($le->config['debug']['db-num-queries']) && $le->config['debug']['db-num-queries'] && isset($le->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($le->config['debug']['db-queries']) && $le->config['debug']['db-queries'] && isset($le->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($le->config['debug']['timer']) && $le->config['debug']['timer']) {
      $this->session->SetFlash('timer', $le->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }
}