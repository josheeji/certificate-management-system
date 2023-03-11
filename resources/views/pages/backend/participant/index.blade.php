@extends('layouts.master')
@section('title', 'Participant Table')

@section('content')

    <!--  Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action={{ '/admin/events' }} method="POST" id="delete_form">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="event_delete_id" id="delete_event_id">
                        <h5>Are you sure, you want to delete this category ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, delete it</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Delete Modal -->


    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Participant Table

                </h5>

                <!-- Default Table -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/admin/participants/create" class="btn btn-primary btn-sm">
                        <h6>Add New Participants</h6>
                    </a>

                    <a href="/admin/participants/import" class="btn btn-primary btn-sm">
                        <h6>Import file</h6>
                    </a>
                    <a href="/admin/participants/export-participant-pdf" class="btn btn-success btn-sm">
                        <h6>Export Excel</h6>
                    </a>
                    <br>
                    <br>
                   
                    
                    <hr>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Affilated Isntitute</th>
                                <th scope="col">Post</th>
                                <th scope="col">Event</th>
                                <th class="text-center" width="170">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                                <tr>
                                    <td>{{ $participant->id }}</td>
                                    <td>{{ $participant->name }}</td>

                                    <td>{{ $participant->affilated_institute }}</td>
                                    <td>{{ $participant->post }}</td>
                                    <td>{{ $participant->event->name }}</td>


                                    <td class="text-center">
                                        <a title="Download PDF"
                                            href="/admin/participants/{{ $participant->id }}/download-pdf"
                                            class="btn btn-primary" class="bi bi-arrow-down-circle-fill"><i
                                                class="bi bi-arrow-down-circle-fill"></i></a>

                                        <a title="Edit" href="/admin/participants/{{ $participant->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>

                                        {{-- <a title="Delete" href="/admin/events/{{ $event->id }}" 
                                            class="btn btn-icon btn-danger btn-circle delete"><i
                                                class="bi bi-trash-fill"></i></a> --}}

                                        <button title="Delete" type="button"
                                            class="btn btn-icon btn-danger btn-circle delete deleteEventBtn"
                                            value="{{ $participant->id }}"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('.deleteEventBtn').click(function(e) {
                e.preventDefault();

                var event_id = $(this).val();
                // $('#delete_event_id').val(event_id);

                $('#delete_form').attr('action', '/admin/events/' + event_id);
                $('#deleteModal').modal('show');


            });
        });
    </script>


@endsection