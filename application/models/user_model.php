<?php
class User_model extends CI_Model
{
	//Pega os usuários da tabela
	public function get($id = false)
	{
		if($id) $this->db->where('id', $id);
		$this->db->order_by('email', 'asc');
		$get = $this->db->get('usuarios');
		if($id) return $get->row_array();
		if($get->num_rows > 0) return $get->result_array();
		return array();
	}
	
	public function total()
	{
		return $this->db->count_all_results('usuarios');
	}
	//Cria usuários
	public function create($data)
	{
		$data['senha'] = md5($data['senha']);
		return $this->db->insert('usuarios', $data);
	}
	//Valida usuário para efetuar o login
	public function validate($email, $password)
	{
		$this->db->where('email', $email)->where('senha', md5($password));
		$get = $this->db->get('usuarios');
		
		if($get->num_rows() > 0) return $get->row_array();
		
		return array();
	}
	//Faz a atualização de informações do usuário
	public function update($id, $data)
	{
		if(isset($data['senha']))
			$data['senha'] = md5($data['senha']);
		$this->db->where('id', $id);
		$update = $this->db->update('usuarios', $data);
		
		return $update;
	}
	//Deleta usuário
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('usuarios');
	}

	//Recovery pass of user
	public function recovery($email, $data)
	{
		$this->db->where('email', $email);
		$this->db->update('usuarios', $data);

		return (bool) $this->db->affected_rows();
	}

	//Confirmar reset pass
	public function reset_pass($email, $recoverKey, $data)
	{
		$this->db->where('email', $email);
		$this->db->where('recoverKey', $recoverKey);
		$this->db->update('usuarios', $data);

		return (bool) $this->db->affected_rows();
	}
	
}
