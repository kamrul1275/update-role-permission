
@extends('layouts.app')

@section('content')


<div class="container">


<div class="row">



     <div class="col-md-7">

        <h3 class="py-3">Role Request Post....</h3>

        @if (Session::has('msg'))
        <h4 class="text-success">{{ Session::get('msg') }}</h4>

        @endif

<br>
        <form action="{{ route('role.request.store') }}" method="POST">

            @csrf
            <div class="mt-4">
                <label for="">Selete Role</label> <br>

                <select name="user_id" id="">


                   @foreach ($roles as $role)
                    <option value="{{ $role->id}}">{{ $role->name }}</option>
                    @endforeach



               </select>
            </div>


            <button type="submit" class="btn btn-danger text-dark">Submit</button>
        </form>


     </div>





     <div class="col-md-5"></div>


</div>


</div>


@endsection
