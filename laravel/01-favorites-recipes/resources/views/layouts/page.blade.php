<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-head pageTitle="{{ $pageTitle }}" />
    <x-menu pageTitle="{{ $pageTitle }}" />

    <div class="content">
        @yield('content')
    </div>
   
</html>
