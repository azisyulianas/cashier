@extends('layout.main')

@section('judul')
    {{$page}}
@endsection

@section('main')
    @livewire('cashier.check-out')
@endsection