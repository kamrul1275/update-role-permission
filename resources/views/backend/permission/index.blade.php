@extends('backend.layout.master')
@section('content')




<div class="container">
  <a href="{{ route('create.permission.role')}}" class="btn btn-info mt-4">Create Permission</a>  <br>


    <div class="row">

      
      @if (Session::has('msg'))

      <h3 class="text-danger">{{ Session::get('msg') }}</h3>
          
      @endif

   
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Permission Name</th>
              
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
          

              @foreach ($permissions as $key=> $data)
              <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{ $data->name }}</td>
                
                  <td>

                      <a href="" class="btn btn-success">Edit</a>
                      <a href="{{ url('/permission/delete/'. $data->id) }}" class="btn btn-danger">delete</a>



                  </td>

              </tr>
          @endforeach
          
            </tbody>
          </table>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


@endsection