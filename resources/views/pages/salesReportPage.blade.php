@extends('layouts.app')

@section('contents')


    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="table1">

                        <h2>Sales Record</h2>
                        <p>Welcome sabbir!</p>


                        <hr>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Product name</th>
                                <th scope="col">price</th>
                                <th scope="col">Quantity</th>
                                {{--                            <th scope="col">Role</th>--}}
                                <th scope="col">Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Show details table -->

                            @foreach($products as $product)


                                <tr>

                                    {{--                            <th scope="row">--}}
                                    {{--                            </th>--}}
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->Quantity}}</td>
                                    <td>
                                        {{$product->price * $product->Quantity}}
                                    </td>













                                </tr>
                            @endforeach

                            <!-- <br> -->

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
