@extends('backend.layout.master')
@section('content')
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

                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td scope="row"> 1 </td>
                            <td>{{ $user->name }}</td>

                            <td>
                                @foreach ($user->roles as $data)
                                    {{ $data->roll_name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('/role/approval/'.$user->id) }}" class="btn btn-success">approve</a>
                                <a href="#" class="btn btn-danger">delete</a>
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
