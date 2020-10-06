<?php namespace App\Controllers;

use App\Models\UserModel; //user model

class Users extends BaseController {

	public function index() {
		$data = [];

		helper(['form']);

		// print_r($this->request->getMethod());

		if($this->request->getMethod() === 'post') {
			// validation
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			//validateUser - Custome Validate のためErrorメッセージ作成
			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];
			
			if(!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				// store the user in our database
				$model = new UserModel();

				// User Session - Login
				$user = $model->where('email', $this->request->getVar('email'))->first();

				$this->setUserSession($user); //<- user method

				return redirect()->to(base_url('dashboard'));

			}

		}

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer');

	}

	private function setUserSession($user) {
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		// Session
		session()->set($data);
		return true;
	}


	public function register() {
		$data = [];

		helper(['form']);

		if($this->request->getMethod() === 'post') {
			// validation
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]'
			];

			if(!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				// store the user in our database
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];

				//
				$model->save($newData);

				// create session
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');

				return redirect()->to(base_url('/'));
			}
		}

		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');

	}


	public function profile() {

		$data = [];

		helper(['form']);

		// connect User Table in our database
		$model = new UserModel();


		if($this->request->getMethod() === 'post') {
			// validation
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				// 'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				// 'password' => 'required|min_length[8]|max_length[255]',
				// 'password_confirm' => 'matches[password]'
			];

			if($this->request->getPost('password') != "") {
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}

			if(!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {

				$newData = [
					'id' => session()->get('id'), //login -> session id === user id
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					// 'email' => $this->request->getVar('email'),
					// 'password' => $this->request->getVar('password'),
				];

				if($this->request->getPost('password') != "") {
					$newData['password'] = $this->request->getPost('password');
				}

				//
				$model->save($newData);

				// create session
				// $session = session(); //<- no need to session start
				session()->setFlashdata('success', 'Successful Registration');

				return redirect()->to(base_url('/profile'));
			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		// print_r($data);
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');

	}


	public function logout() {
		session()->destroy();
		return redirect()->to(base_url('/'));
	}
	//--------------------------------------------------------------------

}
