@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4>View Performance Evaluation</h4>
                </div>
                <div class='panel-body'>

                    <form class='form-horizontal' role='form' method='POST' action='/evaluation/view'>
                        {{ csrf_field() }}

                        <div class='form-group {{ $errors->has('employee') ? ' has-error' : '' }}'>
                            <label for='employee' class='col-md-4 control-label'>Team Member</label>

                            <div class='col-md-6'>
                                <select class='form-control' id='employee' name='employee'>
                                    <option selected disabled hidden>&nbsp;</option>
                                    @foreach($employees_for_dropdown as $employee_id => $employee)
                                    <option value='{{ $employee_id }}' {{ old('employee') == $employee_id ? 'selected' : '' }}>
                                        {{ $employee }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('employee'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group {{ $errors->has('evaluation') ? ' has-error' : '' }}'>
                            <label for='evaluation' class='col-md-4 control-label'>Evaluation Date</label>

                            <div class='col-md-6'>
                                <select class='form-control' id='evaluation' name='evaluation'>
                                </select>

                                @if ($errors->has('evaluation'))
                                <span class='help-block'>
                                    <strong>This field is required</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-8 col-md-offset-4'>
                                <button type='submit' class='btn btn-primary'>
                                    View Evaluation
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

@section('scripts')
<script>
   $('#employee').on('change', function(e){
    var emp_id = e.target.value;
       //ajax
       $.get('/api/evaluation-dropdown?emp_id=' + emp_id, function(data) {
           //success data
           $('#evaluation').empty();
           $('#evaluation').append('<option selected disabled hidden>&nbsp;</option>');
           $.each(data, function(index, evaluation){
               $('#evaluation').append('<option value=' + evaluation.id + '>'
               + evaluation.date + '</option>');
           });
       });
   });
</script>
@endsection
