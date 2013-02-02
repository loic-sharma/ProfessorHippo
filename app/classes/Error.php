<?php

use Illuminate\Support\MessageBag;

class Error {

	/**
	 * Compact the error in a message bag.
	 *
	 * @param  string  $error
	 * @return Illuminate\Support\MessageBag
	 */
	public static function make($error)
	{
		return new MessageBag(compact('error'));
	}
}