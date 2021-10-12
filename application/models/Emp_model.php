<?php class Emp_model extends CI_Model {

	public function check_signin($username, $password)
    {
        $this->db->where('password', md5($password));
        $this->db->where('username', $username);
        $query = $this->db->get('emp_login');
        return $query->num_rows();
    }

    public function getId($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('emp_login');
        return $query->result();
    }

    public function getBlog() 
    {   
        $this->db->order_by('b.id','DESC');
        $this->db->where('emp_id', $this->session->userdata('emp_id'));
        $this->db->select('*');
        $this->db->from('menu as m');
        $this->db->join('blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getBlogIDwise($id) 
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

    public function view_Blog($id) 
    {   
        $this->db->where('emp_id', $this->session->userdata('emp_id'));
        $this->db->where('id',$id);
        $query=$this->db->get('blog');
        return $query->result();
    }

    public function getMenu() 
    {   
        $query=$this->db->get('menu');
        return $query->result();
    }

    public function getMenuIDwise($id) 
    {   
        $this->db->where('id',$id);
        $query=$this->db->get('menu');
        return $query->result();
    }

    public function getSubMenuIDwise($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('sub_menu');
        return $query->result();
    }
}
?>