<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Login</title>

    <link rel="icon" href="{{asset('admin/assets/images/favicon-32x32.png')}}" type="image/png" />
    <link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
</head>

<body class="bg-theme bg-white">
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body bg-dark">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{asset('admin/assets/images/leyla-logo-white.png')}}" width="200" alt="Logo" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5>Admin Panel</h5>
                                        <p class="mb-0">Lütfen giriş yapın</p>
                                    </div>

                                    <form id="loginForm">
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-light">E-posta</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresinizi girin" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label text-light">Şifre</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi girin" required>
                                                <a href="javascript:;" class="input-group-text bg-transparent">
                                                    <i class='bx bx-hide'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                            <label class="form-check-label text-light" for="remember">Beni Hatırla</label>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button type="submit" class="btn btn-light w-100">Giriş Yap</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery ve SweetAlert2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       $('#loginForm').on('submit', function (e) {
    e.preventDefault();

    const email = $('#email').val();
    const password = $('#password').val();
    const remember = $('#remember').prop('checked'); // Checkbox durumunu alıyoruz

    $.ajax({
        url: '{{ route('admin.login') }}', // Laravel login route
        method: 'POST',
        data: {
            email: email,
            password: password,
            remember: remember, // Remember me değerini ekliyoruz
            _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
        },
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı!',
                    text: 'Giriş başarılı, yönlendiriliyorsunuz...',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = response.redirect;
                });
            }
        },
        error: function (xhr) {
            const error = xhr.responseJSON.message || 'Giriş yapılamadı. Bilgilerinizi kontrol edin.';
            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                text: error,
                confirmButtonText: 'Tamam'
            });
        }
    });
});

    </script>
</body>

</html>
