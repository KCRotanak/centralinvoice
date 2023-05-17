<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Central Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('images/Tlogo.png') }}"> --}}

    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('libs/dropzone/dropzone.css') }}" type="text/css" />

    <!-- Sweet Alert css-->
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- plugin css -->
    <link href="{{ asset('libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('libs/gridjs/theme/mermaid.min.css') }}">

    <!-- apexcharts -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

    {{-- echart --}}
    <script type="text/javascript" src="{{ asset('assets/js/echarts.min.js') }}"></script>

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    {{-- datatable responsive css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.css"
        integrity="sha512-oW+fEHZatXKwZQ5Lx5td2J93WJnSFLbnALFOFqy/pTuQyffi9gsUylGGZkD3DTSv8zkoOdU7MT7I6LTDcV8GBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!--Ajax-->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

    {{-- datatable  --}}
    {{-- <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css') }}"> --}}


    <!--datatable-->
    {{-- <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css') }}"> --}}

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
    <div id="layout-wrapper">

        {{-- navbar in header  --}}
        @include('merchant.layouts.navbar')

        {{-- sidebar --}}
        @include('merchant.layouts.sidebar')

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
    </div>
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Central Invoice.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Designed & Developed by KC Rotanak
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="btn-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <script>
        // Get the button
        let mybutton = document.getElementById("btn-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {

            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script src="{{ asset('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- cleave.js -->
    <script src="{{ asset('libs/cleave.js/cleave.min.js') }}"></script>

    <!--Invoice create init js-->
    <script src="{{ asset('js/pages/invoicecreate.init.js') }}"></script>
    <!-- dropzone min -->
    <script src="{{ asset('libs/dropzone/dropzone-min.js') }}"></script>
    <!-- Modern colorpicker bundle -->
    {{-- <script src="{{ asset('libs/@simonwep/pickr/pickr.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js"
        integrity="sha512-OrRY3yVhfDckdPBIjU2/VXGGDjq3GPcnILWTT39iYiuV6O3cEcAxkgCBVR49viQ99vBFeu+a6/AoFAkNHgFteg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- init js -->
    <script src="{{ asset('js/pages/form-pickers.init.js') }}"></script>

    <!-- list.js min js -->
    <script src="{{ asset('libs/list.js/list.min.js') }}"></script>

    <!--list pagination js-->
    <script src="{{ asset('libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- invoicelist init js -->
    <script src="{{ asset('js/pages/invoiceslist.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#invoiceTable').DataTable();
        });
    </script> --}}


    <!-- gridjs js -->
    <script src="{{ asset('libs/gridjs/gridjs.umd.js') }}"></script>
    <!-- gridjs init -->
    <script src="{{ asset('js/pages/gridjs.init.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('js/pages/listjs.init.js') }}"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ asset('js/pages/datatables.init.js') }}"></script>


    {{-- <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script> --}}

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your record has been deleted.',
                        'success'
                    )

                    form.submit();

                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(2200, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $(".one").click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });
        });
    </script>

    <script>
        config = {
            enableTime: true,
            dateFormat: "D, d-F-Y H:i K",
        }
        flatpickr("#selectdatetime", config);
    </script>

    <script>    
        function refreshTime() {
            const timeDisplay = document.getElementById("ct");
            const d = new Date();
            let x = d.toLocaleTimeString();
            let y = d.toDateString();
            let z = y + ', ' + x;
            const formattedString = z.replace(" ", " - ");
            timeDisplay.textContent = formattedString;
        }
        setInterval(refreshTime, 1000);
    </script>

</body>

</html>
