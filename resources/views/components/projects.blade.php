<!--================Start Portfolio Area =================-->
<section class="portfolio_area" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-left">
                    <h2>my projects </h2>
                </div>
            </div>
        </div>
        <div class="filters portfolio-filter">
            <ul>
                <li class="active" data-filter="*">all</li>
                @foreach ($categories as $category => $slug)
                    <li data-filter=".{{ $slug }}">{{ $category }}</li>
                @endforeach
            </ul>
        </div>

        <div class="filters-content">
            <div class="row portfolio-grid justify-content-center">
                @foreach ($projects as $project)
                    <div
                        class="col-lg-4 col-md-6 all {{ $project->categories->map(fn($category) => $categories[$category->title])->implode(' ') }}">
                        <div class="portfolio_box">
                            <div class="single_portfolio">
                                <img class="img-fluid w-100 project" src="{{ asset($project->images[0]->url) }}"
                                    alt="">
                                <div class="overlay"></div>
                                <a href="{{ route('project', $project) }}" class="img-gal">
                                    <div class="icon">
                                        <span class="lnr lnr-magnifier"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="short_info">
                                <h4><a href="{{ route('project', $project) }}">{{ $project->title }}</a></h4>
                                <p>{{ $project->technologies->implode('name', ', ') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!--================End Portfolio Area =================-->
