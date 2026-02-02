@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white border-bottom">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Events</h6>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Add New Event
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 35%">Description</th>
                                        <th style="width: 15%">Date</th>
                                        <th style="width: 15%">Photo</th>
                                        <th style="width: 15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td class="font-weight-bold text-dark">{{ $event->title }}</td>
                                            <td>
                                                <div style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                                    {!! Str::limit(strip_tags($event->description), 100) !!}
                                                </div>
                                            </td>
                                            <td>{{ $event->event_date }}</td>
                                            <td>
                                                @if ($event->photo)
                                                    <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}"
                                                        class="img-thumbnail" style="width:80px; height:auto;">
                                                @else
                                                    <span class="text-muted">No Photo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                                        class="btn btn-warning btn-sm btn-circle mr-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-circle"
                                                            title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">No events found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
    </style>
@endsection