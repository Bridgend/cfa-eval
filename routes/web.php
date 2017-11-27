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

Route::get('/', 'HomeController@index');

Route::get('/employees', 'EmployeeController@employees')->middleware('auth');
Route::post('/employees/add', 'EmployeeController@add_employee');
Route::post('/employees/edit', 'EmployeeController@edit_delete_employee');
Route::get('/employees/edit/{employee_id}', 'EmployeeController@edit_employee')->middleware('auth');
Route::post('/employees/edit/{employee_id}', 'EmployeeController@submit_employee_edit');
Route::get('/employees/delete/{employee_id}', 'EmployeeController@delete_employee')->middleware('auth');
Route::post('/employees/delete/{employee_id}', 'EmployeeController@submit_employee_delete');

Route::get('/evaluation', 'EvaluationController@evaluation')->middleware('auth');
Route::post('/evaluation/add', 'EvaluationController@add_evaluation');
Route::get('/evaluation/view', 'EvaluationController@select_evaluation')->middleware('auth');
Route::post('/evaluation/view', 'EvaluationController@submit_evaluation_select');
Route::get('/evaluation/view/{evaluation_id}', 'EvaluationController@view_evaluation')->middleware('auth')->name('view_evaluation');
Route::post('/evaluation/edit', 'EvaluationController@submit_evaluation_edit_select');
Route::get('/evaluation/edit/{evaluation_id}', 'EvaluationController@edit_evaluation')->middleware('auth')->name('edit_evaluation');
Route::post('/evaluation/edit/{evaluation_id}', 'EvaluationController@submit_evaluation_edit');
Route::get('/evaluation/view-all', 'EvaluationController@view_all_evaluations')->middleware('auth')->name('view_all_evaluations');

Route::get('/skill-eval', 'SkillEvalController@skill_eval')->middleware('auth');
Route::post('/skill-eval/add', 'SkillEvalController@add_skill_eval');
Route::get('/skill-eval/view', 'SkillEvalController@select_skill_eval')->middleware('auth');
Route::post('/skill-eval/view', 'SkillEvalController@submit_skill_eval_select');
Route::get('/skill-eval/view/{evaluation_id}', 'SkillEvalController@view_skill_eval')->middleware('auth')->name('view_skill_eval');
Route::post('/skill-eval/edit', 'SkillEvalController@submit_skill_eval_edit_select');
Route::get('/skill-eval/edit/{evaluation_id}', 'SkillEvalController@edit_skill_eval')->middleware('auth')->name('edit_skill_eval');
Route::post('/skill-eval/edit/{evaluation_id}', 'SkillEvalController@submit_skill_eval_edit');
Route::get('/skill-eval/view-all', 'SkillEvalController@view_all_skill_evals')->middleware('auth')->name('view_all_skill_evals');

Auth::routes();

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database cfa_eval');
        DB::statement('CREATE database cfa_eval');

        return 'Dropped cfa_eval; created cfa_eval.';
    });

};

use Illuminate\Support\Facades\Input;
use App\Evaluation;
use App\SkillEval;

Route::get('api/evaluation-dropdown',function()
{
   $emp_id = Input::get('emp_id');
   $evaluations = Evaluation::where('employee_id', '=', $emp_id)
                  ->orderBy('date', 'asc')
                  ->get();
   return Response::json($evaluations);
});

Route::get('api/skill-eval-dropdown',function()
{
   $emp_id = Input::get('emp_id');
   $evaluations = SkillEval::where('employee_id', '=', $emp_id)
                  ->orderBy('date', 'asc')
                  ->get();
   return Response::json($evaluations);
});
