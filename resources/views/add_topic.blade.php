@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Topics</div>

                <div class="card-body">


                           <form class="card card-sm mb-5">
                               <div class="card-body row no-gutters align-items-center">
                                   <div class="col-auto">
                                       <i class="fas fa-search h4 text-body"></i>
                                   </div>
                                   <!--end of col-->
                                   <div class="col">
                                       <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                   </div>
                                   <!--end of col-->
                                   <div class="col-auto">
                                       <button class="btn btn-lg btn-success" type="submit">Search</button>
                                   </div>
                                   <!--end of col-->
                               </div>
                           </form>


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
                            <tr>
                                <th scope="row">Science</th>
                                <td>345</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">History</th>
                                <td>234</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">Laravel</th>
                                <td>287</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React</th>
                                <td>126</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React-native</th>
                                <td>210</td>
                                <td><button>Add</button></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
