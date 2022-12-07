<x-front>
    <!--================Start Portfolio Details Area =================-->
    <section class="portfolio_details_area section_gap">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="project_slider owl-carousel">
                            @foreach ($project->images as $image)
                                <img class="w-100" src="{{ asset($image->url) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5">
                        <div class="portfolio_right_text mt-30">
                            <h4 class="text-uppercase">{{ $project->title }}</h4>
                            {!! $project->about !!}
                        </div>
                    </div>
                </div>
                <h5 class="text-uppercase">Contributions</h5>
                {!! $project->contributions !!}
                <h5 class="text-uppercase">Technologies</h5>
                <ul class="unordered-list">
                    <li>
                        Laravel
                    </li>
                </ul>


            </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

</x-front>
