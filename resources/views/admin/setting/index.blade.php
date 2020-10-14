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
    #settingPage .alert-success {
        background-color: #d4edda !important;
        border-color: #d4edda !important;
        color: #155724 !important;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
        position: fixed !important;
        z-index: 1000;
        top: 30px;
        left: 50%;
    }
    .invalid-feedback {
        display: block !important;
        padding: 0 10px !important;
    }
</style>    
@endsection

@section('content')
<div class="col-12">
    <div class="alert alert-success" role="alert" style="display: none"></div>
    <div class="alert alert-danger" role="alert" style="display: none"></div>
    <section class="setting-account mt3 mb-5">
        <h2 class="h5">Admin account</h2>
        @include('admin.setting.form_account')
    </section>
    <section class="setting-contact">
        <h2 class="h5">Our contact</h2>
        @include('admin.setting.form_contact')
    </section>
</div>
@endsection

@section('script')
    <script>
        const instagramInput = document.querySelector('input[name="instagram"]');
        const phoneInput = document.querySelector('input[name="phone"]');
        const useEmailAdmin = document.querySelector('#useEmailAdmin');
        const embededMap = document.querySelector('input[name="embeded_map"]');
        const emailAboutUs = document.querySelector('input[name="email_about_us"]');
        const emailAdminValue = document.querySelector('input[name="email_admin"]');

        useEmailAdmin.addEventListener('change', function() {
            if (this.checked) {
                emailAboutUs.value = emailAdminValue.value;
                emailAboutUs.readOnly = true;
                emailAboutUs.required = false;
            }
            else {
                emailAboutUs.readOnly = false;
                emailAboutUs.required = true;
            }
        });

        const isPasswordWantToChange = document.querySelector('#change-password');
        isPasswordWantToChange.addEventListener('click', function(){
            const passwordWantToChange = document.querySelectorAll('#current-password, #new-password, #confirm-new-password');
            if (this.checked) {
                passwordWantToChange.forEach(password => {
                    password.readOnly = false;
                    password.required = true;
                });
            }
            else {
                passwordWantToChange.forEach(password => {
                    password.readOnly = true;
                    password.required = false;
                });
            }
        });

        $("#setting__update-contact").submit(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $("#setting__update-contact").attr('action'),
                method: 'POST',
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
                    $('.alert-danger').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.alert-danger').append('<ul>'+value+'</ul>');
                    }); 
                }
            });
        });
    </script>
@endsection