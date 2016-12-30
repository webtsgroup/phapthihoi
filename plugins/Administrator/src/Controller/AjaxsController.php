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
class AjaxsController extends AppController {

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
	public function updateField() {
		$this->layout = 'ajax';
		$this->render(false);
		$DATA = $this->data;
		if(!empty($DATA))
		{
			$this->loadModel($DATA['model']);
			$result = array(
				'success' => true,
				'data' => array(),
				'message' => 'Updated'
			);
			$this->$DATA['model']->id = $DATA['id'];
			$this->$DATA['model']->saveField($DATA['field'],$DATA['value']);
			echo json_encode($result);
			exit;
		}
	}
	public function upload()
	{
		// inside your controller's initialize
		$this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');
		$this->layout = 'ajax';
		$this->render(false);

		$data = $this->request['data'];
		//debug($data);
		$img = -1;
		if(!empty($data))
		{
			$options = array(
		    'max_file_size' => 2048000,
		    'max_number_of_files' => 10,
		    'access_control_allow_methods' => array(
		        'POST'
		    ),
		    'access_control_allow_origin' => Router::fullBaseUrl(),
		    'accept_file_types' => '/\.(jpe?g|png)$/i',
		    'upload_dir' => WWW_ROOT . 'uploads' . DS . 'galleries' . DS,
		    'upload_url' => '/uploads/galleries/',
		    'print_response' => false
			);
			$result = $this->JqueryFileUpload->upload($options);
		}
		echo json_encode($result);
		exit;
	}
	public function deleteImage($id)
	{
		$results = $this->defaultAjaxResult;
		if(is_numeric($id)){
			$this->loadModel('Galleries');
			$record = $this->Gallery->find('first', array(
				'recursive' => -1,
				'condition' => array('id' => $id)
			));
			$this->LIB->remove($record['Gallery']['file'], 'gallery');
			$_result = $this->Gallery->delete($id);
			if($_result) {
				$results['success'] = true;
				$results['message'] = 'Deleted';
			}
		}
		echo json_encode($results);
		exit;
	}
	public function multipleUpload($id, $type = 'house') {
		$this->layout = 'ajax';
		$this->render(false);

		$data = $this->request['data'];
		if(!empty($data))
		{
			$config = array(
				'file' => 'file',
				'folder' => 'gallery',
				'createThumb' => true,
				'thumbSize' => "w=200"
			);
			if($type == 'work') {
				$config['thumbSize'] = "w=480&h=480&zc=1";
				$_saves['place_id'] = $id;
				$_saves['type'] = 2;
			}
			else if ($type == 'slider') {
				$config['thumbSize'] = "w=380&h=190&zc=1";
				$_saves['slider_id'] = $id;
				$_saves['type'] = 3;
			}
			else if ($type == 'article') {
				$config['thumbSize'] = "w=400&h=300&zc=1";
				$_saves['article_id'] = $id;
				$_saves['type'] = 4;
			}
			else {
				$config['thumbSize'] = "w=380&h=250&zc=1";
				$_saves['house_id'] = $id;
			}

			$result = $this->LIB->upload($config);
			if($result['success'])
			{
				$_saves['file'] = $result['img'];
				$saves['Gallery'] = $_saves;
				$this->loadModel('Gallery');
				$this->Gallery->create();
				$this->Gallery->save($saves);
				$result['folder'] = 'gallery';
				$result['src'] = $result['img'];
				$result['id'] = $this->Gallery->getLastInsertId();
			}
		}
		echo json_encode($result);
		exit;
	}
}
