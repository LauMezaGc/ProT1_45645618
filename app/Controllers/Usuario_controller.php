<?php
	namespace App\Controllers;
	Use App\Models\Usuarios_model;
	Use CodeIgniter\Controller;

	class Usuario_controller extends Controller {
	
		public function __construct(){
			helper(['form', 'url']);
		}

		public function create() {
			$data['titulo']='Registro';
	        echo view("front/header", $data);
	        echo view("front/navbar");
			echo view("front/registro");
	        echo view("front/footer");
		}

		public function formValidation() {
			$input = $this->validate([
				'nombre'	=> 'required|min_length[3]',
				'apellido'	=> 'required|min_length[3]|max_length[25]',
				'usuario'	=> 'required|min_length[3]',
				'email'		=> 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
				'pass'		=> 'required|min_length[3]|max_length[10]',
				]
			);
			$formModel = new Usuarios_model();

			if (!$input) {
				$data['titulo']='Registro';
		        echo view("front/header", $data);
		        echo view("front/navbar");
				echo view("front/registro", ['validation' => $this->validator]);
		        echo view("front/footer");
			} else {
				$formModel->save([
					'nombre' =>	$this->request->getVar('nombre'),
					'apellido' =>	$this->request->getVar('apellido'),
					'usuario' =>	$this->request->getVar('usuario'),
					'email' =>	$this->request->getVar('email'),
					'pass' =>	password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)

				]);

				session()->setFlashdata('success', 'Usuario registrado con exito');
				return $this->response->redirect('login');
			}

		}
	}
?>