@include('layout.cdn')
@include('layout.header.navigation')
@include('layout.search.search')


<!-- for debug -->
<!-- <p>{{$products}}</p> -->
<!-- <h1>TEST</h1> -->

<div class="container">
@if (count($products) > 0)
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <span class="badge bg-primary rounded-pill">₱ {{$product->price}}</span>
                    </div>
                    <p class="card-text">{{$product->description}}</p>
                    <div class="float-end">
                        <form  method="post" action="{{route('products.destroy',$product->id)}}">
                            @method('delete')
                            @csrf
                            <a href="{{route('products.edit',$product->id)}}" type="button" class="btn btn-primary btn-sm" >Edit</a>
                            <button class="btn btn-outline-secondary btn-sm" onclick="deleteConfirm(event)" >Delete</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="h-100 d-flex align-items-center justify-content-center">
        <h5>No Product Found</h5>
    </div>
@endif
</div>

@include('layout.footer.footer')

@if ($message = Session::get('success'))
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
        icon: 'success',
        title: '{{ $message}}'
        })
    </script>
@endif

<script type="text/javascript">
    window.deleteConfirm = function (e){
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {                  
                    form.submit();
            }
        })
    }
</script>

<!-- @include('layout.pagination.pagination') -->
