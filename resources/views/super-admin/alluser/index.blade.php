
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
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Manage</th>

                  </tr>
                </thead>
                <tbody>
                @foreach ($alluser as $data)
                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->role}}</td>
                    <td>{{$data->role}}</td>
                    <td>
                        <button class="btn btn-success"><a class="text-white" href="{{route('edit_user',$data->id)}}">Edit</a></button>
                        <button class="btn btn-warning"><a class="text-white" href="">View</a></button>
                        <button class="btn btn-danger"><a class="text-white" href="">Delete</a></button>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>







        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection



