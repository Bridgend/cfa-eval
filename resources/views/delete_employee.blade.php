@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class='panel panel-default'>
                <div class='panel-body'>
                    <form class='form-horizontal' role='form' method='POST' action='/employees/delete/{{ $employee->id }}'>
                        {{ csrf_field() }}
                        <div class='form-group'>
                            <div class='col-md-12'>
                                <h4>Are you sure you want to delete "{{ $employee->first_name . ' ' . $employee->last_name }}" from the database?</h4>
                                <h4>(all of their evaluations will be deleted as well)</h4>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-md-8'>
                                <a class='btn btn-primary' href='/employees'>Do Not Delete</a>
                                <button type='submit' class='btn btn-danger'>Delete "{{ $employee->first_name . ' ' . $employee->last_name }}" </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
