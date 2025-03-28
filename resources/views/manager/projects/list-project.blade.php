@extends('layouts.main')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Project List</h3>
        <ul>
            <li>
                <a href="{{ route('manager.dashboard') }}">Dashboard</a>
            </li>
            <li>All Projects</li>
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
            <form class="mg-b-20" method="GET" action="{{ route('manager.list-projects') }}">
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" name="name" placeholder="Search by Name" class="form-control" value="{{ request('name') }}">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <select class="select2" name="teammate_id">
                            <option value="">Please Select Teammate</option>
                            @foreach ($teammates as $teammate)
                                <option value="{{ $teammate->id }}" {{ request('teammate_id') == $teammate->id ? 'selected' : '' }}>{{ $teammate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="select2" name="task_id">
                            <option value="">Please Select Task</option>
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}" {{ request('task_id') == $task->id ? 'selected' : '' }}>{{ $task->title }}</option>
                            @endforeach
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
                            <th>Name</th>
                            <th>Code</th>
                            <th>Created by</th>
                            {{-- <th class="text-center">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->name ?? null }}</td>
                                <td>{{ $project->code ?? null }}</td>
                                <td>{{ $project->manager->name ?? null }}</td>
                                {{-- <td class="text-center">
                                    <div class="d-flex">
                                        <a class="dropdown-item text-success p-0" href="#">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a class="dropdown-item text-danger p-0" href="#">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    <!-- Fees Table Area End Here -->
@endsection