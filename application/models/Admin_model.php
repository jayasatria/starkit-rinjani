<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getStatus()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                FROM `user` JOIN `user_role`
                ON `user`.`role_id`=`user_role`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function user()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUser($id)
    {
        $where = [
            'id' => $id
        ];
        return $this->db->get('user', $where)->row_array();
    }
    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }
}
