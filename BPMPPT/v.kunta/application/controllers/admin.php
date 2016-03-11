<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/admcontroller.php' );

class Admin extends AdmController {

    function __construct() {
        parent:: __construct();
        $this->output->enable_profiler(false);
    }

    function index() {
        $this->load->model('su/mUser');

        $data['user'] = $this->mUser->getUserRole($this->sess->id);
        $data['content'] = 'admin-dashboard';
        $this->load->view('admin/admin-mainpage', $data);
    }
    function bangunan ($page = 'view') {
        $this->load->model('admin/mbangunan');
        if ($page == 'view') {
            $data['prov'] = $this->mbangunan->get_all();
            $data['content'] = 'pemohon-bangunan';
        } elseif ($page == 'add') {

            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'taman', 'label' => 'Luas Taman', 'rules' => 'numeric|required'),
                    array('field' => 'parkir', 'label' => 'Luas Parkiran', 'rules' => 'numeric|required'),
                    array('field' => 'lebar_jalan', 'label' => 'Lebar Jalan', 'rules' => 'numeric|required'),
                    array('field' => 'lahan_kurang_parkir', 'label' => 'Luas Lahan Kekurangan Parkir', 'rules' => 'numeric|required'),
                    array('field' => 'pkl', 'label' => 'PKL', 'rules' => 'numeric|required'),
                    array('field' => 'halaman_keras', 'label' => 'Halaman di Perkeras', 'rules' => 'numeric|required'),
                    array('field' => 'halaman_tidak_keras', 'label' => 'Halaman Tidak di Perkeras', 'rules' => 'numeric|required'),
                    array('field' => 'pagar', 'label' => 'Luas Pagar', 'rules' => 'numeric|required'),
                    array('field' => 'drainase', 'label' => 'Luas Drainase', 'rules' => 'numeric|required'),
                    array('field' => 'pos_jaga', 'label' => 'Luas Pos Jaga / Gardu', 'rules' => 'numeric|required'),
                    array('field' => 'gerbang', 'label' => 'Luas Gerbang', 'rules' => 'numeric|required'),
                    array('field' => 'peresepan_air_hujan', 'label' => 'Peresapan Air Hujan', 'rules' => 'numeric|required'),
                    array('field' => 'peresapan_air_kotor', 'label' => 'Peresapan Air Kotor', 'rules' => 'numeric|required'),
                    array('field' => 'septic_tank', 'label' => 'Septic Tank', 'rules' => 'numeric|required'),
                    array('field' => 'water_torn', 'label' => 'Water Torn', 'rules' => 'numeric|required'),
                    array('field' => 'tanggul', 'label' => 'Tanggul', 'rules' => 'numeric|required'),
                    array('field' => 'turap', 'label' => 'Turap', 'rules' => 'numeric|required'),
                    array('field' => 'kolam_renang', 'label' => 'Luas Kolam Renang', 'rules' => 'numeric|required'),
                    array('field' => 'bak_bawah_tanah', 'label' => 'Luas Bak Bawah Tanah', 'rules' => 'numeric|required'),
                    array('field' => 'menara', 'label' => 'Luas Menara', 'rules' => 'numeric|required'),
                    array('field' => 'cerobong_asap', 'label' => 'Jumlah Cerobong Asap', 'rules' => 'numeric|required'),
                    array('field' => 'appar', 'label' => 'APPAR', 'rules' => 'numeric|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {

                    if ($this->mbangunan->add($post)) {
                        $data['msg'] = 'Tambah data bangunan berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Tambah data bangunan gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
            }

            $data['post'] = $post;
            $data['content'] = 'pemohon-bangunan-add';
        } elseif ($page == 'edit') {
            $id = $this->uri->segment(4);
            $data['post'] = $this->mbangunan->get($id);
            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'taman', 'label' => 'Luas Taman', 'rules' => 'numeric|required'),
                    array('field' => 'parkir', 'label' => 'Luas Parkiran', 'rules' => 'numeric|required'),
                    array('field' => 'lebar_jalan', 'label' => 'Lebar Jalan', 'rules' => 'numeric|required'),
                    array('field' => 'lahan_kurang_parkir', 'label' => 'Luas Lahan Kekurangan Parkir', 'rules' => 'numeric|required'),
                    array('field' => 'pkl', 'label' => 'PKL', 'rules' => 'numeric|required'),
                    array('field' => 'halaman_keras', 'label' => 'Halaman di Perkeras', 'rules' => 'numeric|required'),
                    array('field' => 'halaman_tidak_keras', 'label' => 'Halaman Tidak di Perkeras', 'rules' => 'numeric|required'),
                    array('field' => 'pagar', 'label' => 'Luas Pagar', 'rules' => 'numeric|required'),
                    array('field' => 'drainase', 'label' => 'Luas Drainase', 'rules' => 'numeric|required'),
                    array('field' => 'pos_jaga', 'label' => 'Luas Pos Jaga / Gardu', 'rules' => 'numeric|required'),
                    array('field' => 'gerbang', 'label' => 'Luas Gerbang', 'rules' => 'numeric|required'),
                    array('field' => 'peresapan_air_hujan', 'label' => 'Peresapan Air Hujan', 'rules' => 'numeric|required'),
                    array('field' => 'peresapan_air_kotor', 'label' => 'Peresapan Air Kotor', 'rules' => 'numeric|required'),
                    array('field' => 'septic_tank', 'label' => 'Septic Tank', 'rules' => 'numeric|required'),
                    array('field' => 'water_torn', 'label' => 'Water Torn', 'rules' => 'numeric|required'),
                    array('field' => 'tanggul', 'label' => 'Tanggul', 'rules' => 'numeric|required'),
                    array('field' => 'turap', 'label' => 'Turap', 'rules' => 'numeric|required'),
                    array('field' => 'kolam_renang', 'label' => 'Luas Kolam Renang', 'rules' => 'numeric|required'),
                    array('field' => 'bak_bawah_tanah', 'label' => 'Luas Bak Bawah Tanah', 'rules' => 'numeric|required'),
                    array('field' => 'menara', 'label' => 'Luas Menara', 'rules' => 'numeric|required'),
                    array('field' => 'cerobong_asap', 'label' => 'Jumlah Cerobong Asap', 'rules' => 'numeric|required'),
                    array('field' => 'appar', 'label' => 'APPAR', 'rules' => 'numeric|required')                         
                    
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {

                    if ($this->mbangunan->update($id, $post)) {
                        $data['msg'] = 'Edit data bangunan berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Edit data bangunan gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
                $data['post'] = $post;
            }
            $data['content'] = 'pemohon-bangunan-add';
        } elseif ($page == 'del') {
            $id = $this->uri->segment(4);
            $ff = $this->uri->segment(5);
            if ($ff == 'force') {
                $this->mbangunan->delete($id);
                redirect('pemohon/bangunan/view/done');
            }

            $data['del'] = $this->mbangunan->get($id);

            $data['prov'] = $this->mbangunan->get_all();
            $data['content'] = 'pemohon-bangunan';
        }

        $this->load->view('admin/admin-mainpage', $data);
    }
    
