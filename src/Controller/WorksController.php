<?php
namespace App\Controller;

use App\Controller\AppController;
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

	public function index($cat = null) {
		$this->loadModel('Categories');
		$path = [];
		if (is_numeric($cat)) {
			$path = $this->Categories->find('list')->where(['parent_id' => $cat])->toArray();
			$ids = array_merge([$cat], array_keys($path));
			$results = $this->Works->find('all')->contain(['Avatar'])->where(['display' => 1, 'category_id IN'=> $ids])->toArray();
		} else {
			$catsByModule = $this->Categories
			->find('list')
			->where(['Categories.display' => 1, 'Modules.type' => 'work', 'Modules.alias' => $cat])
			->contain(['Modules'])->toArray();
			$results = $this->Works->find('all')
			->where(['display' => 1, 'category_id IN'=> array_keys($catsByModule)])
			->contain(['Avatar'])->toArray();
		}
		$this->set(compact('results', 'cat', 'path'));
	}

	public function detail($id) {
		$result = $this->Works->get($id, [
    	'contain' => ['Galleries']
		]);
		$this->set(compact('result'));
	}

	private function _getMetadata() {
		$Categories = $this->loadModel('Categories');
		$categories = $Categories->find('threaded')->toArray();
		$this->set(compact('categories'));
	}

}
