<?php


if (app()->getProvider('\Dingo\Api\Provider\LaravelServiceProvider')) {


	$api = app('Dingo\Api\Routing\Router');

	$api->version('v1', ['middleware' => ['api.auth']], function ($api) {
		
		//$api->resource('user/events', 			config('tw-events.controllers.events'));

	});
}