@extends('layouts.home.app')

@section('content')
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Kullanıcılar</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('home') }}">Anasayfa</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                        <li><a class="parent-item" href="{{ route('users.index') }}">Kullanıcı</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                        <li class="active">Oluştur</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel">
                        <div class="col-lg-12"> 
                            <h3 class="panel-heading">Kullanıcı Oluştur</h3>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                                {{ session()->forget('message') }}
                            @endif
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-lg-12"> 
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type="text" name="name" required>
                                            <label class="mdl-textfield__label">Ad Soyad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12"> 
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type="email" name="email" required>
                                            <label class="mdl-textfield__label">Mail Adresi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12"> 
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="mdl-textfield__input" type="password" name="password" required>
                                            <label class="mdl-textfield__label">Şifre</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12"> 
                                        <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <label style="color:rgb(180, 180, 180);">Roller</label>
                                            <select class="form-control" required name="role" >
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                        <label class="control-label" style="color:rgb(180, 180, 180);">Profil Yükle</label>
                                        <div class="dropzone">
                                            <div class="dz-message" style="margin: 25px;">
                                                <div class="col-md-12" style="padding: 18px 5px 0 0;">
                                                    <input type="file" class="upload" name="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20"> 
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection