<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdmissionController;
use App\Http\Controllers\Backend\ApplyDateController;
use App\Http\Controllers\Backend\CreteriaController;
use App\Http\Controllers\Backend\DownloadController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\RequestController;
use App\Http\Controllers\Backend\StudentApplicationController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\StudentRegisterController;
use App\Http\Controllers\Backend\SiddrankingController;
use App\Http\Controllers\Backend\SocrankingController;

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UploadfileController;
use App\Models\ApplyDate;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('student.login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('dashboard');
    Route::get('/admin/upload', function () {return view('admin.upload');})->name('upload');
    Route::post('import-data',[UploadfileController::class, 'import'])->name('import-data');

    //Display Admission Officers, ranking and students
    Route::get('/admin/socLayout',[StudentController::class,'socView'])->name('socLayout');
    Route::get('/admin/sidLayout',[StudentController::class,'sidView'])->name('sidLayout');
    Route::get('/admin/aoLayout', function () {return view('admin.aoLayout');})->name('aoLayout');
    Route::get('/admin/studentLayout', [AdminController::class, 'displayStudent'])->name('studentLayout');
    Route::get('/admin/creteriaLayout', function () {return view('admin.creteriaLayout');})->name('creteriaLayout');
    Route::get('/admin/requestLayout', function () {return view('admin.requestLayout');})->name('requestLayout');
    Route::get('/admin/viewAll', [AdminController::class, 'viewAllPage'])->name('viewAll');
    Route::get('/admin/dateLayout', function () {return view('admin.dateLayout');})->name('dateLayout');

    //Delete all student data
    Route::delete('/students/deleteAll', [AdminController::class,'deleteAllStudents'])->name('deleteAllStudent');

    //Creteria
    Route::get('/admin/createCreteria', [CreteriaController::class, 'viewPost'])->name('viewCreateCreteria');
    Route::post('/admin/createCreteria', [CreteriaController::class, 'creteriaPost'])->name('createCreteria');
    Route::get('/admin/creteria/{id}', [CreteriaController::class, 'viewCreteria'])->name('viewCreteria');
    Route::delete('/admin/creteria/{id}', [CreteriaController::class, 'deleteCreteria'])->name('deleteCreteria');
    Route::get('/admin/creteria/{id}/edit', [CreteriaController::class, 'editCreteria'])->name('editCreteria');
    Route::put('/admin/creteria/{id}', [CreteriaController::class, 'updateCreteria'])->name('updateCreteria');

    //Feedback
    Route::get('/admin/feedback', [AdminController::class, 'viewFeedback'])->name('feedback');
    Route::delete('/admin/feedback/{id}', [AdminController::class, 'deleteFeedback'])->name('deleteFeedback');

    //Search
    Route::get('/admin/searchStudentLayout', [StudentController::class, 'searchStudent'])->name('searchStudentByIndex');
    Route::get('/admin/searchViewAll', [StudentController::class, 'searchSoc'])->name('searchSocByIndex');

    // Student routes
    Route::get('/admin/createStudent', [StudentController::class, 'viewCreateStudent'])->name('createStudent');
    Route::post('/admin/createStudent', [StudentController::class, 'studentPost'])->name('student');
    Route::get('/admin/studentLayout/{INDEX_NO}', [StudentController::class, 'viewStudent'])->name('viewStudent');
    Route::delete('/admin/studentLayout/{INDEX_NO}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
    Route::get('/admin/studentLayout/{INDEX_NO}/edit', [StudentController::class, 'editStudent'])->name('editStudent');
    Route::put('/admin/studentLayout/{INDEX_NO}', [StudentController::class, 'updateStudent'])->name('updateStudent');

    // Admission Officer routes
    Route::get('/admin/createAdmissionOfficer', [AdminController::class, 'viewAo'])->name('createAo');
    Route::post('/admin/createAdmissionOfficer', [AdminController::class, 'admissionOfficerPost'])->name('admissionOfficer');
    Route::get('/admin/aoLayout/{cid}', [AdminController::class, 'viewAdmissionOfficer'])->name('viewAdmissionOfficer');
    Route::delete('/admin/aoLayout/{cid}', [AdminController::class, 'deleteAdmissionOfficer'])->name('deleteAdmissionOfficer');
    Route::get('/admin/aoLayout/{cid}/edit', [AdminController::class, 'editAdmissionOfficer'])->name('editAdmissionOfficer');
    Route::put('/admin/aoLayout/{cid}', [AdminController::class, 'updateAdmissionOfficer'])->name('updateAdmissionOfficer');

    //Request
    Route::get('/admin/requestLayout/{INDEX_NO}', [RequestController::class, 'viewRequest'])->name('viewRequest');
    Route::delete('/admin/requestLayout/{INDEX_NO}', [RequestController::class, 'deleteRequest'])->name('deleteRequest');
    Route::get('/admin/requestLayout/{INDEX_NO}/edit', [RequestController::class, 'editRequest'])->name('editRequest');
    Route::put('/admin/requestLayout/{INDEX_NO}', [RequestController::class, 'updateRequest'])->name('updateRequest');

    //soc
    Route::get('/admin/socLayout/{INDEX_NO}', [StudentController::class, 'viewSoc'])->name('viewSoc');
    Route::get('/admin/socLayout/{INDEX_NO}/edit', [StudentController::class, 'editSoc'])->name('editSoc');
    Route::put('/admin/socLayout/{INDEX_NO}', [StudentController::class, 'updateSoc'])->name('updateSoc');

    //sidd
    Route::get('/admin/sidLayout/{INDEX_NO}', [StudentController::class, 'viewSid'])->name('viewSid');
    Route::get('/admin/sidLayout/{INDEX_NO}/edit', [StudentController::class, 'editSid'])->name('editSid');
    Route::put('/admin/sidLayout/{INDEX_NO}', [StudentController::class, 'updateSid'])->name('updateSid');

    //Download
    Route::get('/admin/downloadSoc', [DownloadController::class, 'downloadSoc'])->name('downloadSoc');
    Route::get('/admin/downloadSidd', [DownloadController::class, 'downloadSidd'])->name('downloadSidd');
    Route::get('/admin/downloadAll', [DownloadController::class, 'downloadAll'])->name('downloadAll');

    //Date
    Route::get('/admin/createDate', [ApplyDateController::class, 'viewCreateDate'])->name('createDate');
    Route::post('/admin/createDate', [ApplyDateController::class, 'datePost'])->name('date');
    Route::delete('/admin/dateLayout/{id}', [ApplyDateController::class, 'deleteDate'])->name('deleteDate');
    Route::get('/admin/dateLayout/{id}/edit', [ApplyDateController::class, 'editDate'])->name('editDate');
    Route::put('/admin/dateLayout/{id}', [ApplyDateController::class, 'updateDate'])->name('updateDate');

});

