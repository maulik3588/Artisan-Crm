@extends('layouts.master')

@section('styles')

@endsection

@section('content')

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                <h1 class="page-title fw-medium fs-24 mb-0">@if(isset($category->id))Edit @else Add @endif Category</h1>
            </div>
            <!-- Page Header Close -->

            <!-- Start:: row-2 -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form @if(isset($category->id)) action="{{ route('admin.category.update',$category->id) }}" @else action="{{ route('admin.category.store') }}" @endif method="post">
                            @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="@if(isset($category->id)){{ $category->name }}@elseif(old('name')){{ old('name') }}@endif" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            @if(!empty($category))
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isAdmin" name="status" value="1" @if($category->is_active == 'Active')  checked @endif>
                                        <label class="form-check-label" for="isAdmin">Status (Active or Deactive)</label>
                                    </div>
                                @endif
                                <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back</a>
                                </div>
                            </form>
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
