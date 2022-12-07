<x-front>
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area" id="home">
        <div class="banner_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner_content">
                            <h3>Hello</h3>
                            <h1>I am <span class="name">Renaldy Prasetio</h1>
                            <h5>Web Developer | Android Developer</h5>
                            <div class="d-flex align-items-center">
                                <a class="primary_btn" href="#"><span>Hire Me</span></a>
                                <a class="primary_btn tr-bg" href="#"><span>Get CV</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="home_right_img">
                            <img class="" src="img/banner/home-right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start About Us Area =================-->
    <section class="about_area section_gap" id="about-me">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-5">
                    <div class="about_img">
                        <img class="" src="img/about-us.png" alt="">
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-5">
                    <div class="main_title text-left">
                        <h2>Let Me <br>
                            Introduce <br>
                            myself</h2>
                        <p>
                            Hi! I am Renaldy Prasetio a fresh Computer Science graduate. At the start of 2021, I started
                            my developer journey by joining PT. Anugerah Mentari Bersinar as a Junior Developer.
                        </p>
                        <p>
                            I mostly familiar with Laravel Framework, VueJS and Flutter as my main programming
                            technologies. I have join numerous of projects and start my own projects to hone my skill in
                            this technology era.
                        </p>
                        <a class="primary_btn" href="#"><span>Download CV</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Us Area =================-->

    <x-projects :projects="$projects" :categories="$categories" />
</x-front>
