@extends('layouts.errors')
@section('errorContent')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
        <div class="pt-5 mt-5 col-md-9">
            <h1 class="mt-5 text-danger">Oop!</h1>
            <h2 class="text-muted">Error 500 <br> An error occur</h2>
            <p class="text-muted">
                There was an error while carrying out this operations please try again <br>
                <a class="btn btn-sm btn-primary" href="{{ route('dashboard') }}"> Go back</a>
            </p>

        </div>
        </div>
    </div>
@endsection
