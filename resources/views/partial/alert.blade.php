<div class="col-12">
    <div class="alert alert-{{ $type }} alert-dismissible fade show {{ isset($addClass) ? $addClass : '' }}" role="alert">
        @if ($type == 'danger')
            <ul class="mb-0">
                {{ $slot }}
            </ul>
        @else
            {{ $slot }}
        @endif
        @if (isset($closeBtn) and $closeBtn == true)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endif
    </div>
</div>