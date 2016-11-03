<?php

/**
 * Created by PhpStorm.
 * User: shamonpc
 * Date: 02-Nov-16
 * Time: 11:41 AM
 */
class Dashboard_model extends CI_Model
{
    public function get_header($type)
    {
        return $this->db
            ->where('user_type',$type)
            ->get('header');
    }
    public function get_townplanners($type)
    {
        return $this->db
            ->where('user_type',$type)
            ->get('users');
    }
    public function get_allplans($id)
    {
        return $this->db
            ->order_by('id','desc')
            ->where('bi_id',$id)
            ->get('applications');
    }
    public function get_pendingapps()
    {
        return $this->db
            ->order_by('id','desc')
            ->where_in('status',['1','2'])
            ->get('applications');
    }
    public function get_localbody()
    {
        $sql= "SELECT * FROM users WHERE user_type in('5','6')";
        return $this->db->query($sql);
    }
}