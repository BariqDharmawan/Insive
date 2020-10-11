@extends('template.main')

@section('title-page', 'Insive | Admin - Setting page')

@section('title-body', 'Setting')

@section('body-id', 'setting')

@section('css')
<style>
    section > h2 {
        position: relative;
        display: inline-block;
        margin-bottom: 2rem !important;
    }
    section > h2::after {
        content: '';
        position: absolute;
        bottom: -5px;
        height: 2px;
        width: 100%;
        left: 0;
        background-color: var(--cyan);
    }
    .row {
        /* position: relative; */
    }
    #settingPage .alert-success {
        background-color: #d4edda !important;
        border-color: #d4edda !important;
        color: #155724 !important;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
        position: fixed !important;
        z-index: 1000;
        top: 30px;
        left: 50%;
        /* left: 0; */
        /* width: calc(100% - 5rem); */
    }
</style>    
@endsection

@section('content')
<div class="col-12">
    {{-- @if (session('success_message')) --}}
    <div class="alert alert-success" role="alert" style="display: none"></div>
    {{-- @endif --}}
    <section class="setting-account mt-3">
        <h2 class="h5">Admin account</h2>
        <form action="{{ route('admin.setting.update') }}" class="form-row" autocomplete="off" method="POST">
            @csrf @method('PUT')
            <div class="col-12 col-lg-5 row align-items-center">
                <label for="email-admin-value" class="col-auto mb-0">Email admin</label>
                <input type="email" class="form-control col ml-2"
                    placeholder="Please use real email rather than admin@admin.com" name="email" id="email-admin-value"
                    value="{{ $adminAccount->email }}" required>
            </div>
            <div class="col-12 col-lg-5 row align-items-center ml-auto">
                <label for="password-admin" class="col-auto mb-0">New Password</label>
                <input type="password" class="form-control ml-2 col" placeholder="Set new password" id="password-admin"
                    aria-describedby="passwordAdmin">
            </div>
            <button type="submit" class="btn btn-success ml-auto">Update</button>
        </form>
    </section>
    <section class="setting-contact mt-5">
        <h2 class="h5">Our contact</h2>
        <form action="{{ route('admin.about-us.update') }}" id="setting__update-contact" method="POST">
            {{-- @csrf @method('PUT') --}}
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="instagram-account">Instagram</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="instagram">@</span>
                        </div>
                        <input type="text" class="form-control" name="instagram" placeholder="Ex: bariqdharmawans"
                            aria-label="Username" value="{{ $aboutUs->instagram }}">
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="emailAboutUs">Email</label>
                    <input type="email" class="form-control" id="emailAboutUs" name="email"
                        placeholder="Ex: bariqdharmawans" value="{{ $aboutUs->email }}" required>
                    <div class="form-check" style="padding: 0 1.3rem">
                        <input type="checkbox" class="form-check-input" id="useEmailAdmin">
                        <label class="form-check-label text-muted small" for="useEmailAdmin">Use email admin</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="instagram-account">Phone</label>
                <input type="tel" class="form-control" name="phone" placeholder="Ex: 0877xxx" minlength="10"
                    maxlength="13" value="{{ $aboutUs->phone }}" title="Please input valid phone number" required>
            </div>
            <div class="form-group">
                <textarea name="embeded_map" id="location" rows="8" name="embeded_map" class="form-control"
                    placeholder="Please copy the embeded code from the maps">{{ $aboutUs->embeded_map }}</textarea>
                <a id="locationHelp" href="javascript:void(0);" data-toggle="modal" data-target="#howToEmbed"
                    class="form-text text-link">
                    How to embed map.
                </a>
                <div class="modal fade" id="howToEmbed" tabindex="-1" aria-labelledby="howToEmbedLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                How to embed map using google Maps
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ol>
                                    <li>Go to <a href="https://maps.google.com/" target="_blank">Google Maps</a></li>
                                    <li>Search your location like you usually did</li>
                                    <li>Click <b>share</b> button </li>
                                    <li>After a modal open, click the <b>embed map</b> tab</li>
                                    <li>Click the <b>copy html</b> button</li>
                                </ol>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <small>
                                    If you want to insert your location without using this way,
                                    please <a href="https://wa.me/6287771406656" target="_blank">contact the developer</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success">Update contact</button>
        </form>
    </section>
</div>
@endsection

@section('script')
    <script>
        const instagramInput = document.querySelector('input[name="instagram"]');
        const phoneInput = document.querySelector('input[name="phone"]');
        const useEmailAdmin = document.getElementById('useEmailAdmin');
        const embededMap = document.querySelector('textarea[name="embeded_map"]');
        const emailAboutUs = document.getElementById('emailAboutUs');
        const emailAdminValue = document.getElementById('email-admin-value');

        useEmailAdmin.addEventListener('change', function() {
            if (this.checked) {
                emailAboutUs.value = emailAdminValue.value;
                emailAboutUs.readOnly = true;
            }
            else {
                emailAboutUs.readOnly = false;
            }
        });

        $("#setting__update-contact button").click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $("#setting__update-contact").attr('action'),
                method: 'post',
                data: {
                    "instagram": instagramInput.value,
                    "phone": phoneInput.value,
                    "email": emailAboutUs.value,
                    "embeded_map": embededMap.value
                },
                success: function(result){
                    $(".alert-success").show(600).text(result.success).delay(2000).hide("slow");
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    </script>
@endsection