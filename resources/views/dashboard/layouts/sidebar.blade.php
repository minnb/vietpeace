<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
    try { ace.settings.loadState('main-container'); } catch (e) { console.log(e); }
</script>
<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try { ace.settings.loadState('sidebar'); } catch (e) { console.log(e); }
    </script>
    <ul class="nav nav-list">
        <li class="">
            <a href="{{ url('/')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="open">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text">
                    Category
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('get.dashboard.category.list',['alias'=>'destinations'])}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Destinations
                    </a>
                    <b class="arrow"></b>
                </li>
                 <li class="">
                    <a href="{{route('get.dashboard.category.list',['alias'=>'tours'])}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tours
                    </a>
                    <b class="arrow"></b>
                </li>
                 <li class="">
                    <a href="{{route('get.dashboard.category.list',['alias'=>'travel-guide'])}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Travel Guide
                    </a>
                    <b class="arrow"></b>
                </li>
                 <li class="">
                    <a href="{{route('get.dashboard.category.list',['alias'=>'hotels'])}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hotels
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="open">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">
                    Post
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('get.dashboard.post.list')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tours
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('get.dashboard.slide.add', ['name'=>'list', 'id'=>'0'])}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Slide
                    </a>
                    <b class="arrow"></b>
                </li>
                <!--
                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Destinations
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hotels
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Travel Guide
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Blogs
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Video
                    </a>
                    <b class="arrow"></b>
                </li>
            -->
            </ul>
        </li>
        <li class="open">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text">
                    Setting
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('get.dashboard.config.info')}}">
                        <i class="menu-icon fa fa-caret-right"></i>Config
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('get.dashboard.function.list')}}">
                        <i class="menu-icon fa fa-caret-right"></i>Route
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('get.dashboard.user.list')}}">
                        <i class="menu-icon fa fa-caret-right"></i>Users
                    </a>
                    <b class="arrow"></b>
                </li>
                 <li class="">
                    <a href="{{route('get.dashboard.config.cache.clear')}}">
                        <i class="menu-icon fa fa-caret-right"></i>Cache
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
