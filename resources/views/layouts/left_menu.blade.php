<?php
/**
 * Created by PhpStorm.
 * User: uk1
 * Date: 31.10.2016
 * Time: 16:32
 */

?>



<div class="navbar-header">

    <!-- Collapsed Hamburger -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#left_menu">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Branding Image -->
    <a class="navbar-brand visible-xs" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
</div>

<div class="collapse navbar-collapse" id="left_menu">
    <!-- Left Side Of Navbar -->
    <ul class="nav nav-pills nav-stacked">
        <li @if (!isset($menu) || $menu=='theeth') class="active"@endif><a href="{{ url('/cabinet') }}">Зуби</a></li>
        <li @if (isset($menu) && $menu=='history') class="active"@endif><a href="{{ url('/cabinet/history') }}">История лечения</a></li>
        <li @if (isset($menu) && $menu=='records') class="active"@endif><a href="{{ url('/cabinet/records') }}">Запись на прием</a></li>
        <li @if (isset($menu) && $menu=='recommendations') class="active"@endif><a href="{{ url('/cabinet/recommendations') }}">Рекомендации врача</a></li>
        <li @if (isset($menu) && $menu=='medicines') class="active"@endif><a href="{{ url('/cabinet/medicines') }}">Лекарства</a></li>
        <li @if (isset($menu) && $menu=='clinics') class="active"@endif><a href="{{ url('/cabinet/clinics') }}">Клиники</a></li>
        <li @if (isset($menu) && $menu=='doctors') class="active"@endif><a href="{{ url('/cabinet/doctors') }}">Врачи</a></li>
    </ul>
</div>