    function provinsi($page = 'view') {
        $this->load->model('admin/mprovinsi');
        if ($page == 'view') {
            $data['prov'] = $this->mprovinsi->get_all();
            $data['content'] = 'admin-provinsi';
        } elseif ($page == 'add') {

            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_provinsi', 'label' => 'Nama Provinsi', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {

                    if ($this->mprovinsi->add($post)) {
                        $data['msg'] = 'Tambah data provinsi berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Tambah data provinsi gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
            }

            $data['post'] = $post;
            $data['content'] = 'admin-provinsi-add';
        } elseif ($page == 'edit') {
            $id = $this->uri->segment(4);
            $data['post'] = $this->mprovinsi->get($id);
            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_provinsi', 'label' => 'Nama Provinsi', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {

                    if ($this->mprovinsi->update($id, $post)) {
                        $data['msg'] = 'Edit data provinsi berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Edit data provinsi gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
                $data['post'] = $post;
            }
            $data['content'] = 'admin-provinsi-add';
        } elseif ($page == 'del') {
            $id = $this->uri->segment(4);
            $ff = $this->uri->segment(5);
            if ($ff == 'force') {
                $this->mprovinsi->delete($id);
                redirect('admin/provinsi/view/done');
            }

            $data['del'] = $this->mprovinsi->get($id);

            $data['prov'] = $this->mprovinsi->get_all();
            $data['content'] = 'admin-provinsi';
        }

        $this->load->view('admin/admin-mainpage', $data);
    }

    function kabupaten($page = 'view') {
        $this->load->model('admin/mkabupaten');
        $this->load->model('admin/mprovinsi');

        if ($page == 'view') {
            $data['prov'] = $this->mprovinsi->get_all();
            $data['kab'] = array();

            $post = $this->input->post();

            $data['post'] = $post;
            $data['content'] = 'admin-kabupaten';
        } elseif ($page == 'add') {
            $id = $this->uri->segment(4);
            if (empty($id))
                redirect('admin/kabupaten');

            $data['prov'] = $this->mprovinsi->get($id);
            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_kabupaten', 'label' => 'Nama Kabupaten', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {
                    $post['id_provinsi'] = $id;
                    if ($this->mkabupaten->add($post)) {
                        $data['msg'] = 'Tambah data kabupaten berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Tambah data kabupaten gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
            }

            $data['post'] = $post;
            $data['content'] = 'admin-kabupaten-add';
        } elseif ($page == 'edit') {
            $id = $this->uri->segment(4);
            $data['post'] = $this->mkabupaten->get($id);
            $data['prov'] = $this->mprovinsi->get($data['post']['id_provinsi']);

            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_kabupaten', 'label' => 'Nama Kabupaten', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {
                    $post['id_provinsi'] = $data['post']['id_provinsi'];
                    if ($this->mkabupaten->update($id, $post)) {
                        $data['msg'] = 'Edit data kabupaten berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Edit data kabupaten gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }

                $data['post'] = $post;
            }

            $data['content'] = 'admin-kabupaten-add';
        } elseif ($page == 'del') {
            $id = $this->uri->segment(4);
            $ff = $this->uri->segment(5);
            if ($ff == 'force') {
                $this->mkabupaten->delete($id);
                redirect('admin/kabupaten/view/done');
            }

            $data['prov'] = $this->mprovinsi->get_all();
            $data['del'] = $this->mkabupaten->get($id);
            $data['content'] = 'admin-kabupaten';
        }

        $this->load->view('admin/admin-mainpage', $data);
    }

