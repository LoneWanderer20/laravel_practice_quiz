
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Topics</div>

                <div class="card-body">

                    @if (session('success') !== null)
                        <p style="color: green; font-weight: bold; font-size: 16px;">{{ session('success') }}</p>
                    @endif

                    @if ($topics->count() > 0)

                        <table class="table">
                            <h4 style="margin-bottom: 20px;">Your Subjects</h4>

                            <thead>
                                <tr>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Number of Questions</th>
                                    <th scope="col">Latest Score</th>
                                    <th scope="col">Overall Score</th>
                                    <th scope="col">Current Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($topics as $topic)
                                    <tr class="topic-row"
                                        onclick="window.location='{{ route('topics.show', $topic->id) }}'"
                                        style="cursor:pointer;"
                                        >
                                        <th scope="row">{{ $topic->name }}</th>
                                        <td>{{ $topic->question_count }}</td>
                                        <td>
                                            @if ($topic->latest_score !== null)
                                                {{ $topic->latest_score }}%
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($topic->overall_score !== null)
                                                {{ $topic->overall_score }}%
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>9</td>
                                    </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                    @else
                         <p>You don't currently have any subjects. Feel free to add one, and get learning!</p>
                    @endif

                    <a href="/profile" class="btn btn-primary">Back</a>
                    <a href="/topics/add" class="btn btn-primary">Add Topic</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
