<div class="col">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link{{ url()->current() === url('/') . '/dashboard' ? ' active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ url()->current() === url('/') . '/workout' ? ' active' : '' }}" href="{{ url('workout') }}">Fitness</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ url()->current() === url('/') . '/nutrition' ? ' active' : '' }}" href="{{ url('nutrition') }}">Nutrition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ url()->current() === url('/') . '/health' ? ' active' : '' }}" href="{{ url('health') }}">Health</a>
            </li>
        </ul>
    </div>
</div>