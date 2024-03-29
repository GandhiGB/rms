<?php
class Crud_model extends CI_Model {
  function fetch_data($search_value){
    $this->db->select("*");
    $this->db->from("student");

    if($search_value != '') {

      $this->db->like('lname', $search_value, 'after');
      $this->db->or_like('fname', $search_value, 'after');
      $this->db->or_like('mname', $search_value, 'after');
      $this->db->or_like('course', $search_value, 'after');
    }

    $this->db->order_by('lname', 'ASC');
    return $this->db->get();
  }

  function fetch_req($id){
    $this->db->select("*");
    $this->db->from("requirement");

    if($id != '') {

      $this->db->where('student_id', $id);

    }

    return $this->db->get();
  }
}
?>