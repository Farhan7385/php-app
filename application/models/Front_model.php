<?php
class Front_model extends CI_Model {

public function getMenuVisible()
    {
        $this->db->where('visibility', 'visible');
        $this->db->where('action', 'enable');
        $query = $this->db->get('menu');
        return $query->result();
    }

public function getSubMenu($mv_id)
    {
        $this->db->where('visibility', 'visible');
        $this->db->where('action', 'enable');
        $this->db->where('menu_id', $mv_id);
        $query = $this->db->get('sub_menu');
        return $query->result();
    }

public function getMenuTitle($name)
    {    
        $this->db->where('action','enable');    
        $this->db->where('menu_name',$name);
        $query = $this->db->get('menu');
        return $query->row();
    }

public function getSubMenuTitle($name)
    {
        $this->db->where('m.action','enable');
        $this->db->where('s.action','enable');
        $this->db->where('s.sub_menu_name',$name);
        $this->db->select('*,m.title as mtitle,m.metad as mmetad');
        $this->db->from('menu as m');
        $this->db->join('sub_menu as s','s.menu_id = m.id');
        $query = $this->db->get();
        return $query->row();
    }

public function getBlog($name,$offset, $limit) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->limit($limit,$offset);
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('m.menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function getSubMenuBlog($name,$offset, $limit) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->limit($limit,$offset);
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('s.action','enable');
        $this->db->where('s.sub_menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid, s.id as sid,s.title as stitle,s.metad as smetad,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $this->db->join('sub_menu as s','s.id = b.sub_menu_id');
        $query = $this->db->get();
        return $query->result();
    }

public function load_getBlog($name,$blog_id,$limit) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->limit($limit);
        $this->db->where('b.id <',$blog_id);
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('m.menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function load_getSubMenuBlog($name,$blog_id,$limit) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->limit($limit);
        $this->db->where('b.id <',$blog_id);        
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('s.action','enable');
        $this->db->where('s.sub_menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid, s.id as sid,s.title as stitle,s.metad as smetad,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $this->db->join('sub_menu as s','s.id = b.sub_menu_id');
        $query = $this->db->get();
        return $query->result();
    }

public function getBdes($name,$name2) 
    {   
        $this->db->where('b.url',$name2);
        $this->db->where('m.menu_name',$name);
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->select('*, m.id as mid, b.id as bid,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function getSubMenuBdes($name,$name2) 
    {   
        $this->db->where('b.url',$name2);
        $this->db->where('s.sub_menu_name',$name);
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('s.action','enable');
        $this->db->select('*, m.id as mid, b.id as bid, s.id as sid,s.title as stitle,s.metad as smetad,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $this->db->join('sub_menu as s','s.id = b.sub_menu_id');
        $query = $this->db->get();
        return $query->result();
    }

public function insert_contact($data) 
    {
        if($this->db->insert('contact',$data))
        {
        return TRUE;    
        }
        else
        {
        return FALSE;   
        }
    }

public function popular_blogs()
    {
        $this->db->order_by('b.id','DESC');
        $this->db->limit(6);
        $this->db->where('b.popular', 'yes');
        $this->db->where('m.action','enable');
        $this->db->select('*, m.id as mid');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function homepage_blog()
    {
        $this->db->order_by('b.id','DESC');
        $this->db->limit(1);
        $this->db->where('b.homepage','yes');
        $this->db->where('m.action','enable');
        $this->db->select('*, m.id as mid');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function latest_blogs()
    {
        $this->db->where('b.homepage', 'no');
        $this->db->where('m.action','enable');
        $this->db->order_by('b.id','DESC');
        $this->db->limit(6);
        $this->db->select('*, m.id as mid');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

public function getMenuName($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->where('action', 'enable');
        $query = $this->db->get('menu');
        return $query->row();
    }

public function related_blogs($bid,$mid)
    {
        $this->db->where('menu_id', $mid);
        $this->db->where('id !=', $bid);
        $this->db->order_by('id','DESC');
        $this->db->limit(2);
        $query = $this->db->get('live_blog');
        return $query->result();
    }

public function getSitemap()
    {
        $this->db->where('m.action','enable');
        $this->db->select('*, m.id as mid, b.id as bid');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b', 'b.menu_id = m.id');
        $iQuery = $this->db->get();
        return $iQuery->result();
    }

    public function getMenu2()
    {
        $this->db->where('action', 'enable');
        $query = $this->db->get('menu');
        return $query->result();
    }

    public function getSubMenu2($mv_id)
    {
        $this->db->where('action', 'enable');
        $this->db->where('menu_id', $mv_id);
        $query = $this->db->get('sub_menu');
        return $query->result();
    }

    public function getBlog2($name) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('m.menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getSubMenuBlog2($name) 
    {   
        $this->db->order_by('b.id', 'DESC');
        $this->db->where('b.approval','live');
        $this->db->where('m.action','enable');
        $this->db->where('s.action','enable');
        $this->db->where('s.sub_menu_name',$name);
        $this->db->select('*, m.id as mid, b.id as bid, s.id as sid,s.title as stitle,s.metad as smetad,m.title as mtitle,m.metad as mmetad,b.title as title,b.metad as metad');
        $this->db->from('menu as m');
        $this->db->join('live_blog as b','b.menu_id = m.id');
        $this->db->join('sub_menu as s','s.id = b.sub_menu_id');
        $query = $this->db->get();
        return $query->result();
    }

}
?>