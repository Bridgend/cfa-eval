@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>Edit Team Member Name</h4>
                </div>
                <div class='panel-body'>

                    <form class='form-horizontal' role='form' method='POST' action='/employees/edit/{{ $employee->id }}'>
                        {{ csrf_field() }}

                        <div class='form-group{{ $errors->has('first_name') ? ' has-error' : '' }}'>
                            <label for='first_name' class='col-md-4 control-label'>First Name</label>

                            <div class='col-md-6'>
                                <input id='first_name' type='text' class='form-control'  name='first_name' value='{{ old('first_name', $employee->first_name) }}'>

                                @if ($errors->has('first_name'))
                                <span class='help-block'>
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group{{ $errors->has('last_name') ? ' has-error' : '' }}'>
                            <label for='first_name' class='col-md-4 control-label'>Last Name</label>

                            <div class='col-md-6'>
                                <input id='last_name' type='text' class='form-control' name='last_name' value='{{ old('last_name', $employee->last_name) }}'>

                                @if ($errors->has('last_name'))
                                <span class='help-block'>
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-8 col-md-offset-4'>
                                <button type='submit' name='button' value='submit' class='btn btn-primary'>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
