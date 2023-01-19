<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_forecast extends CI_Model {
	
     public function data()
     {
           return $this->db->get('dim_orders');
     }
}
?>