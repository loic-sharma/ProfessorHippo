<?php

View::composer('layout', function($event)
{
	$event->view->navigation = Menu::get('main');

	// Suppress a nasty error message if the content
	// isn't set.
	if( ! isset($event->view->content))
	{
		$event->view->content = '';
	}

	$event->view->sidebar = 'Sidebar';

	$event->view->loadtime = round(microtime(true)-LARAVEL_START, 4);
});