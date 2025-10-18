@extends('layouts.master')

@section('styles')

@endsection

@section('content')

                <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                <h1 class="page-title fw-medium fs-24 mb-0">Conversations</h1>
                <a class="btn btn-primary shadow-sm btn-wave" href="{{ route('admin.conversation.add') }}">
                    <i class="bi bi-plus-lg me-1"></i>Add Conversation
                </a>
            </div>
            <!-- Page Header Close -->

            <!-- Start:: row-2 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Medium</th>
                                            <th>Scheduled</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($conversations->count() == 0)
                                        <tr>
                                            <td colspan="10">No conversations to display.</td>
                                        </tr>
                                        @endif
                                        @foreach($conversations as $conversation)
                                        <tr>
                                            <td>{{ $conversation->subject }}</td>
                                            <td class="text-capitalize">{{ $conversation->medium }}</td>
                                            <td>{{ optional($conversation->scheduled_at)->format('d-m-Y H:i') }}</td>
                                            <td>{{ $conversation->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a href="{{ route('admin.conversation.delete', $conversation->id) }}" 
                                                       onclick="return confirm('Are you sure you want to delete this conversation?')" 
                                                       class="btn btn-icon btn-sm btn-danger-light">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $conversations->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-2 -->

        </div>
    </div>
                <!-- End::app-content -->

@endsection

@section('scripts')
@endsection


