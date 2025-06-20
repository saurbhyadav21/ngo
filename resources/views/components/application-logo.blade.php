@php
    $currentRoute = Route::currentRouteName();
@endphp

<img src="{{ asset('images/logo.jpg') }}"
     alt="Logo"
     style="height: {{ in_array($currentRoute, ['login', 'register']) ? '200px' : '40px' }};">
