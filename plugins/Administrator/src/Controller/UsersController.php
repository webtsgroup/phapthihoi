<?php
namespace Administrator\Controller;

use Administrator\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		$results = $this->Users->find('all')->where(['account_id' => $this->ACCOUNT])->toArray();
		$this->set(compact('results'));
	}
	public function add() {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$data = $this->request->data;
			$result = array(
				'success' => false,
				'data' => array(),
				'message' => ''
			);
			$error = false;
			if ($error) {
				$result['message'] = __('Data not save');
			} else {
				$data['pass'] = md5($data['pass']);
				$data['account_id'] = $this->ACCOUNT;
				$dataUser = $this->Users->newEntity($data);
				$this->Users->save($dataUser);
				$id = $dataUser->id;
				if(is_numeric($id))	{
					$dataUser['id'] = $id;
					$result = array(
						'success' => true,
						'data' => $dataUser,
						'message' => __('Data saved'),
						'redirect' => Router::url(['controller' => 'users','action' => 'index'])
					);
				}	else {
					$result['message'] = __('Data not save');
				}
			}
			echo json_encode($result);
			exit;
		}
		$action = 'add';
		$result = array();
		$this->set(compact('result','action'));
	}

	public function edit($id) {
		$result = $this->Users->get($id);
		$result = $result['User'];
		$action = 'edit';
		$this->set(compact('result','action','onchange','id'));
		$this->render('add');
	}

	public function delete($id) {
		$this->viewBuilder()->layout('ajax');
		$results = $this->defaultAjaxResult;
		$entity = $this->Users->get($id);
		$result = $this->Users->delete($entity, ['atomic' => false]);
		if ($result) {
			$results['success'] = true;
			$results['data'] = $entity;
			$results['message'] = __('Deleted an item', true);
		}
		echo json_encode($results);
		exit;
	}

	public function changePass($id) {
		$result = array(
				'success' => false,
				'data' => array(),
				'message' => ''
			);
		if(!empty($this->data))
		{
			$data = $this->data;
			if($this->checkPass($id,$data['old_pass']) > 0)
			{
				if($data['pass'] == $data['re_pass'])
				{
					$this->Users->id = $id;
					$this->Users->saveField('pass',md5($data['pass']));
					$result['success'] = true;
					$result['message'] = 'Updated';
				}
				else
				{
					$result['message'] = 'Password does not match';
				}
			}
			else
			{
				$result['message'] = 'Password incorrect';
			}
		}
		echo json_encode($result);
		exit;
	}
	public function checkPass($id,$pass) {
		$where = [
			'id' => $id,
			'pass' => md5($pass)
		];
		$check = $this->Users->find('all')->where($where)->count();
		return $check;
	}
	public function checkUser($username, $pass = null) {
		$where = [
			'username' => $username
		];
		$where['pass'] = md5($pass);
		$check = $this->Users->find('all')->where($where)->count();
		return $check;
	}

	public function login() {
		if(!empty($this->request->data) && $this->request->is('ajax'))	{
			$result = $this->defaultAjaxResult;
			$result['reload'] = false;
			$data = $this->request->data;
			$check = $this->checkUser($data['username'], $data['pass']);
			$tmpUser = array();
			if($check) {
				$tmpUser['username'] = $data['username'];
				$tmpUser['password'] = $data['pass'];
			}
			if(!empty($tmpUser)) {
				$this->Auth->identify();
				$this->Auth->setUser($tmpUser);
				$result['success'] = true;
				$result['message'] = 'Login successful. Redirecting...';
				$result['redirect'] = $this->Auth->redirectUrl();
			}	else {
				$result['message'] = 'Username or Password does not match';
			}
			echo json_encode($result);
			exit;
		}	else {
			$this->viewBuilder()->layout('Administrator.login');
			$this->render('/Layout/login');
		}
	}

	function logout() {
		//$this->Session->destroy();
		$this->Auth->logout();
		$this->redirect($this->Auth->logoutRedirect);
	}
}
