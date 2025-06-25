<?php
	namespace App\Controllers;
	Use App\Models\Usuarios_model;
	Use CodeIgniter\Controller;

	class Usuario_controller extends Controller {
	
		public function __construct(){
			helper(['form', 'url']);
		}
	}
?>