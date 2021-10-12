<?php
class Admin_model extends CI_Model {

public function check_signin($email,$password) 
	{	
		$this->db->where('password',md5($password));
		$this->db->where('email',$email);
        $query=$this->db->get('admin_login');
        return $query->num_rows();
    }

public function insert_menu($data) 
	{
		if($this->db->insert('menu',$data))
		{
		return TRUE;	
		}
		else
		{
		return FALSE;	
		}
    }

    public function getMenu() 
	{	
        $query=$this->db->get('menu');
        return $query->result();
    }

    public function updateMenuaction($data,$id)
	{
		$this->db->where('id',$id);
		$query = $this->db->update('menu',$data);
		if($query)
		{
		return TRUE;	
		}
		else
		{
		return FALSE;	
		}
	}

	public function getMenuIDwise($id) 
	{	
		$this->db->where('id',$id);
        $query=$this->db->get('menu');
        return $query->result();
    }

    public function update_menu($data,$id) 
	{
		$this->db->where('id',$id);
		$query=$this->db->update('menu',$data);
    }

    public function delete_menu($id) 
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('menu');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_submenu_menu($id) 
    {
        $this->db->where('menu_id',$id);
        $query = $this->db->delete('sub_menu');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_blog_menu($id) 
    {
        $this->db->where('menu_id',$id);
        $query = $this->db->delete('blog');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_live_blog_menu($id) 
    {
        $this->db->where('menu_id',$id);
        $query = $this->db->delete('live_blog');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getBlog() 
	{	
        $this->db->order_by('b.id','DESC');
        $this->db->select('*');
        $this->db->from('menu as m');
        $this->db->join('blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_blog($data) 
	{
		if($this->db->insert('blog',$data))
		{
		return TRUE;	
		}
		else
		{
		return FALSE;	
		}
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

 	public function delete_blog($id) 
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('blog');

		if($query)
		{
			return TRUE;
		}else{
			return FALSE;
		}
    }

    public function delete_live_blog($id) 
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('live_blog');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function getEmp() 
	{	
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('emp_login');
        return $query->result();
    }

    public function insert_emp($data)
    {
        if ($this->db->insert('emp_login', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function getEmpIDwise($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('emp_login');
        return $query->result();
    }

    public function update_emp($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('emp_login', $data);
    }

    public function assign_blog($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('blog', $data);
    }

    public function unassign_blog($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('blog', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBlogApproval($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('blog', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getSubMenu() 
	{	
        $query=$this->db->get('sub_menu');
        return $query->result();
    }

    public function insert_sub_menu($data) 
	{
		if($this->db->insert('sub_menu',$data))
		{
		return TRUE;	
		}
		else
		{
		return FALSE;	
		}
    }

    public function getSubMenuIDwise($id)
    {
    	$this->db->where('id',$id);
    	$query=$this->db->get('sub_menu');
    	return $query->result();
    }

    public function update_Submenu($data,$id) 
	{
		$this->db->where('id',$id);
		$query=$this->db->update('sub_menu',$data);
        if($query)
        {
        return TRUE;    
        }
        else
        {
        return FALSE;   
        }
    }

    public function getSubMenu_MenuIDwise($menu_id)
    {
    	$this->db->where('menu_id',$menu_id);
    	$query=$this->db->get('sub_menu');
    	return $query->result();
    }

    public function delete_submenu($id) 
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('sub_menu');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_blog_submenu($id) 
    {
        $this->db->where('sub_menu_id',$id);
        $query = $this->db->delete('blog');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_live_blog_submenu($id) 
    {
        $this->db->where('sub_menu_id',$id);
        $query = $this->db->delete('live_blog');

        if($query)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getQA() 
    {   
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('qa_login');
        return $query->result();
    }

    public function insert_qa($data)
    {
        if ($this->db->insert('qa_login', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function getQAIDwise($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('qa_login');
        return $query->result();
    }

    public function update_qa($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('qa_login', $data);
    }

    public function assign_emp_qa($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('emp_login', $data);
    }
}
?>