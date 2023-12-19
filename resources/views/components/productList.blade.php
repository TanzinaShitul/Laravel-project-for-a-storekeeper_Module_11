
<section>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="table1">

                    <h2>Product List</h2>
                    <p>Welcome sabbir!</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <!-- <a href="">All Students</a> -->
                            <!-- <span> | </span> -->
                             <a href="{{route('home.add')}} "><button class="btn btn-primary btn-sm">Add new Product</button></a>
                            <a href="{{route('home.salesReport')}} "><button class="btn btn-primary btn-sm mx-3">Sales Report</button></a>
                        </div>




                        <!-- Display login and Logout button based on Session -->
                        <div>
{{--                            <?php--}}
{{--                            if (!isset($_SESSION['email']))--}}
{{--                                echo '<a href="login.php"><button class="btn btn-primary btn-sm">Login</button></a>';--}}
{{--                            else--}}
{{--                                echo '<a href="logout.php"><button class="btn btn-primary btn-sm">Logout</button></a>';--}}
{{--                            ?>--}}


                        </div>
                    </div>

                    <hr>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Product name</th>
                            <th scope="col">price</th>
                            <th scope="col">Quantity</th>
{{--                            <th scope="col">Role</th>--}}
                            <th scope="col">Action</th>
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

{{--                            <form action="home/updateProduct" method="get">--}}
{{--                                <input type="hidden" name="email" value="">--}}



                                <a href="{{route('home.update',['id' => $product->id])}}"> <button class="btn btn-sm btn-primary edit mx-1" name="update" >Update</button></a>
                            </td>

                                <form action="{{route('home.delete',['id' => $product->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf


                                    <td>
                                  <button class="btn btn-sm btn-danger mx-2" name="delete" type="submit">Delete Product</button>
                               </td>
                                </form>
                            <td>
                                <a href="{{route('home.sell',['id' => $product->id])}}"> <button class="btn btn-sm btn-warning mx-2" name="sell" type="submit">Sell</button></a>
{{--
 </form>--}}                  </td>










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
