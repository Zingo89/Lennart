<?php
/**
 * Holding a instance of CLennart to enable use of $this in subclasses and provide some helpers.
 *
 * @package LennartCore
 */
class CObject {

	/**
	 * Members
	 */
	protected $le;
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;


	/**
	 * Constructor, can be instantiated by sending in the $le reference.
	 */
	protected function __construct($le=null) {
	  if(!$le) {
	    $le = CLennart::Instance();
	  }
	  $this->ly       = &$le;
    $this->config   = &$le->config;
    $this->request  = &$le->request;
    $this->data     = &$le->data;
    $this->db       = &$le->db;
    $this->views    = &$le->views;
    $this->session  = &$le->session;
    $this->user     = &$le->user;
	}


	/**
	 * Wrapper for same method in CLennart. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->ly->RedirectTo($urlOrController, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CLennart. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->ly->RedirectToController($method, $arguments);
  }


	/**
	 * Wrapper for same method in CLennart. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->ly->RedirectToControllerMethod($controller, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CLennart. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->ly->AddMessage($type, $message, $alternative);
  }


	/**
	 * Wrapper for same method in CLennart. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->ly->CreateUrl($urlOrController, $method, $arguments);
  }


}
  