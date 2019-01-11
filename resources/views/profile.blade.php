@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <table>
                       <tbody>
                           <tr class="table-row">
                               <td>Subjects:</td>
                               <td>{{ $topics->count() }}</td>
                           </tr>
                           <tr class="table-row">
                               <td>Strongest Subject:</td>
                               <td>{{ $user->strongest_subject }}</td>
                           </tr>
                           <tr class="table-row">
                               <td>Weakest Subject:</td>
                               <td>{{ $user->weakest_subject }}</td>
                           </tr>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
