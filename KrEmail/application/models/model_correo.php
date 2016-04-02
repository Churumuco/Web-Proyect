<?php 
	
	class Model_Correo extends CI_Model{
	private $_ci;
	
		public function insertEmail($data){
			$this->db->insert('emails',$data);
		}
		
		public function getAllBySalida($id,$pendiente){
        $consulta="SELECT `id`,`destinatario`,`asunto`,`mensaje` FROM `emails` WHERE id_user= '$id' and estado ='$pendiente'";
        $query = $this->db->query("$consulta");
        return $query->result_array();
		}

		public function getAllByEnviado($id,$enviado){
        $consulta="SELECT `id`,`destinatario`,`asunto`,`mensaje` FROM `emails` WHERE id_user= '$id' and estado ='$enviado'";
        $query = $this->db->query("$consulta");
        return $query->result_array();
		}

		public function getEmailId($cid,$id){
			$consulta="SELECT * FROM `emails` WHERE id = '$cid' and id_user = '$id'" ;
        	$query = $this->db->query("$consulta");
        	return $query->result_array();
		}

		public function updateEmail($idc,$data){
			$this->db->where('id',$idc);
			$this->db->update('emails',$data);
		}
		
		public function getIdEmail($idc){
			$consulta='SELECT id_user FROM `emails` WHERE id ='.$idc;
        	$query = $this->db->query("$consulta");
        	return $query->result_array();
		}

		public function deleteEmail($cid,$id){
			$this->db->where('id',$cid);
			$this->db->where('id_user',$id);
			$this->db->delete('emails');
			if ($this->db->affected_rows() == true) {
				return true;
			}else{
				return false;
			}
		}

		public function getCorreo(){
			$this->db->where('estado','pendiente');
			$this->db->select('*');
			$this->db->from('emails');
			$query = $this->db->get();
			return($query->result_array());
		}

		public function updateEstadoCorreo($id){
			$this->db->where('id', $id);
			$this->db->set('estado','enviado');
			$this->db->update("emails");
		}
	}