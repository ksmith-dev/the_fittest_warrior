@extends('layouts.app')

@section('head')
    @parent
    <title>{{ config('app.name', 'The Fittest Warrior') }} | About</title>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="spacer-50"></div>
    <div id="about">
        <div class="row">
            <div class="col">
                <h2>Activity</h2>
                <div class="share">
                    <div class="col feed-tabs">
                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link  active" href="{{ url('#') }}">Comment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('#') }}">Photo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('#') }}">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('#') }}">Training</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form method="POST" action="{{ url('share/{user_id}/{img_path}/{text}') }}">
                        <div class="form-group row">
                            <div class="col share-wrapper">
                                <img src="http://via.placeholder.com/50x50" class="avatar">
                                <span class="feed-title">{{ $member->first_name }} {{ $member->last_name }}</span>
                                <input id="input_feed_text" type="text"
                                       class="form-control{{ $errors->has('input_feed_text') ? ' is-invalid' : '' }}"
                                       name="input_feed_text" value="{{ old('input_feed_text') }}" placeholder="What would you like to share?"
                                       required autofocus>

                                @if ($errors->has('input_feed_text'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('input_feed_text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                @if($feeds->count() > 0)
                    @foreach($feeds as $feed)
                        <div class="feed">
                            <img src="http://via.placeholder.com/50x50" class="avatar">
                            <span class="feed-title">{{ $member->first_name }} {{ $member->last_name }} - shared {{ $feed->type }}</span>
                            <hr style="border: 2px solid #ccc;">
                            <p class="feed-text">{{ $feed->comment }}</p>
                            <img src="{{ $feed->image_url }}">
                            <hr style="border: 2px solid #ccc;">
                            <a href="#" class="btn btn-default" role="button"><img src="{{ asset('images/icons/survey.svg') }}" style="width: 20px;"> Like</a>
                            <a href="#" class="btn btn-default" role="button"><img src="{{ asset('images/icons/draw.svg') }}" style="width: 20px;"> Comment</a>
                            <a href="#" class="btn btn-default" role="button"><img src="{{ asset('images/icons/share.svg') }}" style="width: 20px;"> Share</a>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-5">
                <h2>Training Video</h2>
                <h4>Video by - bodybuilding.com</h4>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/YdB1HMCldJY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="spacer-20"></div>
                <h2>Upcoming Events</h2>
                <div class="event">
                    <hr style="border: 2px solid #ccc;">
                    <h4>Event Title</h4>
                    <img src="http://via.placeholder.com/200x100" class="event-img">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas leo eu rutrum accumsan. Proin dictum euismod mollis. Quisque a ex id nunc dictum iaculis. Ut sem sapien, euismod vitae suscipit nec, fermentum pharetra arcu. Ut condimentum neque in eros mollis lacinia. Aenean urna felis, sollicitudin ut massa id, malesuada mollis est. Fusce fringilla mi sed semper vulputate.</p>
                    <h5>Event Details</h5>
                    <address>
                        4250 Honeysuckle Lane<br>
                        Seattle, WA<br>
                        98119<br>
                        360-505-8184
                    </address>
                </div>
                <div class="event">
                    <hr style="border: 2px solid #ccc;">
                    <h4>Event Title</h4>
                    <div class="spacer-20"></div>
                    <img src="http://via.placeholder.com/200x100" class="event-img">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas leo eu rutrum accumsan. Proin dictum euismod mollis. Quisque a ex id nunc dictum iaculis. Ut sem sapien, euismod vitae suscipit nec, fermentum pharetra arcu. Ut condimentum neque in eros mollis lacinia. Aenean urna felis, sollicitudin ut massa id, malesuada mollis est. Fusce fringilla mi sed semper vulputate. Nullam ac enim quam. Donec malesuada molestie nisl in egestas.</p>
                    <h5>Event Details</h5>
                    <address>
                        3561 Neville Street<br>
                        Seattle, WA<br>
                        98119<br>
                        812-599-0357
                    </address>
                </div>

            </div>
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection