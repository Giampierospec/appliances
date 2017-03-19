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

}
