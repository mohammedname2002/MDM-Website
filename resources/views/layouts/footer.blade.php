<footer class="pt-14 pt-lg-20 pb-16 footer">
    <div class="container container-xxl pt-4">
        <div class="row">
            <div class="col-lg-5 col-12 mb-11 mb-lg-0">

                <h3 class="mb-6 ">Care for Your Skin, <br> Care for Your Beauty</h3>
                <p class="pe-xl-24 mb-lg-11">Professional dermatology and skincare you can trust. Let your skin reflect how
                    you feel—not only the years.</p>
                <a class="fw-semibold fs-6 text-decoration-none" href="{{ route('contact') }}">
                    Contact us <svg class="icon ms-5">
                        <use xlink:href="#icon-arrow-right"></use>
                    </svg>
                </a>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Company</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('about') }}" class="text-body">About us</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Careers</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Store locations</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('blogs.index') }}" class="text-body">Our blog</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('about') }}#about_testimonials" class="text-body">Reviews</a>
                    </li>

                </ul>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Useful links</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('products') }}" class="text-body">New products</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('home') }}#because_you_need_time_for_yourself_2" class="text-body">Best
                            sellers</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('home') }}#special_offer_save_on_sets_2" class="text-body">Bundle &amp; save</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Online gift card</a>
                    </li>

                </ul>

            </div>
            <div class="col-lg col-md-4 col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6 ">Information</h3>

                <ul class="list-unstyled mb-0 fw-medium ">

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Start a return</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Contact us</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('contact') }}" class="text-body">Shipping FAQ</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('terms') }}" class="text-body">Terms &amp; conditions</a>
                    </li>

                    <li class="pt-3 mb-4">
                        <a href="{{ route('privacy') }}" class="text-body">Privacy policy</a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="row align-items-center mt-0 mt-lg-20 pt-lg-4">
            <div
                class="col-12 col-md-6 col-lg-4 d-flex align-items-center order-2 order-lg-1 mt-7 mt-md-11 mt-lg-0">
                <p class="mb-0">© {{ date('Y') }} {{ config('app.copyright_holder') }}</p>
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
                <a class="d-inline-block text-decoration-none" href="{{ route('home') }}"
                    title="{{ config('app.name', 'MDM') }} — Home">
                    @if (file_exists(public_path('assets/images/mdm.png')))
                        <img class="img-fluid footer-brand-logo" src="{{ asset('assets/images/mdm.png') }}" width="179"
                            height="26" alt="{{ config('app.name', 'MDM') }}">
                    @else
                        <span class="fs-4 fw-bold text-body-emphasis">{{ config('app.name', 'MDM') }}</span>
                    @endif
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 order-3 text-md-end mt-7 mt-md-11 mt-lg-0">
                <img data-src="{{ asset('assets/images/shop/footer.png') }}" width="313" height="28" alt="Paypal"
                    class="img-fluid lazy-image">
            </div>
        </div>

    </div>
</footer>
