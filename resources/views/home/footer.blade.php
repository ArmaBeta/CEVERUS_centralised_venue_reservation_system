<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class=" col-md-4">
                    <h3>Contact US</h3>
                    <ul class="conta">
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +60 11-2710 6608</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">
                                armansyahin@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Menu Link</h3>
                    <ul class="link_menu">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('all_venues') }}">Venues</a></li>
                        <li><a href="{{ url('contact_us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(window).scroll(function() {
        sessionStorage.scrolltop = $(this).scrolltop();
    });

    $(document).ready(function() {
        if (sessionStorage.scrolltop != "undefined") {
            $(window).scrolltop(sessionStorage.scrolltop);
        }
    });
</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
