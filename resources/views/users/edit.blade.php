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
                    <li class="active">Güncelle</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel">
                    <div class="col-lg-12"> 
                        <h3 class="panel-heading">Kullanıcı Güncelle</h3>
                    </div>
                    <div class="panel-body">
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                            {{ session()->forget('message') }}
                        @endif
                        <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col-lg-12"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" name="name" value = "{{$user->name}}" required>
                                        <label class="mdl-textfield__label">Ad Soyad</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="email" disabled name="email"  value = "{{$user->email}}" required>
                                        <label class="mdl-textfield__label">Mail Adresi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12"> 
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="password" name="password" placeholder = "Şifrenizi değiştirmek için lütfen yazınız!">
                                        <label class="mdl-textfield__label">Şifre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12"> 
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label style="color:rgb(180, 180, 180);">Roller</label>
                                        <select class="form-control" required name="role">
                                            @foreach($roles as $role)
                                                @php $roleCheck = ""; @endphp
                                                @if($role->name == $user->role->name)
                                                    @php $roleCheck = "selected"; @endphp
                                                @endif
                                                <option  {{ $roleCheck }}  value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
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
                                    @if(isset($user->profile_photo)) 
                                        <div class="col-lg-6 col-md-12 col-12 col-sm-12" > 
                                            <label class="control-label col-md-12" style="color:rgb(180, 180, 180);">Şuanki Resim </label>
                                            <!-- min-height: 100px; height: 100%; -->
                                            <div class="blogThumb" style="min-height: 150px; display: flex; justify-content: center;">
                                                <div class="thumb-center" style="max-width:100%; display: flex; flex-direction: column; justify-content: center;"><img src="{{ asset('storage/uploads/users/'.$authUser->profile_photo) }}" style="max-height: 200px; max-width: 200px;" /></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20"> 
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection