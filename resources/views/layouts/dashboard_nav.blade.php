<div class="col stickyHeader">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'dashboard') ? ' active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'fitness') ? ' active' : '' }}" href="{{ url('fitness') }}">Fitness</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'nutrition') ? ' active' : '' }}" href="{{ url('nutrition') }}">Nutrition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), '/health') ? ' active' : '' }}" href="{{ url('health') }}">Health</a>
            </li>
        </ul>
    </div>
</div>