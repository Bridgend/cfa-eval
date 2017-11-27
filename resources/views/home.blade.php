@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <div style='font-size: 150%;font-weight:bold'>Team Member Evaluations Database</div>
                    <div style='font-size: 100%;font-weight:bold'>Chick-fil-A Edinburgh Commons</div>
                </div>
                <div class='panel-body'>

                    <div class='dropdown' style='padding:5px;'>
                        <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>
                            Compare All Evaluations
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a href='/skill-eval/view-all'>Compare Skill Evaluations</a></li>
                            <li><a href='/evaluation/view-all'>Compare Performance Evaluations</a></li>
                        </ul>
                    </div></br>

                    <div class='dropdown' style='padding:5px;'>
                        <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>
                            Add Evaluation
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a href='/skill-eval'>Add Skill Evaluation</a></li>
                            <li><a href='/evaluation'>Add Performance Evaluation</a></li>
                        </ul>
                    </div>

                    <div class='dropdown' style='padding:5px;'>
                        <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>
                            View Evaluation
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a href='/skill-eval/view'>View Skill Evaluation</a></li>
                            <li><a href='/evaluation/view'>View Performance Evaluation</a></li>
                        </ul>
                    </div></br>

                    <div style='padding:5px;'>
                        <a class='btn btn-primary' href='/employees'>Add/Delete Team Members</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
