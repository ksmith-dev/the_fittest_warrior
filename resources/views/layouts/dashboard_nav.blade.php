<div class="col stickyHeader">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'dashboard') ? ' active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'view/fitness') ? ' active' : '' }}" href="{{ url('view/fitness') }}">Fitness</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'view/nutrition') ? ' active' : '' }}" href="{{ url('view/nutrition') }}">Nutrition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ strpos(url()->current(), 'view/health') ? ' active' : '' }}" href="{{ url('view/health') }}">Health</a>
            </li>
        </ul>
    </div>
</div>