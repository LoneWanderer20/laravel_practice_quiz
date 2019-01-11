@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question Pool</div>

                <div class="card-body">

                    <table class="table">
                        <h4 style="margin-bottom: 20px;">In QuestionPool</h4>
                        <thead>
                            <tr>
                                <th scope="col">Subjects</th>
                                <th scope="col">Number of Questions</th>
                                <th scope="col">Current Level</th>
                                <th scope="col">Add</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Science</th>
                                <td>345</td>
                                <td>9</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">History</th>
                                <td>234</td>
                                <td>3</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">Laravel</th>
                                <td>287</td>
                                <td>7</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React</th>
                                <td>126</td>
                                <td>6</td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React-native</th>
                                <td>210</td>
                                <td>4</td>
                                <td><button>Add</button></td>
                        </tbody>
                    </table>

                    <table class="table">
                        <h4 style="margin-bottom: 20px;">Out QuestionPool</h4>
                        <thead>
                            <tr>
                                <th scope="col">Subjects</th>
                                <th scope="col">Number of Questions</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Science</th>
                                <td>345</td>
                                <td>9</td>
                                <td><button>Remove</button></td>
                            </tr>
                            <tr>
                                <th scope="row">History</th>
                                <td>234</td>
                                <td>9</td>
                                <td><button>Remove</button></td>
                            </tr>
                            <tr>
                                <th scope="row">Laravel</th>
                                <td>287</td>
                                <td>9</td>
                                <td><button>Remove</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React</th>
                                <td>126</td>
                                <td>9</td>
                                <td><button>Remove</button></td>
                            </tr>
                            <tr>
                                <th scope="row">React-native</th>
                                <td>210</td>
                                <td>9</td>
                                <td><button>Remove</button></td>
                        </tbody>
                    </table>
                </div>

                <a href="/quiz"><button>To Quiz</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
