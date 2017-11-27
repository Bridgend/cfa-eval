<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evaluation;
use App\Employee;
use Validator;
use Session;

class EvaluationController extends Controller
{
    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function evaluation(Request $request)
    {
        return view('evaluation')->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function add_evaluation(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluator' => 'required',
            'date' => 'required|before_or_equal:today',
            'quantity_of_work' => 'required',
            'quality_of_work' => 'required',
            'timeliness' => 'required',
            'cost' => 'required',
            'safety' => 'required',
            'initiative' => 'required',
            'customer_focus' => 'required',
            'adaptability' => 'required',
            'expression' => 'required',
            'relationships_with_others' => 'required',
            'punctuality' => 'required',
            'appearance' => 'required',
            'conduct' => 'required',
            'knowledge_of_products' => 'required',
            'knowledge_of_cfa_operations' => 'required',
        ]);

        $evaluation = new Evaluation();

        $dateArray = explode('/', $request->date);
        $evaluation->date = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

        $evaluation->employee_id = $request->employee;
        $evaluation->evaluator = $request->evaluator;
        $evaluation->quantity_of_work = $request->quantity_of_work;
        $evaluation->quantity_of_work_comment = $request->quantity_of_work_comment;
        $evaluation->quality_of_work = $request->quality_of_work;
        $evaluation->quality_of_work_comment = $request->quality_of_work_comment;
        $evaluation->timeliness = $request->timeliness;
        $evaluation->timeliness_comment = $request->timeliness_comment;
        $evaluation->cost = $request->cost;
        $evaluation->cost_comment = $request->cost_comment;
        $evaluation->safety = $request->safety;
        $evaluation->safety_comment = $request->safety_comment;
        $evaluation->initiative = $request->initiative;
        $evaluation->initiative_comment = $request->initiative_comment;
        $evaluation->customer_focus = $request->customer_focus;
        $evaluation->customer_focus_comment = $request->customer_focus_comment;
        $evaluation->adaptability = $request->adaptability;
        $evaluation->adaptability_comment = $request->adaptability_comment;
        $evaluation->expression = $request->expression;
        $evaluation->expression_comment = $request->expression_comment;
        $evaluation->relationships_with_others = $request->relationships_with_others;
        $evaluation->relationships_with_others_comment = $request->relationships_with_others_comment;
        $evaluation->punctuality = $request->punctuality;
        $evaluation->punctuality_comment = $request->punctuality_comment;
        $evaluation->appearance = $request->appearance;
        $evaluation->appearance_comment = $request->appearance_comment;
        $evaluation->conduct = $request->conduct;
        $evaluation->conduct_comment = $request->conduct_comment;
        $evaluation->knowledge_of_products = $request->knowledge_of_products;
        $evaluation->knowledge_of_products_comment = $request->knowledge_of_products_comment;
        $evaluation->knowledge_of_cfa_operations = $request->knowledge_of_cfa_operations;
        $evaluation->knowledge_of_cfa_operations_comment = $request->knowledge_of_cfa_operations_comment;

        $evaluation->save();

        Session::flash('flash_message', 'Performance evaluation has been added.');

        return redirect('/evaluation/view/' . $evaluation->id);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function select_evaluation(Request $request)
    {
        return view('select_evaluation')->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_evaluation_select(Request $request)
    {

        $this->validate($request, [
            'employee' => 'required',
            'evaluation' => 'required',
        ]);

        return redirect('/evaluation/view/' . $request->evaluation);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function view_evaluation(Request $request, $evaluation_id)
    {
        $evaluation = Evaluation::find($evaluation_id);
        $dateArray = explode('-', $evaluation->date);
        $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];

        return view('view_evaluation')->with('employee', Employee::find($evaluation->employee_id))
                                      ->with('evaluation', $evaluation);
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_evaluation_edit_select(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluation' => 'required',
        ]);

        return redirect('/evaluation/edit/' . $request->evaluation);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function edit_evaluation(Request $request, $evaluation_id)
    {
        $evaluation = Evaluation::find($evaluation_id);
        $dateArray = explode('-', $evaluation->date);
        $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];

        return view('edit_evaluation')->with('evaluation', $evaluation)
                                      ->with('employees_for_dropdown', Employee::getForDropdown());
    }

