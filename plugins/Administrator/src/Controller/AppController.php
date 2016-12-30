<?php

namespace Administrator\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\Routing\Router;

class AppController extends BaseController {
  public $ACCOUNT = 0;
  public $MODULE = 'Dashboards';
	public $INDEX = [
    'title' => 'Dashboards',
    'link' => ''
  ];
	public $SUB = '';
  public function initialize()
  {
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
      'loginRedirect' => [
        'controller' => 'dashboards',
        'action' => 'index'
      ],
      'logoutRedirect' => [
        'controller' => 'users',
        'action' => 'login'
      ],
      'loginAction' => [
        'controller' => 'users',
        'action' => 'login',
        'plugin' => 'administrator'
      ]
    ]);
  }

  /**
   * Before render callback.
   *
   * @param \Cake\Event\Event $event The beforeRender event.
   * @return void
   */
  function beforeFilter(Event $event) {
		$this->viewBuilder()->layout('Administrator.default');
    $this->getAllConfigs();
    $this->isAuthorized();
    $this->set('MODULE', $this->MODULE);
    $this->set('INDEX', $this->INDEX);
    $this->set('SUB', $this->SUB);
  }

  /**
   *
   */
  function isAuthorized() {
		if($this->Auth->user())	{
			//$USER = $this->Session->read('Auth.User.username');
      $USER = $this->Auth->user()['username'];
			$this->loadModel('Users');
			$info = $this->Users->find()->where([
        'Users.username' => $USER
      ])->first();
			//$this->Session->write('Auth.Info', $info);
			//$this->ROLE = $this->Session->read('Auth.Info.User.role');
			if($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'login')
			{
				//$this->redirect($this->Auth->loginRedirect);
			}
		}
	}

  /**
   *
   */
  function getAllConfigs() {
		$ACCOUNT = 0;
		$this->loadModel('Configs');
		$this->systemConfigs = $this->Configs->find('list', [
      'keyField'=> 'name',
      'valueField' => 'value'
    ])->toArray();
		$this->set('systemConfigs', $this->systemConfigs);
	}

  /**
   *
   */
  function getSystemConfig($name) {
		return isset($this->systemConfigs[$name]) ? $this->systemConfigs[$name] : null;
	}
}
