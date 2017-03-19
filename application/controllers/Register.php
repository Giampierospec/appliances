<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    /*First line loads the top template
      Second line loads the view you want to see A.K.A the content
      Third Line loads the footer
    */
    $this->load->view('templates/top');
    $this->load->view('register/register');
    $this->load->view('templates/bottom');
  }

}
