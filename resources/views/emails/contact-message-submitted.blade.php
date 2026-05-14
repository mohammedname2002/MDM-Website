@php
	$m = $contactMessage;
@endphp

<h2 style="margin:0 0 12px 0;">New contact message</h2>

<p style="margin:0 0 8px 0;"><strong>Name:</strong> {{ $m->name }}</p>
<p style="margin:0 0 8px 0;"><strong>Email:</strong> {{ $m->email }}</p>
@if (filled($m->submitted_at))
	<p style="margin:0 0 8px 0;"><strong>Submitted at:</strong> {{ $m->submitted_at->toDateTimeString() }}</p>
@endif
@if (filled($m->ip_address))
	<p style="margin:0 0 8px 0;"><strong>IP:</strong> {{ $m->ip_address }}</p>
@endif

<hr style="margin:16px 0;" />

<p style="margin:0 0 8px 0;"><strong>Message:</strong></p>
<pre style="white-space:pre-wrap; font-family:inherit; margin:0;">{{ $m->message }}</pre>

