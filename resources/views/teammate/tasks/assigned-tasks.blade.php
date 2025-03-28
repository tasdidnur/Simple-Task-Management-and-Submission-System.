@extends('layouts.main')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Assigned Tasks List</h3>
        <ul>
            <li>
                <a href="{{ route('teammate.dashboard') }}">Dashboard</a>
            </li>
            <li>All Assigned Tasks</li>
        </ul>
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <form class="mg-b-20" method="GET" action="{{ route('teammate.assigned-tasks') }}">
                <div class="row gutters-8">
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <select class="select2" name="project_id">
                            <option value="">Please Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <select class="select2" name="status">
                            <option value="">Please Select Status</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}> Pending </option>
                            <option value="Working" {{ request('status') == 'Working' ? 'selected' : '' }}> Working </option>
                            <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}> Done </option>
                        </select>
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Project</th>
                            <th>Assined To</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title ?? null }}</td>
                                <td>{{ $task->status ?? null }}</td>
                                <td>{{ $task->project->name ?? null }}</td>
                                <td>{{ $task->teammate->name ?? null }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a class="dropdown-item text-success p-0" href="{{ route('teammate.view-task', $task->id) }}">
                                            <i class="fas fa-edit"></i> View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tasks->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    <!-- Fees Table Area End Here -->
@endsection