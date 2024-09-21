@extends('layouts.sidenav-layout')
@section('content')
    @include('Components.cars.car-list')
    @include('Components.cars.car-add')
    @include('Components.cars.car-delete')
    @include('Components.cars.car-update')
@endsection
