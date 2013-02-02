<?php

View::composer('layout', function($event)
{
	$event->view->navigation = Menu::get('main');

	$event->view->sidebar = 'Sidebar';

	$event->view->breadcrumbs = BaseController::$breadcrumbs;

	$event->view->loadtime = round(microtime(true)-LARAVEL_START, 4);
});