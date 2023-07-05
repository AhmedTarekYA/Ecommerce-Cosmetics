<script>

    var loader = `<div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>`;

    var newUrl=location.href;


    $(function () {
        // show data using yajra
        $('#main-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: newUrl,
                columns: columns,
                order: [
                    [0, "DESC"]
                ],
                "language": {
                    "sProcessing": "جاري التحميل ..",
                    "sLengthMenu": "اظهار _MENU_ سجل",
                    "sZeroRecords": "لا يوجد نتائج",
                    "sInfo": "اظهار _START_ الى  _END_ من _TOTAL_ سجل",
                    "sInfoEmpty": "لا نتائج",
                    "sInfoFiltered": "للبحث",
                    "sSearch": "بحث :    ",
                    "oPaginate": {
                        "sPrevious": "السابق ",
                        "sNext": "التالي ",
                    },
                    buttons: {
                        copyTitle: 'تم النسخ للحافظة <i class="fa fa-check-circle text-success"></i>',
                        copySuccess: {
                            1: "تم نسخ صف واحد",
                            _: "تم نسخ %d صفوف بنجاح"
                        },
                    }
                },

                dom: 'Bflrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'نسخ',
                },
                {
                    extend: 'print',
                    text: 'طباعة',
                },
                {
                    extend: 'excel',
                    text: 'اكسيل',
                },
                // {
                //     extend: 'pdf',
                //     text: 'PDF',
                //     className: 'btn-primary'
                // },
                {
                    extend: 'colvis',
                    text: 'عرض',
                },
            ],
            });



        // Show Add Modal
            $(document).on('click', '#addBtn', function () {
                $('#modal-body').html(loader)
                $('#operationType').text('اضافة');
                $('#editOrCreate').modal('show')
                setTimeout(function () {
                    $('#modal-body').load("{{route("$url.create")}}")
                }, 500)
            });

        // Create New Data By Ajax
            $(document).on('submit', 'Form#addForm', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                var url = $('#addForm').attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {
                        $('#addButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            $('#main-datatable').DataTable().ajax.reload(null, false);
                            // show custom message or use the default
                            toastr.success((data.message) ?? 'تم اضافة البيانات بنجاح');
                        } else
                            toastr.error('عذرا هناك خطأ فني 😞');
                        $('#addButton').html(`اضافة`).attr('disabled', false);
                        $('#editOrCreate').modal('hide')
                    },
                    error: function (data) {
                        if (data.status === 500) {
                            toastr.error('عذرا هناك خطأ فني 😞');
                        } else if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        toastr.error(value);
                                    });
                                }
                            });
                        } else
                            toastr.error('عذرا هناك خطأ فني 😞');
                        $('#addButton').html(`اضافة`).attr('disabled', false);
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });
            });


        // Show Edit Modal
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id');
            $('#modal-body').html(loader)
            $('#operationType').text('تعديل');
            $('#editOrCreate').modal('show')
            var editUrl = "{{route("$url.edit",':id')}}";
            editUrl = editUrl.replace(':id',id)
            setTimeout(function () {
                $('#modal-body').load(editUrl)
            }, 500)
        });

        // Update Script using Ajax
        $(document).on('submit', 'Form#updateForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#updateButton').html('<span style="margin-right: 4px;">انتظر ..</span><i class="bx bx-loader bx-spin"></i>');
                },
                success: function (data) {
                    $('#updateButton').html(`تحديث`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#main-datatable').DataTable().ajax.reload();
                        toastr.success((data.message) ?? 'تم تحديث البيانات بنجاح');
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, 'Error');
                                });
                            }
                        });
                    } else
                        toastr.error('عذرا هناك خطأ فني 😞');
                    $('#updateButton').html(`تحديث`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        // Show Delete SweetAlert & Delete Using Ajax
        $(document).on('click', '.delete', function () {
            var id = $(this).data('id');
            swal.fire({
                title: "حذف بيانات",
                text: "هل انت متأكد من عملية حذف البيانات !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc5339",
                confirmButtonText: "نعم, احذف !",
                cancelButtonText: "تراجع",
                okButtonText: "اضافة",
                closeOnConfirm: false
            }).then((result) => {
                if (!result.isConfirmed) {
                    return true;
                }
                var url = '{{ route("$url.destroy",":id") }}';
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    beforeSend: function () {
                        $('#loader-overlay').show()
                    },
                    success: function (data) {

                        window.setTimeout(function () {
                            $('#loader-overlay').hide()
                            if (data.status == 200) {
                                toastr.success((data.message) ?? 'تم حذف البيانات بنجاح')
                                $('#main-datatable').DataTable().ajax.reload(null, false);
                            } else if (data.status == 405) {
                                toastr.warning("لا يمكنك حذف الايميل المسجل به !")
                            } else {
                                toastr.error('عذرا هناك خطأ فني 😞');
                            }

                        }, 300);
                    }, error: function (data) {

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
                    }

                });
            });
        });



    });


</script>
