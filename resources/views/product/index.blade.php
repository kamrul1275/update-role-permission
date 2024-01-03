@extends('layouts.app')


@section('content')
    {{-- <a href="{{ route('create.post',$post) }}" class="btn btn-info"> Create Post</a>  --}}



    <div class="container">

        <div class="row">



            <div class="col-md-7">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Product_Images</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @php $ls = (5*request()->page) - 5; @endphp
                        @foreach ($products as $key=>$product)
                            <tr>
                                <th scope="row">{{ $ls + $key+1}}</th>
                                <td>

                                @foreach ($product->images as $image)
                                {{ $image->id }} <!-- Accessing each image's ID -->
                                <!-- Display other image properties as needed -->
                               @endforeach


                                </td>
                                <td>{{ $product->title}}</td>
                                <td>{{ $product->price}}</td>

                                <td>
                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->image) }}" style="height: 60px; width:60px ;" alt="Product Image"> <!-- Displaying image -->
                                @endforeach
                            </td>

                                <td>

                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
                {{ $products->links() }}
            </div>

            <div class="col-md-5">
            </div>

        </div>
    </div>



@endsection
