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
					$session->setFlashdata('fail', 'Disculpe. Este usuario se ha dado de baja.');
					return redirect()->to('login');
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

					$session->set($ses_data);

					$session->setFlashdata('msg', 'Bienvenido a TodoElectro!!');
					return redirect()->to('login-correcto');

				} else {

					$session->setFlashdata('fail', 'La contraseña es incorrecta.');
					return redirect()->to('login');

				}

			} else {
				$session->setFlashdata('fail', 'El mail no existe o es incorrecto.');
				return redirect()->to('login');
			}

		}

		public function logout() {
			$session = session();
			$session->destroy();
			$session->setFlashdata('msg', 'Sesión cerrada.');
			return redirect()->to('inicio');
		}
	}
?>