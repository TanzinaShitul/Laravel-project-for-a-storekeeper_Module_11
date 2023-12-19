@extends('layouts.app')

@section('contents')


    <section class="container " id="custom-edit"  ">

        <div class=" p-5 rounded" style="background-color:bisque">
            <h3 class="text-center ">Update Product</h3>
            <h5 class="text-center p-3"></h5>

            <form class="form" method="post" action="{{route('product.update',['id'=>$product->id])}}">
                @csrf
                @method('PUT')
                <div class="form-outline mb-4">


                    <div class="form-outline mb-4">
                        <input type="text" name="product_name" id="form3Example3cg" class="form-control form-control-lg" placeholder="Product Name " value="{{ $product->product_name }}" required />

                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="product_price" id="form3Example3cg" class="form-control form-control-lg" placeholder="Price" value="{{ $product->price }}" required />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="product_quantity" id="form3Example3cg" class="form-control form-control-lg" placeholder="Quantity" value="{{ $product->Quantity }}" required />
                    </div>
                </div>

                <div class="d-flex justify-content-center my-2">
                    <button type="submit" name="update" class="btn btn-md btn-primary ">Update</button>
                </div>




            </form>
        </div>


    </section>


@endsection
