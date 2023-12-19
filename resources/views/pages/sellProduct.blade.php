@extends('layouts.app')

@section('contents')


    <section class="container" id="custom-edit">

        <div class=" p-5 rounded" style="background-color:rgb(78, 115, 223)">
            <h3 class="text-center ">Sell Product</h3>
            <h5 class="text-center p-3"></h5>

            <form class="form" method="post" action="{{route('product.sell',['id'=>$product->id])}}">


                <div class="form-outline mb-4">


                    <div class="form-outline mb-4">
                        <input type="text" name="product_name" id="form3Example3cg" class="form-control form-control-lg" placeholder="{{$product->product_name}}" value="{{$product->product_name}}"  />

                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="product_price" id="form3Example3cg" class="form-control form-control-lg" placeholder="{{$product->price}}$" value="{{$product->price}}" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="number" name="product_quantity" id="form3Example3cg" class="form-control form-control-lg" max="{{$product->Quantity}}" min="1"  required />
                    </div>
                </div>

                <div class="d-flex justify-content-center my-2">
                    <button type="submit" name="update" class="btn btn-lg btn-primary ">Sell</button>
                </div>




            </form>
        </div>


    </section>


@endsection
