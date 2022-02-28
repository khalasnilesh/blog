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
$router->get('/customers/{id}', 'CustomersController@show');
$router->post('/customers/update/{id}', 'CustomersController@update');
$router->delete('/customers/delete/{id}', 'CustomersController@destroy');
$router->post('/customers/delete', 'CustomersController@deleteMultiple');

// customer-meta
$router->get('/customer-meta', 'CustomerMetaController@index');
$router->post('/customer-meta/create', 'CustomerMetaController@store');


// sites
$router->get('/sites', 'SitesController@index');
$router->post('/sites/create', 'SitesController@store');
$router->get('/sites/{id}', 'SitesController@show');
$router->post('/sites/update/{id}', 'SitesController@update');
$router->delete('/sites/delete/{id}', 'SitesController@destroy');
$router->post('/sites/delete', 'SitesController@deleteMultiple');

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
$router->get('/webhooks/{id}', 'WebhooksController@show');
$router->post('/webhooks/update/{id}', 'WebhooksController@update');
$router->delete('/webhooks/delete/{id}', 'WebhooksController@destroy');
$router->post('/webhooks/delete', 'WebhooksController@deleteMultiple');

// reports
$router->get('/reports', 'ReportsController@index');
$router->post('/reports/create', 'ReportsController@store');
$router->get('/reports/{id}', 'WebhooksController@show');
$router->post('/reports/update/{id}', 'ReportsController@update');
$router->delete('/reports/delete/{id}', 'ReportsController@destroy');
$router->post('/reports/delete', 'ReportsController@deleteMultiple');


// users
$router->get('/users', 'UsersController@index');
$router->post('/users/create', 'UsersController@store');
$router->get('/users/{id}', 'UsersController@show');
$router->post('/users/update/{id}', 'UsersController@update');
$router->delete('/users/delete/{id}', 'UsersController@destroy');
$router->post('/users/delete', 'UsersController@deleteMultiple');