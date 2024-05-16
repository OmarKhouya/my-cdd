@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.section-home')
    @include('layouts.partials.section-advantages')
    @include('layouts.partials.section-about')
    @include('layouts.partials.section-plans')
    @include('layouts.partials.section-contact')
@endSection
