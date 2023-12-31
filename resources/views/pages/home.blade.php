@extends('layouts.app')


@section('content')
    <div class="contain">
        <div class="row">
            <div class="col-md-12">

                @if (in_array('create', $userPermissions))
                    <!-- Show content only if the user has 'create_post' permission -->
                    <a href="{{ route('create.post') }}" class="btn btn-primary">Create</a>
                @endif


                @if (in_array('view', $userPermissions))
                    <div class="container">
                        <h1 class="py-3">All Post....</h1>

                        <div class="row">
                            <div class="col-md-9">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($posts as $key => $post)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>
                                                    {{-- @can('view', $post)
                                    <a href="{{ route('show.post', $post) }}" class="btn btn-info">Edit</a>
                                @endcan --}}


                                                    {{-- edit part --}}
                                                    @if (in_array('edit', $userPermissions))
                                                        <!-- Show content only if the user has 'create_post' permission -->
                                                        <a href="{{ route('edit.post', $post->id) }}"
                                                            class="btn btn-success">Edit</a>
                                                    @endif





                                                    {{-- delete part.... --}}
                                                    @if (in_array('delete', $userPermissions))
                                                        <!-- Show content only if the user has 'create_post' permission -->
                                                        <a href="{{ route('delete.post', $post->id) }}"
                                                            class="btn btn-danger">Delete</a>
                                                    @endif


                                                </td>






                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3">
                            </div>

                        </div>
                    </div>
                @endif


                @if (in_array('create', $userPermissions))
                    <!-- Show content only if the user has 'create_post' permission -->
                    <h4>creat part...</h4>
                @endif



                @if (in_array('edit', $userPermissions))
                    <!-- Show content only if the user has 'create_post' permission -->
                    <h4>edit part...</h4>
                @endif


                @if (in_array('delete', $userPermissions))
                    <!-- Show content only if the user has 'create_post' permission -->
                    <h4>delete part...</h4>
                @endif







            </div>

        </div>

    </div>
@endsection









