<?php

use App\Http\Controllers\Admin\SummaryController;
use App\Http\Controllers\Admin\TeacherController;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    //  summary
    Route::get('summary',[SummaryController::class,'index'])->name('summary');
    Route::get('teacher-with-places/{region?}/{subject?}',[SummaryController::class,'teacher_with_places'])->name('teacher_with_places');
    Route::get('teacher-with-management/{management?}/{subject?}',[SummaryController::class,'teacher_with_managements'])->name('teacher_with_managements');
    Route::get('teacher-with-institutes/{institute?}/{subject?}',[SummaryController::class,'teacher_with_institutes'])->name('teacher_with_institutes');
    Route::get('fetch-summary/{region?}/{management?}/{institute?}',[SummaryController::class,'fetch_summary'])->name('summary.fetch_summary');


    Route::get('fetch-management-from-region',[SummaryController::class,'fetch_management_from_region'])->name('summary.fetch_management_from_region');
    Route::get('fetch-institute-from-management',[SummaryController::class,'fetch_institute_from_management'])->name('summary.fetch_institute_from_management');

    // teacher
    Route::resource('teachers', TeacherController::class);
    Route::get('teachers/pagination/fetch_data', [TeacherController::class, 'fetch_data'])->name('teacher.pagination.fetch_data');


});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
