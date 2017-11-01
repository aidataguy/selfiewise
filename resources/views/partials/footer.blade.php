@if (\Request::is('login'))
   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
@else
  <footer>
    <div class="container">
        <div class="col-lg-12 social_footer">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-youtube"></i>
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-google"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-google-plus"></i>
        </div>  
        <p> &copy; Selfiewise 2017</p>
        <p class="small"> Made with <i class="fa fa-heart"></i> by {{-- <a href="http://pythonist.pw">Himanshu Patel</a> --}} </p>
    </div>
</footer>
  
    	
<!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script src=" /js/index.js"></script>
<script>   
  $(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});
</script>
<script>
	$(window).scroll(function() {
    var nav = $('#navbarMain');
    var top = 200;
    if ($(window).scrollTop() >= top) {

        nav.addClass('fixed');

    } else {
        nav.removeClass('fixed');
    }
});
</script>
<script>
function myFunction() {
    var x = document.getElementById("navi");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
</script>
@endif  