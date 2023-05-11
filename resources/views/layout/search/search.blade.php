
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-6">
        <form method="get" action="{{route('products.index')}}" accept-charset="UTF-8" role="search">
            <div class="search input-group mb-3" >
                <input type="text" class="round form-control" placeholder="Search product ..."  aria-describedby="button-addon1" size="50" name="search" value="{{request('search')}}">
                <button class="btn btn-outline-secondary corner" type="submit" id="button-addon1">Search</button>
            </div>
        </form>
        </div>
        <div class="col">
        </div>
    </div>

</div>