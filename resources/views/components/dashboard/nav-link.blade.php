@props([
    'route' => '',
    'title' => 'untitled',
    'active' => true,
])
<li class="nav-item ">
    <a class="nav-link {{ request()->is($route) ? 'active' : '' }}" href="{{ $route }}">
        <div
            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
            {{ $icon }}
        </div>
        <span class="nav-link-text ms-1">{{ $title }}</span>
    </a>
</li>
