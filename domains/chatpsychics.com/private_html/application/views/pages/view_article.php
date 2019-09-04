<div class="purple-bar">
    <h1>Articles</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>
                <h2><?= $title ?></h2>
                <div class='caption' style='font-size:14px;'><?= date("F d, Y @ h:i A", strtotime($datetime)) ?> EST</div>

                <hr />

                <div style='line-height:24px;font-size:15px;'><?= nl2br($content) ?></div>
            </article>
        </div>
        <div class="col-md-4">
            <aside>
                <section>
                    <div class="boxed">
                        <div class="border-wrap ">
                            <div class="top"></div>
                            <div class="mid">
                                <div class="inner">
                                    <h2>Apply as a reader</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. </p>

                                </div>
                            </div>
                            <div class="footer-box">
                                <div class="box-btn"><a class="btn btn-primary btn-lg" href="#" role="button">View details</a></div>

                            </div>
                            <div class="curve"></div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="boxed">
                        <div class="border-wrap">
                            <div class="top"></div>
                            <div class="mid">
                                <div class="inner">
                                    <h2>Interested in both options?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                </div>
                            </div>
                            <div class="footer-box">
                                <div class="box-btn"><a class="btn btn-primary btn-lg" href="#" role="button">View details</a></div>
                            </div>
                            <div class="curve"></div>

                        </div>
                    </div>
                </section>
            </aside>
        </div>

    </div>



</div>