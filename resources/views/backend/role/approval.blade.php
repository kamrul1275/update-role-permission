@extends('backend.layout.master')
@section('content')

<h2 class="text-center py-3">All Approve User</h2>

<div class="container">
    <div class="row">


        {{-- error start --}}
        @if (Session::has('msg'))
            <h3 class="text-danger">{{ Session::get('msg') }}</h3>
        @endif

        {{-- error end --}}


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $key => $data)
                    <tr>
                        <td scope="row"> {{ $key + 1 }} </td>
                        <td> {{ $data['name'] }}  </td>

                      <td>{{  $data->role->name ?? '' }}</td> 

                        <td>
                            <a href="{{  url('/admin/role/approval/store/'.$data['id']) }}" class="btn btn-danger">Pendding</a>

                            <a href="" class="btn btn-danger">delete</a>


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
