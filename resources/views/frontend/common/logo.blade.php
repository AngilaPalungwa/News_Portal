<div class="container py-4  ">

    <div class="row ">
        <div class="col-md-4">
            <a href="/">
                <img src="{{ asset("/images/company/$company->logo") }}" width="75%" alt="">
            </a>
        </div>
        <div class="col-md-6 offset-md-2">
            @if (!empty($top_ads))
            <a href="{{ $top_ads->link }}" target="_blank">
                <img src="{{ asset("/ads/$top_ads->image") }}" width="100%" alt="">
            </a>
        @endif

        </div>
    </div>




</div>
