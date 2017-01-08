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
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	//public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index($cat = null) {
		if(is_numeric($cat)) {
			$results = $this->Pages->find('all')->where(['cat' => $cat])->toArray();
		} else {
			$results = $this->Pages->find('all')->toArray();
		}
		$this->set(compact('results', 'cat'));
	}

	public function add($cat = null) {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data);
		}
		$action = 'add';
		$category = $this->staticPageCat;
		$this->set(compact('action', 'category', 'cat'));
		$this->render('form');
	}

	public function edit($id) {
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$this->_save($this->request->data, $id);
		}
		$action = 'edit';
		$cat = $this->staticPageCat;
		$result = $this->Pages->get($id);
		$this->set(compact('action', 'category', 'result', 'id', 'cat'));
		$this->render('form');
	}

	public function delete($id) {
		$this->viewBuilder()->layout('ajax');
		$results = $this->defaultAjaxResult;
		$entity = $this->Pages->get($id);
		$result = $this->Pages->delete($entity, ['atomic' => false]);
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
		if(!empty($data))	{
			$error = false ;
			if($error) {
				$result['message'] = __('Data not saved', true);
			} else {
				if(isset($data['id']) && !is_numeric($data['id'])) {
					unset($data['id']);
				}
				$saveData = $this->Pages->newEntity($data);
				$this->Pages->save($saveData);
				$id = $saveData->id;
				if(is_numeric($id))	{
					$saveData['id'] = $id;
					$result = array(
						'success' => true,
						'data' => $saveData,
						'message' => __('Data saved', true),
						'redirect' => Router::url(['controller' => 'pages', 'action' => 'index'])
					);
				}	else {
					$result['message'] = __('Data not saved', true);
				}
			}
		}
		echo json_encode($result);
		exit;
	}
}
