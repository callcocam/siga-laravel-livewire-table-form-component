<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            @isset($menus)
                @if($menus)
                    @foreach($menus as $nenu)
                        @if($nenu)
                            @if($nenu->isMenu())
                                @foreach($nenu->items() as $item)
                                    @can($nenu->name())
                                        <li class="nav-item">
                                            <a class="nav-item-hold" href="{{  $item->isRoute() }}"><i class="nav-icon {{  $item->icon }}"></i><span class="nav-text">{{ __($item->label)  }}</span></a>
                                            <div class="triangle"></div>
                                        </li>
                                    @endcan
                                @endforeach
                            @else
                                @if($nenu->permissions())
                                    <li class="nav-item" data-item="{{ \Illuminate\Support\Str::slug($nenu->label) }}">
                                        <a class="nav-item-hold" href="#"><i class="nav-icon {{  $nenu->icon }}"></i><span class="nav-text">{{ __($nenu->label)  }}</span></a>
                                        <div class="triangle"></div>
                                    </li>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endif
            @endisset

            <li class="nav-item"><a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank"><i class="nav-icon i-Safe-Box1"></i><span class="nav-text">Doc</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        @isset($menus)
            @if($menus)
                @foreach($menus as $nenu)
                    @if($nenu)
                        @if(!$nenu->isMenu())
                            <ul class="childNav" data-parent="{{ \Illuminate\Support\Str::slug($nenu->label) }}">
                                @foreach($nenu->items() as $item)
                                    @can($item->name())
                                        <li class="nav-item">
                                            <a class="nav-item-hold" href="{{  $item->isRoute() }}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">{{ __($item->label)  }}</span></a>
                                            <div class="triangle"></div>
                                        </li>
                                    @endcan
                                @endforeach
                            </ul>
                        @endif
                    @endif
                @endforeach
            @endif
        @endisset
    </div>
    <div class="sidebar-overlay"></div>
</div>
