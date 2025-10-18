@extends('layouts.master')

@section('styles')

@endsection

@section('content')

                <!-- Start::app-content -->
                <div class="main-content app-content">
                    <div class="container-fluid">

                        <!-- Page Header -->
                        <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                            <h1 class="page-title fw-medium fs-24 mb-0">Add Conversation</h1>
                        </div>
                        <!-- Page Header Close -->

                        <!-- Start:: row-2 -->
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.conversation.store') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                                                @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="medium" class="form-label">Communication Medium <span class="text-danger">*</span></label>
                                                <select id="medium" name="medium" class="form-control @error('medium') is-invalid @enderror" required>
                                                    @php($mediumVal = old('medium','email'))
                                                    <option value="call" @if($mediumVal==='call') selected @endif>Call</option>
                                                    <option value="email" @if($mediumVal==='email') selected @endif>Email</option>
                                                    <option value="sms" @if($mediumVal==='sms') selected @endif>SMS</option>
                                                </select>
                                                @error('medium')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="scheduled_at" class="form-label">Time</label>
                                                <input type="datetime-local" class="form-control @error('scheduled_at') is-invalid @enderror" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}">
                                                @error('scheduled_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                                                @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Recipients <span class="text-danger">*</span></label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="send_to" id="send_all" value="all" @if(old('send_to','selected')==='all') checked @endif>
                                                    <label class="form-check-label" for="send_all">Send to all my customers</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="send_to" id="send_selected" value="selected" @if(old('send_to','selected')==='selected') checked @endif>
                                                    <label class="form-check-label" for="send_selected">Send to selected customers</label>
                                                </div>
                                            </div>

                                            <div class="mb-3" id="selectedCustomersWrapper">
                                                <label for="customer_ids" class="form-label">Select Customers</label>
                                                <select id="customer_ids" name="customer_ids[]" class="form-control" multiple size="8">
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}" @if(collect(old('customer_ids',[]))->contains($customer->id)) selected @endif>
                                                            {{ $customer->name }} @if($customer->email) ({{ $customer->email }}) @endif @if($customer->contact) - {{ $customer->contact }} @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button class="btn btn-info" type="submit">Submit</button>
                                            <a href = "{{route('admin.conversations.index')}}" class="btn btn-info-transparent">Back</a>
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
<script>
    function toggleSelectedWrapper() {
        const selected = document.querySelector('input[name="send_to"]:checked').value;
        const wrapper = document.getElementById('selectedCustomersWrapper');
        wrapper.style.display = selected === 'selected' ? '' : 'none';
    }
    document.querySelectorAll('input[name="send_to"]').forEach(function(el){
        el.addEventListener('change', toggleSelectedWrapper);
    });
    toggleSelectedWrapper();
</script>
@endsection


