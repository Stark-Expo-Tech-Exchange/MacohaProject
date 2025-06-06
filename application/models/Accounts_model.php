<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class accounts_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function createNewaccounts(){

        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['email']  = html_escape($this->input->post('email'));
        $page_data['phone']  = html_escape($this->input->post('phone'));
        $page_data['password']  = sha1($this->input->post('name'));
        $page_data['level']     = html_escape($this->input->post('level'));
        $this->db->insert('accounts', $page_data);
        $accounts_id = $this->db->insert_id();
        move_uploaded_file($_FILES['accounts_image']['tmp_name'], 'uploads/accounts_image/' . $accounts_id . '.ico');

        $page_data2['accounts_id'] =  $accounts_id;
        $this->db->insert('accounts_role', $page_data2);


    }

    function deleteaccounts($param2){
        
        $this->db->where('accounts_id', $param2);
        $this->db->delete('accounts');
    }

    function select_all_the_accounts_from_accounts_table(){
        $all_selected_accounts = $this->db->get('accounts');
        return $all_selected_accounts->result_array();

    }

    function updateAllDetailsForaccountsRole($param2){
        $page_data['dashboard']  = html_escape($this->input->post('dashboard'));
        $page_data['manage_academics']  = html_escape($this->input->post('manage_academics'));
        $page_data['manage_employee']   = html_escape($this->input->post('manage_employee'));
        $page_data['manage_student']    = html_escape($this->input->post('manage_student'));
        $page_data['manage_attendance']     = html_escape($this->input->post('manage_attendance'));
        $page_data['download_page']     = html_escape($this->input->post('download_page'));
        $page_data['manage_parent']     = html_escape($this->input->post('manage_parent'));
        $page_data['manage_alumni']     = html_escape($this->input->post('manage_alumni'));

        $this->db->where('accounts_id', $param2);
        $this->db->update('accounts_role', $page_data);


    }

    
}