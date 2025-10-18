@extends('layouts.master')

@section('styles')

@endsection

@section('content')

                <!-- Start::app-content -->
                <div class="main-content app-content">
                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                            <h1 class="page-title fw-medium fs-24 mb-0">@if(isset($customer->id))Edit @else Add @endif customer</h1>
                        </div>
                        <!-- Page Header Close -->

                        <!-- Start:: row-2 -->
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <form @if(isset($customer->id)) action="{{ route('admin.customer.update',$customer->id) }}" @else action="{{ route('admin.customer.store') }}" @endif method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="@if(isset($customer->id)){{ $customer->name }}@elseif(old('name')){{ old('name') }}@endif" required>
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="@if(isset($customer->id)) {{ $customer->email }} @elseif(old('email')) {{ old('email') }} @endif">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact</label>
                                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="@if(isset($customer->id)) {{ $customer->contact }} @elseif(old('contact')) {{ old('contact') }} @endif">
                                                @error('contact')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4">@if(isset($customer->id)){{ $customer->address }}@elseif(old('address')){{ old('address') }}@endif</textarea>
                                                @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                                    @php($statusVal = isset($customer->id) ? $customer->status : old('status', 'lead'))
                                                    <option value="lead" @if($statusVal==='lead') selected @endif>Lead</option>
                                                    <option value="active" @if($statusVal==='active') selected @endif>Active</option>
                                                    <option value="inactive" @if($statusVal==='inactive') selected @endif>Inactive</option>
                                                </select>
                                                @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button class="btn btn-info" type="submit">Submit</button>
                                            <a href = "{{route('admin.customers.index')}}" class="btn btn-info-transparent">Back</a>
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


