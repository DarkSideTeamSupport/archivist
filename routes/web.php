<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefenceReport\ConvertController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});
Route::get('dashboard/replace', function () {
    dd('Hello');
//    $users = \App\Models\User::all()->where('position_id','=',1);
//
//
//    foreach ($users as $user) {
//        $user->update([
//            'position_id'=>4
//        ]);
//    }
//    dd($users);
});
Route::group(['namespace' => 'App\Http\Controllers\Student', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/students', 'IndexController')->name('students.index');
    Route::post('dashboard/students', 'CreateController')->name('students.create');
    Route::patch('dashboard/students/{student}', 'EditController')->name('student.edit');
    Route::get('dashboard/students/profile', 'ProfileController')->name('students.profile');
});

Route::group(['namespace' => 'App\Http\Controllers\Position', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/positions', 'IndexController')->name('positions.index');
    Route::post('dashboard/positions', 'CreateController')->name('position.create');
    Route::patch('dashboard/positions/{position}', 'EditController')->name('position.edit');
});

Route::group(['namespace' => 'App\Http\Controllers\Employee', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/employees', 'IndexController')->name('employees.index');
    Route::post('dashboard/employees', 'CreateController')->name('employeesCreate.index');
    Route::patch('dashboard/employees/{employee}', 'EditController')->name('employeeEdit.index');

});

Route::group(['namespace' => 'App\Http\Controllers\Commission', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/commissions', 'IndexController')->name('commissions.index');
    Route::post('dashboard/commissions', 'CreateController')->name('commission.create');
    Route::patch('dashboard/commissions/{commission}', 'EditController')->name('commission.edit');
});

Route::group(['namespace' => 'App\Http\Controllers\CommissionMember', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/commissions/members', 'IndexController')->name('commissionMembers.index');
    Route::post('dashboard/commissions/members', 'CreateController')->name('commissionMembers.create');
    Route::patch('dashboard/commissions/members/array', 'EditController')->name('commissionMembers.edit');
    Route::delete('dashboard/commissions/members/{commission}', 'DeleteController')->name('commissionMembers.delete');

});

Route::group(['namespace' => 'App\Http\Controllers\DefenceReport', 'middleware' => ['auth']], function () {
    Route::get('dashboard/defence-reports', 'IndexController')->name('defenceReports.index');
    Route::get('dashboard/defence-reports/stats', 'StatsController')->name('defenceReports.stats');
    Route::post('dashboard/defence-reports/{defenceReport}', 'EditController')->name('defenceReports.edit');
    Route::post('dashboard/defence-reports', 'CreateController')->name('defenceReport.create');
    Route::get('dashboard/defence-reports/upload', 'UploadController')->name('defenceReports.uploadIndex');

    Route::get('dashboard/defence-reports/upload/{defenceReport}', 'DownloadController')->name('defenceReport.download');
    Route::get('dashboard/defence-reports/uploadReports', 'ConvertController@index')->name('defenceReports.uploadReports');

    Route::patch('dashboard/defence-reports/upload/{defenceReport}', 'FileUploadController')->name('defenceReports.fileUpload');
});


Route::post('convert', [ConvertController::class, 'convertDocToPDF'])->name('convertToPDF');


Route::get('/file', function () {
    abort(404);
})->name('notFile');

Route::group(['namespace' => 'App\Http\Controllers\Group', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/groups', 'IndexController')->name('groups.index');
    Route::post('dashboard/groups', 'CreateController')->name('groups.create');
    Route::patch('dashboard/groups/{group}', 'EditController')->name('groups.edit');
});

Route::group(['namespace' => 'App\Http\Controllers\Specialization', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/specialties', 'IndexController')->name('specialties.index');
    Route::post('dashboard/specialties', 'CreateController')->name('specialties.create');
    Route::patch('dashboard/specialties/{specialization}', 'EditController')->name('specialties.edit');
});

Route::group(['namespace' => 'App\Http\Controllers\Discipline', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/disciplines', 'IndexController')->name('disciplines.index');
    Route::post('dashboard/disciplines', 'CreateController')->name('disciplines.create');
    Route::post('dashboard/disciplines/{discipline}', 'EditController')->name('discipline.edit');

});

Route::group(['namespace' => 'App\Http\Controllers\ReportType', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/report-types', 'IndexController')->name('reportTypes.index');
    Route::post('dashboard/report-types', 'CreateController')->name('reportTypes.create');
    Route::patch('dashboard/report-types/{reportType}', 'EditController')->name('reportTypes.edit');
});

Route::group(['namespace' => 'App\Http\Controllers\ReportDiscipline', 'middleware' => ['auth']], function () {
    Route::get('dashboard/report-disciplines', 'IndexController')->name('report-disciplines.index');
    Route::post('dashboard/report-disciplines', 'CreateController')->name('report-disciplines.create');
    Route::patch('dashboard/report-disciplines/{reportDiscipline}', 'EditController')->name('report-discipline.edit');

});

Route::group(['namespace' => 'App\Http\Controllers\Defence', 'middleware' => ['auth']], function () {
    Route::get('dashboard/defences', 'IndexController')->name('defences.index');
    Route::post('dashboard/defences', 'CreateController')->name('defence.create');
    Route::patch('dashboard/defences/{defence}', 'EditController')->name('defence.edit');

});


Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
