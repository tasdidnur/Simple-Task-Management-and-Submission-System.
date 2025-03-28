@extends('layouts.main')
@section('content')
<div class="breadcrumbs-area">
    <h3>Create New Team Mate</h3>
    <ul>
        <li>
            <a href="{{ route('manager.dashboard') }}">Dashboard</a>
        </li>
        <li>Create Team Mate</li>
    </ul>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
</div>
<!-- Breadcubs Area End Here -->
<!-- Admit Form Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <form action="{{ route('manager.store-teammate') }}" method="POST" class="new-added-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Name *</label>
                    <input value="{{old('name')}}" type="text" placeholder=""
                        class="form-control @error('name') border-red @enderror"
                        name="name">
                    @error('name')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Email *</label>
                    <input value="{{old('email')}}" type="email" placeholder=""
                        class="form-control @error('email') border-red @enderror"
                        name="email">
                    @error('email')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Password *</label>
                    <input type="password"
                        class="form-control @error('password') border-red @enderror"
                        name="password">
                    @error('password')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Password *</label>
                    <input type="password"
                        class="form-control @error('password_confirmation') border-red @enderror"
                        name="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12 form-group mg-t-8 text-left">
                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection