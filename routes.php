<?php
/**
 * Add Routes to Router
 *
 * Adds routes to the $router (instantiated in public/index.php)
 * to allow the calling of the appropriate method
 *
 * Filename:        routes.php
 * Location:        /
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */
global $router;

/**
 * HomeController aka StaticPageController used to display static pages
 */
$router->get('/', 'HomeController@index');
$router->get('/dashboard', 'HomeController@dashboard');
$router->get('/test', 'HomeController@test');


$router->get('/import', "CsvImportController@index");
$router->post('/import', "CsvImportController@store");

/**
 * UserController methods for authentication/registration
 */
$router->get('/auth/register', 'UserController@register', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store_register', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);

/**
 * Category Feature Routes
 *
 * HTTP VERB    URI Example             Controller              Method      Purpose
 * GET          /categories             CategoryController      index       Categories index (browse)
 * GET          /categories/create      CategoryController      create      Add Category form
 * GET          /categories/123         CategoryController      edit        Display edit category with {id} form
 * GET          /categories/123         CategoryController      delete      Confirm delete category with {id}
 * GET          /categories/            CategoryController      search      Perform category search
 * GET          /categories/123         CategoryController      show        Display category with {id} details
 * POST         /categories/            CategoryController      create      Insert new category into table
 * PUT          /categories/123         CategoryController      update      Perform update category {id} in table
 * DELETE       /categories/123         CategoryController      destroy     Remove category {id} from table
 */
$router->get('/categories', 'CategoryController@index');
$router->get('/categories/create', 'CategoryController@create', ['auth']);
$router->get('/categories/edit/{id}', 'CategoryController@edit', ['auth']);
$router->get('/categories/delete/{id}', 'CategoryController@delete', ['auth']);
$router->get('/categories/search', 'CategoryController@search');
$router->get('/categories/{id}', 'CategoryController@show');

$router->post('/categories', 'CategoryController@store', ['auth']);
$router->put('/categories/{id}', 'CategoryController@update', ['auth']);
$router->delete('/categories/{id}', 'CategoryController@destroy', ['auth']);

/**
 * Example Routes for a feature (Feature)
 *
 * $router->HTTP_METHOD('PATH', 'CONTROLLER_NAME@METHOD', OPTIONAL_MIDDLEWARE)
 *
 * PATH is based on the pluralised version of the FEATURE_NAME
 * CONTROLLER_NAME is usually in the form "NAME" in Pascal Case with Controller added
 * METHOD is the Controller Class method (function) that is called
 * OPTIONAL_MIDDLEWARE indicates if middleware is used for example to ensure a user is authenticated, or is a guest
 */
$router->get('/features', 'FeatureController@index');
$router->get('/features/create', 'FeatureController@create', ['auth']);
$router->get('/features/edit/{id}', 'FeatureController@edit', ['auth']);
$router->get('/features/delete/{id}', 'FeatureController@delete', ['auth']);
$router->get('/features/search', 'FeatureController@search');
$router->get('/features/{id}', 'FeatureController@show');

$router->post('/features', 'FeatureController@store', ['auth']);
$router->put('/features/{id}', 'FeatureController@update', ['auth']);
$router->delete('/features/{id}', 'FeatureController@destroy', ['auth']);

/**
 * Example Category Feature Routes
 */
$router->get('/categories', 'CategoryController@index');
$router->get('/categories/create', 'CategoryController@create', ['auth']);
$router->get('/categories/edit/{id}', 'CategoryController@edit', ['auth']);
$router->get('/categories/search', 'CategoryController@search');
$router->get('/categories/{id}', 'CategoryController@show');

$router->post('/categories', 'CategoryController@store', ['auth']);
$router->put('/categories/{id}', 'CategoryController@update', ['auth']);
$router->delete('/categories/{id}', 'CategoryController@destroy', ['auth']);

/**
 * Jokes Routes
 */


/**
 * User Routes
 */
