<?php
App::uses('AppController', 'Controller');
/**
 * Eventpics Controller
 *
 * @property Eventpic $Eventpic
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventpicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	private function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
	
	public function addpic($eid = null)
	{
		$lookup = ClassRegistry::init('eventpics');
		debug($this->request->data);
		if ($lookup->find('count', array('conditions' => array('eventpics.eid' => $eid))) > 9)
		{	
			$this->Session->setFlash(__('Maximum 10 pictures'));
		}
		if (isset($this->request->data['Eventpics']['Choose file']))
    	{
    		$lookup->create();
    		$lookup->eid = $eid;
    		$ending = pathinfo($this->request->data['Eventpics']['Choose file']['name'], PATHINFO_EXTENSION);
    		$name = $this->generateRandomString(10);
    		$filename = APP . "webroot/img/events/". $eid . $name . "." . $ending;
    		$lookup->path = $eid . $name . "." . $ending;
    		if ($lookup->find('count', array('conditions' => array('eventpics.eid' => $eid))) > 0)
    			$lookup->showed = 0;
    		else
    			$lookup->showed = 1;
    		if (move_uploaded_file($this->request->data['Eventpics']['Choose file']['tmp_name'],$filename))
    		{
    			if ($lookup->save($lookup))
    			{	
	    			$this->Session->setFlash(__('The picture has been uploaded'));
	    		}
	    		else
    			{
    				$this->Session->setFlash(__('The picture failed to upload'));
    			}
    		}
    		else
    		{
    			$this->Session->setFlash(__('The picture failed to upload'));
    		}
    	}
    	return $this->redirect($this->referer());
	}
	
	public function findall($eid = null)
	{
		$lookup = ClassRegistry::init('eventpics');
		$list = array();
		$list[0] = $lookup->find('first', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 1 ), 'fields' => array('eventpics.path')))['eventpics']['path'];
		debug($list);
		if ($lookup->find('count', array('conditions' => array('eventpics.eid' => $eid), 'fields' => 'eventpics.path')) > 0)
		{
			$tlist = $lookup->find('all', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 0 ), 'fields' => array('eventpics.path')));
			$a = 1;
			foreach($tlist as $v){
				$list[$a] = $v['eventpics']['path'];
				$a += 1;
			}
		}
		else
		{
			$list[0] = "default.png";
		}
		debug($list);
		return $list;
	}

}
