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
class CategoriesController extends AppController {

	public $MODULE;

	public function initialize() {
		$this->MODULE = $this->request->query['mod'] ? $this->request->query['mod'] : 'article';
    parent::initialize();
    $this->loadModel('Categories');
  }

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
		$mod = $this->MODULE;
		$modules = TableRegistry::get('Modules')->find('list')
		->where(['type'=> $this->MODULE])->toArray();
		$categories = $this->Categories->find('threaded')->toArray();
		$categories = Hash::combine($categories, '{n}.id', '{n}', '{n}.module_id');
		$this->set(compact('modules', 'mod', 'categories'));
	}

	public function edit($id = null) {
		$mod = $this->MODULE;
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data);
		}
		list($modules, $parents) = $this->_getMetadata();
		$action = 'edit';
		$result = $this->Categories->get($id);
		$this->set(compact('result', 'action', 'mod', 'modules', 'parents'));
		$this->render('add');
	}

	public function add() {
		$mod = $this->MODULE;
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data);
		}
		list($modules, $parents) = $this->_getMetadata();
		$action = 'add';
		$result = array();
		$this->set(compact('result', 'action', 'mod', 'modules', 'parents'));
	}

	public function delete($id) {
		$this->viewBuilder()->layout('ajax');
		$results = $this->defaultAjaxResult;
		$entity = $this->Categories->get($id);
		$result = $this->Categories->delete($entity, ['atomic' => false]);
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
		if ($error) {
			$result['message'] = __('Data not save');
		} else {
			if(isset($data['id']) && !is_numeric($data['id'])) {
				unset($data['id']);
			}
			$itemData = $this->Categories->newEntity($data);
			$this->Categories->save($itemData);
			$id = $itemData->id;
			if(is_numeric($id))	{
				$itemData['id'] = $id;
				$result = array(
					'success' => true,
					'data' => $itemData,
					'message' => __('Data saved'),
					'redirect' => Router::url(['controller' => 'categories', 'action' => 'index', '?' => ['mod' => $this->MODULE]])
				);
			}	else {
				$result['message'] = __('Data not save');
			}
		}
		echo json_encode($result);
		exit;
	}

	private function _getMetadata() {
		$modules = TableRegistry::get('Modules')->find('list')
		->where(['type'=> $this->MODULE])->toArray();
		$parent = $this->Categories->find('all')->where([
			'parent_id' => 0,
      'module_id IN' => array_keys($modules)
		])->toArray();
		$result = [];
		$result = Hash::combine($parent, '{n}.id', '{n}', '{n}.module_id');
		return array($modules, $result);
	}

}
