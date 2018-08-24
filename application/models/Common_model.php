<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
    public function get_search($key)
    {
        $this->db->like('fname', $key, 'both');
        return $this->db->get('users');
    }
    public function get($table, $where_field ='')
    {
      if($where_field !='')
      {
        $this->db->where($where_field);
      }
      return $this->db->get($table);
    }
}?>
