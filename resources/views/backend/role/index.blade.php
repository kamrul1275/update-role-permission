@extends('backend.layout.master')
@section('content')


    <div class="container">

        <a href="{{ route('role.create') }}" class="btn btn-info mt-3 py-2">Create Role</a>

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
                        <th scope="col">Role Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $key => $data)
                        <tr>
                            <td scope="row"> {{ $key + 1 }} </td>
                            <td> <span class="badge bg-danger">{{ $data->name }} </span> </td>
                            <td>{{ $data->user->name ?? '' }}</td>

                            <td>
                                <a href="" class="btn btn-success">Edit</a>



                                <a href="{{ url('/role/delete/' . $data->id) }}" class="btn btn-danger">delete</a>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>






        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
