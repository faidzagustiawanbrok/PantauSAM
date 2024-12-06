@extends('admin.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">CROTNYA ADMIN DAH BISA COO</h2>
  <a href="/profile" id="dashboard" ><i class="fas fa-home"></i> profile</a>

  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('admin.create') }}"> <i class="fa fa-plus"></i> Create New report</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($reports as $report)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $report->Nama_Lokasi }}</td>
                    <td>{{ $report->status }}</td>
                    <td>
                        <form action="{{ route('admin.destroy',$report->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('admin.show',$report->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('admin.edit',$report->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $reports->withQueryString()->links('pagination::bootstrap-5') !!}

  </div>
</div>
@endsection
