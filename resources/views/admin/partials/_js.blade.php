<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('backend/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('backend/js/waves.js') }}"></script>
<!--Counter js -->
<script src="{{ asset('backend/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('backend/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
<!-- chartist chart -->
<script src="{{ asset('backend/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
<script
src="{{ asset('backend/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}">
</script>
<!-- Sparkline chart JavaScript -->
<script src="{{ asset('backend/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('backend/js/custom.min.js') }}"></script>
<script src="{{ asset('backend/js/dashboard1.js') }}"></script>
<script src="{{ asset('backend/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
<!--Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--Custom Select -->
<script src="{{ asset('backend/plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"
type="text/javascript"></script>
<!--File Upload -->
<script src="{{ asset('backend/js/jasny-bootstrap.js') }}"></script>
<!--Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- Mask -->
<script src="{{ asset('backend/js/mask.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }
            }
        });

        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "Your URL POST (php)",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote_disable').summernote({
            height: 250,
        });
        $("#summernote_disable").summernote("disable");
    });
</script>
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

<script>
    $(function() {
        $(document).on('click', '.publish', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-1',
                    cancelButton: 'btn btn-danger mr-1'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '??mins??n ?',
                text: "Status d??yi??dirilsin ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'B??li !',
                cancelButtonText: 'Xeyr !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Status',
                        'U??urla D??yi??dirildi',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'L????v Edildi!',
                        'M??lumatlar G??v??nd??dir! ;)',
                        'error'
                    )
                }
            })
        })
    })
</script>

<script>
    $(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-1',
                    cancelButton: 'btn btn-danger mr-1'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '??mins??n ?',
                text: "Sildik??n sonra geri qaytar??lamaz",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'B??li, Sil !',
                cancelButtonText: 'Xeyr, Silm?? !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Silindi!',
                        'U??urla Silindi',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'L????v Edildi!',
                        'M??lumatlar G??v??nd??dir! ;)',
                        'error'
                    )
                }
            })
        })
    })
</script>
