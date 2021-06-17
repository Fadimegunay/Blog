@extends('layouts.home.app')
@section('styles')
<link href="{{ asset('css\home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Anasayfa</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Anasayfa</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                </ol>
            </div>
        </div>
        <!-- end widget -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>{{$blog->title}}</header>
                    </div>
                    <div class="card-body ">
                        {!! $blog->description !!}       
                    </div>
                    <div class="card-footer">
                        @if($blog->previous() != null)
                            <a href="{{ route('blogs.detail',['blog' => $blog->previous()]) }}">Önceki</a>
                        @endif
                        @if($blog->next() != null)
                            <div class="pull-right">
                                <a href="{{ route('blogs.detail',['blog' => $blog->next()]) }}">Sonraki</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection