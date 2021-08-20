<?php
/**
 *
 */
class Empleados extends Controller {
	/**
	 * @var mixed
	 */
	private $empleadoModel;
	private $areaModel;
	private $rolModel;

	public function __construct() {
		// The below is how we can load models with the controller
		$this->empleadoModel = $this->model('Empleado');
	}

	public function index() {

	}

	public function create() {
		$this->areaModel = $this->model('Area');
		$this->rolModel = $this->model('Rol');

		$data = [
			'title' => 'Crear Empleado',
			'areas' => $this->areaModel->getAreas(),
			'roles' => $this->rolModel->getRoles(),
		];

		$this->view('empleados/create', $data);
	}

	public function store() {
	}
	public function show() {
		// code...
	}
	public function edit() {
		// code...
	}
	public function update() {
		// code...
	}
	public function destroy() {
		// code...
	}
}