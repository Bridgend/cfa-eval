@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4 style='display: inline-block;'>Performance Evaluation for {{ $employee->first_name}} {{ $employee->last_name }} from {{ $evaluation->date }}&nbsp&nbsp&nbsp&nbsp</h4>
                    <a class='btn btn-primary' href='{{ route('edit_evaluation', ['evaluation_id' => $evaluation->id]) }}'>Edit</a>
                </div>
                <div class='panel-body'>
                    <div class='col-md-12'>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>A. Quantity of Work: {{ $evaluation->quantity_of_work }}</p>
                                @if ($evaluation->quantity_of_work_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->quantity_of_work_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>B. Quantity of Work: {{ $evaluation->quality_of_work }}</p>
                                @if ($evaluation->quality_of_work_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->quality_of_work_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>C. Timeliness: {{ $evaluation->timeliness }}</p>
                                @if ($evaluation->timeliness_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->timeliness_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>D. Cost: {{ $evaluation->cost }}</p>
                                @if ($evaluation->cost_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->cost_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>E. Safety: {{ $evaluation->safety }}</p>
                                @if ($evaluation->safety_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->safety_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>F. Initiative: {{ $evaluation->initiative }}</p>
                                @if ($evaluation->initiative_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->initiative_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>G. Customer Focus: {{ $evaluation->customer_focus }}</p>
                                @if ($evaluation->customer_focus_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->customer_focus_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>H. Adaptability: {{ $evaluation->adaptability }}</p>
                                @if ($evaluation->adaptability_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->adaptability_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>I. Expression: {{ $evaluation->expression }}</p>
                                @if ($evaluation->expression_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->expression_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>J. Relationships with Others: {{ $evaluation->relationships_with_others }}</p>
                                @if ($evaluation->relationships_with_others_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->relationships_with_others_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>K. Punctuality and Attendance: {{ $evaluation->punctuality }}</p>
                                @if ($evaluation->punctuality_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->punctuality_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>L. Appearance: {{ $evaluation->appearance }}</p>
                                @if ($evaluation->appearance_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->appearance_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>M. Conduct: {{ $evaluation->conduct }}</p>
                                @if ($evaluation->conduct_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->conduct_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>N. Knowledge of Products: {{ $evaluation->knowledge_of_products }}</p>
                                @if ($evaluation->knowledge_of_products_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->knowledge_of_products_comment }}</p>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>O. Knowledge of Chick-fil-A Unit perations: {{ $evaluation->knowledge_of_cfa_operations }}</p>
                                @if ($evaluation->knowledge_of_cfa_operations_comment)
                                <p style='color:darkblue;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Comments: {{ $evaluation->knowledge_of_cfa_operations_comment }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
