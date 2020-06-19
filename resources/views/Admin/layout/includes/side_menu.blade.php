            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div style="padding-top: 10px;" class="user-box pb-0">
                        <div class="user-img">
                            <img src="{{ asset(HelpAdmin::getAvatarUser()) }}" alt="user-img" title="{{ HelpAdmin::completName() }}" class="rounded-circle img-thumbnail img-responsive">
                            
                            <div class="user-status offline">
                                <i style="color: {{ \Auth::User()->Group->tag_color }};" class="mdi mdi-adjust"></i>
                            </div>
                        </div>
                        <h5>
                            <a href="javascript:void(0);">
                                {{ HelpAdmin::completName() }}
                            </a>
                            <br>
                            <a href="javascript:void(0);" style="font-size: 12px; color: {{ \Auth::User()->Group->tag_color }};">
                                {{ \Auth::User()->Group->name }}
                            </a>
                        </h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('adm.users.edit', \Auth::user()->id)}}" >
                                    <i class="mdi mdi-settings"></i> Perfil
                                </a>
                            </li>
                            <li class="list-inline-item">
                                {!! Form::open(['url'=> 'logout', 'id'=> 'form_logout']) !!}
                                {!! Form::close() !!}

                                <a href="#" class="text-custom" onclick="event.preventDefault();
                                    document.getElementById('form_logout').submit();">
                                    <i class="mdi mdi-power"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <style>
                                .line-menu
                                {
                                    padding: 4px 0px !important;
                                    border-top: solid 0.5px #98a6ad !important;
                                    margin: 0 10px !important;
                                }
                            </style>

                            @foreach (HelpMenuAdmin::SideMenu() as $option)
                                @if ($option['permission'] == '#' OR in_array($option['permission'], HelpAdmin::permissionsUser(\Auth::user())) OR in_array('developer', HelpAdmin::permissionsUser(\Auth::user())))
                                    @if (isset($option['name_menu']))
                                        <li class="text-muted menu-title">
                                            {{ $option['name_menu'] }}
                                        </li>
                                    @else
                                        @if (isset($option['sub_menu']))
                                            <li class="has_sub {{ $option['a-active'] }}">
                                                <a href="javascript:void(0);" class="waves-effect mt-2 mb-2">
                                                    <i class="{{ $option['icon'] }}"></i>
                                                    <span>
                                                        {{ $option['label'] }}
                                                    </span>
                                                    <span class="menu-arrow">
                                                        <i class="mdi mdi-chevron-down mr-0"></i>
                                                    </span>
                                                </a>
                                                <ul class="list-unstyled">
                                                    @foreach ($option['sub_menu'] as $submenu)
                                                        @if (in_array($submenu['url'], HelpAdmin::permissionsUser(\Auth::user())) OR in_array('developer', HelpAdmin::permissionsUser(\Auth::user())))
                                                            <li class="{{ $submenu['active_page'] }}">
                                                                <a href="{{ route($submenu['url']) }}" class="{{ $submenu['active_page'] }}">
                                                                    {{ $submenu['label'] }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route($option['url']) }}" class="waves-effect mt-2 mb-2 {{ $option['a-active'] }}">
                                                    <i class="{{ $option['icon'] }}"></i>
                                                    <span> {{ $option['label'] }} </span>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($option['line'])
                                            <li class="text-muted menu-title line-menu"></li>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    {{-- Current date --}}
                    <div style="padding-top: 10px;" class="user-box">
                        <h5>
                            <a href="javascript:void(0);" style="font-size: 14px;" class="font-weight text-black">
                                {{ strftime('%A, %d de %B de %Y', strtotime('today')) }}
                            </a>
                        </h5>
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        @yield('contents')