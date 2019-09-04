<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="purple-bar">
    <h1>Affiliate Application Form</h1>
</div>

<div class="content-wrap">
    <div class="row ">
        <div class="col-md-12 content-main">
            <article>
                <p>Please enter the following information. Your information will be kept completely confidential. </p>
                <p>Required fields are indicated with a red asterisk (<span style='color:red;'>*</span>) </p>
                <div class="div-error"><?php echo $error;?></div>
                <form action='/register/submit' method='POST'>
                    <div class="well form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Email Address:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='email' value='<?= set_value('email') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Username:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='username' value='<?= set_value('username') ?>' class="form-control">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Password:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='password' name='password' value='<?= set_value('password') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Re-Type Password:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='password' name='password2' value='<?= set_value('password2') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*First Name:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='first_name' value='<?= set_value('first_name') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Last Name:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='last_name' value='<?= set_value('last_name') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Gender:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <div><input type='radio' name='gender' value='Male' <?= set_radio('gender', 'Male') ?>> Male &nbsp; &nbsp; <input type='radio' name='gender' value='Female' <?= set_radio('gender', 'Female') ?>> Female</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Date of Birth:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <?= $this->system_vars->dob_custom('dob', set_value('dob_month'), set_value('dob_day'), set_value('dob_year')) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Country:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <?= $this->system_vars->country_array_select_box('country', set_value('country')) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Captcha:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <div class="g-recaptcha" data-sitekey="6LceAxATAAAAAJyJPqyNm-ewf0sroy1fI8_THSYb"></div>
                            </div>
                        </div>

                    </div>

                    <div>

                        <div>
                            <input type='checkbox' name='newsletter' value='1' <?= set_checkbox('newsletter', '1', TRUE) ?>>
                            I want to receive the newsletter. (Get coupons and special promotions)
                        </div>
                        <div>
                            <input type='checkbox' name='terms' value='1' <?= set_checkbox('terms', '1') ?>>
                            I have read and agreed to all the Member <a href='/terms' target='_blank'>Terms and Conditions</a> <span style='color:red;'>*</span>
                        </div>

                    </div>



                    <br>
                    <br>
                    <div class="box-btn">
                        <input type="submit" value="Register" class='btn btn-primary btn-large'>
                    </div>
                </form>
            </article>

        </div>
    </div>
</div>