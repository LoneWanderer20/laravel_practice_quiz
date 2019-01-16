@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question Pool</div>

                <div class="card-body">

                    @if (count($question_pool["in_pool"]) > 0 || count($question_pool["out_pool"]))

                    <h4 style="margin-bottom: 20px;">In</h4>
                    @if (count($question_pool["in_pool"]) > 0 )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Number of Questions</th>
                                    <th scope="col">Current Level</th>
                                    <th scope="col">Add</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($question_pool["in_pool"]); $i++)
                                <tr>
                                    <th scope="row">{{ $question_pool["in_pool"][$i]["name"] }}</th>
                                    <td>{{ $question_pool["in_pool"][$i]["question_count"] }}</td>
                                    <td>9</td>
                                    <td><a href="/quiz/question_pool/remove/{{ $question_pool['in_pool'][$i]['id'] }}" class="btn btn-danger">Remove</a></td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    @else
                         <p>You don't have any questions loaded in the question pool. You need to add some before you proceed!</p>
                    @endif

                    <h4 style="margin-bottom: 20px;">Out</h4>
                    @if (count($question_pool["out_pool"]) > 0 )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Number of Questions</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($question_pool["out_pool"]); $i++)
                                <tr>
                                    <th scope="row">{{ $question_pool["out_pool"][$i]["name"] }}</th>
                                    <td>{{ $question_pool["out_pool"][$i]["question_count"] }}</td>
                                    <td><a href="/quiz/question_pool/add/{{ $question_pool['out_pool'][$i]['id'] }}" class="btn btn-success">Add</a></td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    @else
                         <p>All your questions are in the question pool!</p>
                    @endif

                    @else
                         <p>You don't currently have any subjects. Feel free to add one, and get learning!</p>
                    @endif


                    <a href="/profile" class="btn btn-primary">Back</a>

                    @if (count($question_pool["in_pool"]) > 0 )
                        <a href="/quiz" class="btn btn-primary">
                    @else
                        <a href="#" class="btn btn-secondary">
                    @endif
                        To Quiz</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
