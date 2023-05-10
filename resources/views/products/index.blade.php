@include('layout.cdn')
@include('layout.header.navigation')

<!-- for debug -->
<!-- <p>{{$products}}</p> -->
<!-- <h1>TEST</h1> -->

<div class="container-fluid ">

@if (count($products) > 0)
        @foreach ($products as $product)
        <div class="row">
            <div class="col-sm-5">
                <div class="card" style="width: 18rem; padding: 5">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{$product->description}}</h6>
                    <p class="card-text">{{$product->price}}</p>
                    <a href="#" class="btn btn-primary">edit</a>
                    <a href="#" class="btn btn-danger">delete</a>
                </div>
                </div>
            </div>
        </div>

        @endforeach
    @endif
</div>