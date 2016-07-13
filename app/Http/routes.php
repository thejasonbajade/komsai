<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
		
	Route::auth();
	
	Route::get('/', 'IndexController@setIndex');
	
	Route::get('/about', function () {
        return view('about');
  });
	
	Route::get('/{name}/studyPlan', 'StudyPlanController@seeSubjects');
	
	Route::post('/{name}/updateStudyPlan', 'StudyPlanController@updateStudyPlan');
	
	Route::get('/{name}/addClass', 'AddClassesController@addClass');

	Route::post('/{name}/addClass/classList', 'AddClassesController@showClassList');
	
	Route::post('/{name}/addClass/classList/check', 'AddClassesController@checkSecurityKey');
	
	Route::get('/{name}/updateProfile', 'UpdateProfileController@updateProfile');

	Route::post('/{name}/updateImage', 'UpdateProfileController@uploadPicture');
	
	Route::get('/{name}/assignments', 'AssignmentsController@showClassList');

	Route::get('/{name}/assignments/upload', 'AssignmentsController@upload');
	
	Route::post('/{name}/assignments/handleUpload', 'AssignmentsController@handleUpload');
	
	Route::post('/{name}/assignments/update', 'AssignmentsController@update');


	Route::get('/{name}/createClass', 'CreateClassController@createClass');	

	Route::get('/{name}/facultyFeedback', function () {
			return view('student.facultyFeedback');
	});

	Route::get('/{name}/{classSite}/fileUploadsFromStudents', 'FileUploadsController@studentFileUploads');

	Route::get('/{name}/{classSite}/myFileUploads', 'FileUploadsController@facultyFileUploads');
	
	Route::get('/{name}/{classSite}/files', 'FileUploadsController@facultyFileUploads');

	Route::get('/{name}/inbox', 'InboxController@inbox');

	Route::get('/{name}/{classSite}/classRequests','ClassSiteController@viewRequest');

	Route::post('/{name}/{classSite}/sendPost', 'AddPostsController@postUpdate');

	Route::post('/{name}/{classSite}/comment', 'ClassSiteController@comment');

	Route::post('/{name}/{classSite}/reply', 'ClassSiteController@reply');
	
	Route::post('/{name}/{classSite}/sendFile', 'ClassSiteController@uploadFile');

	Route::get('/{name}/faculty', 'FacultyHomeController@facultyhome');

	Route::get('/{name}/{classSite}/uploadGrades', 'GradeController@viewUploadGrades');

	Route::post('/{name}/{classSite}/sendGrades', 'GradeController@uploadGrades');

	Route::post('/{name}/facultyFeedback', 'FacultyFeedbackController@sendFeedback');

	Route::get('/forum/new_post', 'ForumPostController@showCategories');

	Route::get('/forum/{post_id}', 'ForumPostController@showComments');

	Route::post('/comment', 'ForumPostController@comment');
	
	
	/* Forum Section */
	
	Route::get('/forum/new_post', 'ForumPostController@showCategories');

  Route::get('/forum/{post_id}', 'ForumPostController@showComments');

	
	Route::post('/comment', 'ForumPostController@comment');	

  Route::post('/forum/submit_post', 'ForumPostController@newPost');

  Route::get('/forum/{id}/upvote','ForumPostController@upvote');

  Route::get('/forum/{id}/downvote','ForumPostController@downvote');

  Route::get('/forum/{id}/postupvote','ForumPostController@postUpvote');

  Route::get('/forum/{id}/postdownvote','ForumPostController@postDownvote');

  Route::get('/forum', 'ForumPostController@search');

  Route::post('/forum', 'ForumPostController@search');

  Route::get('/forum/{post_id}/delete_comment/{id}','ForumPostController@deleteComment');

  Route::get('/forum/{post_id}/delete_post','ForumPostController@deletePost');

	
	Route::get('/{name}', 'ProfileController@profileContent');

	Route::get('/{name}/{classSite}', 'ClassSiteController@viewClass');
});