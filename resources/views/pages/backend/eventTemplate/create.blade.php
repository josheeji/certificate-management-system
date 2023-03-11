@extends('layouts.master')

@section('title', 'Create Events')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Events Template
            </h5>
            <a href="{{ url('/admin/event-templates') }}"> <button type="button" class="btn btn-success">Back
                </button> </a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <hr>
            <!-- Horizontal Form -->

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }} </h6>
            @endif
            <form class="form-sample" action="/admin/event-templates" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="template_name" class="col-sm-2 col-form-label">Template Name<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="template_name" class="form-control" id="template_name"
                            placeholder="Event  Template Name" value="{{ old('template_name') }}">
                    </div>
                    @error('template_name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="url" class="col-sm-2 col-form-label">HTML File<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" name="url" class="form-control" id="url" placeholder="Upload url"
                            value="{{ old('url') }}">
                    </div>
                    @error('url')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>



                {{-- <div class="row mb-3">
                    <label for="custom_field" class="col-sm-2 col-form-label">CUstom Field<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="custom_field" class="form-control" id="custom_field"
                            placeholder="Custom Field" value="{{ old('custom_field') }}">
                    </div>
                    @error('custom_field')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="row mb-3">
                    <label for="template_files" class="col-sm-2 col-form-label">Template Files<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="template_files" name="template_files[]" multiple
                            value="{{ old('template_files') }}">
                    </div>
                    @error('template_files')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
                    <button type="submit" id="submit_form" class="btn btn-primary btn-fw">Submit</button>

                </div>

            </form>
        </div>

        <!-- End Horizontal Form -->
    </div>

@endsection
