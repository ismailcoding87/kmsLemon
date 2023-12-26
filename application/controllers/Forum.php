<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
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

 public function __construct()
 {

  parent::__construct();



  // 
 }

 public function index()
 {
  if (empty($this->session->userdata('login'))) {
   // Session 'user_id' exists, user is logged in
   $this->session->set_flashdata('message', 'Ini adalah pesan sukses');
   redirect('/login');
  }

  // $data = ["tittle" => "Halaman Dashboard", "aktif" => "dashboard"];

  // $this->load->view("_partials/header", $data);
  // $this->load->view("v_daftar/index", $data);

  // 
 }
}
