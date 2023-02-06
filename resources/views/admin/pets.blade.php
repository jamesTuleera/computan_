<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="form">
                        <form action="{{ route('admin.store_pets') }}" method="post"> @csrf
                            <p>click the link below to get pets</p>
                   <button href="" class="btn btn-success btn-sm">Get pets</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h3>Pets</h3></div>
                    <div class="p-2 overflow-auto card-body">
                        <table class="table data data-table table-bordered">
                            <tr>
                                <th>SN</th>
                                <th>API</th>
                                <th>Description</th>
                                <th>Auth</th>
                                <th>HTTPS</th>
                                <th>Cors</th>
                                <th>Link</th>
                                <th>Category</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($pets as $pet)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pet->api }}</td>
                                <td>{{ $pet->description }}</td>
                                <td>{{ $pet->auth }}</td>
                                <td>{{ $pet->HTTPS }}</td>
                                <td>{{ $pet->cors }}</td>
                                <td > <a href="{{ $pet->link }}" target="_blank" title="{{ $pet->link }}" class="btn btn-link btn-sm">{{ \Str::limit($pet->link, 15, '...') }}</a></td>
                                <td>{{ $pet->category }}</td>
                                <td>{{ $pet->created_at->toDateString() }}</td>
                            </tr>
                            @endforeach
                        </table>

                        <div class="row">
                            <div class="col-8">
                                {{ $pets->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
