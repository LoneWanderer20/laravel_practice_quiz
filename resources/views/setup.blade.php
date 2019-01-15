@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Profile Setup</h3>

                    <p>Hi {{ $user->name }}. Thank you for creating an account. Before you proceed, we'd like to know a little bit about you. Please fill out the following below:</p>

                    <form method="POST" action="/profile/setup">
                      @csrf

                      <div class="form-group">
                        <label for="favourite">Favourite Subject</label>
                        <input type="text" class="form-control" id="favourite" name="favourite" placeholder="Enter Subject" required>
                      </div>
                      <div class="form-group">
                        <label for="strongest">Strongest Subject</label>
                        <input type="text" class="form-control" id="strongest" name="strongest" placeholder="Enter Subject" required>
                      </div>
                      <div class="form-group">
                        <label for="weakest">Weakest Subject</label>
                        <input type="text" class="form-control" id="weakest" name="weakest" placeholder="Enter Subject" required>
                      </div>
                      <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea rows="5" class="form-control" id="bio" name="bio" placeholder="Enter Bio" required></textarea>
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
