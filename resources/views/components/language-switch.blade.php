<div class="lang-switch dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="langSwitch" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ strtoupper(app()->getLocale()) }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="langSwitch">
        <li><a class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
        <li><a class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
    </ul>
</div>