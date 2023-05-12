@include('layout.cdn')
@include('layout.header.navigation')

<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

    </div>
</div>

<div class="container">  <br>  
  <h3>Create New Product</h3>
  <div class="row">
    <div class="col-sm-8">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('products.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    @foreach (json_decode('{"1":"option1","2":"option2","3":"option3"}',true) as $optionKey => $optionVal)
                            <option value="{{$optionKey}}" >{{$optionVal}}</option>";
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <br>
            <div class="form-group  float-end">
                <button type="submit" class="btn btn-secondary btn-sm">Save</button>
            </div>
        </form> 
    </div>
    <div class="col-sm-4">
     
    </div>
  </div>
</div>

@include('layout.footer.footer')