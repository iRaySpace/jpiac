@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <p class="panel-title pull-left">Profiles</p>
                  <a href="{{ url('profiles/create') }}" class="btn btn-success pull-right">Add</a>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  @if($profiles->isEmpty())
                    No profiles found.
                  @else
                  <ul>
                    @foreach($profiles as $profile)
                      <li><a href="/profiles/{{ $profile->id }}">{{ $profile->fname }} {{ $profile->lname }}</a></li>
                    @endforeach
                  </ul>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
