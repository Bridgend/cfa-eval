@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>Edit Performance Evaluation</h4>
                </div>
                <div class='panel-body'>

                    <form class='form-horizontal' role='form' method='POST' action='/evaluation/edit/{{ $evaluation->id }}'>
                        {{ csrf_field() }}

                        <div class='form-group'>
                            <label for='employee' class='col-md-2 control-label'>Team Member</label>

                            <div class='col-md-3'>
                                <select class='form-control' id='employee' name='employee'>
                                    <option {{ old('employee') ? '' : 'selected' }} disabled hidden>&nbsp;</option>
                                    @foreach($employees_for_dropdown as $employee_id => $employee)
                                        @if (old('employee') == $employee_id || (!old('employee') && $evaluation->employee_id == $employee_id))
                                        <option value='{{ $employee_id }}' selected>{{ $employee }}</option>
                                        @else
                                        <option value='{{ $employee_id }}'>{{ $employee }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('evaluator') ? ' has-error' : '' }}'>
                            <label for='evaluator' class='col-md-2 control-label'>Evaluator</label>

                            <div class='col-md-3'>
                                {{ Form::text('evaluator', (old('evaluator') ? old('evaluator') : $evaluation->evaluator), array('class' => 'form-control')) }}

                                @if ($errors->has('evaluator'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('date') ? ' has-error' : '' }}'>
                            <label for='date' class='col-md-2 control-label'>Date</label>

                            <div class='col-md-2'>
                                {{ Form::text('date', (old('date') ? old('date') : $evaluation->date), array('id' => 'datepicker', 'class' => 'form-control')) }}

                                @if ($errors->has('date'))
                                <span class='help-block'>
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>A.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Quantity of Work</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='quantity_of_work' value='1' {{ old('quantity_of_work') ? (old('quantity_of_work') == '1' ? 'checked' : '') : ($evaluation->quantity_of_work == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='quantity_of_work' value='2' {{ old('quantity_of_work') ? (old('quantity_of_work') == '2' ? 'checked' : '') : ($evaluation->quantity_of_work == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='quantity_of_work' value='3' {{ old('quantity_of_work') ? (old('quantity_of_work') == '3' ? 'checked' : '') : ($evaluation->quantity_of_work == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='quantity_of_work' value='4' {{ old('quantity_of_work') ? (old('quantity_of_work') == '4' ? 'checked' : '') : ($evaluation->quantity_of_work == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='quantity_of_work' value='5' {{ old('quantity_of_work') ? (old('quantity_of_work') == '5' ? 'checked' : '') : ($evaluation->quantity_of_work == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Produces an acceptable volume of work.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='quantity_of_work_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='quantity_of_work_comment' class='form-control' name='quantity_of_work_comment'>{{ old('quantity_of_work_comment') ? old('quantity_of_work_comment') : $evaluation->quantity_of_work_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>B.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Quality of Work</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='quality_of_work' value='1' {{ old('quality_of_work') ? (old('quality_of_work') == '1' ? 'checked' : '') : ($evaluation->quality_of_work == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='quality_of_work' value='2' {{ old('quality_of_work') ? (old('quality_of_work') == '2' ? 'checked' : '') : ($evaluation->quality_of_work == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='quality_of_work' value='3' {{ old('quality_of_work') ? (old('quality_of_work') == '3' ? 'checked' : '') : ($evaluation->quality_of_work == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='quality_of_work' value='4' {{ old('quality_of_work') ? (old('quality_of_work') == '4' ? 'checked' : '') : ($evaluation->quality_of_work == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='quality_of_work' value='5' {{ old('quality_of_work') ? (old('quality_of_work') == '5' ? 'checked' : '') : ($evaluation->quality_of_work == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Produces work that meets the requirements.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='quality_of_work_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='quality_of_work_comment' class='form-control' name='quality_of_work_comment'>{{ old('quality_of_work_comment') ? old('quality_of_work_comment') : $evaluation->quality_of_work_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>C.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Timeliness</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='timeliness' value='1' {{ old('timeliness') ? (old('timeliness') == '1' ? 'checked' : '') : ($evaluation->timeliness == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='timeliness' value='2' {{ old('timeliness') ? (old('timeliness') == '2' ? 'checked' : '') : ($evaluation->timeliness == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='timeliness' value='3' {{ old('timeliness') ? (old('timeliness') == '3' ? 'checked' : '') : ($evaluation->timeliness == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='timeliness' value='4' {{ old('timeliness') ? (old('timeliness') == '4' ? 'checked' : '') : ($evaluation->timeliness == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='timeliness' value='5' {{ old('timeliness') ? (old('timeliness') == '5' ? 'checked' : '') : ($evaluation->timeliness == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Completes work assignments on or ahead of schedule.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='timeliness_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='timeliness_comment' class='form-control' name='timeliness_comment'>{{ old('timeliness_comment') ? old('timeliness_comment') : $evaluation->timeliness_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>D.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Cost</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='cost' value='1' {{ old('cost') ? (old('cost') == '1' ? 'checked' : '') : ($evaluation->cost == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='cost' value='2' {{ old('cost') ? (old('cost') == '2' ? 'checked' : '') : ($evaluation->cost == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='cost' value='3' {{ old('cost') ? (old('cost') == '3' ? 'checked' : '') : ($evaluation->cost == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='cost' value='4' {{ old('cost') ? (old('cost') == '4' ? 'checked' : '') : ($evaluation->cost == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='cost' value='5' {{ old('cost') ? (old('cost') == '5' ? 'checked' : '') : ($evaluation->cost == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Minimizes waste. Effectively utilizes resources on the job</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='cost_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='cost_comment' class='form-control' name='cost_comment'>{{ old('cost_comment') ? old('cost_comment') : $evaluation->cost_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>E.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Safety</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='safety' value='1' {{ old('safety') ? (old('safety') == '1' ? 'checked' : '') : ($evaluation->safety == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='safety' value='2' {{ old('safety') ? (old('safety') == '2' ? 'checked' : '') : ($evaluation->safety == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='safety' value='3' {{ old('safety') ? (old('safety') == '3' ? 'checked' : '') : ($evaluation->safety == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='safety' value='4' {{ old('safety') ? (old('safety') == '4' ? 'checked' : '') : ($evaluation->safety == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='safety' value='5' {{ old('safety') ? (old('safety') == '5' ? 'checked' : '') : ($evaluation->safety == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Observes safety and health standards.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='safety_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='safety_comment' class='form-control' name='safety_comment'>{{ old('safety_comment') ? old('safety_comment') : $evaluation->safety_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>F.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Initiative</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='initiative' value='1' {{ old('initiative') ? (old('initiative') == '1' ? 'checked' : '') : ($evaluation->initiative == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='initiative' value='2' {{ old('initiative') ? (old('initiative') == '2' ? 'checked' : '') : ($evaluation->initiative == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='initiative' value='3' {{ old('initiative') ? (old('initiative') == '3' ? 'checked' : '') : ($evaluation->initiative == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='initiative' value='4' {{ old('initiative') ? (old('initiative') == '4' ? 'checked' : '') : ($evaluation->initiative == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='initiative' value='5' {{ old('initiative') ? (old('initiative') == '5' ? 'checked' : '') : ($evaluation->initiative == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Does not have to be told to do things. Seeks new assignments after completing old ones.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='initiative_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='initiative_comment' class='form-control' name='initiative_comment'>{{ old('initiative_comment') ? old('initiative_comment') : $evaluation->initiative_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>G.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Customer Focus</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='customer_focus' value='1' {{ old('customer_focus') ? (old('customer_focus') == '1' ? 'checked' : '') : ($evaluation->customer_focus == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='customer_focus' value='2' {{ old('customer_focus') ? (old('customer_focus') == '2' ? 'checked' : '') : ($evaluation->customer_focus == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='customer_focus' value='3' {{ old('customer_focus') ? (old('customer_focus') == '3' ? 'checked' : '') : ($evaluation->customer_focus == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='customer_focus' value='4' {{ old('customer_focus') ? (old('customer_focus') == '4' ? 'checked' : '') : ($evaluation->customer_focus == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='customer_focus' value='5' {{ old('customer_focus') ? (old('customer_focus') == '5' ? 'checked' : '') : ($evaluation->customer_focus == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Shows initiative and commitment to satisfying the customer.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='customer_focus_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='customer_focus_comment' class='form-control' name='customer_focus_comment'>{{ old('customer_focus_comment') ? old('customer_focus_comment') : $evaluation->customer_focus_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>H.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Adaptability</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='adaptability' value='1' {{ old('adaptability') ? (old('adaptability') == '1' ? 'checked' : '') : ($evaluation->adaptability == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='adaptability' value='2' {{ old('adaptability') ? (old('adaptability') == '2' ? 'checked' : '') : ($evaluation->adaptability == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='adaptability' value='3' {{ old('adaptability') ? (old('adaptability') == '3' ? 'checked' : '') : ($evaluation->adaptability == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='adaptability' value='4' {{ old('adaptability') ? (old('adaptability') == '4' ? 'checked' : '') : ($evaluation->adaptability == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='adaptability' value='5' {{ old('adaptability') ? (old('adaptability') == '5' ? 'checked' : '') : ($evaluation->adaptability == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Learns new duties and adjusts to new situations.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='adaptability_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='adaptability_comment' class='form-control' name='adaptability_comment'>{{ old('adaptability_comment') ? old('adaptability_comment') : $evaluation->adaptability_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>I.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Expression</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='expression' value='1' {{ old('expression') ? (old('expression') == '1' ? 'checked' : '') : ($evaluation->expression == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='expression' value='2' {{ old('expression') ? (old('expression') == '2' ? 'checked' : '') : ($evaluation->expression == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='expression' value='3' {{ old('expression') ? (old('expression') == '3' ? 'checked' : '') : ($evaluation->expression == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='expression' value='4' {{ old('expression') ? (old('expression') == '4' ? 'checked' : '') : ($evaluation->expression == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='expression' value='5' {{ old('expression') ? (old('expression') == '5' ? 'checked' : '') : ($evaluation->expression == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Effectively presents facts/ideas well orally and in writing. Keeps supervisor informed of pertinent matters.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='expression_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='expression_comment' class='form-control' name='expression_comment'>{{ old('expression_comment') ? old('expression_comment') : $evaluation->expression_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>J.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Relationships with Others</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='relationships_with_others' value='1' {{ old('relationships_with_others') ? (old('relationships_with_others') == '1' ? 'checked' : '') : ($evaluation->relationships_with_others == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='relationships_with_others' value='2' {{ old('relationships_with_others') ? (old('relationships_with_others') == '2' ? 'checked' : '') : ($evaluation->relationships_with_others == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='relationships_with_others' value='3' {{ old('relationships_with_others') ? (old('relationships_with_others') == '3' ? 'checked' : '') : ($evaluation->relationships_with_others == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='relationships_with_others' value='4' {{ old('relationships_with_others') ? (old('relationships_with_others') == '4' ? 'checked' : '') : ($evaluation->relationships_with_others == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='relationships_with_others' value='5' {{ old('relationships_with_others') ? (old('relationships_with_others') == '5' ? 'checked' : '') : ($evaluation->relationships_with_others == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Effectively works and deals with others, including peers, unit employees, supervisor and customers.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='relationships_with_others_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='relationships_with_others_comment' class='form-control' name='relationships_with_others_comment'>{{ old('relationships_with_others_comment') ? old('relationships_with_others_comment') : $evaluation->relationships_with_others_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>K.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Punctuality and Attendance</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='punctuality' value='1' {{ old('punctuality') ? (old('punctuality') == '1' ? 'checked' : '') : ($evaluation->punctuality == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='punctuality' value='2' {{ old('punctuality') ? (old('punctuality') == '2' ? 'checked' : '') : ($evaluation->punctuality == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='punctuality' value='3' {{ old('punctuality') ? (old('punctuality') == '3' ? 'checked' : '') : ($evaluation->punctuality == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='punctuality' value='4' {{ old('punctuality') ? (old('punctuality') == '4' ? 'checked' : '') : ($evaluation->punctuality == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='punctuality' value='5' {{ old('punctuality') ? (old('punctuality') == '5' ? 'checked' : '') : ($evaluation->punctuality == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Consistently at the prescribed place at the prescribed time. Seldom, if ever, absent.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='punctuality_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='punctuality_comment' class='form-control' name='punctuality_comment'>{{ old('punctuality_comment') ? old('punctuality_comment') : $evaluation->punctuality_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>L.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Appearance</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='appearance' value='1' {{ old('appearance') ? (old('appearance') == '1' ? 'checked' : '') : ($evaluation->appearance == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='appearance' value='2' {{ old('appearance') ? (old('appearance') == '2' ? 'checked' : '') : ($evaluation->appearance == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='appearance' value='3' {{ old('appearance') ? (old('appearance') == '3' ? 'checked' : '') : ($evaluation->appearance == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='appearance' value='4' {{ old('appearance') ? (old('appearance') == '4' ? 'checked' : '') : ($evaluation->appearance == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='appearance' value='5' {{ old('appearance') ? (old('appearance') == '5' ? 'checked' : '') : ($evaluation->appearance == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Presents an attractive appearance. Good personal hygiene.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='appearance_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='appearance_comment' class='form-control' name='appearance_comment'>{{ old('appearance_comment') ? old('appearance_comment') : $evaluation->appearance_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>M.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Conduct</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='conduct' value='1' {{ old('conduct') ? (old('conduct') == '1' ? 'checked' : '') : ($evaluation->conduct == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='conduct' value='2' {{ old('conduct') ? (old('conduct') == '2' ? 'checked' : '') : ($evaluation->conduct == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='conduct' value='3' {{ old('conduct') ? (old('conduct') == '3' ? 'checked' : '') : ($evaluation->conduct == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='conduct' value='4' {{ old('conduct') ? (old('conduct') == '4' ? 'checked' : '') : ($evaluation->conduct == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='conduct' value='5' {{ old('conduct') ? (old('conduct') == '5' ? 'checked' : '') : ($evaluation->conduct == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Sets and maintains high standards on and off the job.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='conduct_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='conduct_comment' class='form-control' name='conduct_comment'>{{ old('conduct_comment') ? old('conduct_comment') : $evaluation->conduct_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>N.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Knowledge of Products</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_products' value='1' {{ old('knowledge_of_products') ? (old('knowledge_of_products') == '1' ? 'checked' : '') : ($evaluation->knowledge_of_products == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_products' value='2' {{ old('knowledge_of_products') ? (old('knowledge_of_products') == '2' ? 'checked' : '') : ($evaluation->knowledge_of_products == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_products' value='3' {{ old('knowledge_of_products') ? (old('knowledge_of_products') == '3' ? 'checked' : '') : ($evaluation->knowledge_of_products == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_products' value='4' {{ old('knowledge_of_products') ? (old('knowledge_of_products') == '4' ? 'checked' : '') : ($evaluation->knowledge_of_products == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_products' value='5' {{ old('knowledge_of_products') ? (old('knowledge_of_products') == '5' ? 'checked' : '') : ($evaluation->knowledge_of_products == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Knows how to prepare, present and serve all Chick-fil-A products.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='knowledge_of_products_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='knowledge_of_products_comment' class='form-control' name='knowledge_of_products_comment'>{{ old('knowledge_of_products_comment') ? old('knowledge_of_products_comment') : $evaluation->knowledge_of_products_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-1 col-md-offset-1'>
                                <span class='h4'>O.</span>
                            </div>
                            <div class='col-md-4'>
                                <span class='h4'>Knowledge of Chick-fil-A Unit Operations</span>
                            </div>
                            <div class='col-md-4'>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_cfa_operations' value='1' {{ old('knowledge_of_cfa_operations') ? (old('knowledge_of_cfa_operations') == '1' ? 'checked' : '') : ($evaluation->knowledge_of_cfa_operations == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_cfa_operations' value='2' {{ old('knowledge_of_cfa_operations') ? (old('knowledge_of_cfa_operations') == '2' ? 'checked' : '') : ($evaluation->knowledge_of_cfa_operations == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_cfa_operations' value='3' {{ old('knowledge_of_cfa_operations') ? (old('knowledge_of_cfa_operations') == '3' ? 'checked' : '') : ($evaluation->knowledge_of_cfa_operations == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_cfa_operations' value='4' {{ old('knowledge_of_cfa_operations') ? (old('knowledge_of_cfa_operations') == '4' ? 'checked' : '') : ($evaluation->knowledge_of_cfa_operations == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='knowledge_of_cfa_operations' value='5' {{ old('knowledge_of_cfa_operations') ? (old('knowledge_of_cfa_operations') == '5' ? 'checked' : '') : ($evaluation->knowledge_of_cfa_operations == '5' ? 'checked' : '') }}>5</label>
                            </div>

                            <div class='col-md-8 col-md-offset-2'>
                                <span>Proficient in all aspects of Chick-fil-A unit operations, both managerial and technical.</span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='knowledge_of_cfa_operations_comment' class='col-md-3 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='knowledge_of_cfa_operations_comment' class='form-control' name='knowledge_of_cfa_operations_comment'>{{ old('knowledge_of_cfa_operations_comment') ? old('knowledge_of_cfa_operations_comment') : $evaluation->knowledge_of_cfa_operations_comment }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-8 col-md-offset-4'>
                                <button type='submit' class='btn btn-primary'>
                                    Submit Evaluation Edit
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class='col-md-10 col-md-offset-2 h4'>
                        <div class='h3'>Performance Ratings:</div>
                        1:&nbsp&nbsp Unsatisfactory - Performance definitely below acceptable standards.<br>
                        2:&nbsp&nbsp Fair - Performance inconsistent. Improvement needed to meet standard requirements.<br>
                        3:&nbsp&nbsp Satisfactory - Performance consistently meets job requirements.<br>
                        4:&nbsp&nbsp Good - Performance meets all job requirements and, in many cases, exceeds them.<br>
                        5:&nbsp&nbsp Outstanding - Performance consistently exceeds job requirements.<br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
});
</script>
@endsection
