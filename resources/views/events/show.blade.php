@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <p class="panel-title pull-left">{{ $event->title }}</p>
                  <form action="/events/{{ $event->id }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger pull-right">Remove</button>
                  </form>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4"><b>Date Occurred</b></div>
                    <div class="col-md-6">{{ $event->date_occurred }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4"><b>Description</b></div>
                    <div class="col-md-6">{{ $event->description }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4"><b>Event Attendees</b></div>
                    <div class="col-md-6">
                      @if($event->profiles()->get()->isEmpty())
                        No participants
                      @else
                        @foreach($event->profiles()->get() as $profile)
                        <p><a href="/profiles/{{ $profile->id }}">{{ $profile->fname }} {{ $profile->lname }}</a></p>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
