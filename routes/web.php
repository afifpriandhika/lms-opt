<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('welcome');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USER ROUTES
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile/update/{id}', [App\Http\Controllers\User\ProfileController::class, 'update'])->name('profileUpdate');
    Route::patch('/profile/update/password/{id}', [App\Http\Controllers\User\ProfileController::class, 'updatePassword'])->name('profileUpdatePassword');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/course', [App\Http\Controllers\User\StudentCourseController::class, 'index'])->name('course');
    Route::get('/course/detail/{id}', [App\Http\Controllers\User\StudentCourseController::class, 'show'])->name('course.detail');
    Route::get('/course/content/detail/{id}', [App\Http\Controllers\User\StudentContentController::class, 'show'])->name('content.detail');
    Route::get('/content/{id}/view_pdf', [App\Http\Controllers\User\StudentContentController::class, 'pdfView'])->name('content.pdf');
    Route::post('/course/enroll/{id}', [App\Http\Controllers\User\StudentCourseController::class, 'enroll'])->name('enrollCourse');
    Route::get('/course/enrolled', [App\Http\Controllers\User\EnrolledCourseController::class, 'index'])->name('enrolledCourse');
    Route::get('/course/unenroll/{id}', [App\Http\Controllers\User\EnrolledCourseController::class, 'destroy'])->name('unenrollCourse');

});


// ADMIN ROUTES
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/adminProfile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::patch('/admin/adminProfile/update/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profileUpdate');
    Route::patch('/admin/adminProfile/update/password/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('admin.profileUpdatePassword');
    // Manage Course
    Route::get('/admin/manageCourse', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('admin.course');
    Route::get('/admin/manageCourse/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('admin.createCourse');
    Route::post('/admin/manageCourse/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('admin.storeCourse');
    Route::get('/admin/manageCourse/detail/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('admin.courseDetail');
    Route::patch('/admin/manageCourse/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('admin.updateCourse');
    Route::get('/admin/manageCourse/delete/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('admin.destroyCourse');
    Route::get('/admin/manageCourse/{id}/content/add', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('admin.createContent');
    Route::get('/admin/manageCourse/unhide/{id}', [App\Http\Controllers\Admin\CourseController::class, 'unhide'])->name('admin.unhideCourse');
    Route::get('/admin/manageCourse/hide/{id}', [App\Http\Controllers\Admin\CourseController::class, 'hide'])->name('admin.hideCourse');
    
    // Manage Content
    Route::post('/admin/manageCourse/content/store', [App\Http\Controllers\Admin\ContentController::class, 'store'])->name('admin.storeContent');
    Route::get('/admin/manageCourse/content/{id}/delete', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('admin.destroyContent');
    Route::get('/admin/manageCourse/content/detail/{id}', [App\Http\Controllers\Admin\ContentController::class, 'show'])->name('admin.contentDetail');
    Route::get('/admin/manageCourse/content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin.editContent');
    Route::patch('/admin/manageCourse/content/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('admin.updateContent');
    Route::get('/admin/manageCourse/content/delete/file/{id}', [App\Http\Controllers\Admin\ContentController::class, 'destroyFile'])->name('admin.destroyFile');
    Route::put('/admin/manageCourse/content/update/file/{id}', [App\Http\Controllers\Admin\ContentController::class, 'updateFile'])->name('admin.updateFile');
    Route::get('/admin/content/{id}/view_pdf', [App\Http\Controllers\Admin\ContentController::class, 'pdfView'])->name('admin.pdf');
    Route::get('/admin/manageCourse/content/hide/{id}', [App\Http\Controllers\Admin\ContentController::class, 'hide'])->name('admin.hideContent');
    Route::get('/admin/manageCourse/content/unhide/{id}', [App\Http\Controllers\Admin\ContentController::class, 'unhide'])->name('admin.unhideContent');
    // Manage User
    Route::get('/admin/manageStudents', [App\Http\Controllers\Admin\ManageStudentController::class, 'index'])->name('manageStudents');
    Route::get('/admin/manageStudents/{id}/delete', [App\Http\Controllers\Admin\ManageStudentController::class, 'destroy'])->name('admin.destroyStudent');
    Route::post('/admin/manageStudents/store', [App\Http\Controllers\Admin\ManageStudentController::class, 'store'])->name('admin.storeStudent');
    Route::patch('/admin/manageStudents/update/{id}', [App\Http\Controllers\Admin\ManageStudentController::class, 'update'])->name('admin.updateStudent');
});