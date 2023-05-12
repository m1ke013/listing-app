@include('layout.cdn')
@include('layout.header.navigation')

<div class="container">  <br>  
    <h3>Edit Product</h3>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-8">
            <form method="POST" action="{{ route('products.update', $product->id)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description" >{{$product->description}}</textarea>
                        </div>
                        <div class="form-group"> <!--NOT YET WORKING-->
                            <label for="uploadImage">Select a Image</label>
                            <input class="form-control" type="file" id="uploadImage" name="image" value="{{$product->image}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                @foreach (json_decode('{"1":"option1","2":"option2","3":"option3"}',true) as $optionKey => $optionVal)
                                        <option value="{{$optionKey}}" {{ isset($product->category) && $product->category == $optionKey ? 'selected': '' }} >{{$optionVal}}</option>";
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}">
                        </div>
                        <br>
                        <div class="form-group  float-end">
                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
        
        </div>
    </div>
</div>

@include('layout.footer.footer')