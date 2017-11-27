<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SkillEval;
use App\Employee;
use Session;
use Validator;

class SkillEvalController extends Controller
{
    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function skill_eval(Request $request)
    {
        return view('skill_eval')->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function add_skill_eval(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluator' => 'required',
            'date' => 'required|before_or_equal:today',
            'dining_room' => 'required',
            'front_counter' => 'required',
            'drive_thru' => 'required',
            'headset' => 'required',
            'face_to_face' => 'required',
            'bagging' => 'required',
            'boards' => 'required',
            'specials' => 'required',
            'breading' => 'required',
            'lean' => 'required',
            'biscuits' => 'required',
            'breakfast_boards' => 'required',
            'breakfast_specials' => 'required',
            'opening_front' => 'required',
            'opening_boards' => 'required',
            'opening_lean' => 'required',
            'closing_front' => 'required',
            'closing_boards' => 'required',
            'closing_lean' => 'required',
        ]);

        $evaluation = new SkillEval();

        $dateArray = explode('/', $request->date);
        $evaluation->date = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

        $evaluation->employee_id = $request->employee;
        $evaluation->evaluator = $request->evaluator;
        $evaluation->dining_room = $request->dining_room;
        $evaluation->front_counter = $request->front_counter;
        $evaluation->drive_thru = $request->drive_thru;
        $evaluation->headset = $request->headset;
        $evaluation->face_to_face = $request->face_to_face;
        $evaluation->bagging = $request->bagging;
        $evaluation->boards = $request->boards;
        $evaluation->specials = $request->specials;
        $evaluation->breading = $request->breading;
        $evaluation->lean = $request->lean;
        $evaluation->biscuits = $request->biscuits;
        $evaluation->breakfast_boards = $request->breakfast_boards;
        $evaluation->breakfast_specials = $request->breakfast_specials;
        $evaluation->opening_front = $request->opening_front;
        $evaluation->opening_boards = $request->opening_boards;
        $evaluation->opening_lean = $request->opening_lean;
        $evaluation->closing_front = $request->closing_front;
        $evaluation->closing_boards = $request->closing_boards;
        $evaluation->closing_lean = $request->closing_lean;
        $evaluation->comment = $request->comment;

        $evaluation->save();

        Session::flash('flash_message', 'Skill evaluation has been added.');

        return redirect('/skill-eval/view/' . $evaluation->id);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function select_skill_eval(Request $request)
    {
        return view('select_skill_eval')->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_skill_eval_select(Request $request)
    {

        $this->validate($request, [
            'employee' => 'required',
            'evaluation' => 'required',
        ]);

        return redirect('/skill-eval/view/' . $request->evaluation);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function view_skill_eval(Request $request, $evaluation_id)
    {
        $evaluation = SkillEval::find($evaluation_id);
        $dateArray = explode('-', $evaluation->date);
        $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];

        return view('view_skill_eval')->with('employee', Employee::find($evaluation->employee_id))
        ->with('evaluation', $evaluation);
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_skill_eval_edit_select(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluation' => 'required',
        ]);

        return redirect('/skill-eval/edit/' . $request->evaluation);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function edit_skill_eval(Request $request, $evaluation_id)
    {
        $evaluation = SkillEval::find($evaluation_id);
        $dateArray = explode('-', $evaluation->date);
        $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];

        return view('edit_skill_eval')->with('evaluation', $evaluation)
        ->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_skill_eval_edit(Request $request, $evaluation_id)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluator' => 'required',
            'date' => 'required|before_or_equal:today',
            'dining_room' => 'required',
            'front_counter' => 'required',
            'drive_thru' => 'required',
            'headset' => 'required',
            'face_to_face' => 'required',
            'bagging' => 'required',
            'boards' => 'required',
            'specials' => 'required',
            'breading' => 'required',
            'lean' => 'required',
            'biscuits' => 'required',
            'breakfast_boards' => 'required',
            'breakfast_specials' => 'required',
            'opening_front' => 'required',
            'opening_boards' => 'required',
            'opening_lean' => 'required',
            'closing_front' => 'required',
            'closing_boards' => 'required',
            'closing_lean' => 'required',
        ]);

        $evaluation = SkillEval::find($evaluation_id);

        $dateArray = explode('/', $request->date);
        $evaluation->date = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

        $evaluation->employee_id = $request->employee;
        $evaluation->evaluator = $request->evaluator;
        $evaluation->dining_room = $request->dining_room;
        $evaluation->front_counter = $request->front_counter;
        $evaluation->drive_thru = $request->drive_thru;
        $evaluation->headset = $request->headset;
        $evaluation->face_to_face = $request->face_to_face;
        $evaluation->bagging = $request->bagging;
        $evaluation->boards = $request->boards;
        $evaluation->specials = $request->specials;
        $evaluation->breading = $request->breading;
        $evaluation->lean = $request->lean;
        $evaluation->biscuits = $request->biscuits;
        $evaluation->breakfast_boards = $request->breakfast_boards;
        $evaluation->breakfast_specials = $request->breakfast_specials;
        $evaluation->opening_front = $request->opening_front;
        $evaluation->opening_boards = $request->opening_boards;
        $evaluation->opening_lean = $request->opening_lean;
        $evaluation->closing_front = $request->closing_front;
        $evaluation->closing_boards = $request->closing_boards;
        $evaluation->closing_lean = $request->closing_lean;
        $evaluation->comment = $request->comment;

        $evaluation->save();

        Session::flash('flash_message', 'Skill evaluation has been edited.');

        return redirect('/skill-eval/view/' . $evaluation_id);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function view_all_skill_evals(Request $request)
    {
        $sort = trim($request->input('sort'));
        $evaluations;

        if(in_array($sort, ['dining_room', 'front_counter', 'drive_thru', 'headset', 'face_to_face', 'bagging', 'boards', 'specials', 'breading', 'lean', 'biscuits', 'breakfast_boards', 'breakfast_specials', 'opening_front', 'opening_boards', 'opening_lean', 'closing_front', 'closing_boards', 'closing_lean']))
        {
            $evaluations = DB::select(DB::raw('select * from employees join (select * from skill_evals where (employee_id, date) in (select employee_id, max(date) from skill_evals group by employee_id))e on employees.id=e.employee_id order by ' . $sort . ' desc, last_name asc, first_name asc'));
        }
        else {
            $evaluations = DB::select(DB::raw('select * from employees join (select * from skill_evals where (employee_id, date) in (select employee_id, max(date) from skill_evals group by employee_id))e on employees.id=e.employee_id order by last_name, first_name'));
        }

        foreach ($evaluations as $evaluation) {
            $dateArray = explode('-', $evaluation->date);
            $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];
        }

        return view('view_all_skill_evals')->with('evaluations', $evaluations);
    }
}
