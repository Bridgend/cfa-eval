@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4 style='display: inline-block;'>Skill Evaluation for {{ $employee->first_name}} {{ $employee->last_name }} from {{ $evaluation->date }}&nbsp&nbsp&nbsp&nbsp</h4>
                    <a class='btn btn-primary' href='{{ route('edit_skill_eval', ['evaluation_id' => $evaluation->id]) }}'>Edit</a>
                </div>
                <div class='panel-body'>
                    <div class='col-md-12'>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Dining Room: {{ $evaluation->dining_room }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Front Counter Register: {{ $evaluation->front_counter }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Drive Thru: {{ $evaluation->drive_thru }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Headset: {{ $evaluation->headset }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Face to Face: {{ $evaluation->face_to_face }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Bagging: {{ $evaluation->bagging }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Lunch/Dinner Boards: {{ $evaluation->boards }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Lunch/Dinner Specials: {{ $evaluation->specials }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Breading: {{ $evaluation->breading }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Lean: {{ $evaluation->lean }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Biscuits: {{ $evaluation->biscuits }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Breakfast Boards: {{ $evaluation->breakfast_boards }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Breakfast Specials: {{ $evaluation->breakfast_specials }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Opening Front: {{ $evaluation->opening_front }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Opening Boards: {{ $evaluation->opening_boards }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Opening Lean: {{ $evaluation->opening_lean }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Closing Front: {{ $evaluation->closing_front }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Closing Boards: {{ $evaluation->closing_boards }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                <p class='h4'>Closing Lean: {{ $evaluation->closing_lean }}</p>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10'>
                                @if ($evaluation->comment)
                                <p style='color:darkblue;' class='h4'>
                                    Comments: {{ $evaluation->comment }}</p>
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
