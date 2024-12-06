@extends('admin.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit report</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('admin.update',$report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputStatus" class="form-label"><strong>Status:</strong></label>
            <select
                name="status"
                class="form-select @error('status') is-invalid @enderror"
                id="inputStatus">
                <option value="diproses" {{ $report->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="diterima" {{ $report->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ $report->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection
