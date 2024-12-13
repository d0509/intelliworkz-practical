@section('contentHeader')
    <style>
        .footer-section {
            position: sticky;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            /* Optional: set a background color */
            padding: 20px 0;
            /* Optional: add some padding */
            z-index: 10;
            /* Ensures it stays on top if needed */
        }
    </style>
@endsection
<footer class="footer-section mt-5">
    <div class="container">
        <div class="partner-logo owl-carousel">
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-1.png') }}" alt="">
                </div>
            </a>
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-2.png') }}" alt="">
                </div>
            </a>
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-3.png') }}" alt="">
                </div>
            </a>
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-4.png') }}" alt="">
                </div>
            </a>
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-5.png') }}" alt="">
                </div>
            </a>
            <a href="#" class="pl-table">
                <div class="pl-tablecell">
                    <img src="{{ asset('user_assets/img/partner-logo/logo-6.png') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-text">
                    <div class="ft-logo">
                        <a href="#" class="footer-logo"><img src="{{ asset('user_assets/img/footer-logo.png') }}"
                                alt=""></a>
                    </div>
                    <ul>
                        <li><a href="{{ route('home') }}"> Home </a></li>
                    </ul>
                    <div class="copyright-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="ft-social">
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a href="https://in.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@section('contentFooter')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const footer = document.querySelector('.footer-section');
            const windowHeight = window.innerHeight;
            const footerHeight = footer.offsetHeight;
            const bodyHeight = document.body.offsetHeight;

            if (bodyHeight + footerHeight < windowHeight) {
                footer.style.position = 'absolute';
                footer.style.bottom = '0';
                footer.style.width = '100%';
            }
        });
     </script>
@endsection
