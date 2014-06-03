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
	
	
	public function addpic($eid = null){
		$lookup = ClassRegistry::init('eventpics');
		if ($lookup->find('count', array('conditions' => array('eventpics.eid' => $eid))) > 9){	
			$this->Session->setFlash(__('Maximum 10 pictures'));
			return $this->redirect($this->referer());
		}

		if (isset($this->request->data['Eventpics']['Choose file'])){
    		$lookup->create();
    		$lookup->eid = $eid;
    		$ending = pathinfo($this->request->data['Eventpics']['Choose file']['name'], PATHINFO_EXTENSION);
    		$name = $this->generateRandomString(10);
    		$filename = APP . "webroot/img/events/". $eid . $name . "." . $ending;
    		$lookup->path = $eid . $name . "." . $ending;
    		if ($lookup->find('count', array('conditions' => array('eventpics.eid' => $eid))) > 0){
    			$lookup->showed = 0;
    		}else{
    			$lookup->showed = 1;
    		}
    		
    		if (move_uploaded_file($this->request->data['Eventpics']['Choose file']['tmp_name'],$filename)){
    			if ($lookup->save($lookup)){	
	    			$this->Session->setFlash(__('The picture has been uploaded'));
	    		}else{
    				$this->Session->setFlash(__('The picture failed to upload'));
    			}
    		}else{
    			$this->Session->setFlash(__('The picture failed to upload'));
    		}
    	}
    	return $this->redirect($this->referer());
	}
	
	
	public function findall($eid = null){
		$lookup = ClassRegistry::init('eventpics');
		$list = array();
		$list[0] = $lookup->find('first', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 1 ), 'fields' => array('eventpics.path')));
		if (!empty($list[0])){
			$list[0] = $list[0]['eventpics']['path'];
			$tlist = $lookup->find('all', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 0 ), 'fields' => array('eventpics.path')));
			$a = 1;
			foreach($tlist as $v){
				$list[$a] = $v['eventpics']['path'];
				$a += 1;
			}
		}else{
			$list[0] = "default.png";
		}
		
		return $list;
	}
	
	
	public function getdef($eid = null){
		$lookup = ClassRegistry::init('eventpics');
		$list = $lookup->find('first', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 1 ), 'fields' => array('eventpics.path')));
		if (!empty($list)){
			$list = $list['eventpics']['path'];
		}else{
			$list = "default.png";
		}
		
		return $list;
	}
	
	
	public function delete($path = null){
		$lookup = ClassRegistry::init('eventpics');
		$data = $lookup->find('first', array('conditions' => array('eventpics.path' => $path ), 'fields' => array('eventpics.id', 'eventpics.eid', 'eventpics.showed')));
		$id = $data['eventpics']['id'];
		$eid = $data['eventpics']['eid'];
		$showed = $data['eventpics']['showed'];
		$lookup->id = $id;
		if (!$lookup->exists()) {
            throw new NotFoundException(__('Invalid Image'));
        }
        if ($lookup->delete()) {
            $this->Session->setFlash(__('Image deleted'));
            $filename = APP . "webroot/img/events/". $path;
            unlink($filename);
        	if($showed == 1){
        		$id2 = $lookup->find('first', array('conditions' => array('eventpics.eid' => $eid ), 'fields' => array('eventpics.id')));
        		if(!empty($id2)){
        			$id2 = $id2['eventpics']['id'];
					$this->Eventpic->id = $id2;
					$this->Eventpic->saveField('showed', 1);
				}
        	}
            return $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Image was not deleted'));
        return $this->redirect($this->referer());
	}

	
	public function makedef($path = null){
		$lookup = ClassRegistry::init('eventpics');
		$lookup2 = ClassRegistry::init('eventpics');
		$tmp = $lookup->find('first', array('conditions' => array('eventpics.path' => $path ), 'fields' => array('eventpics.id')));
		$id = $tmp['eventpics']['id'];
		
		$tmp = $lookup->find('first', array('conditions' => array('eventpics.path' => $path ), 'fields' => array('eventpics.eid')));
		$eid = $tmp['eventpics']['eid'];
		
		$tmp = $lookup->find('first', array('conditions' => array('eventpics.eid' => $eid, 'eventpics.showed' => 1 ), 'fields' => array('eventpics.id')));
		$id2 = $tmp['eventpics']['id'];
		$lookup->id = $id;
		$lookup2->id = $id2;
		if (!$lookup->exists() || !$lookup2->exists()) {
            throw new NotFoundException(__('Invalid Image'));
        }
        $this->Eventpic->id = $id2;
        
        $this->Eventpic->saveField('showed', 0);
        $this->Eventpic->id = $id;
		$this->Eventpic->saveField('showed', 1);
		
		return $this->redirect($this->referer());
	}
}
