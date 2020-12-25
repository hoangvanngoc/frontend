
<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">

        <li><a href="{{ route('home') }}" class="active">Home</a></li>

        @foreach ($categorylimit as $categorylimitItem)

        <li class="dropdown"><a href="#">{{ $categorylimitItem->name }}<i class="fa fa-angle-down"></i></a>
            @include('components.childmenu',['categorylimitItem'=>$categorylimitItem])
        </li>
        @endforeach

        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="blog.html">Blog List</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
            </ul>
        </li>

        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>=
