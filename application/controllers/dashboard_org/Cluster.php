<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cluster extends CI_Controller
{
	private $data;
	private $postData;
	private $organisation;
	private $user_id;
	public function __construct()
	{
		parent::__construct();

		$this->load->model(
			array(
				'dashboard_model',
				'setting_model',
				'organisation_model',
				'cluster_model',
				'center_model',
				'user_model',
			)
		);

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 2)
			redirect('login');
		$this->user_id = $user_id = $this->session->userdata('user_id');
		$this->organisation = $this->organisation_model->read_orgheads_org($user_id);
	}
	public function index()
	{
		$this->create();
	}

	private function prepare_data($titles = ["left" => "add_cluster", "right" => "list_cluster"])
	{
		$this->data['title'] = "Add/ View Clusters";
		$this->data['left_subtitle'] = display($titles['left']);
		$this->data['right_subtitle'] = display($titles['right']);

		$this->data['user_role_list'] = $this->dashboard_model->get_user_roles();

		$this->data['coodinator_list'] = $this->user_model->read_as_list_cor($this->organisation->org_id);
		$this->data['clusters'] = $this->cluster_model->read($this->organisation->org_id);
	}

	private function load_input_data()
	{
		$this->data['input'] = (object) $this->postData = [
			'cluster_id' => $this->input->post('cluster_id'),
			'cluster_name' => $this->input->post('cluster_name', true),
			'cluster_org_id' => $this->organisation->org_id,
			//$this->input->post('cluster_org_id'),
			'cluster_head_id' => $this->input->post('cluster_head_id')
		];
	}

	private function load_validation()
	{
		$this->form_validation->set_rules('cluster_name', display('cluster_name'), 'required|max_length[150]');
		$this->form_validation->set_rules('cluster_head_id', display('cluster_head_id') . "Cluster Head ID", 'required');
	}

	public function create()
	{
		$cluster_id = $this->input->post('cluster_id');
		$this->prepare_data();
		#-------------------------------# create an Organisation
		$this->load_validation();
		$this->load_input_data();
		#-------------------------------#

		if (empty($cluster_id)) {
			/*********** Create new cluster*************/
			if ($this->form_validation->run() === true) {
				if ($this->cluster_model->create($this->postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_org/cluster/create');
			} else {
				$this->data['content'] = $this->load->view('dashboard_org/cluster/form', $this->data, true);
				$this->load->view('dashboard_org/layout/main_wrapper_lte', $this->data);
			}
		} else {
			/*********** Update cluster*************/
			if ($this->form_validation->run() === true) {
				if ($this->cluster_model->update($this->postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('dashboard_org/cluster/edit/' . $this->postData['cluster_id']);
			} else {
				$this->session->set_flashdata('exception', display('please_try_again') . "" . validation_errors());
				redirect('dashboard_org/cluster/edit/' . $this->postData['cluster_id']);
			}
		}
	}

	public function edit($cluster_id = null)
	{
		if (empty($cluster_id)) {
			redirect('dashboard_org/cluster/create');
		}

		$this->prepare_data(['left' => "edit_cluster", "right" => "list_cluster"]);
		#-------------------------------#
		$this->data['input'] = $this->cluster_model->read_by_id($cluster_id);
		$this->data['show_add_button'] = 1;

		$this->data['content'] = $this->load->view('dashboard_org/cluster/form', $this->data, true);
		$this->load->view('dashboard_org/layout/main_wrapper_lte', $this->data);
	}

	public function delete($cluster_id = null)
	{
		if ($this->cluster_model->delete($cluster_id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('dashboard_org/cluster');
	}

	public function statistics()
	{
		$this->data['title'] = display('list_cluster');
		$this->data['user_role_list'] = $this->dashboard_model->get_user_roles();
		$this->data['clusters'] = $this->cluster_model->read($this->organisation->org_id);
		$this->data['center_array'] = $this->center_model->total_centers_of_cluster();
		$this->data['std_by_cl_array'] = $this->user_model->total_student_of_cluster();
		$this->data['is_centers'] = false;
		if (!empty($this->uri->segment(4))) {
			$c_id = $this->uri->segment(4);
			//echo $c_id;die();
			$this->data['center_list'] = $this->center_model->read_centers_by_cluster($c_id);
			$this->data['std_by_cen_array'] = $this->user_model->total_student_of_center();
			$this->data['is_centers'] = true;
		}

		$this->data['content'] = $this->load->view('dashboard_org/cluster/statistics', $this->data, true);
		$this->load->view('dashboard_org/layout/main_wrapper_lte', $this->data);
	}
}
