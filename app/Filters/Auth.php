<?php
	namespace App\Filters;
	Use CodeIgniter\HTTP\RequestInterface;
	Use CodeIgniter\HTTP\ResponseInterface;
	Use CodeIgniter\Filters\FilterInterface;

	class Auth implements FilterInterface {
		public function before(RequestInterface $request , $arguments = null) {
			if (!session()->get('logged-in')){
				return redirect()->to('../login');
			}
		}

		public function after (RequestInterface $request ,ResponseInterface $response, $arguments = null){

		}

	}
