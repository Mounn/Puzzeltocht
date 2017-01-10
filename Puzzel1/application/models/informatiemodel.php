<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class InformatieModel extends CI_Model 
{

  function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
  }
  
    /*public function Informatie($id,$title,$information,$picture) 
    {
    
    $data = array(
      'id' => $id, 
      'titel' => $title,
      'informatie' => $information,
      'foto' => $picture
      );
      
    $result = $this->db->get('informatie', $data);
    return $data;
  }
  */

public function GetLocatie(){
    return $this->db->get('locations')->result();

  }

/*
  function get_locatie_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('locations');
    return $query->result();
  }
  

public function my_data()
{
  $userid = $this->session->userdata('userid');

  $data = array();
  $this->db->select('*');
  $this->db->from('user_profile');
  $this->db->where('userid', $userid);
  $query = $this->db->get();

  //this will return multiple rows or object of arrays
  //return $query->result();
  // you need to send only single row
    return $query->row();
  }

*/
}