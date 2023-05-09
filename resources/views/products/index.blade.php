@include('layout.cdn')
<h1>TEST</h1>

<!-- for debug -->
<!-- <p>{{$products}}</p> -->

<div class="container-fluid">
    @if (count($products) > 0)
        @foreach ($products as $product)
            <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>

        @endforeach
    @endif
</div>