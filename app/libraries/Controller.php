<?php
/*
#
# Base Controller
# Loads the models and view
#
 */

class Controller {
	// load model

	protected $model;
	/*
		     * So, if post is passed to the model method, it would require the model
		     * and then return it. Something like new Post();
	*/
	public function model($model) {
		// Require model file
		require_once APP_ROOT . '/models/' . $model . '.php';

		// Instantiate model
		return new $model();
	}

	// Load view
	/*
	     * View method takes two things, the view(where the view is located; the view file)
	     * and optionally data array, should you need to pass data to the view.
*/
	public function view($view, $data = []) {
		// check for view file
		(file_exists(APP_ROOT . '/views/' . $view . '.php')) ?
		require_once APP_ROOT . '/views/' . $view . '.php' : // Require view file
		die('View does not exist'); // View does not exit, Thus, stop the application
	}
}