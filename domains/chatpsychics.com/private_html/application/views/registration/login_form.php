<script>
    /*
     function showFeaturedReader()
     {
     var url = "/ajax_functions.php?mode=showFeaturedReader";
     
     $.ajax({
     url: url,
     cache: false,
     success: function (html) {
     $("#featuredReader").html(html);
     }
     });
     }
     
     function showReaderList()
     {
     var url = "/ajax_functions.php?mode=showReaderList&count=5";
     
     $.ajax({
     url: url,
     cache: false,
     success: function (html) {
     $("#readersList").html(html);
     }
     });
     }
     
     
     function OpenTestimonialsWindow(reader_id)
     {
     url = "<?= SITE_URL ?>/modules/testimonials/show.php?reader_id=" + reader_id;
     newwin = window.open(url, "testimonials", "scrollbars=yes,menubar=no,resizable=1,location=no,width=600,height=360,left=200,top=200");
     newwin.focus();
     }
     
     
     var mytimer = setInterval("showReaderList()", 10000);
     var mytimer2 = setInterval("showFeaturedReader()", 10000);
     
     $(document).ready(function () {
     showFeaturedReader();
     showReaderList();
     });
     */
</script>


<div class="purple-bar">
    <h1>Sign In</h1>
</div>

<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>

                <form action="/register/login_submit" method="post" id="loginform">
                    <div class="well form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-5 control-label" for="firstname">*Username</label>
                        <div class="col-sm-7">
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label" for="lastname">*Password</label>
                        <div class="col-sm-7">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    
                    <span>Need an account?	<a href="/register/">Register Here</a></span><br/>
                    <span>Forget your password?	<a href="/register/forgot_password">Click here</a></span><br/>
                    <span>Having trouble in signing-in?	<a href="/contact">Contact Us</a></span>
                </div>
                    
                <span class="note">By clicking the "Submit Now" button you are attesting to the accuracy and truthfulness of the information you have entered. Any inaccurate information or false statements will result in immediate termination if you are hired.</span  >
                <br>
                <br>
                <div class="box-btn"><button type="submit" class="btn btn-primary btn-lg btn-submit" role="button">Submit Now</button></div>
                </form>
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