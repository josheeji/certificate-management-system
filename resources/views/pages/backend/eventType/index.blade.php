@extends('layouts.master')
@section('title', 'Event Types Table')

@section('content')
    <!--  Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action={{ 'admin/event-types' }} method="POST" id="delete_form">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="event_delete_id" id="delete_eventType_id">
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
                <h5 class="card-title">Event Type Table
                </h5>
                <!-- Default Table -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="/admin/event-types/create" class="btn btn-primary btn-sm">
                        <h6>Add New Event Type</h6>
                    </a>
                    <hr>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">S.No.</th>
                                <th scope="col"> Event Name</th>
                                <th class="text-center" width="220">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventTypes as $eventType)
                                <tr>
                                    <td>{{ $eventType->id }} </td>
                                    <td>{{ $eventType->name }} </td>

                                    <td class="text-center">
                                        <a title="Edit" href="/admin/event-types/{{ $eventType->id }}/edit"
                                            class="btn btn-icon btn-circle btn-light"><i class="bi bi-pencil"></i></a>
                                        {{-- <a title="Delete" href="admin/event-types/{{ $eventType->id }}"
                                            class="btn btn-icon btn-danger btn-circle delete"><i
                                                class="bi bi-trash-fill"></i></a> --}}

                                        <button title="Delete" type="button"
                                            class="btn btn-icon btn-danger btn-circle delete deleteEventTypeBtn"
                                            value="{{ $eventType->id }}"><i class="bi bi-trash-fill"></i></button>


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
            $('.deleteEventTypeBtn').click(function(e) {
                e.preventDefault();

                var eventType_id = $(this).val();
                $('#delete_eventType_id').val(eventType_id);

                $('#delete_form').attr('action', '/admin/event-types/' + eventType_id);
                $('#deleteModal').modal('show');

            });
        });
    </script>


@endsection
