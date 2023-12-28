@extends('layouts.app')

@section('content')



    <ul>
        <li> <a href="{{ route('dashboard') }}" class="btn btn-primary">Home Page</a></li>
        <li> <a href="{{ route('role.request') }}" class="btn btn-warning">Role Request</a></li>
        <li> <a href="{{ route('role.pages') }}" class="btn btn-info">Role</a></li>

    </ul>






    <div class="container">

        <div class="row">




            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>




                        @foreach ($users as $data)


                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['role']['name'] }}</td>
                                <td>
                                    
                                    <a href="" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                        @endforeach


                </tbody>
            </table>




        </div>
    </div>
@endsection
