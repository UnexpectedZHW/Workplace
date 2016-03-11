<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    var $sess = array();
    
    /**
     * @author Arif Laksito<arif.laksito@amikom.ac.id>
     * @param null
     * @return void
     * @desc constructor to handle 2 mode login (su,admin)
     */
    function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('auth')) {
            redirect('login', 'refresh');
        }else{
            $session = json_decode(json_encode(unserialize(base64_decode($this->session->userdata('auth')))));
            $this->sess = $session;
            
            if($session->su==0)
                redirect('admin', 'refresh');
        }
    }

    function index() {
        $data = array(
            'content' => 'su/content/su-dashboard'
        );
        $this->load->view('su/su-mainpage', $data);
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param null
     * @return  void
     * @desc load permission view
     */
    function permission() {
        $this->load->model('su/mPermission');
        $data = array(
            'content' => 'su/content/su-permission',
            'getSu' => $this->mPermission->getPermission()
        );
        $this->load->view('su/su-mainpage', $data);
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param string post(inputKey)
     * @param2 string post (inputName)
     * @return  void
     * @desc menampilkan halaman tambah permission data &
     * memproses input  
     */
    function permission_tambah() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputKey', 'input key', 'required');
        $this->form_validation->set_rules('inputName', 'input name', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'content' => 'su/content/su-permission-tambah',
            );
            $this->load->view('su/su-mainpage', $data);
        } else {
            $this->load->model('su/mPermission');
            $data = array(
                'permKey' => $this->input->post('inputKey'),
                'permName' => $this->input->post('inputName')
            );
            $status = $this->mPermission->insertPermission($data);
            if(!$status){
                $this->session->set_flashdata('perm','gagal, data ganda');
                redirect('su/dashboard/permission_tambah');
            }
            redirect('su/dashboard/permission');
        }
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param1 int $id
     * @param2 string post(inputKey)
     * @param3 string post(inputName)
     * @return void
     * @desc menampilkan halaman tambah permission data &
     * memproses input  
     */
    function permission_edit($id) {
        $this->load->model('su/mPermission');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputKey', 'input key', 'required');
        $this->form_validation->set_rules('inputName', 'input name', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'getSu' => $this->mPermission->getPermissionDetail($id),
                'content' => 'su/content/su-permission-edit'
            );
            $this->load->view('su/su-mainpage', $data);
        } else {
            $data = array(
                'permKey' => $this->input->post('inputKey'),
                'permName' => $this->input->post('inputName')
            );
            $this->mPermission->updatePermission($data, $id);
            redirect('su/dashboard/permission');
        }
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param1 int $id
     * @return void
     * @desc memproses delete permission data  
     */
    function permission_delete($id) {
        $this->load->model('su/mPermission');
        $this->mPermission->deletePermission($id);
        redirect('su/dashboard/permission');
    }

    /* end of permission function */
    
    /* start role/group function */

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param null
     * @return void
     * @desc menampilkan tabel role/group
     */
    function group() {
        $this->load->model('su/mGroup');

        $data = array(
            'content' => 'su/content/su-group',
            'getGroup' => $this->mGroup->getGroup()
        );
        $this->load->view('su/su-mainpage', $data);
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param1 String post(inputRole)
     * @return void
     * @desc menampilkan form tambah role dan memproses tambah role  
     */
    function group_tambah() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputRole', 'input role', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'content' => 'su/content/su-group-tambah'
            );
            $this->load->view('su/su-mainpage', $data);
        } else {
            $data = array(
                'roleName' => $this->input->post('inputRole')
            );
            $this->load->model('su/mGroup');
            $status = $this->mGroup->insertGroup($data);
            if(!$status){
                $this->session->set_flashdata('group','gagal, data ganda');
                redirect('su/dashboard/group_tambah');
            }
            redirect('su/dashboard/group');
        }
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param1 int $id id role data
     * @return void
     * @desc menampilkan form update
     */
    function group_edit($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputRole','input role','required');
        if($this->form_validation->run()==false){
            $this->load->model('su/mGroup');
            $data = array(
                'getRole' => $this->mGroup->getRoleEdit($id),
                'getUser' => $this->mGroup->getUser(),
                'getUserRole' => $this->mGroup->getUserRole($id),
                'content' => 'su/content/su-group-edit',
                'roleID' => $id
            );
            $this->load->view('su/su-mainpage', $data);
        }else{
            $this->load->model('su/mGroup');
            $roleName = $this->input->post('inputRole');
            $data = array(
                'userID' => $this->input->post('inputUser'),
                'roleID' => $id
            );
            $this->mGroup->roleUpdate($data['roleID'], $roleName);
            if($data['userID'] != 0){
                $status = $this->mGroup->insertUserRole($data);
            }else{
                $status = true;
            }
            
            if (!$status) {
                $this->session->set_flashdata('role', 'user tersebut sudah ada');
                redirect('su/dashboard/group_edit/' . $id);
            } else {
                redirect('su/dashboard/group');
            }
        }        
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param1 int $id id role data
     * @return void
     * @desc menampilkan user berdasarkan role tertentu
     */
    
    function group_view($id){
        $this->load->model('su/mGroup');
        $data=array(
            'getUserRole' => $this->mGroup->getUserRole($id),
             'content' => 'su/content/su-group-view'
        );
        $this->load->view('su/su-mainpage', $data);
    }
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param int $roleID id role/group
     * @return void
     * @desc menampilkan form access role tertentu
     */
    
    function group_access($group,$roleID){
        $this->load->model('su/mroleperms');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('access[]','access','required');
        if($this->form_validation->run()==false){
            $data=array(
                'rolePerms' => $this->mroleperms->getAccessGroup($roleID),
                'content' => 'su/content/su-group-akses',
                'group' => $group
            );
            $this->load->view('su/su-mainpage', $data);
        }else{
            $this->mroleperms->deleteRolePerms($roleID);
            $access = $this->input->post('access');
            for ($i=0;$i<count($access);$i++){
                $data=array(
                    'roleID'=>$roleID,
                    'permID'=>$access[$i],
                    'value'=>1
                );
                $this->mroleperms->addRolePerms($data);
            }
            redirect('su/dashboard/group');
        }
        
    }
    
    function test($roleID){
        $this->load->model('su/mroleperms');
        $t = $this->mroleperms->getAccessGroup($roleID);
        echo "<pre>";
        print_r($t);
        echo "</pre>";
    }

    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param int $id id user yang akan dihapus
     * @return void
     * @desc memproses hapus user dari role tertenru
     */
    function group_delete_user($roleID,$id){
        $data=array(
            'roleID'=>$roleID,
            'userID'=>$id
        );
        $this->load->model('su/mGroup');
        $this->mGroup->deleteUserRole($data);
        redirect('su/dashboard/group');
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param int $id id role yang akan dihapus
     * @return void
     * @desc memproses hapus role
     */
    
    function group_delete($id){
        $this->load->model('su/mGroup');
        $this->mGroup->deleteGroup($id);
        redirect('su/dashboard/group');
    }
    /* end of group/role function */
    
    /*start of user function */
    function user(){
        $this->load->model('su/mUser');
        $data = array(
            'getUser' => $this->mUser->getUser(),
            'content' => 'su/content/su-user'
        );
        $this->load->view('su/su-mainpage', $data);
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param null
     * @return void
     * @desc menampilkan form tambah user
     *      memproses insert user
     */
    
    function user_tambah(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputUsername','input username','required');
        if($this->form_validation->run()==false){
            $data = array(
                'content' => 'su/content/su-user-tambah'
            ); 
            $this->load->view('su/su-mainpage', $data);
        }else{
            $this->load->model('su/mUser');
            $this->load->helper('date');
            $data = array(
                'username'=>$this->input->post('inputUsername'),
                'name'=>$this->input->post('inputName'),
                'email'=>$this->input->post('inputEmail'),
                'password'=>md5($this->input->post('inputPwd')),
                'is_superadmin'=>$this->input->post('isSuperadmin'),
                'dateAdded'=>  now()
            );
            $status = $this->mUser->insertUser($data);
            if(!$status){
                $this->session->set_flashdata('user','gagal, username sudah ada');
                redirect('su/dashboard/user_tambah');
            }
            redirect('su/dashboard/user');
        }        
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param int $id id dari userdata
     * @return void
     * @desc memproses delete user berdasarkakn 
     *      id 
     */
    function user_delete($id){
        $this->load->model('su/mUser');
        $this->mUser->deleteUser($id);
        $this->mUser->deleteUserRoles($id);
        redirect('su/dashboard/user');
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param int $id id dari userdata
     * @return void
     * @desc menampilkan edit user dan memproses edit user 
     */
    
    function user_edit($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputUsername','input username','required');
        if($this->form_validation->run() == false){
            $this->load->model('su/mUser');
            $data=array(
                'getUser' => $this->mUser->getUserDetail($id),
                'content' => 'su/content/su-user-edit'
            );
            $this->load->view('su/su-mainpage', $data);
        }else{
            $data = array(
                'username'=>$this->input->post('inputUsername'),
                'name'=>$this->input->post('inputName'),
                'email'=>$this->input->post('inputEmail')
                //'is_superadmin'=>$this->input->post('isSuperadmin'),
            );
            $pwd = $this->input->post('inputPwd');
            if(!empty($pwd)){
                $data['password']=md5($this->input->post('inputPwd'));
            }
            $this->load->model('su/mUser');
            $this->mUser->userUpdate($id,$data);
            redirect('su/dashboard/user');
        }       
    }
    
    /**
     * @author taufik budi s <tfkbudi@gmail.com>
     * @param null
     * @return void
     * @desc ganti password superadmin 
     */
    function password_ganti() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputOldPwd','input password lama','required');
        if($this->form_validation->run() == false){
            $data = array(
                'content' => 'su/content/su-password'
            );
            $this->load->view('su/su-mainpage', $data);
        }else{
            $data=array(
                'ID' => $this->sess->id,
                'oldPassword' => md5($this->input->post('inputOldPwd')),
                'password' => md5($this->input->post('inputNewPwd1'))
            );
            $this->load->model('su/mUser');
            $status = $this->mUser->gantiPassword($data);
            
            echo $status;
        }
    }
    
    /**
     * @author Arif Laksito<arif.laksito@amikom.ac.id>
     * @param null
     * @return void
     * @desc redirect login
     * 
     */
    function logout(){
        $this->session->unset_userdata('auth');
        redirect('login','refresh');
    }

}
