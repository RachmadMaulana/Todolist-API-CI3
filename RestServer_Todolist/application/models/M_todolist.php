<?php 

class M_todolist extends CI_Model{


    public function tambahKegiatan($data){
        $this->db->insert('kegiatan',$data);
        return $this->db->affected_rows();
    }



    public function getKegiatan($id = null){

        if($id == null){
            return $this->db->get('kegiatan')->result_array();
        }else{
            return $this->db->get_where('kegiatan',['user_id' => $id])->result_array();
        }

    }

    public function deleteKegiatan($user_id,$id_kegiatan){
        $this->db->where('id',$id_kegiatan);
        $this->db->where('user_id',$user_id);
        $this->db->delete('kegiatan');
        return $this->db->affected_rows();
    }

    public function editKegiatan($data,$id){
        $this->db->update('kegiatan',$data,['id' => $id]);
        return $this->db->affected_rows();
    }
}

?>