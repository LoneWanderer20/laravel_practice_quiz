@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Topics</div>

                <div class="card-body">
                          <!-- <form class="card card-sm mb-5">
                               <div class="card-body row no-gutters align-items-center">
                                   <div class="col-auto">
                                       <i class="fas fa-search h4 text-body"></i>
                                   </div>
                                   <div class="col">
                                       <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                   </div>
                                   <div class="col-auto">
                                       <button class="btn btn-lg btn-primary" type="submit">Search</button>
                                   </div>
                               </div>
                           </form>-->


                    <table class="table">
                        <h4 style="margin-bottom: 20px;">Subjects</h4>
                        <thead>
                            <tr>
                                <th scope="col">Subjects</th>
                                <th scope="col">Number of Questions</th>
                                <th scope="col">Add</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topics as $topic)
                            <tr>
                                <th scope="row">{{ $topic->name }}</th>
                                <td>{{ $topic->question_count }}</td>
                                <td><a data-table_id="{{ $topic->id }}" class="btn btn-primary" href="/topics/add/{{ $topic->id }}">Add</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class="btn btn-primary" href="/topics">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
