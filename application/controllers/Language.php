<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    private $table  = "language";
    private $phrase = "phrase";

    public function __construct()
    {
        parent::__construct();  
        $this->load->database();
        $this->load->dbforge(); 
        $this->load->helper('language');
        $this->load->model(array(
            'dashboard_model'
        ));
        if ($this->session->userdata('isLogIn') == false
            /*|| $this->session->userdata('user_role') != 1 */) 
            redirect('login');
        
    } 

    public function index()
    {
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['languages']    = $this->languages();
        $data['content']      = $this->load->view('language/main',$data,true); 
        $this->load->view('dashboard_admin/layout/main_wrapper_lte', $data);
    }

    public function phrase()
    {
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['languages']    = $this->languages();
        $data['phrases']      = $this->phrases();
        $data['content']      = $this->load->view('language/phrase',$data,true); 
        $this->load->view('dashboard_admin/layout/main_wrapper_lte', $data);
    }
 

    public function languages()
    { 
        if ($this->db->table_exists($this->table)) { 

                $fields = $this->db->field_data($this->table);

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }


    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',true));
        $language = strtolower($language);

        if (!empty($language)) {
            if (!$this->db->field_exists($language, $this->table)) {
                $this->dbforge->add_column($this->table, [
                    $language => [
                        'type' => 'TEXT'
                    ]
                ]); 
                $this->session->set_flashdata('message', 'Language added successfully');
                redirect('language');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('language');
    }


    public function editPhrase($language = null)
    { 
        $data['user_role_list']=$this->dashboard_model->get_user_roles();
        $data['language'] = $language;
        $data['phrases']  = $this->phrases();
        $data['content']  = $this->load->view('language/phrase_edit', $data, true); 
        $this->load->view('dashboard_admin/layout/main_wrapper_lte', $data);

    }

    public function addPhrase() {  

        $lang = $this->input->post('phrase'); 

        if (sizeof($lang) > 0) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($this->phrase, $this->table)) {

                    foreach ($lang as $value) {

                        $value = preg_replace('/[^a-zA-Z0-9_]/', '', $value);
                        $value = strtolower($value);

                        if (!empty($value)) {
                            $num_rows = $this->db->get_where($this->table,[$this->phrase => $value])->num_rows();

                            if ($num_rows == 0) { 
                                $this->db->insert($this->table,[$this->phrase => $value]); 
                                $this->session->set_flashdata('message', 'Phrase added successfully');
                            } else {
                                $this->session->set_flashdata('exception', 'Phrase already exists!');
                            }
                        }   
                    }  

                    redirect('language/phrase');
                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('language/phrase');
    }
 
    public function phrases()
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {

                return $this->db->order_by($this->phrase,'asc')
                    ->get($this->table)
                    ->result();

            }  

        } 

        return false;
    }

    public function addLebel() { 
        $language = $this->input->post('language', true);
        $phrase   = $this->input->post('phrase', true);
        $lang     = $this->input->post('lang', true);

        if (!empty($language)) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($language, $this->table)) {

                    if (sizeof($phrase) > 0)
                    for ($i = 0; $i < sizeof($phrase); $i++) {
                        $this->db->where($this->phrase, $phrase[$i])
                            ->set($language,$lang[$i])
                            ->update($this->table); 

                    }  
                    $this->session->set_flashdata('message', 'Label added successfully!');
                    redirect('language/editPhrase/'.$language);

                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('language/editPhrase/'.$language);
    }
}



 