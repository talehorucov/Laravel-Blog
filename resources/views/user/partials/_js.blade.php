<script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<!-- Plugins js -->
<script src="{{ asset('frontend/js/plugins.js') }}" type="text/javascript"></script>
<!-- Popper js -->
<script src="{{ asset('frontend/js/popper.js') }}" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- WOW JS -->
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<!-- Owl Cauosel JS -->
<script src="{{ asset('frontend/vendor/OwlCarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
<!-- Srollup js -->
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
<!-- jquery.counterup js -->
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<!-- Nivo slider js -->
<script src="{{ asset('frontend/vendor/slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/vendor/slider/home.js') }}" type="text/javascript"></script>
<!-- Isotope js -->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<!-- Magnific Popup -->
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Ticker Js -->
<script src="{{ asset('frontend/js/ticker.js') }}" type="text/javascript"></script>
<!-- Custom Js -->
<script src="{{ asset('frontend/js/main.js') }}" type="text/javascript"></script>
<!-- Site Js -->
<script src="{{ asset('frontend/js/site.js') }}" type="text/javascript"></script>
<!-- Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
    
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }
    @endif
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>
