@extends('layouts.home.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Makale Listesi</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('home') }}">Anasayfa</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li><a class="parent-item" href="">Makale</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li class="active">Listesi</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Makaleler</header>
                    </div>
                    <div class="card-body " id="bar-parent">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            {{ session()->forget('message') }}
                        @endif
                        <a class="btn btn-primary btn-outline btn-input" href="{{ route('blogs.create') }}">YENİ Oluştur</a>
                        
                        <div style="margin-top: 15px;">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0" >
                                    <thead>
                                        <tr>
                                            <th>Yazan</th>
                                            <th>Başlık</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$blog->user->name}}</td>
                                            <td>{{$blog->title}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="{{ route('blogs.edit',['blog' => $blog->id]) }}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger btn-xs blogs-delete" data-id="{{ $blog->id }}" href="#"><i class="fa fa-trash-o"></i></a>
                                                @if($blog->is_active)
                                                    <a class="btn btn-danger blogs-pasifive" data-id="{{ $blog->id }}" href="#">Yayından Kaldır</a>
                                                @else
                                                    <a class="btn btn-success blogs-pasifive" data-id="{{ $blog->id }}" href="#">Yayına Al</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="center">
                            <div class="pagination">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script type='text/javascript' src="{{ asset('js/delete.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/blog.js') }}"></script>
@endsection