<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 */
class BannersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('get');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
		$this->set('banner', $this->Banner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$banner = $this->request->data;
			$image = '';

			# Se setea el usuario creador de la nota = usuario logeado
			$banner['Banner']['user_id'] = AuthComponent::user('id');
			
			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($banner['Banner']['image']['name']) && ($banner['Banner']['image']['name'] != '')) {
				$imageName = $banner['Banner']['image']['name'];
				$uploadDir = IMAGES_URL . 'banners/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($banner['Banner']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $banner));
				}
				
				$image = $imageName;
			}

			$banner['Banner']['image'] = $image;

			$this->Banner->create();
			if ($this->Banner->save($banner)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		}
		$users = $this->Banner->User->find('list');
		$bannercategories = $this->Banner->Bannercategory->find('list');
		$this->set(compact('users', 'bannercategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$banner = $this->request->data;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($banner['Banner']['image']['name']) 
					&& ($banner['Banner']['image']['name'] != '')
					&& isset($banner['Banner']['image']['tmp_name'])
					&& ($banner['Banner']['image']['tmp_name'] != '')) {
				
				$imageName = $banner['Banner']['image']['name'];
				$uploadDir = IMAGES_URL . 'banners/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($banner['Banner']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $banner));
				}
				
				$banner['Banner']['image'] = $imageName;
			
			} else {
				$banner['Banner']['image'] = $this -> Banner -> field('image', array('id'=>$id));
			}

			if ($this->Banner->save($banner)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->request->data['Banner']['image'] = $this -> Banner -> field('image', array('id'=>$id));
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
		$users = $this->Banner->User->find('list');
		$bannercategories = $this->Banner->Bannercategory->find('list');
		$this->set(compact('users', 'bannercategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Banner->delete()) {
			$this->Session->setFlash(__('The banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * get method
 *
 * @throws NotFoundException
 * @param string $id
 * @return banners
 */
	public function get($cantidad = null, $categoria = null, $excluded = null) {
		if (!$cantidad || !$categoria) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$categoria_id = $this->Banner->Bannercategory->field('id', array('name' => $categoria));
		
		if (!$categoria_id) {
			throw new NotFoundException(__('Invalid banner'));
		}
		
		// $options['joins'] = array(
		//     array('table' => 'categories_tracks',
		//         'alias' => 'CategoriesTrack',
		//         'type' => 'inner',
		//         'conditions' => array(
		//             'Track.id = CategoriesTrack.track_id'
		//         )
		//     ),
		//     array('table' => 'categories',
		//         'alias' => 'Category',
		//         'type' => 'inner',
		//         'conditions' => array(
		//             'CategoriesTrack.category_id = Category.id'
		//         )
		//     )
		// );
		$options['joins'] = array(
		    array('table' => 'banners_bannercategories',
		        'alias' => 'BannersBannercategories',
		        'type' => 'inner',
		        'conditions' => array(
		            'Banner.id = BannersBannercategories.banner_id'
		        )
		    ),
		    array('table' => 'bannercategories',
		        'alias' => 'Bannercategory',
		        'type' => 'inner',
		        'conditions' => array(
		            'BannersBannercategories.bannercategory_id = Bannercategory.id'
		        )
		    )
		);
		
		$options['conditions'] = array('Bannercategory.id' => $categoria_id
			, 'Banner.published' => true
		);
		
		# Se excluyen algunos videos para no repetirlos en el listado
		if($excluded):
			$excluded = explode('-', $excluded);
			foreach($excluded as $key => $val)
				if(empty($val))
					unset($excluded[$key]);
			$options['conditions'] = array_merge($options['conditions']
				, array('NOT' => array('Banner.id' => $excluded))
			);
		endif;
		
		$options['limit'] = $cantidad;
		$options['order'] = 'RAND()';
		
		return $this->Banner->find('all', $options);
	}
}