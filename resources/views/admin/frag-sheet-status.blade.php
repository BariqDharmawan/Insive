@if ($value->is_available === true)
@php
    $badgeClass = 'success';
    $icon = 'fa-check';
    $status = 'available';
@endphp
@else
@php
    $badgeClass = 'danger';
    $icon = 'fa-times';
    $status = 'not available';
@endphp
@endif
<small class="badge badge-{{ $badgeClass }}">
    <i class="fa {{ $icon }}"></i>
    <span>{{ $status }}</span>
</small>