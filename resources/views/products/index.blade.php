@include('layout.cdn')


<!-- for debug -->
<!-- <p>{{$products}}</p> -->

<div class="container-fluid ">
<h1>TEST</h1>
    @if (count($products) > 0)
        @foreach ($products as $product)
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{$product->description}}</p>
                </div>
                </div>
            </div>
        </div>

        @endforeach
    @endif
</div>