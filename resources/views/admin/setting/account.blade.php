<form action="{{ route('admin.setting.update') }}" autocomplete="off" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        @input([
            'name' => 'email_admin',
            'type' => 'text',
            'placeholder' => 'Please use real email',
            'ariaDesc' => 'emailAdmin',
            'labelText' => 'Email admin',
            'isRequired' => true,
            'value' => $adminAccount->email ?? old('email')
        ])

        <div class="form-check mt-1">
            <input type="checkbox" class="form-check-input" id="change-password">
            <label class="form-check-label text-muted small" for="change-password">Change password too</label>
        </div>

        @invalidFeedback([
            'error' => 'email', 
            'label' => 'emailAdmin'
        ])
    </div>
    <div class="form-group">
        @input([
            'name' => 'current_password',
            'type' => 'password',
            'placeholder' => 'Please input current password',
            'ariaDesc' => 'currentPasswordAdmin',
            'labelText' => 'Current Password',
            'isReadonly' => true,
            'isRequired' => false
        ])
        @invalidFeedback([
            'error' => 'current_password', 
            'label' => 'currentPasswordAdmin'
        ])
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-lg-6">
            @input([
                'name' => 'new_password',
                'type' => 'password',
                'placeholder' => 'Set new password',
                'ariaDesc' => 'newPasswordAdmin',
                'labelText' => 'New Password',
                'isReadonly' => true,
                'isRequired' => false
            ])
            @invalidFeedback([
                'error' => 'new_password',
                'label' => 'newPasswordAdmin'
            ])
        </div>
        <div class="form-group col-12 col-lg-6">
            @input([
                'type' => 'password',
                'name' => 'confirm_new_password',
                'placeholder' => 'Set new password',
                'ariaDesc' => 'confirmNewPassword',
                'isReadonly' => true,
                'labelText' => 'Confirmation New Password'
            ])
            @invalidFeedback([
                'error' => 'confirm_new_password',
                'label' => 'confirmNewPassword'
            ])
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>