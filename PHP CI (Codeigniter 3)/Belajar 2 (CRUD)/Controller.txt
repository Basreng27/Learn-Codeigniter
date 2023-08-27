<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//untuk meload helper
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->helper('date');
		//untuk meload library
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('pagination');
		//untuk meload model. model = penghubung ke databse
		$this->load->model('Mhs');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function regis()
	{
		$this->load->view('regis');
	}

	public function prosesregis()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$lvl = $this->input->post('lvl');

		$data = array(
			'user' => $user,
			'pass' => $pass,
			'lvl' => $lvl
		);

		$this->Mhs->regis($data);

		redirect('login');
	}

	public function proseslogin()
	{
		//seesion untuk masuk
		if ($this->session->userdata('status') == "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('tipe') == "admin") {
				redirect(base_url('home'));
			} else if ($this->session->userdata('tipe') == "user") {
				redirect(base_url('tambah'));
			}
		}

		$user = $this->input->post('user');
		$pass = $this->input->post('pass');

		$login = array(
			'user' => $user,
			'pass' => $pass
		);

		$cek = $this->Mhs->ceklogin($login)->num_rows();

		if ($cek > 0) {
			$lvl = $this->Mhs->ceklogin($login)->row_array();

			// echo "<pre>" . print_r($lvl, true);
			// exit(1);
			if ($lvl['lvl'] == '1') {
				$data_session = array(
					'user' => $user,
					'tipe' => $lvl,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			} else if ($lvl['lvl'] == '2') {
				$data_session = array(
					'user' => $user,
					'tipe' => $lvl,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				redirect(base_url('tambah'));
			} else {
				redirect('login');
			}
		} else {
			$this->load->view('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function home()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('tipe') == '1') {
				redirect(base_url('home'));
			} else if ($this->session->userdata('tipe') == '2') {
				redirect(base_url('tambah'));
			}
		}
		//memanggil user
		// $data['us'] = $this->session->userdata('user');

		//memanggil fungtion dimodel
		$data['mhs'] = $this->Mhs->getdata()->result();

		//load file
		$this->load->view('home', $data);
	}

	public function tambah()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('tipe') == '1') {
				redirect(base_url('home'));
			} else if ($this->session->userdata('tipe') == '2') {
				redirect(base_url('tambah'));
			}
		}
		$this->load->view('tambah');
	}

	public function prosesadd()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('tipe') == '1') {
				redirect(base_url('home'));
			} else if ($this->session->userdata('tipe') == '2') {
				redirect(base_url('tambah'));
			}
		}

		$no = $this->input->post('no');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');

		//lalu di arraykan
		$data = array(
			'no' => $no,
			'nama' => $nama,
			'jurusan' => $jurusan
		);

		///di kirim ke model
		$this->Mhs->tambahmhs($data);
		redirect('home');
	}

	public function update()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		} else {
			if ($this->session->userdata('tipe') == '1') {
				redirect(base_url('home'));
			} else if ($this->session->userdata('tipe') == '2') {
				redirect(base_url('tambah'));
			}
		}

		//mengambil primary data edit
		$nob = $this->uri->segment(2);
		$hasil = explode(' ', $nob);
		$no = $hasil[0];

		//untuk menampilkan array
		// echo "<pre>" . print_r($hasil, true);
		// exit(1);

		$data['mhs'] = $this->Mhs->getedit($no)->result();

		$this->load->view('update', $data);
	}

	public function prosesup()
	{

		$no = $this->input->post('no');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');

		$data = array(
			'nama' => $nama,
			'jurusan' => $jurusan
		);

		$this->Mhs->update($no, $data);

		redirect('home');
	}

	public function delete()
	{
		$nob = $this->uri->segment(2);
		$hasil = explode(' ', $nob);
		$no = $hasil[0];

		$this->Mhs->delete($no);

		redirect('home');
	}
}
