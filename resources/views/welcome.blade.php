@extends('layouts.app')
@section('head')
    @parent
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    <div class="row px-3 mb-3">
        <div class="col">
            <div class="row">
                <!--carousel-->
                <div class="px-0 d-none d-md-block mr-3 col-md-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('images/carousel/image_1.jpg') }}"
                                     alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Auburn Run</h2>
                                    <p>Feb 13th 2018</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/carousel/image_2.jpg') }}"
                                     alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Full Body Challenge</h2>
                                    <p>Are you ready?</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/carousel/image_3.jpg') }}"
                                     alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>Picking a Gym</h2>
                                    <p>How to pick the right on.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- sign up -->
                @if (Auth::check())
                    <div class="col p-3 bodyPanelStyle">
                        <div class="row" style="padding: 0 10px;">
                            <h2>Leader Board</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Workout</th>
                                    <th scope="col" class="text-center">Weight</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leader_board as $leader)
                                    <tr>
                                        <td class="text-center">{{ $leader['first_name'] }} {{ $leader['last_name'] }}</td>
                                        <td class="text-center">{{ $leader['type'] }}</td>
                                        <td class="text-center">{{ $leader['weight'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="col p-3 bodyPanelStyle">
                        <div class="row">
                            <div class="col text-center">
                                <h2>Sign Up</h2>
                                <p>Join the Fittest Warrior to track your fitness, compete with your peers, and connect
                                    with a like minded community.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                                <input type="text" class="form-control" id="first_name"
                                                       name="first_name" placeholder="First name"
                                                       value="{{ old('first_name') }}" required autofocus>

                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                       placeholder="Last name" value="{{ old('last_name') }}" required
                                                       autofocus>

                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                        <input type="email" class="form-control" id="emailSignUp" name="email"
                                               placeholder="Email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>

                                    <button type="submit" class="btn logButton">Create Account</button>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else. </small>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row px-3 mb-3">
        <div class="col-md-8 mb-3 mb-md-0 mr-md-3">
            <div class="row">

                @foreach($articles as $article)
                    <div class="col mr-md-3 bodyPanelStyle p-3">
                        <a id="imageLink1" href="{{ $article['url'] }}">
                            <img id="headImage1" src="{{ $article['urlToImage'] }}" alt="article image" class="w-100 mb-3"></a>
                        <h3 id="headline1">{{ $article['title'] }}</h3><span id="byline1"></span>
                        <p id="desc1">{{ $article['description'] }}</p><a id="link1" href="{{ $article['url'] }}">Read More...</a>
                    </div>
                @endforeach

            </div>

        </div>

        <div class="h-50 col">
            <div class="row mb-3">
                <div class="col bodyPanelStyle p-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-center">Stay Informed</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>
                                You can stay informed of upcoming events and new site features without joining.
                                Just enter your email address and we'll let you know about the latest Fittest
                                Warrior news.
                            </p>
                        </div>
                    </div>

                    <div class="row ">
                        <form class="form-inline" action="">
                            <div class="col col-12">
                                <input class="form-control" type="text" placeholder="Email">
                                <div class="spacer-20"></div>
                                <button type="submit" class="btn logButton">Stay Informed</button>
                            </div>

                        </form>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col bodyPanelStyle p-3">
                    <img src="http://via.placeholder.com/300x120" alt="" class="w-100">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection