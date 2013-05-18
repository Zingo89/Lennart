<?php
/**
* Standard controller layout.
* 
* @package LennartCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $le;
      $le->data['title'] = "The Index Controller";
   }

}