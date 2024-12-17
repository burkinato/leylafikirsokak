<!-- resources/views/admin/contact_info/index.blade.php -->

@extends('admin.layouts.admin')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">İletişim Bilgileri</div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3 border-bottom">
                        <h5 class="mb-0">İletişim Bilgilerini Güncelle</h5>
                    </div>
                    <div class="card-body p-4">
                        <form id="contactForm">
                            @csrf
                            <div class="row mb-3">
                                <label for="phone_number" class="col-sm-3 col-form-label">Telefon Numarası</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $contactInfo->phone_number ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">E-posta Adresi</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $contactInfo->email ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Adres</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address" name="address">{{ $contactInfo->address ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="working_hours" class="col-sm-3 col-form-label">Çalışma Saatleri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="working_hours" name="working_hours" value="{{ $contactInfo->working_hours ?? '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="social_links" class="col-sm-3 col-form-label">Sosyal Medya Linkleri</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="social_links" name="social_links[facebook]" placeholder="Facebook Linki" value="{{ $contactInfo->social_links['facebook'] ?? '' }}">
                                    <input type="text" class="form-control mt-2" id="social_links" name="social_links[twitter]" placeholder="Twitter Linki" value="{{ $contactInfo->social_links['twitter'] ?? '' }}">
                                    <input type="text" class="form-control mt-2" id="social_links" name="social_links[instagram]" placeholder="Instagram Linki" value="{{ $contactInfo->social_links['instagram'] ?? '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
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
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function () {
    // Form submit işlemi
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('admin.contact_info.update') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                toastr.success(response.message);
            },
            error: function (xhr) {
                toastr.error('Bir hata oluştu, lütfen tekrar deneyin.');
            }
        });
    });
});
</script>
@endsection
