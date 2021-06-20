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

Route::get('/time', function() {
	return date('h:i A');
});

Route::get('/frontendtestget', 'Authentication\Login@frontendtestget');
Route::post('/frontendtestpost', 'Authentication\Login@frontendtestpost');

Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
	return "Cache is cleared";
});

Route::get('/', 'Authentication\Login@index');
Route::get('/login', 'Authentication\Login@index');

Route::post('/loginCheck', 'Authentication\Login@loginCheck');

// Route::post('/sendemail', 'Authentication\Login@sendEmail'); 
// Route::get('/passwordreset/{token}', 'Authentication\PasswordReset@passwordResetView');
// Route::post('/passwordreset', 'Authentication\PasswordReset@passwordReset');


Route::group(['middleware' => 'admin'], function () {

	Route::get('/logout', 'Authentication\Login@logout');
	Route::get('/welcome', 'HomeController@index');


	// Common controller
	Route::get('/districtlist', 'CommonController@getDistrictList');
	Route::get('/thanalist/{id}', 'CommonController@getThanaList');
	Route::get('/getclasslist', 'CommonController@getClassList');
	Route::get('/grouplist', 'CommonController@getGroupList');
	Route::get('/referrallist', 'CommonController@getReferralList');

	//Dashboard
	Route::get('/dashboard','Dashboard@dashboardView');

	// Add Caller Information 
	Route::get('/addcaller','AddCaller@index');
	Route::post('/addnewcaller','AddCaller@addNewCaller');
	Route::get('/fetchdata/{phone_uID}','AddCaller@getFetchData');
	
	
	// User
	// Route::get('/user', 'User@index');
	// Route::post('/changePass', 'User@changePass');
	// Route::post('/addNewUser', 'User@addNewUser');
	// Route::get('/userListDataTable', 'User@userListDataTable');
	// Route::get('/getUserDepratment', 'User@getUserDepratment');
	// Route::post('/userDelete', 'User@userDelete');
	
	
	//District mngmnt
	Route::get('/district', 'District@district');
	Route::get('/districtListDataTable', 'District@districtListDataTable');
	Route::get('/getDistrictById/{id}', 'District@getDistrictById'); 
	Route::post('/addDistrict', 'District@addDistrict');
	Route::post('/districtDeleteByID', 'District@districtDeleteByID');
	
	
	//Thana mngmnt
	Route::get('/thana', 'Thana@thana');
	Route::get('/thanaDataTable', 'Thana@thanaListDataTable');
	Route::get('/getThanaById/{id}', 'Thana@getThanaById');
	Route::post('/addThana', 'Thana@addThana');
	Route::post('/thanaDeleteByID', 'Thana@thanaDeleteByID');
	
	
	//Subject
	Route::get('/subject', 'Subject@index');
	Route::get('/subjectlist', 'Subject@subjectList');
	Route::get('/getsubjectById/{id}', 'Subject@getsubjectById');
	Route::post('/addsubject', 'Subject@addSubject');
	//Route::post('/referralDeleteById', 'Referral@referralDeleteById');

	//Class
	Route::get('/class', 'ClassController@index');
	Route::get('/classlist', 'ClassController@ClassList');
	Route::get('/getclassById/{id}', 'ClassController@getClassById');
	Route::post('/classadd', 'ClassController@classAdd');
	//Route::post('/referralDeleteById', 'Referral@referralDeleteById');

	//Attendance
	Route::get('/attendance', 'Attendance@index');
	Route::get('/studentlistByClassId/{id_user}', 'Attendance@studentListByClassId');
	Route::get('/getclassById/{id}', 'Attendance@getClassById');
	Route::post('/classadd', 'Attendance@classAdd');
	Route::post('/referralDeleteById', 'Attendance@referralDeleteById');
	Route::post('/makeAttendance','Attendance@makeAttendance');


	//Resource mngmnt
	//Category 
	Route::get('/category', 'Category@category');
	Route::get('/categoryListDataTable', 'Category@categoryListDataTable');
	Route::get('/getCatagoryById/{id}', 'Category@getCategoryById'); 
	Route::post('/addCategory', 'Category@addCategory');
	Route::post('/categoryDeleteByID', 'Category@categoryDeleteByID');
	

	//Resource  
	Route::get('/resource/{id?}', 'Resource@resourceView');
	Route::post('/addnewresource', 'Resource@addNewResource');
	Route::get('/resourcedatatable/{id?}', 'Resource@resourceDataTable');
	Route::get('/getresourceById/{id}', 'Resource@getResourceById');
	Route::post('/resourceDeleteById', 'Resource@resourceDeleteById');


	//Users List 
	Route::get('/userslist', 'UsersList@index');
	Route::post('/general-info', 'UsersList@generalInfo');
	Route::post('/guardian-info', 'UsersList@guardianInfo');
	Route::post('/address', 'UsersList@addressInfo');
	Route::post('/education-info-student', 'UsersList@educationStudentInfo');
	Route::post('/education-info-teacher', 'UsersList@educationTeacherInfo');
	Route::get('/usersdatalist', 'UsersList@usersDataList');
	Route::post('/userDeleteByID', 'UsersList@userDeleteByID');

	//Profile Data
	Route::get('/myProfileData', 'ProfileData@myProfileData');
	Route::get('/myProfile', 'ProfileData@myProfile');
	Route::post('/myProfileEdit', 'ProfileData@myProfileEdit');
	Route::post('/changePass', 'ProfileData@changePass');


	// Groups mngmnt
	Route::get('/group', 'GroupsManag@groupsManag');
	Route::post('/addgroup','GroupsManag@addGroup');
	Route::get('/groupdatalist', 'GroupsManag@groupDataList');
	Route::get('/getgroupbyid/{id}', 'GroupsManag@getGroupById'); 
	Route::post('/groupdeleteByID', 'GroupsManag@groupDeleteByID');
	Route::get('/getdate/{dt_old}', 'GroupsManag@getdate');  

	
	
	
	// report
	Route::get('/report','Report@reportView');
	Route::get('/allcallerDataTable','Report@allCallerDataList');
	Route::post('/callerdeleteByID','Report@callerDeleteById');
	Route::get('/reportDataTable','Report@reportDataTable');
	Route::post('/reportdeleteByID','Report@reportDeleteByID');
	Route::get('/callerinfoById/{id}','Report@getCallerInfoById');
	Route::post('/updateCallerInfo','Report@updateCallerInfo');
	Route::get('/callerserviceById/{id}','Report@getCallerServiceById');
	Route::post('/updateCallerService','Report@updateCallerService');
	
	
	// download report
	Route::get('/downloadreport','Downloadreport@downloadreport'); 
	Route::get('/downloadexclefile','Downloadreport@downloadExcleFile');
	Route::get('/callanalysis/{name?}','Downloadreport@callAnalysis'); 
	Route::get('/getmonthyear','Downloadreport@getMonthYear');

	// Setting
	Route::get('/useraccess','UserAccess@index');
	Route::get('/grupaccess','UserAccess@noAccess');
	Route::get('/userList','UserAccess@userList');
	Route::get('/pageListByUserId/{id_user}','UserAccess@pageListByUserId');
	Route::post('/allowOrDenyAccess','UserAccess@allowOrDenyAccess');
	//Route::get('/givenPageAccess/{user_id}','UserAccess@givenPageAccess');


});


