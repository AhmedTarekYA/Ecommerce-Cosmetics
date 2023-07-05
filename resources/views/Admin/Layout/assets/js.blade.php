<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/metismenu/metisMenu.min.js"></script>
{{--<script src="{{asset('assets/admin')}}/libs/simplebar/simplebar.min.js"></script>--}}
<script src="{{asset('assets/admin')}}/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
{{--<script src="{{asset('assets/admin')}}/libs/apexcharts/apexcharts.min.js"></script>--}}

<!-- dashboard init -->
<script src="{{asset('assets/admin')}}/js/pages/dashboard.init.js"></script>

<script>
    // "global" vars, built using blade
    var adminFilesUrl = '{{ asset('assets/admin/') }}';
</script>



<!-- Required datatable js -->
<script src="{{asset('assets/admin')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<!-- Buttons examples -->
<script src="{{asset('assets/admin')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/jszip/jszip.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('assets/admin')}}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets/admin')}}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<!-- Datatable init js -->
<script src="{{asset('assets/admin')}}/js/pages/datatables.init.js"></script>

<!-- Modal init js -->
<script src="{{asset('assets/admin')}}/js/pages/modal.init.js"></script>


<!-- Dropify Js -->
<script src="{{asset('assets/main')}}/dropify/dropify.min.js"></script>

<!-- Toastr Js -->
<script src="{{asset('assets/main')}}/toastr/toastr.min.js"></script>

<!-- Sweet Alerts js -->
<script src="{{asset('assets/admin')}}/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="{{asset('assets/admin')}}/js/pages/sweet-alerts.init.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin')}}/js/app.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

    // Show Add Modal
    $(document).on('click', '.create-model', function (e) {
        e.preventDefault();
        var text = $(this).text();
        var url = $(this).attr('href');
        $('#modalBody').html(loader)
        $('#operationText').text(text);
        $('#mainModal').modal('show')
        setTimeout(function () {
            $('#modalBody').load(url)
        }, 500)
    });

    // add for all
    $(document).on('submit', "#modalBody > form", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        var url = $('#modalBody >form').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#addButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                // $('#modalBody').append(loader)
                // $('#modalBody > form').hide()
            },
            complete: function () {
            },
            success: function (data) {

                window.setTimeout(function () {
                    $('#addButton').html(`اضافة`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#mainModal').modal('hide')
                        $('#modalBody > form').remove()
                        if (data.image){
                            $('#admin-image').attr('src',data.image)
                        }
                        $('#main-datatable').DataTable().ajax.reload(null, false);
                        // show custom message or use the default
                        toastr.success((data.message) ?? 'تم اضافة البيانات بنجاح');
                    } else {
                        $('#modalBody > .linear-background').hide(loader)
                        $('#modalBody > form').show()
                        toastr.error(data.message)
                    }
                }, 500);


            },
            error: function (data) {
                $('#modalBody > .linear-background').hide(loader)
                $('#addButton').html(`اضافة`).attr('disabled', false);
                $('#modalBody > form').show()
                if (data.status === 500) {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }

                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value)
                            });

                        }
                    });
                }
                if (data.status == 421) {
                    toastr.error(data.message)
                }

            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

    $(window).on('load', function() {
        $('#loader-overlay').fadeOut('slow');
    });
</script>


@yield('dashboard-js')
