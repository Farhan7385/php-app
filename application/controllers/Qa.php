<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qa extends CI_Controller
{

    public function __construct()
    {
        //call CodeIgniter's default Constructor
        parent::__construct();

        //load Model
        $this->load->model('qa_model');

        $this->load->library('session');

    }

    public function index()
    {
        $data['title'] = " Sign In  : QA-ComingWeek";
        $this->load->view('qa/index',$data);
    }

    public function check_signin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Sign In Error');
            redirect(base_url('qa'));
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $res = $this->qa_model->check_signin($username, $password);

            if ($res > 0) {

                $res2 = $this->qa_model->getId($username);
                foreach ($res2 as $r) {
                    $this->session->set_userdata('qa_id', $r->id);
                }

                $this->session->set_flashdata('message', 'Sign In Successful');
                redirect(base_url('qa-emp'));
            } else {
                $this->session->set_flashdata('message', 'Sign In Error');
                redirect(base_url('qa'));
            }

        }

    }

    public function signout()
    {
        $this->session->unset_userdata('qa_id');
        $this->session->sess_destroy();
        redirect(base_url('qa'));
    }

    public function emp()
    {        
        if(($this->session->userdata('qa_id')) && ($this->session->userdata('qa_id') != ""))
            {
                $data['emp_list'] = $this->qa_model->getEmp();
                $data['title'] = " Emp  : QA-ComingWeek";
                $this->load->view('qa/emp',$data);
            }
        else
            {
                redirect(base_url('qa'));
            }
    }

    public function blogs()
    {
        if (($this->session->userdata('qa_id')) && ($this->session->userdata('qa_id') != ""))
        {
            $emp_id = $this->uri->segment(2);            
            $data['blog_list'] = $this->qa_model->getBlog($emp_id);
            $data['title'] = " Blog  : QA-ComingWeek";
            $this->load->view('qa/blog',$data);
        } 
        else 
        {
            redirect(base_url('qa'));
        }

    }
   
    public function view_blog()
    {
        if (($this->session->userdata('qa_id')) && ($this->session->userdata('qa_id') != "")) 
        {            
            $id = $this->input->post('b_id');
            $data['eid'] = $this->input->post('e_id');
            $data['b_des'] = $this->qa_model->view_Blog($id);
            $data['title'] = " View Blog  : QA-ComingWeek";
            $this->load->view('qa/view_blog', $data);
        } 
        else 
        {
            redirect(base_url('qa'));
        }

    }

    public function approval_yes_blog()
    {     
              $id = $this->input->post('b_id');
              $eid = $this->input->post('e_id');
              $data = array(      
                                'qa_approval' => 'yes'
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->qa_model->update_blog($data,$id);

                $this->session->set_flashdata('message', 'Blog Approved Successfully');
                redirect(base_url('qa-blogs/'.$eid));
    }

    public function approval_no_blog()
    {     
              $id = $this->input->post('b_id');
              $eid = $this->input->post('e_id');
              $data = array(      
                                'qa_approval' => 'no'
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->qa_model->update_blog($data,$id);

                $this->session->set_flashdata('message', 'Blog Not Approved Successfully');
                redirect(base_url('qa-blogs/'.$eid));
    }

}
?>