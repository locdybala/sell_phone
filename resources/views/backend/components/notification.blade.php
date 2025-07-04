@php
    $message=Session::get('message');
    $success=Session::get('success');
    $error=Session::get('error');
@endphp
@if($message)
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
@endif
@if($success)
    <div class="alert alert-success" role="alert">
        {{$success}}
    </div>
@endif
@if($error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endif
@php
    Session::put('message', null);
    Session::put('success', null);
    Session::put('error', null);
@endphp
