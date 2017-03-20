<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Appliance extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $currentMethod = $this->router->fetch_method();
    if(!isset($_SESSION['app_user']) && $currentMethod != 'login'){
      redirect('appliance/login');
    }
  }

  function index()
  {
    /*First line loads the top template
      Second line loads the view you want to see A.K.A the content
      Third Line loads the footer
    */
    $this->load->view('templates/top');
    $this->load->view('admin/start');
    $this->load->view('templates/bottom');
  }
  function login(){
    /*First line loads the top template
      Second line loads the view you want to see A.K.A the content
      Third Line loads the footer
    */
    $this->load->view('templates/top');
    $this->load->view('admin/login');
    $this->load->view('templates/bottom');
  }
//Logs out the user from the app
  function logout(){
    unset($_SESSION['app_user']);
    redirect('appliance');
  }
function edit($cod=0){
  if ($cod == 0) {
    redirect("appliance");
  }
  $d = array();
  $d['cod'] = $cod;

  /*First line loads the top template
    Second line loads the view you want to see A.K.A the content
    Third Line loads the footer
  */
  $this->load->view('templates/top');
  $this->load->view('admin/edit',$d);
  $this->load->view('templates/bottom');

}

function delete(){
  $cod = $this->uri->segment(3);
  $imgContent = urldecode($this->uri->segment(4));
  if($cod == 0){
    redirect("appliance");
  }
  $CI =& get_instance();
  $CI->db->where("id",$cod);
  $CI->db->delete("product");

  $dir = "C:/xampp/htdocs/appliances/appliancePhotos/".$imgContent;
  unlink($dir);
  redirect('appliance');
}

}
