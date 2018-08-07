<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_import extends CI_Model {

    function __construct () {
        parent::__construct ();
    }

    function import($arrData) {
      
        foreach ($arrData as $each_data){
                $data = array(
                    'id_kota' => $each_data['1'],
                    'nama_kota' => $each_data['2'],
                );
                $this->db->insert('kota', $data);
            }

        if ($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* End of file ModelName.php */
