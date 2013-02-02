<?php

class BaseController extends Controller {

	/**
	 * The current page's breadcrumbs.
	 *
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * Add a breadcrumb.
	 *
	 * @param  string  $name
	 * @param  stirng  $link
	 * @return void
	 */
	public function addBreadcrumb($name, $link = null)
	{
		$this->breadcrumbs[] = (object) compact('name', 'link');
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);

			$this->layout->breadcrumbs = $this->breadcrumbs;
		}
	}
}