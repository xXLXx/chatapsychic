<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="purple-bar">
    <h1>Contact Us</h1>
</div>

<div class="content-wrap">
    <div class="row ">
        <div class="col-md-12 content-main">
            <article>


                <p>Please use the form below to contact us. We will respond in a timely manner.</p>
                <div class="div-error"><?php echo $error;?></div>
                <form action='/contact/submit' method='POST' style='margin:15px 0 0;padding-right:10px;'>

                    <div class="well form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="name">*Your Name:</label>
                            <div class="col-sm-7">
                                <input type='text' name='name' class="form-control" id="name" value='<?= set_value('name') ?>'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="email">*Your Email Address:</label>
                            <div class="col-sm-7">
                                <input type='text' name='email' class="form-control" id="email" value='<?= set_value('email') ?>'>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="phone">*Your Phone Number:</label>
                            <div class="col-sm-7">
                                <input type='text' name='phone' class="form-control" id="phone" value='<?= set_value('phone') ?>'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="username"><b>Your Username:</b><div class='caption'>(If you have one)</div></label>
                            <div class="col-sm-7">
                                <input type='text' name='username' class="form-control" id="username" value='<?= set_value('username') ?>'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="subject"><b>Subject:</b></label>
                            <div class="col-sm-7">
                                <select name="subject" id="subject" class="form-control">
                                    <option value=''>Subject</option>
                                    <option value="General Help"<?= set_select('subject', 'General Help') ?>>General Help</option>
                                    <option value="Report Abuse"<?= set_select('subject', 'Report Abuse') ?>>Report Abuse</option>
                                    <option value="Report Page Error"<?= set_select('subject', 'Report Page Error') ?>>Report Page Errors</option>
                                    <option value="Suggestions"<?= set_select('subject', 'Suggestions') ?>>Suggestions</option>
                                    <option value="Chat Question"<?= set_select('subject', 'Chat Question') ?>>Chat Question</option>
                                    <option value="Affiliate Question"<?= set_select('subject', 'Affiliate Question') ?>>Affiliate Question</option>
                                    <option value="Become An Expert"<?= set_select('subject', 'Become An Expert') ?>>Become A Expert Question</option>
                                    <option value="Other, No Listed"<?= set_select('subject', 'Other, No Listed') ?>>Other, Not Listed</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="comments"><b>Comments / Questions:</b></label>
                            <div class="col-sm-7">
                                <textarea name='comments' id="comments" class="form-control" rows='10' cols='50'><?= set_value('comments') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="comments">
                                <b>*Captcha</b>
                            </label>
                            <div class="col-sm-7">
                                <div class="g-recaptcha" data-sitekey="6LceAxATAAAAAJyJPqyNm-ewf0sroy1fI8_THSYb"></div>
                            </div>
                        </div>

                    </div>

                    <br>
                    <br>
                    <div class="box-btn">
                        <input type='submit' name='submit' value='Send Inqury' class="btn btn-primary btn-lg" />
                    </div>

                </form>
                
            </article>

        </div>
    </div>
</div>