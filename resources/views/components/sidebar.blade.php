@php
$links = [
    [
        "href" => "admin.dashboard",
        "section_text" => "Dashboard",
        "text" =>'dashboard',
        "is_multi" => false,
        "icon"=>'fas fa-fire'
    ],

    [
        "href" => "admin.vote-candidate.index",
        "section_text" => "Pemilu",
        "text" => "Pemilu  Ketua UKM LAOS",
        "is_multi" => false,
        "icon"=>'fas fa-file'
    ],

];
if (Auth::user()->role==4){
    $data=[
        "href" => "admin.user-verification.index",
        "section_text" => "Verification",
        "text" => "Verification",
        "is_multi" => false,
        "icon"=>'fas fa-file'
    ];
    array_push($links,$data);
}
if (Auth::user()->role==1){
    $data=[
        "href" => "admin.hasil-vote.index",
        "section_text" => "Hasil Vote",
        "text" => "Voting",
        "is_multi" => false,
        "icon"=>'fas fa-file'
    ];
    array_push($links,$data);
    $data=[
        "href" => "admin.candidate.index",
        "section_text" => "Data Kandidat",
        "text" => "Kandidat",
        "is_multi" => false,
        "icon"=>'fas fa-file'
    ];
    array_push($links,$data);

    $data=[
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "admin.user", "text" => "Data User"],
                    ["href" => "admin.user.new", "text" => "Buat User"],
                    ["href" => "admin.verification.index", "text" => "Verification User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ];
    array_push($links,$data);
}
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{asset('image/logo.png')}}" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{$link->icon}}"></i><span>{{ $link->section_text }}</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
