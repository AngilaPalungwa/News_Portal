<nav class="navbar navbar-expand-lg pcolor p-0">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-5 pe-5 py-3 text-white" aria-current="page" href="/">Home</a>
                </li>
                @foreach ($categories as $index => $category)
                    @if ($index < 8)
                        <li class="nav-item">
                            <a class="nav-link fs-5 pe-5 py-3 text-white" aria-current="page"
                                href="{{ route('categoryPage', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    @endif
                @endforeach



            </ul>
        </div>
    </div>
</nav>
