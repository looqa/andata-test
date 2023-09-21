@extends('layouts.main')

@section('content')
    <article-view :article="{{$articleData->toJson()}}"></article-view>
@endsection