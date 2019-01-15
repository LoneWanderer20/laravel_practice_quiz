@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Topic Questions</div>

                <div class="card-body">

                    @if ($questions->count() > 0)

                        <table class="table">
                            <h4 style="margin-bottom: 20px;">Your Subjects</h4>

                            <thead>
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                <tr class="topic-row">
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->answer }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                         <p>You don't currently have any subjects. Feel free to add one, and get learning!</p>
                    @endif


                    <a class="btn btn-primary" href="/topics">Back</a>

                    <form method="POST" action="{{ action('PagesController@remove_topic') }}" style="display: inline;">
                        @method('PATCH')
                        @csrf
                        <input name="topic" type="hidden" value="{{ $topic }}" />
                        <button type="submit" class="btn btn-danger" style="color: white;">Remove Topic</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
