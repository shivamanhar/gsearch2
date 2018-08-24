<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Bappoint extends CI_Controller {
    function index()
    {
      $this->load->view('home');
    }
    function search()
    {
      header('Content-Type: application/json');
      $this->load->model('common_model');
      $key = $this->input->post('search_key');
      $users = $this->common_model->get_search($key);
      //$this->output->enable_profiler();
      echo json_encode($users->result());
    }
    function get_data()
    {
      header('Content-Type: application/json');
      $this->load->model('common_model');
      $user_id = $this->input->post('user_id');
      $user_data = $this->common_model->get('user_data', array('user_id'=>$user_id));
      //$this->output->enable_profiler();
      echo json_encode($user_data->result());
    }
}
?>
