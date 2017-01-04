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
class ConfigsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */

	public function initialize() {
		parent::initialize();
		$this->loadModel('Configs');
	}

	public function index() {
		//$this->set('socialLink', $this->socialLink);
	}

	public function editMe($field = null, $value = null, $private = false) {
		$result = $this->defaultAjaxResult ;
		$ACCOUNT = 0;
		if(!empty($this->request->data) && $this->request->is('ajax')) {
			$DATA = $this->request->data;
		}
		$check = $this->Configs->find('all')
		->where([
			'name' => $DATA['field']
		])->toArray();
		if ($check) {
			$this->Configs->updateAll(
				['value' => "" . $DATA['value']],
				['name' => $DATA['field'], 'account_id' => $ACCOUNT]
			);
			$result['success'] = true;
			$result['data'] = array();
			$result['message'] = __('Updated', true);
		} else {
			$saveData = $this->Configs->newEntity([
				'name' => $DATA['field'],
				'value' => $DATA['value']
			]);
			$data = $this->Configs->save($saveData);
			$result['success'] = true;
			$result['data'] = $data;
			$result['message'] = __('Saved', true);
		}
		echo json_encode($result);
		exit;
	}
}
