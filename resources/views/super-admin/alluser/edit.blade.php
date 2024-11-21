
@extends('super-admin.dashboard')
@section('super_admin_content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-5">
            
           

            @if(session('message'))
            <div class="alert alert-primary ">
                {{ session('message') }}
            </div>
            @endif
            {{-- profile update information  --}}
            <form action="{{route('update_user')}}" method="post">
                @csrf
                <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->id }}" />
                <input type="text" name="name" id="name" value="{{$data->name}}" class="form-controlle ">
                <input type="text" name="email" id="email" value="{{$data->email}}" class="form-controlle ">
                <select name="role" id="role" class="form-controlle">
                    <option value="1">Super Admin</option>
                    <option value="2"> Admin</option>
                    <option value="3">user </option>
                </select>
                <button class="btn btn-success p-2" type="submit"> Update</button>

            </form>



            {{-- profile update information  --}}




        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection



