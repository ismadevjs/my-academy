@extends('admin.layouts.master')

@section('content')
    hello from admin dashboard {{auth()->user()->role}}
@endsection