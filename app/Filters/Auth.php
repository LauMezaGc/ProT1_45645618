<?php
	namespace App\Filters;
	Use CodeIgniter\HTTP\RequestInterface;
	Use CodeIgniter\HTTP\ResponseInterface;
	Use CodeIgniter\Filters\FilterInterface;

	class Auth implements FilterInterface {
		public function before(RequestInterface $request , $arguments = null) {
			if (!session()->get('logged_in')){
				session()->setFlashdata('fail', 'Por favor, inicie sesión');
				return redirect('login');
			}
		}

		public function after (RequestInterface $request ,ResponseInterface $response, $arguments = null){

		}

	}
