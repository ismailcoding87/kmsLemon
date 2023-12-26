<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{

 /**
  * Index Page for this controller.
  *
  * Maps to the following URL
  * 		http://example.com/index.php/welcome
  *	- or -
  * 		http://example.com/index.php/welcome/index
  *	- or -
  * Since this controller is set as the default controller in
  * config/routes.php, it's displayed at http://example.com/
  *
  * So any other public methods not prefixed with an underscore will
  * map to /index.php/welcome/<method_name>
  * @see https://codeigniter.com/userguide3/general/urls.html
  */
 public function index()
 {

  $data = ["tittle" => "Halaman Tentang", "aktif" => "tentang"];

  $this->load->view("_partials/header", $data);
  $this->load->view("_partials/sidebar", $data);
  $this->load->view("v_dashboard/index", $data);
  $this->load->view("_partials/footer", $data);

  // 
 }
}
