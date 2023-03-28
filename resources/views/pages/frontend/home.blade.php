@extends('layouts.frontend.inc.master')

@section('content')
    @php
        $participants = App\Models\Participant::all();
        $events = App\Models\Event::all();
        
    @endphp
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-stellar-background-ratio="0.1"
        {{-- data-bg-img="https://conferencenepal.com/images/bg11.jpg" --}}
        style="background-image: url(&quot;https://conferencenepal.com/images/bg11.jpg&quot;); background-position: 0% 63.6px;">
        <div class="container pt-2 pb-0">
            <!-- Section Content -->
            <div class="section-content pt-2">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">Events</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-50 pt-80">
        {{-- <div class="section-content">
            <div class="row">
                <h1>Events</h1>
            </div>
        </div> --}}
        <ul>
            @foreach ($events as $event)
                <div class="schedule-details clearfix p-15 pt-10">
                    <h5 class="font-16 title"><a href="#">{{ $event->name }}</a>
                    </h5>
                    <div class="mt-10">
                        <a class="btn btn-colored btn-theme-colored btn-sm"
                            href="/event/{{ $event->id }}/downloads/certificates">Download
                            Certificate</a>
                        <a class="btn btn-colored btn-theme-colored btn-sm" href="#">Details</a>
                    </div>

                </div>
            @endforeach
        </ul>
    </div>
@endsection
