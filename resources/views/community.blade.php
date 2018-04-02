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
                <h1>Feed</h1>
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
                <h1>Upcoming Events</h1>
                <div class="event">
                    <img src="http://via.placeholder.com/100x100">
                    <hr style="border: 2px solid #ccc;">
                    <h4>Event Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas leo eu rutrum accumsan. Proin dictum euismod mollis. Quisque a ex id nunc dictum iaculis. Ut sem sapien, euismod vitae suscipit nec, fermentum pharetra arcu. Ut condimentum neque in eros mollis lacinia. Aenean urna felis, sollicitudin ut massa id, malesuada mollis est. Fusce fringilla mi sed semper vulputate. Nullam ac enim quam. Donec malesuada molestie nisl in egestas. Fusce maximus, massa sagittis imperdiet lobortis, ex nisl lacinia libero, sit amet volutpat eros est non leo. Fusce suscipit eu orci eu mollis. Nullam consectetur iaculis semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut congue risus. Sed vitae molestie orci.</p>
                </div>
                <div class="event">
                    <img src="http://via.placeholder.com/100x100">
                    <hr style="border: 2px solid #ccc;">
                    <h4>Event Title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas leo eu rutrum accumsan. Proin dictum euismod mollis. Quisque a ex id nunc dictum iaculis. Ut sem sapien, euismod vitae suscipit nec, fermentum pharetra arcu. Ut condimentum neque in eros mollis lacinia. Aenean urna felis, sollicitudin ut massa id, malesuada mollis est. Fusce fringilla mi sed semper vulputate. Nullam ac enim quam. Donec malesuada molestie nisl in egestas. Fusce maximus, massa sagittis imperdiet lobortis, ex nisl lacinia libero, sit amet volutpat eros est non leo. Fusce suscipit eu orci eu mollis. Nullam consectetur iaculis semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut congue risus. Sed vitae molestie orci.</p>
                </div>

            </div>
        </div>
    </div>
    <div class="spacer-50"></div>
@endsection
@section('footer')
    @parent
@endsection