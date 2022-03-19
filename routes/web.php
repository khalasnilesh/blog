<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/test-page', 'TestController@index');


// customers
$router->get('/customers', 'CustomersController@index');	
$router->post('/customers/create', 'CustomersController@store');
$router->post('/customers/details', 'CustomersController@show');
$router->post('/customers/update', 'CustomersController@update');
$router->post('/customers/delete', 'CustomersController@destroy');
$router->post('/customers/delete-multiple', 'CustomersController@deleteMultiple');

// customer-meta
$router->get('/customer-meta', 'CustomerMetaController@index');
$router->post('/customer-meta/create', 'CustomerMetaController@store');


// sites
$router->get('/sites', 'SitesController@index');
$router->post('/sites/create', 'SitesController@store');
$router->post('/sites/details', 'SitesController@show');
$router->post('/sites/update', 'SitesController@update');
$router->post('/sites/delete', 'SitesController@destroy');
$router->post('/sites/delete-multiple', 'SitesController@deleteMultiple');

// site-meta
$router->get('/site-meta', 'SiteMetaController@index');
$router->post('/site-meta/create', 'SiteMetaController@store');


// plugins
$router->get('/plugins', 'PluginsController@index');
$router->post('/plugins/create', 'PluginsController@store');


// events
$router->get('/events', 'EventsController@index');
$router->post('/events/create', 'EventsController@store');


// webhooks
$router->get('/webhooks', 'WebhooksController@index');
$router->post('/webhooks/create', 'WebhooksController@store');
$router->post('/webhooks/details', 'WebhooksController@show');
$router->post('/webhooks/update', 'WebhooksController@update');
$router->post('/webhooks/delete', 'WebhooksController@destroy');
$router->post('/webhooks/delete-multiple', 'WebhooksController@deleteMultiple');

// reports
$router->get('/reports', 'ReportsController@index');
$router->post('/reports/create', 'ReportsController@store');
$router->post('/reports/details', 'ReportsController@show');
$router->post('/reports/update', 'ReportsController@update');
$router->post('/reports/delete', 'ReportsController@destroy');
$router->post('/reports/delete-multiple', 'ReportsController@deleteMultiple');


// users
$router->get('/users', 'UsersController@index');
$router->post('/users/create', 'UsersController@store');
$router->post('/users/details', 'UsersController@show');
$router->post('/users/update', 'UsersController@update');
$router->post('/users/delete', 'UsersController@destroy');
$router->post('/users/delete-multiple', 'UsersController@deleteMultiple');