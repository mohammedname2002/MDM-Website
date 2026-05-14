<footer class="pt-14 pt-lg-20 pb-16 footer">
    <div class="container container-xxl pt-4">
        <div class="row">
            <div class="col-lg-5 col-12 mb-11 mb-lg-0">

                <h3 class="mb-6 ">Care for Your Skin, <br> Care for Your Beauty</h3>
                <p class="pe-xl-24 mb-lg-11">Smile with the reflection of the glow. Let your Skin define your age
                    and not the years</p>
                <a class="fw-semibold fs-6 text-decoration-none"
                    href="https://templates.g5plus.net/find-a-store.html">
                    Find a store <svg class="icon ms-5">
                        <use xlink:href="#icon-arrow-right"></use>
                    </svg>
                </a>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Company</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('about') }}" title="About us" class="text-body">About us</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" title="Careers" class="text-body">Careers</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" title="Store Locations" class="text-body">Store Locations</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('blogs.index') }}" title="Our Blog" class="text-body">Our Blog</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('blogs.index') }}" title="Reviews" class="text-body">Reviews</a>
                    </li>

                </ul>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Useful links</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('products') }}" title="New Products" class="text-body">New Products</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('products') }}" title="Best Sellers" class="text-body">Best Sellers</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('products') }}" title="Bundle &amp; Save" class="text-body">Bundle &amp; Save</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('products') }}" title="Online Gift Card" class="text-body">Online Gift Card</a>
                    </li>

                </ul>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Information</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" title="Start a Return" class="text-body">Start a Return</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" title="Contact Us" class="text-body">Contact Us</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" title="Shipping FAQ" class="text-body">Shipping FAQ</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('terms') }}" title="Terms &amp; Conditions" class="text-body">Terms &amp; Conditions</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('privacy') }}" title="Privacy Policy" class="text-body">Privacy Policy</a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="row align-items-center mt-0 mt-lg-20 pt-lg-4">
            <div
                class="col-12 col-md-6 col-lg-4 d-flex align-items-center order-2 order-lg-1 mt-7 mt-md-11 mt-lg-0">
                <p class="mb-0">© Glowing 2023</p>
                <ul class="list-inline fs-18px ms-6 mb-0">
                    <li class="list-inline-item me-8">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item me-8">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item me-8">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-4 text-md-center order-1 order-lg-2 ">
                <a class="d-inline-block text-decoration-none" href="{{ url('/') }}">
                    @if (file_exists(public_path('assets/images/mdm.png')))
                        <img class="img-fluid light-mode-img" src="{{ asset('assets/images/mdm.png') }}" width="179"
                            height="26" alt="">
                        <img class="dark-mode-img img-fluid" src="{{ asset('assets/images/mdm.png') }}" width="179"
                            height="26" alt="">
                    @else
                        <span class="fs-4 fw-bold text-body-emphasis">{{ config('app.name', 'MDM') }}</span>
                    @endif
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 order-3 text-md-end mt-7 mt-md-11 mt-lg-0">
                <img  data-src="{{ asset('assets/images/shop/footer.png') }}" width="313" height="28" alt="Paypal"
                    class="img-fluid lazy-image">
            </div>
        </div>

    </div>
</footer>
