@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-16'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>Team Member Performance Evaluations</h4>
                </div>
                <div class='panel-body'>
                    <div class='table-responsive'>

                        <table class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th><a href='{{ route('view_all_evaluations') }}'>Name</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'quantity_of_work']) }}'>Quantity of Work</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'quality_of_work']) }}'>Quality of Work</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'timeliness']) }}'>Timeliness</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'cost']) }}'>Cost</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'safety']) }}'>Safety</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'initiative']) }}'>Initiative</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'customer_focus']) }}'>Customer Focus</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'adaptability']) }}'>Adaptability</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'expression']) }}'>Expression</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'relationships_with_others']) }}'>Relationships with Others</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'punctuality']) }}'>Punctuality and Attendance</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'appearance']) }}'>Appearance</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'conduct']) }}'>Conduct</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'knowledge_of_products']) }}'>Knowledge of Products</a></th>
                                    <th><a href='{{ route('view_all_evaluations', ['sort' => 'knowledge_of_cfa_operations']) }}'>Knowledge of Chick-fil-A Unit Operations</a></th>
                                    <th>Date</th>
                                    <th>Evaluator</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluations as $eval)
                                <tr>
                                    <td><a href='{{ route('view_evaluation', ['evaluation_id' => $eval->id]) }}'>{{ $eval->last_name }}, {{ $eval->first_name }}</a></td>
                                    <td>{{ $eval->quantity_of_work }}</td>
                                    <td>{{ $eval->quality_of_work }}</td>
                                    <td>{{ $eval->timeliness }}</td>
                                    <td>{{ $eval->cost }}</td>
                                    <td>{{ $eval->safety }}</td>
                                    <td>{{ $eval->initiative }}</td>
                                    <td>{{ $eval->customer_focus }}</td>
                                    <td>{{ $eval->adaptability }}</td>
                                    <td>{{ $eval->expression }}</td>
                                    <td>{{ $eval->relationships_with_others }}</td>
                                    <td>{{ $eval->punctuality }}</td>
                                    <td>{{ $eval->appearance }}</td>
                                    <td>{{ $eval->conduct }}</td>
                                    <td>{{ $eval->knowledge_of_products }}</td>
                                    <td>{{ $eval->knowledge_of_cfa_operations }}</td>
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
