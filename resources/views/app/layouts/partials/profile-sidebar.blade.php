<aside id="sidebar" class="sidebar col-md-3">

    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <!-- start sidebar nav-->
        <section class="sidebar-nav">
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('profile.orders') }}">سفارش
                        های
                        من</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('profile.my-addresses') }}">آدرس های
                        من</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('profile.profile') }}">ویرایش
                        حساب</a></span>
            </section>
            <section class="sidebar-nav-item">
                 <span class="sidebar-nav-item-title"><a class="p-3"  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                <i class=""></i>خروچ از حساب کاربری </a></span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form>
        </section>

        </section>
        <!--end sidebar nav-->
    </section>
</aside>
