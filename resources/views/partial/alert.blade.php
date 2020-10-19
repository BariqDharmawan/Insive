<div class="col-12">
    <div class="alert alert-{{ $type }} alert-dismissible fade show {{ isset($addClass) ? $addClass : '' }}" role="alert">
        {{ $slot }}
        @if (isset($closeBtn) and $closeBtn == true)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endif
    </div>
</div>