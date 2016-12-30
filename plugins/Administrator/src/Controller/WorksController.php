<?php
namespace Administrator\Controller;

use Administrator\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Hash;

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class WorksController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadModel('Works');
	}

	public function index() {
		$results = $this->Works->find('all')->toArray();
		$this->set(compact('results'));
	}

	public function add() {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data);
		}
		$this->_getMetadata();
		$result = [];
		$result['galleries'] = [];
		$result['galleries_str'] = '';
		$this->set(compact('result'));
		$this->render('form');
	}

	public function edit($id) {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data, $id);
		}
		$result = $this->Works->get($id, [
    	'contain' => ['Galleries']
		]);
		$result['galleries_str'] = '';
		$this->_getMetadata();
		$this->set(compact('result'));
		$this->render('form');
	}

	private function _save($data, $id = null) {
		$result = $this->defaultAjaxResult;
		$error = false;
		$isCreate = false;
		if ($error) {
			$result['message'] = __('Data not save');
		} else {
			if(isset($data['id']) && !is_numeric($data['id'])) {
				$isCreate = true;
				unset($data['id']);
			} else if (!isset($data['id'])) {
				$isCreate = true;
			}
			$saveData = $this->Works->newEntity($data);
			$this->Works->save($saveData);
			$id = $saveData->id;
			if(is_numeric($id))	{
				$saveData['id'] = $id;
				if($isCreate) {
					$images = explode('|', $data['galleries']);
					$Galleries = $this->loadModel('Galleries');
					$Galleries->updateAll(
		        ['reference_id' => $id],
		        ['id IN' => $images]
					);
				}
				$result = array(
					'success' => true,
					'data' => $saveData,
					'message' => __('Data saved'),
					//'redirect' => Router::url(['controller' => 'works', 'action' => 'index'])
				);
			}	else {
				$result['message'] = __('Data not save');
			}
		}
		echo json_encode($result);
		exit;
	}

	private function _getMetadata() {
		$Categories = $this->loadModel('Categories');
		$categories = $Categories->find('threaded')->toArray();
		$this->set(compact('categories'));
	}

}
