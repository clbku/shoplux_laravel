<aside id="navigation">
    <div class="navigation__header">
        <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
    </div>

    <div class="navigation__toggles">
        <a href="#" class="active" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
            <i class="zmdi zmdi-email"></i>
        </a>
        <a href="#" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__updates">
            <i class="zmdi zmdi-notifications"></i>
        </a>
        <a href="#"  data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__tasks">
            <i class="zmdi zmdi-playlist-plus"></i>
        </a>
    </div>

    <div class="navigation__menu c-overflow">
        <ul>
            <li class="navigation__active">
                <a href="{{route('admin.index')}}"><i class="zmdi zmdi-home"></i> Home</a>
            </li>
            <li class="">
                <a href="{{route('admin.category.list')}}"><i class="zmdi zmdi-view-list"></i>Danh sách loại sản phẩm</a>
            </li>
            <li class="">
                <a href="{{route('admin.product.list')}}"><i class="zmdi zmdi-view-list"></i>Danh sách sản phẩm</a>
            </li>
            <li class="">
                <a href="{{route('admin.user.list')}}"><i class="zmdi zmdi-view-list"></i>Danh sách người dùng</a>
            </li>
            <li class="">
                <a href="{{route('admin.customer.list')}}"><i class="zmdi zmdi-view-list"></i>Danh sách đơn đặt hàng</a>
            </li>

            {{--<li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>--}}
            {{--<li><a href="widgets.html"><i class="zmdi zmdi-widgets"></i> Widgets</a></li>--}}
            <li class="navigation__sub">
                <a href="{{route('admin.slide.list')}}" data-mae-action="submenu-toggle"><i class="zmdi zmdi-view-list"></i>Slide</a>

            </li>
            {{--<li class="navigation__sub">--}}
                {{--<a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-collection-text"></i> Forms</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="form-elements.html">Basic Form Elements</a></li>--}}
                    {{--<li><a href="form-components.html">Form Components</a></li>--}}
                    {{--<li><a href="form-examples.html">Form Examples</a></li>--}}
                    {{--<li><a href="form-validations.html">Form Validation</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="navigation__sub">--}}
                {{--<a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-swap-alt"></i>User Interface</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="animations.html">Animations</a></li>--}}
                    {{--<li><a href="buttons.html">Buttons</a></li>--}}
                    {{--<li><a href="icons.html">Icons</a></li>--}}
                    {{--<li><a href="alerts.html">Alerts</a></li>--}}
                    {{--<li><a href="preloaders.html">Preloaders</a></li>--}}
                    {{--<li><a href="notification-dialog.html">Notifications & Dialogs</a></li>--}}
                    {{--<li><a href="media.html">Media</a></li>--}}
                    {{--<li><a href="components.html">Components</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="navigation__sub">--}}
                {{--<a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-trending-up"></i>Charts</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="flot-charts.html">Flot Chart</a></li>--}}
                    {{--<li><a href="other-charts.html">Others</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="navigation__sub">--}}
                {{--<a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-image"></i>Photo Gallery</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="photos.html">Default</a></li>--}}
                    {{--<li><a href="photo-timeline.html">Timeline</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="calendar.html"><i class="zmdi zmdi-calendar"></i> Calendar</a></li>--}}
            {{--<li><a href="generic-classes.html"><i class="zmdi zmdi-layers"></i> Generic Classes</a></li>--}}
            {{--<li class="navigation__sub">--}}
                {{--<a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-collection-item"></i> Sample Pages</a>--}}
                {{--<ul>--}}
                    {{--<li><a href="profile-timeline.html">Profile</a></li>--}}
                    {{--<li><a href="list-view.html">List View</a></li>--}}
                    {{--<li><a href="messages.html">Messages</a></li>--}}
                    {{--<li><a href="pricing-table.html">Pricing Table</a></li>--}}
                    {{--<li><a href="contacts.html">Contacts</a></li>--}}
                    {{--<li><a href="wall.html">Wall</a></li>--}}
                    {{--<li><a href="invoice.html">Invoice</a></li>--}}
                    {{--<li><a href="login.html">Login and Sign Up</a></li>--}}
                    {{--<li><a href="lockscreen.html">Lockscreen</a></li>--}}
                    {{--<li><a href="404.html">Error 404</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</aside>