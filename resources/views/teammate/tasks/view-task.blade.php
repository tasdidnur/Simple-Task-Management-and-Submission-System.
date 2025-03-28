@extends('layouts.main')
@section('content')
<div class="breadcrumbs-area">
    <h3>View Assigned Task</h3>
    <ul>
        <li>
            <a href="{{ route('teammate.dashboard') }}">Dashboard</a>
        </li>
        <li>Assigned Task</li>
    </ul>
    @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="row">
    <div class="col-4-xxxl col-12">
        <div class="card dashboard-card-ten">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>About Task</h3>
                    </div>
                </div>
                <div class="student-info">
                    <div class="table-responsive info-table">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Title:</td>
                                    <td class="font-medium text-dark-medium">{{ $task->title ?? null }}</td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td class="font-medium text-dark-medium">{{ $task->description ?? null }}</td>
                                </tr>
                                <tr>
                                    <td>Project Name:</td>
                                    <td class="font-medium text-dark-medium">{{ $task->project->name ?? null }}</td>
                                </tr>
                                <tr>
                                    <td>Assined To:</td>
                                    <td class="font-medium text-dark-medium">{{ $task->teammate->name ?? null }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td class="font-medium text-dark-medium">{{ $task->status ?? null }}</td>
                                </tr>
                        </table>
                    </div>
                    <form class="mg-b-20" method="POST" action="{{ route('teammate.update-task-status') }}">
                        @csrf
                        <div class="row gutters-8">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <select class="select2 @error('status') border-red @enderror" name="status">
                                    <option value="">Please Select Status</option>
                                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}> Pending </option>
                                    <option value="Working" {{ $task->status == 'Working' ? 'selected' : '' }}> Working </option>
                                    <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}> Done </option>
                                </select>
                                @error('status')
                                    <div class="text-red text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                <button type="submit" class="fw-btn-fill btn-gradient-yellow">CHANGE STATUS</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection