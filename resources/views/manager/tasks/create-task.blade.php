@extends('layouts.main')
@section('content')
<div class="breadcrumbs-area">
    <h3>Create New Task</h3>
    <ul>
        <li>
            <a href="{{ route('manager.dashboard') }}">Dashboard</a>
        </li>
        <li>Create Task</li>
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
        <form action="{{ route('manager.store-task') }}" method="POST" class="new-added-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Title *</label>
                    <input value="{{old('title')}}" type="text" placeholder=""
                        class="form-control @error('title') border-red @enderror"
                        name="title">
                    @error('title')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Select Project *</label>
                    <select class="select2 @error('project_id') border-red @enderror" name="project_id">
                        <option value="">Please Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Assign Teammate *</label>
                    <select class="select2 @error('teammate_id') border-red @enderror" name="teammate_id">
                        <option value="">Please Select Project</option>
                        @foreach ($teammates as $teammate)
                            <option value="{{ $teammate->id }}">{{ $teammate->name }}</option>
                        @endforeach
                    </select>
                    @error('teammate_id')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Status *</label>
                    <select class="select2 @error('status') border-red @enderror" name="status">
                        <option value="">Please Select Project</option>
                        <option value="Pending"> Pending </option>
                        <option value="Working"> Working </option>
                        <option value="Done"> Done </option>
                    </select>
                    @error('status')
                        <div class="text-red text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-12 form-group">
                    <label>Description *</label>
                    <textarea name="description" class="form-control @error('description') border-red @enderror">{{ old('description') }}</textarea>
                    @error('code')
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