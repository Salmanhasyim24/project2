<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Portofolio Sall</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Home Slide</div>
            </a>
            <ul>
                <li> <a href="{{ route('home.slide') }}"><i class="bx bx-right-arrow-alt"></i>All HomeSlide</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">About Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('about') }}"><i class="bx bx-right-arrow-alt"></i>All About</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Portofolio Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('portofolio') }}"><i class="bx bx-right-arrow-alt"></i>All Portofolio</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title"> Blog Category Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
                <li> <a href="{{ route('blog') }}"><i class="bx bx-right-arrow-alt"></i>All Blog</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-support'></i>
                </div>
                <div class="menu-title">Settings Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('footer') }}"><i class="bx bx-right-arrow-alt"></i>Footer</a>
                </li>
                <li> <a href="{{ route('contact.message') }}"><i class="bx bx-right-arrow-alt"></i>Contact</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
