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
                        <header>Makaleler</header>
                    </div>
                    <div class="card-body ">
                      <div class="table-wrap">
                            <div class="table-responsive tblHeightSet">
                                <table class="table display product-overview mb-30" id="blog_table">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Kısa Açıklama</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->short_description }}</td>
                                            <td>{{ date('d.m.Y',strtotime($blog->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-default" href="{{ route('blogs.detail',['blog' => $blog->id]) }}">Detay</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <div class="center">
                            <div class="pagination">
                            {{$blogs->links()}}
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