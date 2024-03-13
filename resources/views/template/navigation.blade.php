<nav>
    <img src="{{asset('asset/logo-infiniteInsight.png')}}" alt="">
    <div class="area-nav-link">
        <a href="">Home</a>
        <a href="">Category</a>
        <a href="">Find Book</a>
    </div>
    <div class="nav-search">
        <form action="{{route('search')}}">
            <button type="submit">
                <img src="{{asset('asset/search.png')}}" alt="">
            </button>
            <input type="text" name="search">
            <button type="reset">
                <img src="{{asset('asset/cross.png')}}" alt="">
            </button>
        </form>
        <div class="close-search"></div>
    </div>
    <img src="" alt="">
</nav>