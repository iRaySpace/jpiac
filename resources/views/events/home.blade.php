@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <p class="panel-title pull-left">Events</p>
                  <a href="{{ url('/events/create') }}" class="btn btn-success pull-right">Add</a>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  @if($events->isEmpty())
                    No events found.
                  @else
                  <ul>
                    @foreach($events as $event)
                      <li><a href="/events/{{ $event->id }}">{{ $event->title }}</a></li>
                    @endforeach
                  </ul>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
