@extends('emails/default')

@section('content')
<p><b>Hi, There is a new message from iWomen Website.</b></p>

<p><b>Name</b>: {!!$fromName!!} </p>

<p><b>Email</b>: {!!$fromEmail!!} </p>

<p><b>Message</b>: {!!$feedbackMessage!!} </p>

<p><b>Best regards,</b></p>

<p>iWomen Team</p>
@stop
