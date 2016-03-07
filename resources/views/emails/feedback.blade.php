@extends('emails/default')

@section('content')
<p><b>Hi, There is a new message from your user.</b></p>

<p><b>Name</b>: {!!$name!!} </p>

<p><b>Email</b>: {!!$email!!} </p>

<p><b>Message</b>: {!!$message!!} </p>

<p><b>Best regards,</b></p>

<p>iWomen Team</p>
@stop
