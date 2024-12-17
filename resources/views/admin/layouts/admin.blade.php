<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--favicon-->
	<link rel="icon" href="{{asset('admin/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<link href="{{asset('admin/assets/plugins/highcharts/css/highcharts-white.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">
	
	<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Toastr JS -->


	<title>Leyla Admin Yönetim Paneli</title>

	
</head>

<body class="bg-theme bg-theme9">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.includes.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.includes.header')
		<!--end header -->
		<!--start page wrapper -->
		@yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!-- Vector map JavaScript -->
	<script src="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<!-- highcharts js -->
	<script src="{{asset('admin/assets/plugins/highcharts/js/highcharts.js')}}"></script>
	<script src="{{asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/index2.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('admin/assets/js/app.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	

	<script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>

	@yield('scripts')

	<script>
      document.getElementById('logoutButton').addEventListener('click', function () {
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Çıkış yapmak istediğinizden emin misiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, çıkış yap',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX ile logout isteği gönder
                fetch("{{ route('admin.logout') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF koruması
                        'Accept': 'application/json'
                    }
                }).then(response => response.json())
                  .then(data => {
                      if (data.status === 'success') {
                          Swal.fire(
                              'Başarılı!',
                              'Çıkış işlemi tamamlandı.',
                              'success'
                          ).then(() => {
                              window.location.href = '/'; // Ana sayfaya yönlendir
                          });
                      } else {
                          Swal.fire(
                              'Hata!',
                              'Çıkış yapılamadı, tekrar deneyin.',
                              'error'
                          );
                      }
                  }).catch(error => {
                      console.error('Hata:', error);
                      Swal.fire(
                          'Hata!',
                          'Bir hata oluştu, tekrar deneyin.',
                          'error'
                      );
                  });
            }
        });
    });
    </script>
</body>

</html>