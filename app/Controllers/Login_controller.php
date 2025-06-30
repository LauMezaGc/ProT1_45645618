<?php
	namespace App\Controllers;
	Use App\Models\Usuarios_model;
	Use CodeIgniter\Controller;

	class Login_controller extends Controller {

		public function index() {
			helper(['form', 'url']);

			$data['titulo']='Inicio Sesion';
	        echo view("front/header", $data);
	        echo view("front/navbar");
			echo view("front/login");
	        echo view("front/footer");
		}

		public function auth() {
			$session = session();
			$model = new Usuarios_model();

			$email = $this->request->getVar('email');
			$password = $this->request->getVar('pass');

			$data = $model->where('email', $email)->first();
			if($data){

				$pass	= $data['pass'];
				$ba		= $data['baja'];

				if ($ba == 'SI'){
					$session->setFlashdata('msg', 'Disculpe. Este usuario se ha dado de baja.');
					return $this->response->redirect('login');
				}

				$verify_pass = password_verify($password, $pass);

				if ($verify_pass){

					$ses_data = [
						'id_usuario' => $data['id_usuario'],
						'nombre' => $data['nombre'],
						'apellido' => $data['apellido'],
						'email' => $data['email'],
						'usuario' => $data['usuario'],
						'perfil_id' => $data['perfil_id'],
						'logged_in' => TRUE
					];

					$session->setFlashdata('msg', 'Bienvenido a TodoElectro!!');
					return $this->response->redirect('login-correcto');

				} else {

					$session->setFlashdata('msg', 'La contraseña es incorrecta.');
					return $this->response->redirect('login');

				}

			} else {
				$session->setFlashdata('msg', 'El mail no existe o es incorrecto.');
				return $this->response->redirect('login');
			}

		}

		public function logout() {
			$session = session();
			$session->destroy();
			$session->setFlashdata('msg', 'Sesión cerrada.');
			return $this->response->redirect('inicio');
		}
	}
?>