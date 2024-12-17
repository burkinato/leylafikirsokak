@extends('admin.layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Genel Site Ayarları</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Genel Site Ayarları</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3 border-bottom">
                        <h5 class="mb-0">Genel Site Ayarları</h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="settingsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="site_title" class="col-sm-3 col-form-label">Başlık</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_title" name="site_title" value="{{ $settings->site_title ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="site_slogan" class="col-sm-3 col-form-label">Site Sloganı</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_slogan" name="site_slogan" value="{{ $settings->site_slogan ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="default_language" class="col-sm-3 col-form-label">Varsayılan Dil</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="default_language" name="default_language" value="{{ $settings->default_language ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="timezone" class="col-sm-3 col-form-label">Saat Dilimi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="timezone" name="timezone" value="{{ $settings->timezone ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="site_logo" class="col-sm-3 col-form-label">Site Logo</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="site_logo" name="site_logo">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="site_favicon" class="col-sm-3 col-form-label">Site Favicon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="site_favicon" name="site_favicon">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-white px-4">Kaydet</button>
                                        <button type="button" class="btn btn-light px-4" id="resetBtn">Temizle</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Toastify CSS -->
<script>
    $(document).ready(function () {
        // Toastr'ın konumunu sağ alt köşe yapmak için
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",  // Sağ alt köşe
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",  // Gösterme süresi (ms)
            "hideDuration": "1000", // Kapanma süresi (ms)
            "timeOut": "5000", // Görünürlük süresi (ms)
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn", // Göstermenin animasyon türü
            "hideMethod": "fadeOut"  // Gizlemenin animasyon türü
        };
    
        // Form submit işlemi
        $('#settingsForm').on('submit', function (e) {
            e.preventDefault();
    
            let formData = new FormData(this);
    
            $.ajax({
                url: "{{ route('admin.site_settings.update') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success(response.message); // Başarı mesajı
                },
                error: function (xhr) {
                    toastr.error('Bir hata oluştu. Lütfen tekrar deneyin.'); // Hata mesajı
                }
            });
        });
    
        // Temizle butonu
        $('#resetBtn').on('click', function() {
            // Formu sıfırla
            $('#settingsForm')[0].reset();
    
            // Dosya input'larını sıfırlamak için manuel olarak val() fonksiyonu kullanıyoruz
            $('#site_logo').val('');
            $('#site_favicon').val('');
    
            // Metin input'larını da sıfırlıyoruz
            $('#site_title').val('');
            $('#site_slogan').val('');
            $('#default_language').val('');
            $('#timezone').val('');
        });
    });
    </script>
    
@endsection
