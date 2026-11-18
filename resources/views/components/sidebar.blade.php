<aside class="sidebar">
    <div class="sidebar-brand">Inventaris</div>

    <div class="sidebar-user">
        {{ auth()->user()->name }}<br>
        <small>{{ auth()->user()->role }}</small>
    </div>

    <nav class="sidebar-menu">
        <a href="{{ route('vendors.index') }}"
           class="{{ request()->routeIs('vendors.*') ? 'aktif' : '' }}">
            Vendor
        </a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="sidebar-logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</aside>