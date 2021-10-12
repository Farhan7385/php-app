<?php class Qa_model extends CI_Model {

	public function check_signin($username, $password)
    {
        $this->db->where('password', md5($password));
        $this->db->where('username', $username);
        $query = $this->db->get('qa_login');
        return $query->num_rows();
    }

    public function getId($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('qa_login');
        return $query->result();
    }

    public function getEmp() 
    {   
        $this->db->order_by('id', 'DESC');
        $this->db->where('qa_id', $this->session->userdata('qa_id'));
        $query = $this->db->get('emp_login');
        return $query->result();
    }

    public function getBlog($emp_id) 
    {   
        $this->db->order_by('b.id','DESC');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('e.qa_id', $this->session->userdata('qa_id'));
        $this->db->select('*, e.id as eid,b.id as id');
        $this->db->from('blog as b');
        $this->db->join('emp_login as e','e.id = b.emp_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_Blog($id) 
    {   
        $this->db->where('id',$id);
        $query=$this->db->get('blog');
        return $query->result();
    }

    public function update_blog($data,$id) 
    {
        $this->db->where('id',$id);
        $query=$this->db->update('blog',$data);
    }
}
?>