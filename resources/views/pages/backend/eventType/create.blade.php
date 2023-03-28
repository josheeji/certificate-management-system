@php
    use App\Contracts\AbstractInputFile;
    $inputTypes = AbstractInputFile::toArray();
@endphp

@extends('layouts.master')

@section('title', 'Create Event Types')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Event Types
            </h5>
            <a href="{{ url('/admin/event-types') }}"> <button type="button" class="btn btn-success">Back
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
            <form class="form-sample" action="/admin/event-types" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Event Type Name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
                <a href="#" class="btn btn-primary btn-fw" id="add_row_btn">Custom Field</a>


                <div class="row mb-3">
                    <label for="name" class="col-sm-10 col-form-label"><span class="text-danger"></span></label>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Label</th>
                                <th scope="col">Type</th>
                                <th></th>
                                <th scope="col">Name</th>
                                <th scope="col">Placeholder </th>
                                <th scope="col">Tags </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{-- <label for="label"> Label </label> --}}
                                    <input type="text" name="label" id="label" placeholder="label" value=""
                                        class="custom-select form-control">

                                </td>
                                <td>
                                    {{-- <label for="type"> Type </label> --}}
                                    <select name="input_field" aria-placeholder="Select Input Type"
                                        class="custom-select form-control">
                                        @foreach (AbstractInputFile::toArray() as $value => $label)
                                            <option value="<?= $value ?>"><?= $label ?></option>
                                        @endforeach


                                    </select>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="mandatory">Is it mandatory?</label>
                                        <input type="checkbox" id="mandatory" name="mandatory" value="1">
                                    </div>
                                </td>

                                <td>
                                    {{-- <label for="name"> Name </label> --}}
                                    <input type="text" name="name" id="name" placeholder="name" value=""
                                        class="custom-select form-control">
                                </td>
                                <td>
                                    {{-- <label for="placeholder"> Placeholder </label> --}}
                                    <input type="text" name="placeholder" id="placeholder" placeholder="placeholder"
                                        value="" class="custom-select form-control">
                                </td>
                                <br>

                                <td>
                                    <input type="text" name="tags" placeholder="Tags"
                                        class="tm-input form-control tm-input-info" />
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3 mb-3">
                    <button type="submit" id="submit_form" class="btn btn-primary">Submit</button>

                </div>
                <br>

            </form>
            <!-- End Horizontal Form -->
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(".tm-input").tagsManager();
    </script>
    
@endsection
