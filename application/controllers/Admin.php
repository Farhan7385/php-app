<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin  extends CI_Controller {

	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	 //load Model
    $this->load->model('admin_model');

    $this->load->library('session');

	
	}
	
	public function index()
	{
		$data['title'] = " Sign In  : Admin-ComingWeek";
		$this->load->view('admin/index',$data);	
  	}

    public function check_signin()
	{
		$this->form_validation->set_rules('email','Email ID','trim|required|valid_email');
      	$this->form_validation->set_rules('password','Password','trim|required|alpha_numeric|min_length[5]|max_length[10]');
      	if ($this->form_validation->run() == FALSE)
	    {
	       $this->session->set_flashdata('message', 'Sign In Error');
	       redirect(base_url('admin'));
	    }
	    else
      	{
      		$email = $this->input->post('email');
			$password = $this->input->post('password');

			    $res = $this->admin_model->check_signin($email,$password);
			    
			    if($res > 0)
			    {

 				$this->session->set_userdata('admin_email',$email);

			    $this->session->set_flashdata('message', 'Sign In Successful');
			   redirect(base_url('admin-home'));
			    }
			    else
			    {
			    	$this->session->set_flashdata('message', 'Sign In Error');
	       			redirect(base_url('admin'));
			    }			    
      	}
	}
    
    public function home()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['title'] = " Home  : Admin-ComingWeek";
				$this->load->view('admin/home',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
    }

    public function signout()
	{
		$this->session->unset_userdata('admin_email');
		$this->session->unset_userdata('subject_id');
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
    
    public function menu()
	{		
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['title'] = " Menu  : Admin-ComingWeek";
				$data['menu_list'] = $this->admin_model->getMenu();
				$this->load->view('admin/menu',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
    }
    
    public function add_menu()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['title'] = " Add Menu  : Admin-ComingWeek";
				$this->load->view('admin/add_menu',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}		
    }

    public function insert_menu()
    {
    	$this->form_validation->set_rules('menu','Menu','trim|required|is_unique[menu.menu_name]|is_unique[sub_menu.sub_menu_name]');
    	$this->form_validation->set_rules('title','Title','trim|required');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
      	if ($this->form_validation->run() == FALSE)
	    {

	       $this->session->set_flashdata('message', 'Menu is required with unique value');
	       redirect(base_url('admin-add-menu'));
	    }
	    else
      	{

      		$data = array(  	'menu_name' => url_title($this->input->post('menu'), '-', true),
      			'title' => $this->input->post('title'),
      			'metad' => $this->input->post('metad'),
                    'visibility' => "visible",
      							'action' => "enable"
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->insert_menu($data);

			    $this->session->set_flashdata('message', 'Menu added Successfully');
			    redirect(base_url('admin-menu'));
      	}
    }

    public function menu_action()
    {
    	    $id = $this->input->post('menu_id');
      		$data = array(  	'action' => $this->input->post('menu_action')
							);
			    $data = $this->security->xss_clean($data); // xss filter
			  $res = $this->admin_model->updateMenuaction($data,$id);

			   if ($res == true)
			    {
			   	 $this->session->set_flashdata('message', 'Menu '.$this->input->post('menu_action').' Successfully');
			   	 redirect(base_url('admin-menu'));
			   	}
			   	else
			   	{
			   	 $this->session->set_flashdata('message', 'Menu '.$this->input->post('menu_action').' Failed');
			   	 redirect(base_url('admin-menu'));
			   	}
    }

    public function menu_visibility()
    {
          $id = $this->input->post('menu_id');
          $data = array(    'visibility' => $this->input->post('menu_visibility')
              );
          $data = $this->security->xss_clean($data); // xss filter
        $res = $this->admin_model->updateMenuaction($data,$id);

         if ($res == true)
          {
           $this->session->set_flashdata('message', 'Menu '.$this->input->post('menu_visibility').' Successfully');
           redirect(base_url('admin-menu'));
          }
          else
          {
           $this->session->set_flashdata('message', 'Menu '.$this->input->post('menu_visibility').' Failed');
           redirect(base_url('admin-menu'));
          }
    }

    public function edit_menu()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$id = $this->input->post('menu_id');

				$data['menu_list'] = $this->admin_model->getMenuIDwise($id);
				$data['title'] = " Edit Menu  : Admin-ComingWeek";
				$this->load->view('admin/edit_menu',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}	
    }
    
    public function update_menu()
    {
    	$this->form_validation->set_rules('menu','Menu','trim|required');
    	$this->form_validation->set_rules('title','Title','trim|required');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
      	if ($this->form_validation->run() == FALSE)
	    {
	        $this->session->set_flashdata('message', 'Menu is required');
	      	redirect(base_url('admin-edit-menu'));
	    }
	    else
      	{
      		$id = $this->input->post('menu_id');

      		$data = array(  	'menu_name' => url_title($this->input->post('menu'), '-', true),
      			'title' => $this->input->post('title'),
      			'metad' => $this->input->post('metad'),
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->update_menu($data,$id);

			    $this->session->set_flashdata('message', 'Menu updated Successfully');
			    redirect(base_url('admin-menu'));
      	}
    }

    public function delete_menu()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$id = $this->input->post('menu_id');
				$res = $this->admin_model->delete_menu($id);

				if ($res == TRUE) 
				{
					$this->admin_model->delete_submenu_menu($id);
					$this->admin_model->delete_blog_menu($id);
					$this->admin_model->delete_live_blog_menu($id);
					 $this->session->set_flashdata('message', 'Menu deleted Successfully');
					 redirect(base_url('admin-menu'));
				}
				else
				{
					 $this->session->set_flashdata('message', 'Menu not deleted');
					 redirect(base_url('admin-menu'));
				}

			}
		else
			{
				redirect(base_url('admin'));
			}
	}

    public function blog()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['emp'] = $this->admin_model->getEmp();
				$data['blog_list'] = $this->admin_model->getBlog();
				$data['title'] = " Blog  : Admin-ComingWeek";
				$this->load->view('admin/blog',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
	}
    
    public function add_blog()
	{
		
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['menu_list'] = $this->admin_model->getMenu();
				$data['title'] = " Add Blog  : Admin-ComingWeek";
				$this->load->view('admin/add_blog',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}	
    }

    public function insert_blog()
    {
    	$this->form_validation->set_rules('title','Title','trim|required|is_unique[blog.title]');
    	$this->form_validation->set_rules('wtitle','Writing Title','trim');
    	$this->form_validation->set_rules('url','URL','trim|required|is_unique[blog.url]');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
    	$this->form_validation->set_rules('menu','Menu','trim|required');
      	if ($this->form_validation->run() == FALSE)
	    {
	        $this->session->set_flashdata('message', 'Title and Menu fields are required');
	      	redirect(base_url('admin-add-blog'));
	    }
	    else
      	{
      		if(empty($_FILES['pic']['name']))
      		{
      			$data = array(  	
                    			'menu_id' => $this->input->post('menu'),
      							'title' => $this->input->post('title'),
      							'wtitle' => $this->input->post('wtitle'),
      							'url' => url_title($this->input->post('url'), '-', true),
      							'metad' => $this->input->post('metad'),
      							'description' => $this->input->post('description'),
      							'sub_menu_id' => $this->input->post('sub_menu_id'),
      							'popular' => 'no',
      							'homepage' => 'no',
      							'img_url' => $this->input->post('img_url'),
                                'alt' => $this->input->post('alt'),
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->insert_blog($data);

			    $this->session->set_flashdata('message', 'Blog added Successfully');
			    redirect(base_url('admin-blog'));
      		}
      		else
      		{
      			$this->form_validation->set_rules('alt','Image Alt','trim|required');
      			if ($this->form_validation->run() == FALSE)
			    {
			        $this->session->set_flashdata('message', 'Image Alt field is required');
			      	redirect(base_url('admin-add-blog'));
			    }
			    else
			    {
			    	 $getimagesize  = getimagesize($_FILES['pic']['tmp_name']);
                      $w = $getimagesize[0];
                      $h = $getimagesize[1];
		      			$config['file_name'] = $_FILES['pic']['name'];
		      		    $config['upload_path'] = 'assets/uploads/';
		                $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
						//Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);

		                if($this->upload->do_upload('pic'))
		                {
		                	$uploadData = $this->upload->data();
		                  $config['image_library'] = 'gd2';
		                                  $config['source_image'] = './assets/uploads/'.$uploadData['file_name'];
		                                  $config['create_thumb'] = FALSE;
		                                  $config['maintain_ratio'] = FALSE;
		                                  $config['quality'] = '50%';
		                                  $config['width'] = $w - 1;
		                                  $config['height'] = $h - 1;
		                                  $config['new_image'] = './assets/uploads/'.$uploadData['file_name'];
		                                  $this->load->library('image_lib',$config);
		                                  $this->image_lib->resize();
		                    $picture = $uploadData['file_name'];
		                    $data = array(  	
		                    			'menu_id' => $this->input->post('menu'),
		      							'title' => $this->input->post('title'),
		      							'wtitle' => $this->input->post('wtitle'),
		      							'url' => url_title($this->input->post('url'), '-', true),
		      							'metad' => $this->input->post('metad'),
		      							'description' => $this->input->post('description'),
		      							'sub_menu_id' => $this->input->post('sub_menu_id'),
		      							'upload' => $picture,
		      							'alt' => $this->input->post('alt'),
		      							'popular' => 'no',
		      							'homepage' => 'no'      							
									);
					    $data = $this->security->xss_clean($data); // xss filter
					    $this->admin_model->insert_blog($data);

					    $this->session->set_flashdata('message', 'Blog added Successfully');
					    redirect(base_url('admin-blog'));
		                }
		                else
		                {
		                    $this->session->set_flashdata('message', 'Uploading Error');
			      			redirect(base_url('admin-add-blog'));
		                }
			    }
      		}     		     
      		
      	}
    }
    
    public function edit_blog()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$id = $this->input->post('b_id');

				$data['b_list'] = $this->admin_model->getBlogIDwise($id);
				$data['menu_list'] = $this->admin_model->getMenu();			
				$data['title'] = " Edit Blog  : Admin-ComingWeek";	
				$this->load->view('admin/edit_blog',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
	}

	public function update_blog()
    {
    	$this->form_validation->set_rules('title','Title','trim|required');
    	$this->form_validation->set_rules('wtitle','Writing Title','trim');
    	$this->form_validation->set_rules('url','URL','trim|required');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
    	$this->form_validation->set_rules('menu','Menu','trim|required');
      	if ($this->form_validation->run() == FALSE)
	    {
	        $this->session->set_flashdata('message', 'All fields are required');
	      	redirect(base_url('admin-edit-blog'));
	    }
	    else
      	{
      		$id = $this->input->post('b_id');

      		if(!empty($_FILES['pic']['name']))
      		{
      			$this->form_validation->set_rules('alt','Image Alt','trim|required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('message', 'Image Alt field is required');
                    redirect(base_url('admin-add-blog'));
                }
                else
                {
                	$getimagesize  = getimagesize($_FILES['pic']['tmp_name']);
                      $w = $getimagesize[0];
                      $h = $getimagesize[1];
		      			$config['file_name'] = $_FILES['pic']['name'];
		      		    $config['upload_path'] = 'assets/uploads/';
		                $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);

		                if($this->upload->do_upload('pic'))
		                {
		                	$uploadData = $this->upload->data();
		                    $config['image_library'] = 'gd2';
		                                  $config['source_image'] = './assets/uploads/'.$uploadData['file_name'];
		                                  $config['create_thumb'] = FALSE;
		                                  $config['maintain_ratio'] = FALSE;
		                                  $config['quality'] = '50%';
		                                  $config['width'] = $w - 1;
		                                  $config['height'] = $h - 1;
		                                  $config['new_image'] = './assets/uploads/'.$uploadData['file_name'];
		                                  $this->load->library('image_lib',$config);
		                                  $this->image_lib->resize();
		                    $picture = $uploadData['file_name'];
		                    $data = array(  	
		                    			'menu_id' => $this->input->post('menu'),
		      							'title' => $this->input->post('title'),
		      							'wtitle' => $this->input->post('wtitle'),
		      							'url' => url_title($this->input->post('url'), '-', true),
		      							'metad' => $this->input->post('metad'),
		      							'description' => $this->input->post('description'),
		      							'sub_menu_id' => $this->input->post('sub_menu_id'),
		      							'upload' => $picture,
		      							'img_url' => '',
                                        'alt' => $this->input->post('alt'),
		      							'popular' => $this->input->post('popular'),
		      							'homepage' => $this->input->post('homepage')
									);
					    $data = $this->security->xss_clean($data); // xss filter
					    $this->admin_model->update_blog($data,$id);

					    $this->session->set_flashdata('message', 'Blog updated Successfully');
					    redirect(base_url('admin-blog'));
		                }
		                else
		                {
		                    $this->session->set_flashdata('message', 'Uploading Error');
			      			redirect(base_url('admin-edit-blog'));
		                }
                }
      		}
      		elseif(!empty($this->input->post('img_url')))
      		{
      			$data = array(  	
      							'menu_id' => $this->input->post('menu'),
      							'title' => $this->input->post('title'),
      							'wtitle' => $this->input->post('wtitle'),
      							'url' => url_title($this->input->post('url'), '-', true),
      							'metad' => $this->input->post('metad'),
      							'description' => $this->input->post('description'),
      							'sub_menu_id' => $this->input->post('sub_menu_id'),
      							'popular' => $this->input->post('popular'),
      							'homepage' => $this->input->post('homepage'),
      							'upload' => '',
      							'img_url' => $this->input->post('img_url'),
                                'alt' => $this->input->post('alt'),
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->update_blog($data,$id);

			    $file_name = $this->input->post('file_name');
			    if($file_name)
                {
                    unlink("assets/uploads/".$file_name);                    
                }

			    $this->session->set_flashdata('message', 'Blog updated Successfully');
			    redirect(base_url('admin-blog'));
      		}
      		else
      		{
      			$data = array(  	
      							'menu_id' => $this->input->post('menu'),
      							'title' => $this->input->post('title'),
      							'wtitle' => $this->input->post('wtitle'),
      							'url' => url_title($this->input->post('url'), '-', true),
      							'metad' => $this->input->post('metad'),
      							'description' => $this->input->post('description'),
      							'sub_menu_id' => $this->input->post('sub_menu_id'),
      							'popular' => $this->input->post('popular'),
      							'homepage' => $this->input->post('homepage'),
      							'img_url' => $this->input->post('img_url'),
                                'alt' => $this->input->post('alt'),
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->update_blog($data,$id);

			    $this->session->set_flashdata('message', 'Blog updated Successfully');
			    redirect(base_url('admin-blog'));
      		}

      	}
    }

	public function delete_blog()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$id = $this->input->post('b_id');
				$getImg = $this->admin_model->getBlogIDwise($id);
				foreach($getImg as $img)
				{
					$image = $img->upload;
				} 
				$res = $this->admin_model->delete_blog($id);

				if ($res == TRUE) 
				{
					if(!empty($image))
					{
						unlink("assets/uploads/".$image);						
					}
					$this->admin_model->delete_live_blog($id);
					 $this->session->set_flashdata('message', 'Blog deleted Successfully');
					 redirect(base_url('admin-blog'));
				}
				else
				{
					 $this->session->set_flashdata('message', 'Blog not deleted');
					 redirect(base_url('admin-blog'));
				}

			}
		else
			{
				redirect(base_url('admin'));
			}
	}

	public function emp()
	{
		
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['emp_list'] = $this->admin_model->getEmp();
				$data['qa_list'] = $this->admin_model->getQA();
				$data['title'] = " Emp  : Admin-ComingWeek";
				$this->load->view('admin/emp',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
    }

	public function add_emp()
    {
        if (($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != "")) 
        {
        	$data['title'] = " Add QA  : Admin-ComingWeek";
            $this->load->view('admin/add_emp',$data);
        } 
        else 
        {
            redirect(base_url('admin'));
        }
    }

    public function insert_emp()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[emp_login.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required with unique value of Username!');
            redirect(base_url('admin-add-emp'));
        } else {

            $data = array('username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->insert_emp($data);

            $this->session->set_flashdata('message', 'Emp added Successfully');
            redirect(base_url('admin-add-emp'));
        }
    }

    public function edit_emp()
    {
        if (($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != "")) {
            $id = $this->input->post('id');

            $data['emp'] = $this->admin_model->getEmpIDwise($id);
            $data['title'] = " Edit Emp  : Admin-ComingWeek";
            $this->load->view('admin/edit_emp', $data);
        } else {
            redirect(base_url('admin'));
        }
	}

    public function update_emp()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required with unique value of Username!');
            redirect(base_url('admin-edit-emp'));
        } else {
            $id = $this->input->post('id');

            $data = array('username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->update_emp($data, $id);

            $this->session->set_flashdata('message', 'Emp edited Successfully');
            redirect(base_url('admin-emp'));
        }
    }

    public function assign_emp()
    {
        $this->form_validation->set_rules('assign_blog', 'Blog', 'trim|required');
        $this->form_validation->set_rules('assign_emp', 'Emp', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required');
            redirect(base_url('admin-blog'));
        } else {
            $id = $this->input->post('assign_blog');

            $data = array('emp_id' => $this->input->post('assign_emp'),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->assign_blog($data, $id);

            $this->session->set_flashdata('message', 'Blog Assigned Successfully');
            redirect(base_url('admin-blog'));
        }
    }

    public function unassign_emp()
    {
        $id = $this->input->post('b_id');
        $data = array('emp_id' => '',
        );
        $data = $this->security->xss_clean($data); // xss filter
        $res = $this->admin_model->unassign_blog($data, $id);

        if ($res == true) {
            $this->session->set_flashdata('message', 'Blog Un-Assigned Successfully');
            redirect(base_url('admin-blog'));
        } else {
            $this->session->set_flashdata('message', 'Blog Un-Assigned Failed');
            redirect(base_url('admin-blog'));
        }
    }

    public function view_blog()
    {
        if (($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != "")) 
        {

            $id = $this->input->post('b_id');
            $data['b_des'] = $this->admin_model->getBlogIDwise($id);
            $data['title'] = " View Blog  : Admin-ComingWeek";
            $this->load->view('admin/view_blog', $data);
        } 
        else 
        {
            redirect(base_url('admin-blog'));
        }

    }

    public function blog_approval()
    {
        $id = $this->input->post('b_id');
        $data = array('approval' => $this->input->post('blog_action'),
        );
        $data = $this->security->xss_clean($data); // xss filter
        $res = $this->admin_model->updateBlogApproval($data, $id);

        if ($res == true) 
        {
            if ($this->input->post('blog_action') == 'live') 
            {
                $query = $this->admin_model->getBlogIDwise($id);
                foreach ($query as $row) 
                {
                    $this->db->insert('live_blog', $row);
                }
            } 
            else 
            {
                $this->db->where('id', $id);
                $query = $this->db->delete('live_blog');
            }
            $this->session->set_flashdata('message', 'Blog ' . $this->input->post('blog_action') . ' Successfully');
            redirect(base_url('admin-blog'));
        } 
        else 
        {
            $this->session->set_flashdata('message', 'Blog ' . $this->input->post('blog_action') . ' Failed');
            redirect(base_url('admin-blog'));
        }
    }
	
	public function sub_menu()
	{
		
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['sub_menu_list'] = $this->admin_model->getSubMenu();
				$data['title'] = " Sub Menu  : Admin-ComingWeek";
				$this->load->view('admin/sub_menu',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}	
    }

    public function add_sub_menu()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['menu_list'] = $this->admin_model->getMenu();
				$data['title'] = " Add Sub Menu  : Admin-ComingWeek";
				$this->load->view('admin/add_sub_menu',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
	}

    public function insert_sub_menu()
    {
    	$this->form_validation->set_rules('sub_menu','Sub Menu','trim|required|is_unique[menu.menu_name]|is_unique[sub_menu.sub_menu_name]');
    	$this->form_validation->set_rules('title','Title','trim|required');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
      	if ($this->form_validation->run() == FALSE)
	    {
	       $this->session->set_flashdata('message', 'Both fields are required with Unique value of Sub Menu!');
	       redirect(base_url('admin-add-sub-menu'));
	    }
	    else
      	{
      		$data = array(  	'menu_id' => $this->input->post('menu_id'),
      							'sub_menu_name' => url_title($this->input->post('sub_menu'), '-', true),
      							'title' => $this->input->post('title'),
      							'metad' => $this->input->post('metad'),
      							'visibility' => "visible",
      							'action' => "enable"
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->insert_sub_menu($data);

			    $this->session->set_flashdata('message', 'Sub Menu added Successfully');
			    redirect(base_url('admin-sub-menu'));
      	}
    }

    public function edit_sub_menu()
    {
    	if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
    	{
    		$id = $this->input->post('sub_menu_id');

			$data['sub_menu_list'] = $this->admin_model->getSubMenuIDwise($id);
			$data['menu_list'] = $this->admin_model->getMenu();
			$data['title'] = " Edit Sub Menu  : Admin-ComingWeek";
			$this->load->view('admin/edit_sub_menu',$data);
    	}
    	else
    	{
    		redirect(base_url('admin'));
    	}
    }

    public function update_sub_menu()
    {
    	$this->form_validation->set_rules('menu_id','Menu','trim|required');
    	$this->form_validation->set_rules('title','Title','trim|required');
    	$this->form_validation->set_rules('metad','Meta Description','trim|required');
    	$this->form_validation->set_rules('sub_menu','Sub Menu','trim|required');    	
      	if ($this->form_validation->run() == FALSE)
	    {
	        $this->session->set_flashdata('message', 'All fields are required');
	      	redirect(base_url('admin-edit-sub-menu'));
	    }
	    else
      	{
      		$id = $this->input->post('sub_menu_id');

      		$data = array(  	'menu_id' => $this->input->post('menu_id'),
      							'sub_menu_name' => url_title($this->input->post('sub_menu'), '-', true),
      							'title' => $this->input->post('title'),
      			'metad' => $this->input->post('metad'),
							);
			    $data = $this->security->xss_clean($data); // xss filter
			    $this->admin_model->update_Submenu($data,$id);

			    $this->session->set_flashdata('message', 'Sub Menu updated Successfully');
			    redirect(base_url('admin-sub-menu'));
      	}
    }

    public function delete_sub_menu()
	{
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$id = $this->input->post('sub_menu_id');
				$res = $this->admin_model->delete_submenu($id);

				if ($res == TRUE) 
				{
					$this->admin_model->delete_blog_submenu($id);
					$this->admin_model->delete_live_blog_submenu($id);
					 $this->session->set_flashdata('message', 'Sub Menu deleted Successfully');
					 redirect(base_url('admin-sub-menu'));
				}
				else
				{
					 $this->session->set_flashdata('message', 'Sub Menu not deleted');
					 redirect(base_url('admin-sub-menu'));
				}

			}
		else
			{
				redirect(base_url('admin'));
			}
	}

	public function submenu_action()
    {
    	    $id = $this->input->post('sub_menu_id');
      		$data = array(  	'action' => $this->input->post('submenu_action')
							);
			    $data = $this->security->xss_clean($data); // xss filter
			  $res = $this->admin_model->update_Submenu($data,$id);

			   if ($res == true)
			    {
			   	 $this->session->set_flashdata('message', 'Sub Menu '.$this->input->post('submenu_action').' Successfully');
			   	 redirect(base_url('admin-sub-menu'));
			   	}
			   	else
			   	{
			   	 $this->session->set_flashdata('message', 'Sub Menu '.$this->input->post('submenu_action').' Failed');
			   	 redirect(base_url('admin-sub-menu'));
			   	}
    }

    public function submenu_visibility()
    {
          $id = $this->input->post('sub_menu_id');
          $data = array(    'visibility' => $this->input->post('submenu_visibility')
              );
          $data = $this->security->xss_clean($data); // xss filter
        $res = $this->admin_model->update_Submenu($data,$id);

         if ($res == true)
          {
           $this->session->set_flashdata('message', 'Sub Menu '.$this->input->post('submenu_visibility').' Successfully');
           redirect(base_url('admin-sub-menu'));
          }
          else
          {
           $this->session->set_flashdata('message', 'Sub Menu '.$this->input->post('submenu_visibility').' Failed');
           redirect(base_url('admin-sub-menu'));
          }
    }

    public function select_sub_menu()
    {
            $menu_id = $this->input->post('menu');

            $sub_menu = $this->admin_model->getSubMenu_MenuIDwise($menu_id);

            if ($sub_menu) 
            {       
		       foreach ($sub_menu as $sml)
		            {
		                ?>
		             <option value="<?php echo $sml->id;?>"><?php echo $sml->sub_menu_name;?></option>		         
		        <?php
		            }                    
            }
            else
            {
              ?>
                       <option value="">Choose Sub Menu</option>
              <?php
            }            
    }

    public function qa()
	{
		
		if(($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != ""))
			{
				$data['qa_list'] = $this->admin_model->getQA();
				$data['title'] = " QA  : Admin-ComingWeek";
				$this->load->view('admin/qa',$data);
			}
		else
			{
				redirect(base_url('admin'));
			}
    }

    public function add_qa()
    {
        if (($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != "")) 
        {
        	$data['title'] = " Add QA  : Admin-ComingWeek";
            $this->load->view('admin/add_qa',$data);
        } 
        else
        {
            redirect(base_url('admin'));
        }
    }

    public function insert_qa()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[qa_login.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required with unique value of Username!');
            redirect(base_url('admin-add-qa'));
        } else {

            $data = array('username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->insert_qa($data);

            $this->session->set_flashdata('message', 'QA added Successfully');
            redirect(base_url('admin-add-qa'));
        }
    }

    public function edit_qa()
    {
        if (($this->session->userdata('admin_email')) && ($this->session->userdata('admin_email') != "")) 
        {
            $id = $this->input->post('id');

            $data['qa'] = $this->admin_model->getQAIDwise($id);
            $data['title'] = "Edit QA  : Admin-ComingWeek";
            $this->load->view('admin/edit_qa', $data);
        } 
        else 
        {
            redirect(base_url('admin'));
        }
	}

    public function update_qa()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required with unique value of Username!');
            redirect(base_url('admin-edit-qa'));
        } else {
            $id = $this->input->post('id');

            $data = array('username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->update_qa($data, $id);

            $this->session->set_flashdata('message', 'QA edited Successfully');
            redirect(base_url('admin-qa'));
        }
    }

    public function assign_emp_qa()
    {
        $this->form_validation->set_rules('assign_qa', 'QA', 'trim|required');
        $this->form_validation->set_rules('assign_emp', 'Emp', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Fields are required');
            redirect(base_url('admin-emp'));
        } else {
            $id = $this->input->post('assign_emp');

            $data = array('qa_id' => $this->input->post('assign_qa'),
            );
            $data = $this->security->xss_clean($data); // xss filter
            $this->admin_model->assign_emp_qa($data, $id);

            $this->session->set_flashdata('message', 'Emp Assigned Successfully');
            redirect(base_url('admin-emp'));
        }
    }
}
?>