    function kecamatan($page = 'view') {
        $this->load->model('admin/mkabupaten');
        $this->load->model('admin/mkecamatan');
        $this->load->model('admin/mprovinsi');
        $data['prov'] = $this->mprovinsi->get_all();
            
        if ($page == 'view') {
                        
            $data['content'] = 'admin-kecamatan';
        } elseif ($page == 'add') {
            $idprov = $this->uri->segment(4);
            $idkab = $this->uri->segment(5);            

            $data['kab'] = $this->mkabupaten->get($idkab);
            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_kecamatan', 'label' => 'Nama Kecamatan', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {
                    $post['id_provinsi'] = $idprov;
                    $post['id_kabupaten'] = $idkab;
                    if ($this->mkecamatan->add($post)) {
                        $data['msg'] = 'Tambah data kecamatan berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Tambah data kecamatan gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
            }

            $data['post'] = $post;
            $data['content'] = 'admin-kecamatan-add';
        } elseif ($page == 'edit') {
            
            $id = $this->uri->segment(4);
            
            $kec = $this->mkecamatan->get($id);
            $data['post'] = $kec;
            $data['kab'] = $this->mkabupaten->get($kec['id_kabupaten']);
            
            $post = $this->input->post();
            if ($post) {
                $config = array(
                    array('field' => 'nama_kecamatan', 'label' => 'Nama Kecamatan', 'rules' => 'required'),
                    array('field' => 'fullname', 'label' => 'Fullname', 'rules' => 'required'),
                    array('field' => 'lat', 'label' => 'Latitude', 'rules' => 'decimal|required'),
                    array('field' => 'lon', 'label' => 'Longitude', 'rules' => 'decimal|required')
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {
                    if ($this->mkecamatan->update($id, $post)) {
                        $data['msg'] = 'Edit data kecamatan berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Edit data kecamatan gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
                
                $data['post'] = $post;
            }
                        
            $data['content'] = 'admin-kecamatan-add';
            
        }elseif($page == 'del'){
            $id = $this->uri->segment(4);
            $ff = $this->uri->segment(5);
            if ($ff == 'force') {
                $this->mkecamatan->delete($id);
                redirect('admin/kecamatan/view/done');
            }

            $kec = $this->mkecamatan->get($id);
            $data['kab'] = $this->mkabupaten->get($kec['id_kabupaten']);
            $data['del'] = $kec;
            $data['content'] = 'admin-kecamatan';
        }

        $this->load->view('admin/admin-mainpage', $data);
    }
    
    function forbid() {
        $data['content'] = 'admin-forbid';
        $this->load->view('admin/admin-mainpage', $data);
    }

    function profile() {
        $this->load->model('admin/mAdmin');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputName', 'input nama', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'content' => 'admin-profile',
                'getProfile' => $this->mAdmin->getProfile($this->sess->id)
            );
            $this->load->view('admin/admin-mainpage', $data);
        } else {
            $data = array(
                'ID' => $this->sess->id,
                'name' => $this->input->post('inputName'),
                'email' => $this->input->post('inputEmail')
            );
            $status = $this->mAdmin->updateProfile($data);
            echo $status;
        }
    }

    function password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputOldPwd', 'input password lama', 'required');
        if ($this->form_validation->run() == false) {
            $data['content'] = 'admin-password';
            $this->load->view('admin/admin-mainpage', $data);
        } else {
            $data = array(
                'ID' => $this->sess->id,
                'oldPassword' => md5($this->input->post('inputOldPwd')),
                'password' => md5($this->input->post('inputNewPwd1'))
            );
            $pwd = md5($this->input->post('inputNewPwd2'));

            if ($data['password'] == $pwd) {
                $this->load->model('admin/mAdmin');
                $status = $this->mAdmin->gantiPassword($data);
            } else {
                $status = "<div class='alert alert-danger'>Error: Password baru tidak sama</div>";
            }
            echo $status;
        }
    }

    function logout() {
        $this->session->unset_userdata('auth');
        redirect('login', 'refresh');
    }

}
