@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-16'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>Team Member Skill Evaluations</h4>
                </div>
                <div class='panel-body'>
                    <div class='table-responsive'>

                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th><a href='{{ route('view_all_skill_evals') }}'>Name</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'dining_room']) }}'>Dining Room</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'front_counter']) }}'>Front Counter Register</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'drive_thru']) }}'>Drive Thru</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'headset']) }}'>Headset</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'face_to_face']) }}'>Face to Face</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'bagging']) }}'>Bagging</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'boards']) }}'>Lunch/Dinner Boards</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'specials']) }}'>Lunch/Dinner Specials</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'breading']) }}'>Breading</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'lean']) }}'>Lean</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'biscuits']) }}'>Biscuits</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'breakfast_boards']) }}'>Breakfast Boards</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'breakfast_specials']) }}'>Breakfast Specials</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'opening_front']) }}'>Opening Front</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'opening_boards']) }}'>Opening Boards</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'opening_lean']) }}'>Opening Lean</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'closing_front']) }}'>Closing Front</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'closing_boards']) }}'>Closing Boards</a></th>
                                    <th><a href='{{ route('view_all_skill_evals', ['sort' => 'closing_lean']) }}'>Closing Lean</a></th>
                                    <th>Date</th>
                                    <th>Evaluator</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluations as $eval)
                                <tr>
                                    <td><a href='{{ route('view_skill_eval', ['evaluation_id' => $eval->id]) }}'>{{ $eval->last_name }}, {{ $eval->first_name }}</a></td>
                                    <td>{{ $eval->dining_room }}</td>
                                    <td>{{ $eval->front_counter }}</td>
                                    <td>{{ $eval->drive_thru }}</td>
                                    <td>{{ $eval->headset }}</td>
                                    <td>{{ $eval->face_to_face }}</td>
                                    <td>{{ $eval->bagging }}</td>
                                    <td>{{ $eval->boards }}</td>
                                    <td>{{ $eval->specials }}</td>
                                    <td>{{ $eval->breading }}</td>
                                    <td>{{ $eval->lean }}</td>
                                    <td>{{ $eval->biscuits }}</td>
                                    <td>{{ $eval->breakfast_boards }}</td>
                                    <td>{{ $eval->breakfast_specials }}</td>
                                    <td>{{ $eval->opening_front }}</td>
                                    <td>{{ $eval->opening_boards }}</td>
                                    <td>{{ $eval->opening_lean }}</td>
                                    <td>{{ $eval->closing_front }}</td>
                                    <td>{{ $eval->closing_boards }}</td>
                                    <td>{{ $eval->closing_lean }}</td>
                                    <td>{{ $eval->date }}</td>
                                    <td>{{ $eval->evaluator }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
