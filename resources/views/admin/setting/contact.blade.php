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
                    aria-label="Username" value="{{ $aboutUs->instagram ?? '' }}">
            </div>
        </div>
        <div class="form-group col-12 col-md-6">
            @input([
                'name' => 'email_about_us',
                'type' => 'email',
                'placeholder' => 'Please use valid email',
                'labelText' => 'Email',
                'value' => $aboutUs->email ?? '',
                'isReadonly' => false
            ])
            <div class="form-check mt-1" style="padding: 0 2rem">
                <input type="checkbox" class="form-check-input" id="useEmailAdmin">
                <label class="form-check-label text-muted small" for="useEmailAdmin">Use email admin</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        @input([
            'name' => 'phone',
            'type' => 'tel',
            'placeholder' => 'Please use valid phone number',
            'labelText' => 'Phone',
            'value' => $aboutUs->phone ?? '',
            'isReadonly' => false,
            'isRequired' => true,
            'minLength' => 8,
            'maxLength' => 13
        ])
        <small id="phone" class="form-text text-muted">Ex: 087776xxx</small>
    </div>
    <div class="form-group">
        @input([
            'type' => 'text',
            'name' => 'embeded_map',
            'placeholder' => 'Please input specific location for better result on maps',
            'value' => $aboutUs->embeded_map ?? '',
            'ariaDesc' => 'embededMap',
            'labelText' => 'Location',
            'isRequired' => true
        ])
        <small id="embededMapHelp" class="form-text text-muted">Ex: Jl. swadaya gudang baru no. 15</small>
    </div>
    <button class="btn btn-success" type="submit">Update contact</button>
</form>