Route::middleware(['auth','role:ao'])->group(function () {
    Route::get('/admission/dashboard', function () {return view('admission.dashboard');})->name('aoDashboard');
    Route::get('/admission/admissionOfficerSocLayout', function () {return view('admission.admissionOfficerSocLayout');})->name('admissionOfficerSocLayout');
    Route::get('/admission/admissionOfficerSidLayout', function () {return view('admission.admissionOfficerSidLayout');})->name('aoSidLayout');
    Route::get('/admission/admissionOfficerStudentLayout', function () {return view('admission.admissionOfficerStudentLayout');})->name('admissionOfficerStudentLayout');

    //student
    Route::get('/admission/admissionOfficerStudentLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerViewStudent'])->name('admissionOfficerViewStudent');
    Route::delete('/admission/admissionOfficerStudentLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerDeleteStudent'])->name('admissionOfficerDeleteStudent');
    Route::get('/admission/admissionOfficerStudentLayout/{INDEX_NO}/edit', [AdmissionController::class, 'admissionOfficerEditStudent'])->name('admissionOfficerEditStudent');
    Route::put('/admission/admissionOfficerStudentLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerUpdateStudent'])->name('admissionOfficerUpdateStudent');

    Route::get('/admission/admissionOfficerSocLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerViewSoc'])->name('admissionOfficerViewSoc');
    Route::get('/admission/admissionOfficerSocLayout/{INDEX_NO}/edit', [AdmissionController::class, 'admissionOfficerEditSoc'])->name('admissionOfficerEditSoc');
    Route::put('/admission/admissionOfficerSocLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerUpdateSoc'])->name('admissionOfficerUpdateSoc');

    Route::get('/admission/admissionOfficerSidLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerViewSid'])->name('admissionOfficerViewSid');
    Route::get('/admission/admissionOfficerSidLayout/{INDEX_NO}/edit', [AdmissionController::class, 'admissionOfficerEditSid'])->name('admissionOfficerEditSid');
    Route::put('/admission/admissionOfficerSidLayout/{INDEX_NO}', [AdmissionController::class, 'admissionOfficerUpdateSid'])->name('admissionOfficerUpdateSid');

    //Download
    Route::get('/admin/downloadAdmissionOfficerSoc', [DownloadController::class, 'downloadAoSoc'])->name('downloadAoSoc');
    Route::get('/admin/downloadAdmissionOfficerSidd', [DownloadController::class, 'downloadAoSidd'])->name('downloadAoSidd');
    Route::get('/admin/downloadAdmissionOfficerStudent', [DownloadController::class, 'downloadAoStudent'])->name('downloadAoStudent');

    //Search
    Route::get('/admission/admissionOfficerStudentLayout', [AdmissionController::class, 'searchAoStudent'])->name('searchAoStudentByIndex');

});

Route::middleware(['auth','role:student'])->group(function () {
    Route::get('/student/dashboard', function () {return view('student.dashboard');})->name('studentDashboard');
    Route::post('/student/feedback', [StudentController::class, 'feedbackPost'])->name('studentFeedback');
    Route::post('/student/dashboard', [StudentApplicationController::class, 'rankPost'])->name('rank');

    Route::get('/student/studentDownloadSoc', [DownloadController::class, 'studentDownloadSoc'])->name('studentDownloadSoc');
    Route::get('/student/studentDownloadSid', [DownloadController::class, 'studentDownloadSid'])->name('studentDownloadSid');
});

Route::get('/studentRegister', [StudentRegisterController::class, 'register'])->name('Register');
Route::post('/studentRegister', [StudentRegisterController::class, 'registerPost'])->name('studentRegister');

Route::get('/application', [StudentApplicationController::class, 'apply'])->name('apply');
Route::post('/application', [StudentApplicationController::class, 'applicationPost'])->name('application');

Route::get('/forgotpassword', [ForgotPasswordController::class,'forgot'])->name('forgotpassword');
Route::get('/confirm-password', [ForgotPasswordController::class,'confirm'])->name('confirmpassword');
