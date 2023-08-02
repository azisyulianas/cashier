@extends('layout.main')

@section('judul')
    {{$page}}
@endsection

@section('main')
    @livewire('cashier.cashier-index')
@endsection
