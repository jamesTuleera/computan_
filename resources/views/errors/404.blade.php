@extends('layouts.errors')
@section('errorContent')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
        <div class="pt-5 mt-5 col-md-9">
            <h1 class="mt-5 text-danger">Oop!</h1>
            <h2 class="text-muted">Error 404 <br> Page Not Found</h2>
            <p class="text-muted">
                Couldn't locate the page you are looking for... <br>
                <a class="btn btn-sm btn-primary" href="{{ route('dashboard') }}"> Go back</a>
            </p>

        </div>
        </div>
    </div>
@endsection
