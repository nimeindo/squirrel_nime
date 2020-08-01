<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMapModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
  
    function create() {
        $this->db->select('id_produk, create_date');
        $this->db->from('produk');
        $this->db->order_by('id_produk',"ASC");
        $query = $this->db->get();
        return $query->result();
    }
}
?>