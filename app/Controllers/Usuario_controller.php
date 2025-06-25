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
			echo view("back/usuario/registro");
	        echo view("front/footer");
		}

		public function formValidation() {
			$input = $this->validate([
				'nombre'	=> 'required|min_lenght[3]',
				'apellido'	=> 'required|min_lenght[3]|max_lenght[25]',
				'usuario'	=> 'required|min_lenght[3]',
				'email'		=> 'required|min_lenght[4]|max_lenght[100]|valid_email|is_unique[usuarios.email]',
				'pass'		=> 'required|min_lenght[3]|max_lenght[10]',
				],
			);
			$formModel = new Usuarios_model();

			if (!$input) {
				$data['titulo']='Registro';
		        echo view("front/header", $data);
		        echo view("front/navbar");
				echo view("back/usuario/registro", ['validation' => $this->validator]);
		        echo view("front/footer");
			} else {
				$formModel->save([
					'nombre' =>	$this->requeest->getVar('nombre'),
					'apellido' =>	$this->requeest->getVar('apellido'),
					'usuario' =>	$this->requeest->getVar('usuario'),
					'email' =>	$this->requeest->getVar('email'),
					'pass' =>	password_hash($this->requeest->getVar('pass'), PASSWORD_DEFAULT)

				]);

				session()->setFlashdata('success', 'Usuario registrado con exito');
				return $this->response->redirect('/login');
			}

		}
	}
?>