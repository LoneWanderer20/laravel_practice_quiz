<?php

Route::get('/topics/add', 'UserTopicsController@index');
Route::get('/topics/add/{topic}', 'UserTopicsController@addTopic');
Route::get('/topics/remove/{topic}', 'UserTopicsController@removeTopic');

Route::get('/topics', 'TopicsController@index');
Route::get('/topics/{topic}', 'TopicsController@show')->name('topics.show');

Route::post('/topic/score', 'QuestionsController@updateUserScores');
Route::get('/quiz/questions', 'QuestionsController@quizQuestions');
Route::get('/quiz/questions/add/{topic}', 'QuestionsController@addQuestionToQuiz');
Route::get('/quiz/questions/remove/{topic}', 'QuestionsController@removeQuestionFromQuiz');
Route::get('/quiz', 'QuestionsController@quiz');

Route::get('/profile', 'UsersController@index');
Route::get('/', 'UsersController@home');
Route::get('/profile/setup', 'UsersController@setup');
Route::post('/profile/setup', 'UsersController@profileSetup');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
