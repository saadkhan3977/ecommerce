<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/frontend/css/style.css')}}" rel="stylesheet">
    <!-- Confirmation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/toastr/toastr.min.css')}}">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{route('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge" id="cartcount">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block menu-droplap">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse @if(empty($page)) show @endif navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        
                        @if($category)
                            @foreach($category as $cat)
                                @if(!empty(json_decode($cat->subcategory)))
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link" data-toggle="dropdown">{{$cat->category_name}} <i class="fa fa-angle-down float-right mt-1"></i></a>
                                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                            @foreach($cat->subcategory as $subcat)
                                            <a href="" class="dropdown-item">{{ $subcat->category_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="" class="nav-item nav-link">{{$cat->category_name}}</a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{url('/shop')}}" class="nav-item nav-link">Shop</a>
                            <a href="{{url('/detail/')}}" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{url('/cart')}}" class="dropdown-item">Shopping Cart</a>
                                    <a href="{{url('/checkout')}}" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(!Auth::check())
                            <a href="{{url('/login')}}" class="nav-item nav-link">Login</a>
                            <a href="{{url('/register')}}" class="nav-item nav-link">Register</a>
                            @else
                            <a href="javascrip:;" class="nav-item nav-link">{{Auth::user()->name}}</a>
                            <a href="{{url('/dashboard')}}" class="nav-item nav-link">Dashboard</a>
                            @endif
                        </div>
                    </div>
                </nav>
                @if(empty($page))
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('/frontend/img/carousel-1.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('/frontend/img/carousel-2.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{asset('/frontend/img/payments.png"')}} alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('/frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/frontend/js/main.js')}}"></script>
    <!-- Confirmation -->
<!-- $ npm install jquery-confirm -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Toastr -->
<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
@if(session('success'))
  toastr.success("{{session('success')}}");
@endif
@if(session('error'))
  toastr.error("{{session('error')}}")
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
@endif
</script>
</body>

<!-- Image loader -->
<div id='loader' style="display:none" >
  <img src='{{asset("/frontend/loader/loader.gif")}}' width='300px' height='300px'>
</div>
<!-- Image loader -->
<style>
    .menu-droplap {
    position: relative;
    height: 50px;
}
.menu-droplap .collapse.show {
    transition: 0.2s;
    width: 90%;
    position: absolute;
    background-color: #fff;
}
  #loader {
    align-items: center;
    display: flex;
    position: fixed;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    /* background-color: #ccc; */
    /* z-index: 9999; */
    padding-top: 10px;
    justify-content: center;
 }
</style>
<script>
    $(".add-cart").click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('addcart')}}",
            type: "POST",
            data: {_token: '{{ csrf_token() }}', id: id},
            success: function(data) {
                cartfetch();
                toastr.success(data.success);
                // Do stuff when the AJAX call returns
            }
        });
        // alert(id);
    });

    $(document).ajaxStart(function(){
        // Show image container
        $("#loader").delay(3000).show();
    });
    $(document).ajaxComplete(function(){
        // Hide image container
        $("#loader").hide();
    });

    
    function cartfetch()
    {
        $.ajax({
            url: "{{route('cart.ajax')}}",
            type: "get",
            data: {},
            success: function(data) {
                $('#cartcount').text(data.carts);
                $('#subtotal').text(data.total);
                // toastr.success(data.success);
                // Do stuff when the AJAX call returns
            }
        });
    }
    cartfetch();

    // cart update
    function cartplus(id)
    {
        var price = $('#price-'+id).text();
        var oldquant = $('.quantity-val-'+id).val();
        var quant = Number(oldquant) + Number(1);
        if(quant > 1)
        {

            var t = price * quant;
            
            var total = $('#total-'+id).text(t);
            
            
            
            var type = 'plus';
            var product_id = $('.quantity-val-'+id).attr('data-product');
            
            $.ajax({
                url: "{{route('updatecart')}}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', id: id,quant:quant,type:type,product_id:product_id},
                success: function(data) {
                    toastr.success(data.success);
                    cartfetch();
                    // Do stuff when the AJAX call returns
                }
            });
        }
        // alert(id);
    }
    function cartminus(id)
    {
        var price = $('#price-'+id).text();
        var oldquant = $('.quantity-val-'+id).val();
        if(oldquant > 1)
        {
            var quant = Number(oldquant) - Number(1);
            var t = price * quant;
            
            var total = $('#total-'+id).text(t);
            
            
            
            var type = 'minus';
            var product_id = $('.quantity-val-'+id).attr('data-product');
            
            $.ajax({
                url: "{{route('updatecart')}}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', id: id,quant:quant,type:type,product_id:product_id},
                success: function(data) {
                    toastr.success(data.success);
                    cartfetch();
                    
                    // Do stuff when the AJAX call returns
                }
            });
        }
        // alert(id);
    }
    function removecart(id)
    {

        $.confirm({
            title: 'Confirm!',
            
            content: 'Are You Sure??!',
            buttons: {
                
                cancel: function () {
                    // $.alert('Canceled!');
                },
                somethingElse: {
                    text: 'confirm',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){

                        $.ajax({
                            url: "{{route('deletecart')}}",
                            type: "get",
                            data: {id: id},
                            success: function(data) {
                                toastr.success(data.success);
                                $('#tr-'+id).closest("tr").hide();
                                cartfetch();
                                
                                // Do stuff when the AJAX call returns
                            }
                        });
                        // $.alert('Something else?');
                    }
                }
            }
        });
        // if(confirm('Are You Sure??'))
        // {

            
        // }
    }
    </script>
<script>
    
    
    </script>
</html>