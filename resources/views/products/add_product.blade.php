@include('layout.cdn')
@include('layout.header.navigation')

<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <form action="{{route('products.insertProduct')}}" enctype="multipart/form-data" >
        @method('POST')
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" rows="3" name="details"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">quantity</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

@include('layout.footer.footer')