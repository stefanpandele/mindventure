{!! __('emails.booking.greeting', ['name' => $senderName]) !!}

{!! __('emails.booking.intro') !!}

{!! __('emails.booking.next_title') !!}
{!! __('emails.booking.next_body') !!}

{!! __('emails.booking.details_title') !!}
- {!! __('emails.booking.field_name') !!}: {!! $senderName !!}
- {!! __('emails.booking.field_email') !!}: {!! $senderEmail !!}
- {!! __('emails.booking.field_phone') !!}: {!! $senderPhone ?: '—' !!}
@if ($question)

{!! __('emails.booking.question_title') !!}
{!! $question !!}
@endif

{!! __('emails.booking.signature') !!}
