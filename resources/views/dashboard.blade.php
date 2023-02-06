<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Import CSV Records</h2></div>
                    <div class="card-body">
                        <div class="form">
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger"> {{ $error }} </p>
                            @endforeach
                            <form action="{{ route('user.csv_upload') }}" method="post" enctype="multipart/form-data"> @csrf
                                <div class="form-group">
                                    <label for="file">Select file</label>
                                    <input type="file" name="csv_data" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="mt-3 btn btn-primary">Upload</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
