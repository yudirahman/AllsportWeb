<?php 
/*
* 201610211405
*/
function cutter($field) { Cutter::init()->field($field); }
function cutter_start($name) { Cutter::init()->start($name); }
function cutter_end() { Cutter::init()->end(); }

function cutter_load_file($path, $data) {
	extract($data); include($path); 
}

class Cutter
{
	protected static $inst;
	public $config = [];
	public $dataset = [];
	public $viewset = [];
	public $layout = null;
	public $layout_admin=null;
	private $current_field = null;

	function __construct() {}
	private function create_view_path($name)
	{
		return (trim(ROOT_VIEW, '/') . '/' . trim($name, '/') . '.php');
	}

	public static function init()
	{
		if (!isset(static::$inst)) {
			static::$inst = new Cutter();
			static::$inst->layout = TEMPLATE_WEB;
			static::$inst->layout_admin = TEMPLATE_ADMIN;
		}
		return static::$inst;
	}

	public function field($name)
	{
		if (isset($this->viewset[$name])) {
			echo implode(null, $this->viewset[$name]);
		}
	}

	public function view($name, $data = [], $render = true)
	{
		$this->dataset = array_merge($this->dataset, $data);
		cutter_load_file($this->create_view_path($name), $this->dataset);
		if ($render) $this->render();
	}

	public function view_admin($name, $data = [], $render = true)
	{
		$this->dataset = array_merge($this->dataset, $data);
		cutter_load_file($this->create_view_path($name), $this->dataset);
		if ($render) $this->render_admin();
	}

	public function render()
	{
		cutter_load_file($this->create_view_path($this->layout), $this->dataset);
	}

	public function render_admin()
	{
		cutter_load_file($this->create_view_path($this->layout_admin), $this->dataset);
	}

	public function start($name)
	{
		if ($this->current_field !== null) exit(0);
		$this->current_field = $name;
		ob_start();
	}

	public function end()
	{
		if ($this->current_field === null) exit(0);
		$this->viewset[$this->current_field][] = ob_get_clean();
		$this->current_field = null;
	}
}
