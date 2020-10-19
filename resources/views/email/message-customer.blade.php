@component('mail::message')
# One of your customer send this

<p style="margin-bottom: 1rem;">Sender: {{ $contactUs->email_customer . ', ' . $contactUs->nama_customer }}</p>
{{ $contactUs->pesan }}

@endcomponent
