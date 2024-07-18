<footer style=" padding: 50px 0;">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <ul class="conta">
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +60 11-2710 6608</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a
                                href="mailto:armansyahin@gmail.com">armansyahin@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Quick Links</h3>
                    <ul class="link_menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('all_venues') }}">Venues</a></li>
                        <li><a href="{{ url('contact_us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; {{ date('Y') }} CEVERUS. All rights reserved. Designed with <span
                            style="color: #e25555;">&#10084;</span> by CEVERUS Team</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Include necessary scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- Sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script>
    // Store scroll position
    $(window).scroll(function() {
        sessionStorage.scrolltop = $(this).scrollTop();
    });

    // Restore scroll position
    $(document).ready(function() {
        if (sessionStorage.scrolltop !== undefined) {
            $(window).scrollTop(sessionStorage.scrolltop);
        }
    });
</script>
