@include('layout.cdn')
@include('layout.header.header')
<div class="container">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com">
            </div>
            <div class="mb-3 row">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
        
    </div>

</div>
@include('layout.footer.footer')

