<!-- jquery -->
<script src="{{ asset('public/frontend/js/jquery-3.6.0.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('public/frontend/js/bootstrap.bundle.js') }}"></script>
<!-- swipper js -->
<script src="{{ asset('public/frontend/js/swiper.js') }}"></script>
<!-- lightcase js-->
<script src="{{ asset('public/frontend/js/lightcase.js') }}"></script>
<!-- odometer js -->
<script src="{{ asset('public/frontend/js/odometer.js') }}"></script>
<!-- viewport js -->
<script src="{{ asset('public/frontend/js/viewport.jquery.js') }}"></script>
<!-- smooth scroll js -->
<script src="{{ asset('public/frontend/js/smoothscroll.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('public/frontend/js/jquery.nice-select.js') }}"></script>
<!-- Select 2 JS -->
<script src="{{ asset('public/frontend/js/select2.js') }}"></script>
<!--  Popup -->
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ asset('public/frontend/js/apexcharts.js') }}"></script>
<!-- aos -->
<script src="{{ asset('public/frontend/js/aos.js') }}"></script>
<!-- viewport -->
<script src="{{ asset('public/frontend/js/viewport.jquery.js') }}"></script>
<!-- lightcase -->
<script src="{{ asset('public/frontend/js/lightcase.js') }}"></script>
<!-- lightcase -->
<script src="{{ asset('public/frontend/js/select2.js') }}"></script>
<!-- main -->
<script src="{{ asset('public/frontend/js/main.js') }}"></script>


<script>
    $(".langSel").on("change", function() {
       window.location.href = "{{route('frontend.index')}}/change/"+$(this).val();
   });
</script>



@include('admin.partials.notify')
