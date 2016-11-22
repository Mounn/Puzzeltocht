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

  public function GetInformatie(){
    return $this->db->get('informatie')->result();

  }

}
