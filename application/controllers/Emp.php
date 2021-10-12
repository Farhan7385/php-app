<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emp extends CI_Controller
{

    public function __construct()
    {
        //call CodeIgniter's default Constructor
        parent::__construct();

        //load Model
        $this->load->model('emp_model');

        $this->load->library('session');

    }

    public function index()
    {
        $data['title'] = " Sign In  : Emp-ComingWeek";
        $this->load->view('emp/index',$data);

    }

    public function check_signin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Sign In Error');
            redirect(base_url('emp'));
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $res = $this->emp_model->check_signin($username, $password);

            if ($res > 0) {

                $res2 = $this->emp_model->getId($username);
                foreach ($res2 as $r) {
                    $this->session->set_userdata('emp_id', $r->id);
                }

                $this->session->set_flashdata('message', 'Sign In Successful');
                redirect(base_url('emp-blogs'));
            } else {
                $this->session->set_flashdata('message', 'Sign In Error');
                redirect(base_url('emp'));
            }

        }

    }

    public function signout()
    {
        $this->session->unset_userdata('emp_id');
        $this->session->sess_destroy();
        redirect(base_url('emp'));
    }

   public function blogs()
    {
        if (($this->session->userdata('emp_id')) && ($this->session->userdata('emp_id') != ""))
        {
            $data['blog_list'] = $this->emp_model->getBlog();
            $data['title'] = " Blog  : Emp-ComingWeek";
            $this->load->view('emp/blog',$data);
        } 
        else 
        {
            redirect(base_url('emp'));
        }

    }

    public function edit_blog()
    {
        if(($this->session->userdata('emp_id')) && ($this->session->userdata('emp_id') != ""))
            {
                $id = $this->input->post('b_id');

                $data['b_list'] = $this->emp_model->getBlogIDwise($id);
                $data['menu_list'] = $this->emp_model->getMenu(); 
                $data['title'] = " Edit Blog  : Emp-ComingWeek";                    
                $this->load->view('emp/edit_blog',$data);
            }
        else
            {
                redirect(base_url('emp'));
            }        
    }


    public function update_blog()
    {
        $this->form_validation->set_rules('menu','Menu','trim|required');
        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('wtitle','Writing Title','trim|required');
        $this->form_validation->set_rules('url','URL','trim|required');
        $this->form_validation->set_rules('metad','Meta Description','trim|required');
        $this->form_validation->set_rules('description','Description','trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('message', 'All fields are required');
            redirect(base_url('emp-edit-blog'));
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
                                        'wtitle' => $this->input->post('wtitle'),
                                        'metad' => $this->input->post('metad'),
                                        'description' => $this->input->post('description'),
                                        'upload' => $picture,
                                        'img_url' => '',
                                        'alt' => $this->input->post('alt'),
                                        'popular' => $this->input->post('popular'),
                                        'homepage' => $this->input->post('homepage')
                                    );
                        $data = $this->security->xss_clean($data); // xss filter
                        $this->emp_model->update_blog($data,$id);

                        $this->session->set_flashdata('message', 'Blog updated Successfully');
                        redirect(base_url('emp-blogs'));
                        }
                        else
                        {
                            $this->session->set_flashdata('message', 'Uploading Error');
                            redirect(base_url('emp-edit-blog'));
                        }
                }
            }
            elseif(!empty($this->input->post('img_url')))
            {
                $data = array(      
                                'wtitle' => $this->input->post('wtitle'),
                                'metad' => $this->input->post('metad'),
                                'description' => $this->input->post('description'),
                                'popular' => $this->input->post('popular'),
                                'homepage' => $this->input->post('homepage'),
                                'upload' => '',
                                'img_url' => $this->input->post('img_url'),
                                'alt' => $this->input->post('alt'),
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->emp_model->update_blog($data,$id);

                $file_name = $this->input->post('file_name');
                if($file_name)
                {
                    unlink("assets/uploads/".$file_name);                    
                }

                $this->session->set_flashdata('message', 'Blog updated Successfully');
                redirect(base_url('emp-blogs'));
            }
            else
            {
                $data = array(      
                                'wtitle' => $this->input->post('wtitle'),
                                'metad' => $this->input->post('metad'),
                                'description' => $this->input->post('description'),
                                'popular' => $this->input->post('popular'),
                                'homepage' => $this->input->post('homepage'),
                                'img_url' => $this->input->post('img_url'),
                                'alt' => $this->input->post('alt'),
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->emp_model->update_blog($data,$id);

                $this->session->set_flashdata('message', 'Blog updated Successfully');
                redirect(base_url('emp-blogs'));
            }

        }
    }

    public function publish_blog()
    {     
              $id = $this->input->post('b_id');
              $data = array(      
                                'publish' => 'yes'
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->emp_model->update_blog($data,$id);

                $this->session->set_flashdata('message', 'Blog Published Successfully');
                redirect(base_url('emp-blogs'));
    }

    public function unpublish_blog()
    {     
              $id = $this->input->post('b_id');
              $data = array(      
                                'publish' => 'no'
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->emp_model->update_blog($data,$id);

                $this->session->set_flashdata('message', 'Blog Not Published Successfully');
                redirect(base_url('emp-blogs'));
    }

    public function view_blog()
    {
        if (($this->session->userdata('emp_id')) && ($this->session->userdata('emp_id') != "")) {

            $id = $this->input->post('b_id');
            $data['b_des'] = $this->emp_model->view_Blog($id);
            $data['title'] = " View Blog  : Emp-ComingWeek";
            $this->load->view('emp/view_blog', $data);
        } else {
            redirect(base_url('emp'));
        }

    }

}
?>