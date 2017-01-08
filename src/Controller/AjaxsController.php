<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

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
		$this->viewBuilder()->layout('ajax');
		$this->render(false);
		$data = $this->request->data;
		$result = $this->defaultAjaxResult;
		if(!empty($data) && $this->request->is('ajax')) {
			$Table = $this->loadModel($data['model']);
			$result = array(
				'success' => true,
				'data' => array(),
				'message' => 'Updated'
			);
			$dataSave = array(
				'id' => $data['id'],
				$data['field'] => $data['value']
			);
			debug($dataSave);
			$itemData = $Table->newEntity($dataSave);
			$Table->save($itemData);
			echo json_encode($result);
			exit;
		}
	}
	public function upload($type, $referenceId = 0) {
		$this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');
		$this->viewBuilder()->layout('ajax');
		$this->render(false);

		$data = $this->request['data'];
		$results = $this->defaultAjaxResult;
		//debug($data);
		$img = -1;
		if(!empty($data)) {
			$options = array(
		    'max_file_size' => 2048000,
		    //'max_number_of_files' => 10,
		    'access_control_allow_methods' => array(
		      'POST'
		    ),
		    'access_control_allow_origin' => Router::fullBaseUrl(),
		    'accept_file_types' => '/\.(jpe?g|png)$/i',
		    'upload_dir' => WWW_ROOT . 'uploads' . DS . 'galleries' . DS,
		    'upload_url' => '/uploads/galleries/',
		    'print_response' => false,
				'image_versions' => array(
					'thumbnail' => array(
						'max_width' => 320,
            'max_height' => 270
					)
				)
			);
			$uploaded = $this->JqueryFileUpload->upload($options);
			$uploaded = json_decode(json_encode($uploaded), true);
			$uploaded = $uploaded['files'][0];
			if(!isset($uploaded['error'])) {
				$Galleries = $this->loadModel('Galleries');
				$dataSave = [];
				$dataSave['file'] = $uploaded['name'];
				$dataSave['type'] = $type;
				$dataSave['reference_id'] = $referenceId;
				$itemData = $Galleries->newEntity($dataSave);
				$Galleries->save($itemData);
				$results['src'] = $uploaded['url'];
				$results['thumbnailUrl'] = $uploaded['thumbnailUrl'];
				$results['id'] = $itemData->id;
			}
		}
		echo json_encode($results);
		exit;
	}

	public function deleteImage($id) {
		$results = $this->defaultAjaxResult;
		if(is_numeric($id)){
			$Galleries = $this->loadModel('Galleries');
			$entity = $Galleries->get($id);
			//$this->LIB->remove($record['Gallery']['file'], 'gallery');
			$_result = $Galleries->delete($entity, ['atomic' => false]);
			if($_result) {
				$results['success'] = true;
				$results['message'] = __('Deleted', true);
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
