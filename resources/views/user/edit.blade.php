@extends('user.layout.user')

@section('title', 'User Information')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('User Information') }}</h3>
                </div>

                <div class="card-body">
                    <x-alert />
                    <form method="POST" action="{{ route('user.update',auth()->id()) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="image-container">
                            @isset(auth()->user()->avatar)
                                <div class="avatar">
                                    <img src="{{ asset('storage/images/user/'.auth()->id().'/'.auth()->user()->avatar) }}" id="previewAvatar" class="user-avatar" alt="User Avatar">
                                </div>
                                <div class="row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
    
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <a href="{{ route('user.avatar.delete',auth()->id()) }}" class="btn btn-danger mt-1"onclick="event.preventDefault();
                                        if(confirm('Are you sure?')){
                                            document.getElementById('form-destroy-avatar-{{auth()->id()}}')
                                            .submit()
                                        }">{{ __('Delete Avatar') }}
                                    </a>
                                </div>
                            @else
                                <div class="avatar">
                                    <img src="" id="previewAvatar" alt="Image Preview" class="user-avatar">
                                </div>
                                <div class="row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
    
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endisset
                        </div>
                        <div class="input">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ auth()->user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ auth()->user()->username }}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook Account') }}</label>

                                <div class="col-md-6">                                
                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ auth()->user()->facebook }}">

                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-md-4 col-form-label text-md-right">{{ __('Twitter Account') }}</label>

                                <div class="col-md-6">                                
                                    <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ auth()->user()->twitter }}">

                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('user.destroy',auth()->id()) }}" class="btn btn-danger" onclick="event.preventDefault();
                                        if(confirm('Are you sure?')){
                                            document.getElementById('form-destroy-{{auth()->id()}}')
                                            .submit()
                                        }">{{ __('Delete Account') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="{{ route('user.destroy',auth()->id()) }}" id="{{ 'form-destroy-'.auth()->id() }}" method="post" style="display:none">
                    @csrf
                    @method('delete')
                </form>
                <form action="{{ route('user.avatar.delete',auth()->id()) }}" id="{{ 'form-destroy-avatar-'.auth()->id() }}" method="post" style="display:none">
                    @csrf
                    @method('delete')
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Change Password') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.passwordUpdate',auth()->id()) }}" class="col">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="old_password" class="col">{{ __('Old password') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col">{{ __('New password') }}</label>

                            <div class="col">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password" class="col">{{ __('Confirm password') }}</label>

                            <div class="col">
                                <input id="confirm_new_password" type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password">

                                @error('confirm_new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('js/avatar.js') }}" defer></script>

@endsection