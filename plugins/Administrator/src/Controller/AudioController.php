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
class AudioController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadModel('Audio');
	}

	public function index($cat = null) {
		if ($cat === null) {
			$results = $this->Audio->find('all')
														 ->limit(10)
														 ->order(['Audio.id' => 'DESC'])
														 ->contain(['Singers'])
														 ->toArray();
		} else {
			$results = $this->Audio->find('all')
			                       ->where(['cat_id'=> $cat])
														 ->limit(10)
														 ->order(['Audio.id' => 'DESC'])
														 ->contain(['Singers'])
														 ->toArray();
		}
		$this->set(compact('results', 'cat'));
	}

	public function add($cat = null) {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data);
		}
		$this->_getMetadata();
		$result = [];
		if ($cat !== null) {
			$result['category_id'] = $cat;
		}
		$result['galleries'] = [];
		$this->set(compact('result'));
		$this->render('form');
	}

	public function edit($id) {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data, $id);
		}
		$result = $this->Audio->get($id);
		$this->_getMetadata();
		$this->set(compact('result'));
		$this->render('form');
	}

	public function delete($id) {
		$this->viewBuilder()->layout('ajax');
		$results = $this->defaultAjaxResult;
		$entity = $this->Works->get($id);
		$result = $this->Works->delete($entity, ['atomic' => false]);
		if ($result) {
			$results['success'] = true;
			$results['data'] = $entity;
			$results['message'] = __('Deleted an item', true);
		}
		echo json_encode($results);
		exit;
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
			$saveData = $this->Audio->newEntity($data);
			$this->Audio->save($saveData);
			$id = $saveData->id;
			if(is_numeric($id))	{
				$saveData['id'] = $id;
				$result = array(
					'success' => true,
					'data' => $saveData,
					'message' => __('Data saved'),
					'redirect' => Router::url(['controller' => 'audio', 'action' => 'index', $saveData['cat_id']])
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

		$Singers = $this->loadModel('Singers');
		$singers = $Singers->find('all')
											 ->order(['name' => 'ASC'])
											 ->toArray();
		$singers = Hash::combine($singers, '{n}.id', '{n}.name');

		$AudioAlbums = $this->loadModel('AudioAlbums');
		$albums = $AudioAlbums->find('all')
		                      ->order(['id' => 'DESC'])
		                      ->toArray();
		$albums = Hash::combine($albums, '{n}.id', '{n}.name');

		$this->set(compact('categories', 'singers', 'albums'));
	}

}
