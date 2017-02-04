@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <p class="panel-title pull-left">{{ $profile->fname }} {{ $profile->lname }}</p>
                  <form action="/profiles/{{ $profile->id }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger pull-right">Remove</button>
                  </form>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4"><b>Birthday</b></div>
                    <div class="col-md-6">{{ $profile->birthday }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4"><b>Address</b></div>
                    <div class="col-md-6">{{ $profile->address }}</div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4"><b>Twitter Page</b></div>
                    <div class="col-md-6"><a href="https://twitter.com/{{ $profile->twitter_page }}">@ {{ $profile->twitter_page }}</a></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4"><b>Events Attended</b></div>
                    <div class="col-md-6">

                      @if($events->isEmpty())
                        No events found.
                      @else
                        @foreach($profile->events()->get() as $profile_event)
                          <p>{{ $profile_event->title }}</p>
                        @endforeach
                        <form action="/profiles/events" method="POST">
                          {{ csrf_field() }}
                          <input name="profile_id" type="hidden" value="{{ $profile->id }}">
                          <select name="event_id">
                            @foreach($events as $event)
                              <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                          </select>
                          <input name="submit" class="btn btn-primary" type="submit" value="Add">
                        </form>
                      @endif
                    </div>
                  </div>
                 </div> 
            </div>
        </div>
    </div>
</div>
@endsection
