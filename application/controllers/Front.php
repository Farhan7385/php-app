<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        //call CodeIgniter's default Constructor
        parent::__construct();

        //load Model
        $this->load->model('front_model');

        $this->load->library('session');

    }

    public function index()
    {
        $data['title'] = " Home  : ComingWeek";
        $data['popular_blogs'] = $this->front_model->popular_blogs();
        $data['homepage_blog'] = $this->front_model->homepage_blog();
        $data['latest_blogs'] = $this->front_model->latest_blogs();
        $this->load->view('front/index', $data);

    }

    public function about()
    {
        $data['title'] = " About us  : ComingWeek";
        $this->load->view('front/about', $data);

    }

    public function blog()
    {
        //$data['title'] = " Blog  : ComingWeek";
        $data['popular_blogs'] = $this->front_model->popular_blogs();
        $data['name'] = $this->uri->segment(2);
        $data['limit'] = 6;
        $offset = 0;
        $data['b_list'] = $this->front_model->getBlog($data['name'],$offset, $data['limit']);

            if (!empty($data['b_list'])) 
               {
                //echo "<pre>";
                //print_r($data['b_list']);
                    $data['titlename'] = $this->front_model->getMenuTitle($data['name']);
                    $this->load->view('front/blog', $data);
               }
               else
               {
                $data['b_list'] = $this->front_model->getSubMenuBlog($data['name'],$offset, $data['limit']);
                
                    if (!empty($data['b_list'])) 
                       {
                        //echo "<pre>";
                        //print_r($data['b_list']);
                         $data['titlename'] = $this->front_model->getSubMenuTitle($data['name']);
                        $this->load->view('front/blog', $data);
                       } 
                    else
                        {
                            redirect(base_url('page-not-found'));
                        }                 
               } 

    }

    public function load_blog() 
    {
        $data['name'] = $this->input->post('mname');
        $data['limit'] = $this->input->post('limit');
        if(!empty($this->input->post('blog_id'))) 
        {
            $data['b_list'] = $this->front_model->load_getBlog($data['name'],$this->input->post('blog_id'),$data['limit']);
            if(!empty($data['b_list']))
            {
                //echo "yes";
                $page= $this->load->view("front/load_ajax_blog_view", $data, true);
                echo json_encode(array("result" => "Success", "page" => $page));
            }
            else
            {
                $data['b_list'] = $this->front_model->load_getSubMenuBlog($data['name'],$this->input->post('blog_id'),$data['limit']);
                if(!empty($data['b_list']))
                {
                    //echo "no";
                    $page = $this->load->view("front/load_ajax_blog_view", $data, true);
                    echo json_encode(array("result" => "Success", "page" => $page));
                }
                else
                {
                    echo json_encode(array("result" => "fail", "page" => ""));
                }
            }
        } 
        else
        {
                    echo json_encode(array("result" => "fail", "page" => ""));
        }
    }

    public function blog_detail()
    {
        //$data['title'] = " Blog Detail : ComingWeek";
        $data['popular_blogs'] = $this->front_model->popular_blogs();
         $data['name'] = $this->uri->segment(2);
        $data['name2'] = $this->uri->segment(3);
        //echo $name;
        //echo $name2;
        $data['b_des'] = $this->front_model->getBdes($data['name'],$data['name2']);
            if (!empty($data['b_des'])) 
                 {
                    //echo "<pre>";
                    //print_r($data['b_des']);
                    $this->load->view('front/blogdetail', $data);
                 }
            else
                 {
                    $data['b_des'] = $this->front_model->getSubMenuBdes($data['name'],$data['name2']);
                    if (!empty($data['b_des'])) 
                         {
                            //echo "<pre>";
                            //print_r($data['b_des']);
                            $this->load->view('front/blogdetail', $data);
                         }
                    else
                         {
                            redirect(base_url('page-not-found'));
                         }
                 } 

    }

    public function contact()
    {
        $data['title'] = " Contact : ComingWeek";
        $this->load->view('front/contact', $data);

    }
        
    public function disclaimer()
    {
        $data['title'] = " Disclaimer : ComingWeek";
        $this->load->view('front/disclaimer', $data);

    }

    public function privacy_policy()
    {
        $data['title'] = " Privacy Policy : ComingWeek";
        $this->load->view('front/privacy-policy', $data);

    }

    public function terms_and_conditions()
    {
        $data['title'] = " Terms and Conditions : ComingWeek";
        $this->load->view('front/terms-and-conditions', $data);

    }

    public function insert_contact()
    {
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('subject','Subject','trim|required');
        $this->form_validation->set_rules('message','Message','trim|required');
        if ($this->form_validation->run() == FALSE)
        {
           $this->session->set_flashdata('message', 'All Fields are required!');
           redirect(base_url('contact'));
        }
        else
        {

            $data = array(      'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'subject' => $this->input->post('subject'),
                                'message' => $this->input->post('message'),
                            );
                $data = $this->security->xss_clean($data); // xss filter
                $this->front_model->insert_contact($data);
                $this->session->set_flashdata('message', 'Thank You For Contacting Us!');
                redirect(base_url('contact'));
        }
    }
    
    public function error_404()
    {
        $data['title'] = " Page Not Found  : ComingWeek";
        $this->load->view('front/404',$data);
    }

    public function sitemap()
    {

        $data['getsitemap'] = $this->front_model->getSitemap();

        // print_r($data['getsitemap']);
        //die();
        $this->load->view('front/sitemap', $data);
    }

}
?>