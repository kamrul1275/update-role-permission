@extends('layouts.app')


@section('content')
    {{-- <a href="{{ route('create.post',$post) }}" class="btn btn-info"> Create Post</a>  --}}

    @can('view', $posts)
        <a href="{{ route('create.post', $post) }}" class="btn btn-sm btn-success">Create Post</a>
    @endcan


    <div class="container">

        <div class="row">



            <div class="col-md-7">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Np</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Author</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $post->title}}</td>
                                <td>{{ $post->description}}</td>
                                <td>{{ $post->user->name}}</td>
                                <td>
                                    @can('view', $post)
                                    <a href="{{ route('show.post',$post) }}" class="btn btn-info">Edit</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach





                    </tbody>
                </table>
            </div>

            <div class="col-md-5">
            </div>

        </div>
    </div>


    
@endsection
