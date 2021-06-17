@extends('layouts.home.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Rol Listesi</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('home') }}">Anasayfa</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li><a class="parent-item" href="">Rol</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li class="active">Listesi</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Roller</header>
                    </div>
                    <div class="card-body " id="bar-parent">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            {{ session()->forget('message') }}
                        @endif
                        @can('access', 'role-new')
                        <a class="btn btn-primary btn-outline btn-input" href="{{ route('roles.create') }}">YENİ Oluştur</a>
                        @endcan
                        <div style="margin-top: 15px;">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="center">
                            <div class="pagination">
                               {{$roles->links()}}
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