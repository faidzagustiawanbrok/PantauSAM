

@extends('admin.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Show report</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $report->Nama_Lokasi}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <strong>Lihat Lokasi:</strong> <br/>

            <button id="viewLocationBtn" class="btn btn-success">Lihat Lokasi di Google Maps</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Detail Laporan:</strong> <br/>
                {{ $report->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Status:</strong> <br/>
                {{ $report->status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong><br/>
                <img src="/images/{{ $report->image }}" width="500px">
            </div>
        </div>
    </div>

  </div>
</div>
<script>
    document.getElementById("viewLocationBtn").addEventListener("click", function() {
    var latitude = {{ $report->Latitude }};
    var longitude = {{ $report->Longitude }};
    var url = "https://www.google.com/maps?q=" + latitude + "," + longitude;

    // Membuka Google Maps di tab baru
    window.open(url, '_blank');
});

</script>
@endsection