    /**
    * POST
    *
    * @return \Illuminate\Http\Response
    */
    public function submit_evaluation_edit(Request $request, $evaluation_id)
    {
        $this->validate($request, [
            'employee' => 'required',
            'evaluator' => 'required',
            'date' => 'required|before_or_equal:today',
            'quantity_of_work' => 'required',
            'quality_of_work' => 'required',
            'timeliness' => 'required',
            'cost' => 'required',
            'safety' => 'required',
            'initiative' => 'required',
            'customer_focus' => 'required',
            'adaptability' => 'required',
            'expression' => 'required',
            'relationships_with_others' => 'required',
            'punctuality' => 'required',
            'appearance' => 'required',
            'conduct' => 'required',
            'knowledge_of_products' => 'required',
            'knowledge_of_cfa_operations' => 'required',
        ]);

        $evaluation = Evaluation::find($evaluation_id);

        $dateArray = explode('/', $request->date);
        $evaluation->date = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

        $evaluation->employee_id = $request->employee;
        $evaluation->evaluator = $request->evaluator;
        $evaluation->quantity_of_work = $request->quantity_of_work;
        $evaluation->quantity_of_work_comment = $request->quantity_of_work_comment;
        $evaluation->quality_of_work = $request->quality_of_work;
        $evaluation->quality_of_work_comment = $request->quality_of_work_comment;
        $evaluation->timeliness = $request->timeliness;
        $evaluation->timeliness_comment = $request->timeliness_comment;
        $evaluation->cost = $request->cost;
        $evaluation->cost_comment = $request->cost_comment;
        $evaluation->safety = $request->safety;
        $evaluation->safety_comment = $request->safety_comment;
        $evaluation->initiative = $request->initiative;
        $evaluation->initiative_comment = $request->initiative_comment;
        $evaluation->customer_focus = $request->customer_focus;
        $evaluation->customer_focus_comment = $request->customer_focus_comment;
        $evaluation->adaptability = $request->adaptability;
        $evaluation->adaptability_comment = $request->adaptability_comment;
        $evaluation->expression = $request->expression;
        $evaluation->expression_comment = $request->expression_comment;
        $evaluation->relationships_with_others = $request->relationships_with_others;
        $evaluation->relationships_with_others_comment = $request->relationships_with_others_comment;
        $evaluation->punctuality = $request->punctuality;
        $evaluation->punctuality_comment = $request->punctuality_comment;
        $evaluation->appearance = $request->appearance;
        $evaluation->appearance_comment = $request->appearance_comment;
        $evaluation->conduct = $request->conduct;
        $evaluation->conduct_comment = $request->conduct_comment;
        $evaluation->knowledge_of_products = $request->knowledge_of_products;
        $evaluation->knowledge_of_products_comment = $request->knowledge_of_products_comment;
        $evaluation->knowledge_of_cfa_operations = $request->knowledge_of_cfa_operations;
        $evaluation->knowledge_of_cfa_operations_comment = $request->knowledge_of_cfa_operations_comment;

        $evaluation->save();

        Session::flash('flash_message', 'Performance evaluation has been edited.');

        return redirect('/evaluation/view/' . $evaluation_id);
    }

    /**
    * GET
    *
    * @return \Illuminate\Http\Response
    */
    public function view_all_evaluations(Request $request)
    {
        $sort = trim($request->input('sort'));
        $evaluations;

        if(in_array($sort, ['quantity_of_work', 'quality_of_work', 'timeliness', 'cost', 'safety', 'initiative', 'customer_focus', 'adaptability', 'expression', 'relationships_with_others', 'punctuality', 'appearance', 'conduct', 'knowledge_of_products', 'knowledge_of_cfa_operations']))
        {
            $evaluations = DB::select(DB::raw('select * from employees join (select * from evaluations where (employee_id, date) in (select employee_id, max(date) from evaluations group by employee_id))e on employees.id=e.employee_id order by ' . $sort . ' desc, last_name asc, first_name asc'));
        }
        else {
            $evaluations = DB::select(DB::raw('select * from employees join (select * from evaluations where (employee_id, date) in (select employee_id, max(date) from evaluations group by employee_id))e on employees.id=e.employee_id order by last_name, first_name'));
        }

        foreach ($evaluations as $evaluation) {
            $dateArray = explode('-', $evaluation->date);
            $evaluation->date = $dateArray[1].'/'.$dateArray[2].'/'.$dateArray[0];
        }

        return view('view_all_evaluations')->with('evaluations', $evaluations);
    }

}
