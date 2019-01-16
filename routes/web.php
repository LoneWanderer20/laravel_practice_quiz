<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
// index   GET     /topics
// show    GET     /topics/{topic}
// edit    GET     /topics/{topic}/edit
// update  PATCH   /topics/{topic}
// create  GET     /topics/create
// store   PUT     /topics
// delete DELETE   /topics/{topic}
//
// Route::resource('topics', 'TopicsController');
//
// php artisan make:controller TopicsController -r -m Topic
// Route::resource('topics', 'TopicController')->without('delete')


Route::get('/topics/add', 'PagesController@show_add_topic');

Route::get('/topics/add/{topic}', 'PagesController@add_topic');

Route::patch('/topics/remove', 'PagesController@remove_topic');

Route::get('/', 'PagesController@home');

Route::get('/topics/{topic}', 'PagesController@topic_questions')->name('topics.show');

Route::get('/topics', 'PagesController@topics');

Route::post('/topic/score', 'PagesController@updateUserScores');

Route::get('/quiz/question_pool', 'PagesController@question_pool');

Route::get('/quiz/question_pool/add/{topic}', 'PagesController@add_to_pool');

Route::get('/quiz/question_pool/remove/{topic}', 'PagesController@remove_from_pool');

Route::get('/quiz', 'PagesController@quiz');

Route::get('/profile', 'UsersController@index');

Route::get('/profile/setup', 'UsersController@setup');
Route::post('/profile/setup', 'UsersController@profileSetup');

Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});
