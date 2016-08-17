@extends('emails/default')

@section('content')
<p><b>Hi, There is a new message from iWomen Website.</b></p>

<p><b>Name</b>: {!!$user_name!!} </p>

<p><b>Email</b>: {!!$user_email!!} </p>

<p><b>Message</b>: {!!$user_message!!} </p>

<p><b>Best regards,</b></p>

<p>iWomen Team</p>
@stop
