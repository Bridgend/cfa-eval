@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>Edit Skill Evaluation</h4>
                </div>
                <div class='panel-body'>

                    <form class='form-horizontal' role='form' method='POST' action='/skill-eval/edit/{{ $evaluation->id }}'>
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
                        <div class='form-group {{ $errors->has('dining_room') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Dining Room:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='dining_room' value='1' {{ old('dining_room') ? (old('dining_room') == '1' ? 'checked' : '') : ($evaluation->dining_room == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='dining_room' value='2' {{ old('dining_room') ? (old('dining_room') == '2' ? 'checked' : '') : ($evaluation->dining_room == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='dining_room' value='3' {{ old('dining_room') ? (old('dining_room') == '3' ? 'checked' : '') : ($evaluation->dining_room == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='dining_room' value='4' {{ old('dining_room') ? (old('dining_room') == '4' ? 'checked' : '') : ($evaluation->dining_room == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='dining_room' value='5' {{ old('dining_room') ? (old('dining_room') == '5' ? 'checked' : '') : ($evaluation->dining_room == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('dining_room'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('front_counter') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Front Counter Register:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='front_counter' value='1' {{ old('front_counter') ? (old('front_counter') == '1' ? 'checked' : '') : ($evaluation->front_counter == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='front_counter' value='2' {{ old('front_counter') ? (old('front_counter') == '2' ? 'checked' : '') : ($evaluation->front_counter == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='front_counter' value='3' {{ old('front_counter') ? (old('front_counter') == '3' ? 'checked' : '') : ($evaluation->front_counter == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='front_counter' value='4' {{ old('front_counter') ? (old('front_counter') == '4' ? 'checked' : '') : ($evaluation->front_counter == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='front_counter' value='5' {{ old('front_counter') ? (old('front_counter') == '5' ? 'checked' : '') : ($evaluation->front_counter == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('front_counter'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('drive_thru') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Drive Thru (Window, Pass Thru, Expeditor):</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='drive_thru' value='1' {{ old('drive_thru') ? (old('drive_thru') == '1' ? 'checked' : '') : ($evaluation->drive_thru == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='drive_thru' value='2' {{ old('drive_thru') ? (old('drive_thru') == '2' ? 'checked' : '') : ($evaluation->drive_thru == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='drive_thru' value='3' {{ old('drive_thru') ? (old('drive_thru') == '3' ? 'checked' : '') : ($evaluation->drive_thru == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='drive_thru' value='4' {{ old('drive_thru') ? (old('drive_thru') == '4' ? 'checked' : '') : ($evaluation->drive_thru == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='drive_thru' value='5' {{ old('drive_thru') ? (old('drive_thru') == '5' ? 'checked' : '') : ($evaluation->drive_thru == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('drive_thru'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('headset') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Headset:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='headset' value='1' {{ old('headset') ? (old('headset') == '1' ? 'checked' : '') : ($evaluation->headset == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='headset' value='2' {{ old('headset') ? (old('headset') == '2' ? 'checked' : '') : ($evaluation->headset == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='headset' value='3' {{ old('headset') ? (old('headset') == '3' ? 'checked' : '') : ($evaluation->headset == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='headset' value='4' {{ old('headset') ? (old('headset') == '4' ? 'checked' : '') : ($evaluation->headset == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='headset' value='5' {{ old('headset') ? (old('headset') == '5' ? 'checked' : '') : ($evaluation->headset == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('headset'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('face_to_face') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Face to Face:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='face_to_face' value='1' {{ old('face_to_face') ? (old('face_to_face') == '1' ? 'checked' : '') : ($evaluation->face_to_face == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='face_to_face' value='2' {{ old('face_to_face') ? (old('face_to_face') == '2' ? 'checked' : '') : ($evaluation->face_to_face == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='face_to_face' value='3' {{ old('face_to_face') ? (old('face_to_face') == '3' ? 'checked' : '') : ($evaluation->face_to_face == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='face_to_face' value='4' {{ old('face_to_face') ? (old('face_to_face') == '4' ? 'checked' : '') : ($evaluation->face_to_face == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='face_to_face' value='5' {{ old('face_to_face') ? (old('face_to_face') == '5' ? 'checked' : '') : ($evaluation->face_to_face == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('face_to_face'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('bagging') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Bagging:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='bagging' value='1' {{ old('bagging') ? (old('bagging') == '1' ? 'checked' : '') : ($evaluation->bagging == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='bagging' value='2' {{ old('bagging') ? (old('bagging') == '2' ? 'checked' : '') : ($evaluation->bagging == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='bagging' value='3' {{ old('bagging') ? (old('bagging') == '3' ? 'checked' : '') : ($evaluation->bagging == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='bagging' value='4' {{ old('bagging') ? (old('bagging') == '4' ? 'checked' : '') : ($evaluation->bagging == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='bagging' value='5' {{ old('bagging') ? (old('bagging') == '5' ? 'checked' : '') : ($evaluation->bagging == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('bagging'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('boards') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Lunch/Dinner Boards (Fries, Nuggets, Sandwiches):</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='boards' value='1' {{ old('boards') ? (old('boards') == '1' ? 'checked' : '') : ($evaluation->boards == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='boards' value='2' {{ old('boards') ? (old('boards') == '2' ? 'checked' : '') : ($evaluation->boards == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='boards' value='3' {{ old('boards') ? (old('boards') == '3' ? 'checked' : '') : ($evaluation->boards == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='boards' value='4' {{ old('boards') ? (old('boards') == '4' ? 'checked' : '') : ($evaluation->boards == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='boards' value='5' {{ old('boards') ? (old('boards') == '5' ? 'checked' : '') : ($evaluation->boards == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('boards'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('specials') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Lunch/Dinner Specials:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='specials' value='1' {{ old('specials') ? (old('specials') == '1' ? 'checked' : '') : ($evaluation->specials == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='specials' value='2' {{ old('specials') ? (old('specials') == '2' ? 'checked' : '') : ($evaluation->specials == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='specials' value='3' {{ old('specials') ? (old('specials') == '3' ? 'checked' : '') : ($evaluation->specials == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='specials' value='4' {{ old('specials') ? (old('specials') == '4' ? 'checked' : '') : ($evaluation->specials == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='specials' value='5' {{ old('specials') ? (old('specials') == '5' ? 'checked' : '') : ($evaluation->specials == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('specials'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('breading') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Breading:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='breading' value='1' {{ old('breading') ? (old('breading') == '1' ? 'checked' : '') : ($evaluation->breading == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='breading' value='2' {{ old('breading') ? (old('breading') == '2' ? 'checked' : '') : ($evaluation->breading == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='breading' value='3' {{ old('breading') ? (old('breading') == '3' ? 'checked' : '') : ($evaluation->breading == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='breading' value='4' {{ old('breading') ? (old('breading') == '4' ? 'checked' : '') : ($evaluation->breading == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='breading' value='5' {{ old('breading') ? (old('breading') == '5' ? 'checked' : '') : ($evaluation->breading == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('breading'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('lean') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Lean:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='lean' value='1' {{ old('lean') ? (old('lean') == '1' ? 'checked' : '') : ($evaluation->lean == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='lean' value='2' {{ old('lean') ? (old('lean') == '2' ? 'checked' : '') : ($evaluation->lean == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='lean' value='3' {{ old('lean') ? (old('lean') == '3' ? 'checked' : '') : ($evaluation->lean == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='lean' value='4' {{ old('lean') ? (old('lean') == '4' ? 'checked' : '') : ($evaluation->lean == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='lean' value='5' {{ old('lean') ? (old('lean') == '5' ? 'checked' : '') : ($evaluation->lean == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('lean'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('biscuits') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Biscuits:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='biscuits' value='1' {{ old('biscuits') ? (old('biscuits') == '1' ? 'checked' : '') : ($evaluation->biscuits == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='biscuits' value='2' {{ old('biscuits') ? (old('biscuits') == '2' ? 'checked' : '') : ($evaluation->biscuits == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='biscuits' value='3' {{ old('biscuits') ? (old('biscuits') == '3' ? 'checked' : '') : ($evaluation->biscuits == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='biscuits' value='4' {{ old('biscuits') ? (old('biscuits') == '4' ? 'checked' : '') : ($evaluation->biscuits == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='biscuits' value='5' {{ old('biscuits') ? (old('biscuits') == '5' ? 'checked' : '') : ($evaluation->biscuits == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('biscuits'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('breakfast_boards') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Breakfast Boards (Hash Browns, Minis, Biscuits):</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='breakfast_boards' value='1' {{ old('breakfast_boards') ? (old('breakfast_boards') == '1' ? 'checked' : '') : ($evaluation->breakfast_boards == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_boards' value='2' {{ old('breakfast_boards') ? (old('breakfast_boards') == '2' ? 'checked' : '') : ($evaluation->breakfast_boards == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_boards' value='3' {{ old('breakfast_boards') ? (old('breakfast_boards') == '3' ? 'checked' : '') : ($evaluation->breakfast_boards == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_boards' value='4' {{ old('breakfast_boards') ? (old('breakfast_boards') == '4' ? 'checked' : '') : ($evaluation->breakfast_boards == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_boards' value='5' {{ old('breakfast_boards') ? (old('breakfast_boards') == '5' ? 'checked' : '') : ($evaluation->breakfast_boards == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('breakfast_boards'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('breakfast_specials') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Breakfast Specials:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='breakfast_specials' value='1' {{ old('breakfast_specials') ? (old('breakfast_specials') == '1' ? 'checked' : '') : ($evaluation->breakfast_specials == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_specials' value='2' {{ old('breakfast_specials') ? (old('breakfast_specials') == '2' ? 'checked' : '') : ($evaluation->breakfast_specials == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_specials' value='3' {{ old('breakfast_specials') ? (old('breakfast_specials') == '3' ? 'checked' : '') : ($evaluation->breakfast_specials == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_specials' value='4' {{ old('breakfast_specials') ? (old('breakfast_specials') == '4' ? 'checked' : '') : ($evaluation->breakfast_specials == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='breakfast_specials' value='5' {{ old('breakfast_specials') ? (old('breakfast_specials') == '5' ? 'checked' : '') : ($evaluation->breakfast_specials == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('breakfast_specials'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('opening_front') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Opening Front:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='opening_front' value='1' {{ old('opening_front') ? (old('opening_front') == '1' ? 'checked' : '') : ($evaluation->opening_front == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='opening_front' value='2' {{ old('opening_front') ? (old('opening_front') == '2' ? 'checked' : '') : ($evaluation->opening_front == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='opening_front' value='3' {{ old('opening_front') ? (old('opening_front') == '3' ? 'checked' : '') : ($evaluation->opening_front == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='opening_front' value='4' {{ old('opening_front') ? (old('opening_front') == '4' ? 'checked' : '') : ($evaluation->opening_front == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='opening_front' value='5' {{ old('opening_front') ? (old('opening_front') == '5' ? 'checked' : '') : ($evaluation->opening_front == '5' ? 'checked' : '') }}>5</label>
                                @if ($errors->has('opening_front'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('opening_boards') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Opening Boards:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='opening_boards' value='1' {{ old('opening_boards') ? (old('opening_boards') == '1' ? 'checked' : '') : ($evaluation->opening_boards == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='opening_boards' value='2' {{ old('opening_boards') ? (old('opening_boards') == '2' ? 'checked' : '') : ($evaluation->opening_boards == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='opening_boards' value='3' {{ old('opening_boards') ? (old('opening_boards') == '3' ? 'checked' : '') : ($evaluation->opening_boards == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='opening_boards' value='4' {{ old('opening_boards') ? (old('opening_boards') == '4' ? 'checked' : '') : ($evaluation->opening_boards == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='opening_boards' value='5' {{ old('opening_boards') ? (old('opening_boards') == '5' ? 'checked' : '') : ($evaluation->opening_boards == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('opening_boards'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('opening_lean') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Opening Lean:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='opening_lean' value='1' {{ old('opening_lean') ? (old('opening_lean') == '1' ? 'checked' : '') : ($evaluation->opening_lean == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='opening_lean' value='2' {{ old('opening_lean') ? (old('opening_lean') == '2' ? 'checked' : '') : ($evaluation->opening_lean == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='opening_lean' value='3' {{ old('opening_lean') ? (old('opening_lean') == '3' ? 'checked' : '') : ($evaluation->opening_lean == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='opening_lean' value='4' {{ old('opening_lean') ? (old('opening_lean') == '4' ? 'checked' : '') : ($evaluation->opening_lean == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='opening_lean' value='5' {{ old('opening_lean') ? (old('opening_lean') == '5' ? 'checked' : '') : ($evaluation->opening_lean == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('opening_lean'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('closing_front') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Closing Front:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='closing_front' value='1' {{ old('closing_front') ? (old('closing_front') == '1' ? 'checked' : '') : ($evaluation->closing_front == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='closing_front' value='2' {{ old('closing_front') ? (old('closing_front') == '2' ? 'checked' : '') : ($evaluation->closing_front == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='closing_front' value='3' {{ old('closing_front') ? (old('closing_front') == '3' ? 'checked' : '') : ($evaluation->closing_front == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='closing_front' value='4' {{ old('closing_front') ? (old('closing_front') == '4' ? 'checked' : '') : ($evaluation->closing_front == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='closing_front' value='5' {{ old('closing_front') ? (old('closing_front') == '5' ? 'checked' : '') : ($evaluation->closing_front == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('closing_front'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('closing_boards') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Closing Boards:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='closing_boards' value='1' {{ old('closing_boards') ? (old('closing_boards') == '1' ? 'checked' : '') : ($evaluation->closing_boards == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='closing_boards' value='2' {{ old('closing_boards') ? (old('closing_boards') == '2' ? 'checked' : '') : ($evaluation->closing_boards == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='closing_boards' value='3' {{ old('closing_boards') ? (old('closing_boards') == '3' ? 'checked' : '') : ($evaluation->closing_boards == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='closing_boards' value='4' {{ old('closing_boards') ? (old('closing_boards') == '4' ? 'checked' : '') : ($evaluation->closing_boards == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='closing_boards' value='5' {{ old('closing_boards') ? (old('closing_boards') == '5' ? 'checked' : '') : ($evaluation->closing_boards == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('closing_boards'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('closing_lean') ? ' has-error' : '' }}'>
                            <div class='col-md-offset-2'>
                                <span class='h4'>Closing Lean:</span>
                            </div>
                            <div class='col-md-offset-3 col-md-4'>
                                <label class='radio-inline'><input type='radio' name='closing_lean' value='1' {{ old('closing_lean') ? (old('closing_lean') == '1' ? 'checked' : '') : ($evaluation->closing_lean == '1' ? 'checked' : '') }}>1</label>
                                <label class='radio-inline'><input type='radio' name='closing_lean' value='2' {{ old('closing_lean') ? (old('closing_lean') == '2' ? 'checked' : '') : ($evaluation->closing_lean == '2' ? 'checked' : '') }}>2</label>
                                <label class='radio-inline'><input type='radio' name='closing_lean' value='3' {{ old('closing_lean') ? (old('closing_lean') == '3' ? 'checked' : '') : ($evaluation->closing_lean == '3' ? 'checked' : '') }}>3</label>
                                <label class='radio-inline'><input type='radio' name='closing_lean' value='4' {{ old('closing_lean') ? (old('closing_lean') == '4' ? 'checked' : '') : ($evaluation->closing_lean == '4' ? 'checked' : '') }}>4</label>
                                <label class='radio-inline'><input type='radio' name='closing_lean' value='5' {{ old('closing_lean') ? (old('closing_lean') == '5' ? 'checked' : '') : ($evaluation->closing_lean == '5' ? 'checked' : '') }}>5</label>

                                @if ($errors->has('closing_lean'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='comment' class='col-md-2 control-label'>Comments:</label>

                            <div class='col-md-6'>
                                <textarea id='comment' class='form-control' name='comment'>{{ (old('comment') ? old('comment') : $evaluation->comment) }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class='form-group'>
                            <div class='col-md-4 col-md-offset-3'>
                                <button type='submit' class='btn btn-primary'>
                                    Submit Evaluation Edit
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class='col-md-10 col-md-offset-2 h4'>
                        <div class='h3'>Performance Ratings:</div>
                        1:&nbsp&nbsp Not Learned or Unsatisfactory - Performance definitely below acceptable standards.<br>
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
