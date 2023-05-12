{{-- @include('layouts.header.header')
@include('layouts.cdn')
@include('layouts.header.navigation') --}}

@extends('layouts.app')
@section('content')

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
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group"> <!--NOT YET WORKING-->
                        <label for="uploadImage">Select a Image</label>
                        <input class="form-control" type="file" id="uploadImage" name="image">
                    </div>
                </div>
            <div class="col-4">
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
            </div>
        </div>
        </form> 
    </div>  
  </div>
  <div class="col-sm-4">
        
  </div>
  </div>
</div>
@endsection
@include('layouts.footer.footer')