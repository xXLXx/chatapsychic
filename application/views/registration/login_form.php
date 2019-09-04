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
            <?=$this->system_vars->show_side_topics(); ?>
        </div>
    </div>
</div>