<?php
App::uses('AppController', 'Controller');
/**
 * BannersBannercategories Controller
 *
 * @property BannersBannercategory $BannersBannercategory
 * @property PaginatorComponent $Paginator
 */
class BannersBannercategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BannersBannercategory->recursive = 0;
		$this->set('bannersBannercategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BannersBannercategory->exists($id)) {
			throw new NotFoundException(__('Invalid banners bannercategory'));
		}
		$options = array('conditions' => array('BannersBannercategory.' . $this->BannersBannercategory->primaryKey => $id));
		$this->set('bannersBannercategory', $this->BannersBannercategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BannersBannercategory->create();
			if ($this->BannersBannercategory->save($this->request->data)) {
				$this->Session->setFlash(__('The banners bannercategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banners bannercategory could not be saved. Please, try again.'));
			}
		}
		$banners = $this->BannersBannercategory->Banner->find('list');
		$bannercategories = $this->BannersBannercategory->Bannercategorie->find('list');
		$this->set(compact('banners', 'bannercategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BannersBannercategory->exists($id)) {
			throw new NotFoundException(__('Invalid banners bannercategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BannersBannercategory->save($this->request->data)) {
				$this->Session->setFlash(__('The banners bannercategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banners bannercategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BannersBannercategory.' . $this->BannersBannercategory->primaryKey => $id));
			$this->request->data = $this->BannersBannercategory->find('first', $options);
		}
		$banners = $this->BannersBannercategory->Banner->find('list');
		$bannercategories = $this->BannersBannercategory->Bannercategorie->find('list');
		$this->set(compact('banners', 'bannercategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BannersBannercategory->id = $id;
		if (!$this->BannersBannercategory->exists()) {
			throw new NotFoundException(__('Invalid banners bannercategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BannersBannercategory->delete()) {
			$this->Session->setFlash(__('The banners bannercategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banners bannercategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
