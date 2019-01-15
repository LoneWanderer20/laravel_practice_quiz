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
                               <td>Favourite Subject:</td>
                               <td class="row-value">{{ $userInfo->favourite }}</td>
                           </tr>
                           <tr class="table-row">
                               <td>Strongest Subject:</td>
                               <td class="row-value">{{ $userInfo->strongest }}</td>
                           </tr>
                           <tr class="table-row">
                               <td>Weakest Subject:</td>
                               <td class="row-value">{{ $userInfo->weakest }}</td>
                           </tr>
                           <tr class="table-row">
                               <td>Bio:</td>
                               <td class="row-value">{{ $userInfo->bio }}</td>
                           </tr>
                       </tbody>
                    </table>
                </div>
            </div>
            <div class="card" style="width: 18rem; float: left;">
              <div class="card-body">
                <h5 class="card-title">Subjects</h5>
                <p class="card-text">Check out the subjects you are currently studying, and add some more if you want.</p>
                <a href="/topics" class="btn btn-primary">Subjects</a>
              </div>
            </div>
            <div class="card" style="width: 18rem; float: left;">
              <div class="card-body">
                <h5 class="card-title">Revise</h5>
                <p class="card-text">Use the quiz application to revise your subjects.</p>
                <a href="/quiz/question_pool" class="btn btn-primary">Revise</a>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
