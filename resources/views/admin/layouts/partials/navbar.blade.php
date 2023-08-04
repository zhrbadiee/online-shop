<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="../img/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</strong>
                            </span>
                            <span class="text-muted text-xs block">
                                مدیر <b class="caret">
                                </b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft m-t-xs">
                        <li>
                            <a href="profile.html">
                                پروفایل</a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                خروچ </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    لوگو
                </div>
            </li>

            <li>
                <a href="{{ route('app.index') }}">
                    <i class="fa fa-home">
                    </i>
                    <span class="nav-label">
                        صفحه اصلی سایت آیلی شاپ</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home">
                    </i>
                    <span class="nav-label">
                        صفحه اصلی پنل مدیریت </span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-list">
                    </i>
                    <span class="nav-label">
                        دسته بندی</span>
                    <span class="fa arrow">
                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('admin.category.index') }}">
                            دسته بندی ها</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category.create') }}">
                            افزودن دسته بندی</a>
                    </li>
                </ul>

            </li>

            <li>
                <a href="index-2.html">
                    <i class="fa fa-picture-o">
                    </i>
                    <span class="nav-label">
                        پست </span>
                    <span class="fa arrow">
                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('admin.post.index') }}">
                            پست ها</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.post.create') }}">
                            افزودن پست </a>
                    </li>
                </ul>


            </li>
            <li>
                <a href="index-2.html">
                    <i class="fa fa-picture-o">
                    </i>
                    <span class="nav-label">
                        کاربران </span>
                    <span class="fa arrow">
                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('admin.user.admin-index') }}">
                            ادمین ها</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.user-index') }}">
                            کاربران </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index-2.html">
                    <i class="fa fa-picture-o">
                    </i>
                    <span class="nav-label">
                        روش های ارسال </span>
                    <span class="fa arrow">
                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('admin.delivery.index') }}">
                            نمایش روش های ارسال</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.delivery.create') }}">
                            افزودن روش ارسال</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index-2.html">
                    <i class="fa fa-picture-o">
                    </i>
                    <span class="nav-label">
                        سفارشات </span>
                    <span class="fa arrow">
                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('admin.order.newOrders') }}">
                            جدید </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.order.sending') }}">
                            در حال ارسال</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.order.canceled') }}">
                            باطل شده </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.order.all') }}">
                            تمام سفارشات</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
