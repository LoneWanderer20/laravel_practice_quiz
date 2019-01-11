@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Topics</div>

                <div class="card-body">

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
                            <tr>
                                <th scope="row">Science</th>
                                <td>345</td>
                                <td>86%</td>
                                <td>67%</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <th scope="row">History</th>
                                <td>234</td>
                                <td>46%</td>
                                <td>37%</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <th scope="row">Laravel</th>
                                <td>287</td>
                                <td>67%</td>
                                <td>47%</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th scope="row">React</th>
                                <td>126</td>
                                <td>73%</td>
                                <td>55%</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <th scope="row">React-native</th>
                                <td>210</td>
                                <td>54%</td>
                                <td>34%</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a href="/topics/add_topic"><button>Add Topic</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
