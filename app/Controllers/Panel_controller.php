<?php
	namespace App\Controllers;
	Use App\Models\Usuarios_model;
	Use CodeIgniter\Controller;

	class Panel_controller extends Controller {

		public function index() {
			//$session = session();

			$data['titulo']='Bienvenido';
	        echo view("front/header", $data);
	        echo view("front/navbar");
			echo view("front/principal");
	        echo view("front/footer");
		}
	}