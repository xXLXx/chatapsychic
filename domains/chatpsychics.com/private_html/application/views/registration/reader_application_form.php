<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="purple-bar">
    <h1>Reader Application Form</h1>
</div>

<div class="content-wrap">
    <div class="row ">
        <div class="col-md-12 content-main">
            <article>
                <p>Please enter the following information. Your information will be kept completely confidential. </p>
                <p>Required fields are indicated with a red asterisk (<span style='color:red;'>*</span>) </p>
                <div class="div-error"><?php echo $error;?></div>
                <form action='/register/reader_submit' id="applicant-form" method='POST'>
                    <div class="well form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Personal Information </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Username</label>
                            <div class="col-sm-7">
                                <input type='text' class="form-control" name='username' value='<?= set_value('username') ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Password</label>
                            <div class="col-sm-7">
                                <input type='password' class="form-control" name='password' value='<?= set_value('password') ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Re-Type Password</label>
                            <div class="col-sm-7">
                                <input type='password' name='password2' value='<?= set_value('password2') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*First Name</label>
                            <div class="col-sm-7">
                                <input type='text' name='first_name' value='<?= set_value('first_name') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Last Name</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='last_name' value='<?= set_value('last_name') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Address Line 1</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='address1' value='<?= set_value('address1') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Address Line 2</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='address2' value='<?= set_value('address2') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">City/Town</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='city' value='<?= set_value('city') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">State/Province</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='state' value='<?= set_value('state') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Zip/Postal</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='zip' value='<?= set_value('zip') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Country</label>
                            <div class="col-sm-7">                            
                                <?= $this->system_vars->country_array_select_box('country', set_value('country')) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Email Address</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='email' value='<?= set_value('email') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Phone Number</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='phone' value='<?= set_value('phone') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">*Date of Birth</label>
                            <div class="col-sm-7">                            
                                <?= $this->system_vars->dob_custom('dob', set_value('dob_month'), set_value('dob_day'), set_value('dob_year')) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>SSN/SIN</b> (If so, we will ask for it later)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='ssn' value='N' <?= set_radio('ssn', 'N'); ?>> No &nbsp;
                                <input type='radio' name='ssn' value='Y' <?= set_radio('ssn', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Are you a U.S. resident?:</b> (If so, we will ask for it later)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='us_resident' value='N' <?= set_radio('us_resident', 'N'); ?>> No &nbsp;
                                <input type='radio' name='us_resident' value='Y' <?= set_radio('us_resident', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Gender:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='gender' value='Male' <?= set_radio('gender', 'Male') ?>> Male &nbsp; &nbsp; 
                                <input type='radio' name='gender' value='Female' <?= set_radio('gender', 'Female') ?>> Female
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Your Computer / Internet / Technical Information </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Who is your ISP? (Internet Service Provider)</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='isp' value='<?= set_value('isp') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>How old is your Computer</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='pc_age' style="width:15%; display: inline;" class="form-control" value='<?= set_value('pc_age') ?>'>/years
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Operating System</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='os' value='<?= set_value('os') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Do you read and write English fluently?:</b>
                                (This website supports the English language only. Applicants who require translation software
                                will not be considered.)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='en_fluent' value='Y' <?= set_checkbox('en_fluent', 'Y') ?>> Yes, I am fluent in English
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Please rate your grammar and communication skills:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='com_skills' value='1' <?= set_radio('com_skills', '1'); ?>> 1 (Low)
                                <input type='radio' name='com_skills' value='2' <?= set_radio('com_skills', '2'); ?>> 2 (Ok)
                                <input type='radio' name='com_skills' value='3' <?= set_radio('com_skills', '3'); ?>> 3 (Good)
                                <input type='radio' name='com_skills' value='4' <?= set_radio('com_skills', '4'); ?>> 4 (Great)
                                <input type='radio' name='com_skills' value='5' <?= set_radio('com_skills', '5'); ?>> 5 (Excellent)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Do you type at least 60 words per minute accurately?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='typing_skills' value='N' <?= set_radio('typing_skills', 'N'); ?>> No
                                <input type='radio' name='typing_skills' value='Y' <?= set_radio('typing_skills', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Are you able to commit to a minimum of 15 hours per week?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_committed' value='N' <?= set_radio('is_committed', 'N'); ?>> No
                                <input type='radio' name='is_committed' value='Y' <?= set_radio('is_committed', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Date Available For Starting Work?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='date_avail[]' value='mon' <?= set_checkbox('date_avail[]', 'mon'); ?>> Mondays
                                <input type='checkbox' name='date_avail[]' value='tue' <?= set_checkbox('date_avail[]', 'tue'); ?>> Tuesdays
                                <input type='checkbox' name='date_avail[]' value='wed' <?= set_checkbox('date_avail[]', 'wed'); ?>> Wednesdays
                                <input type='checkbox' name='date_avail[]' value='thu' <?= set_checkbox('date_avail[]', 'thu'); ?>> Thursdays
                                <input type='checkbox' name='date_avail[]' value='fri' <?= set_checkbox('date_avail[]', 'fri'); ?>> Fridays
                                <input type='checkbox' name='date_avail[]' value='sat' <?= set_checkbox('date_avail[]', 'sat'); ?>> Saturdays
                                <input type='checkbox' name='date_avail[]' value='sun' <?= set_checkbox('date_avail[]', 'sun'); ?>> Sundays
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Your Qualifications </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Languages | Speak:</b> (Do you read / write English fluently? 
                                This website supports the English language only. Applicants who require translation
                                software will not be considered.)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='languages' class="form-control" value='<?= set_value('languages') ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Areas of Expertise:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='expertise[]' value='Love / Romance / Relationship Advice' <?= set_checkbox('expertise[]', 'Love / Romance / Relationship Advice'); ?>> Love / Romance / Relationship Advice <br />
                                <input type='checkbox' name='expertise[]' value='Career / Finance / Money Advice' <?= set_checkbox('expertise[]', 'Career / Finance / Money Advice'); ?>> Career / Finance / Money Advice <br />
                                <input type='checkbox' name='expertise[]' value='Tarot Cart Readings' <?= set_checkbox('expertise[]', 'Tarot Cart Readings'); ?>> Tarot Cart Readings <br />
                                <input type='checkbox' name='expertise[]' value='Animal Communication' <?= set_checkbox('expertise[]', 'Animal Communication'); ?>> Animal Communication <br />
                                <input type='checkbox' name='expertise[]' value='Any Holistic Therapies' <?= set_checkbox('expertise[]', 'Any Holistic Therapies'); ?>> Any Holistic Therapies <br />
                                <input type='checkbox' name='expertise[]' value='Angels / Guides' <?= set_checkbox('expertise[]', 'Angels / Guides'); ?>> Angels / Guides <br />
                                <input type='checkbox' name='expertise[]' value='Channeling / Mediumship' <?= set_checkbox('expertise[]', 'Channeling / Mediumship'); ?>> Channeling / Mediumship <br />
                                <input type='checkbox' name='expertise[]' value='Dream Interpretation' <?= set_checkbox('expertise[]', 'Dream Interpretation'); ?>> Dream Interpretation <br />
                                <input type='checkbox' name='expertise[]' value='Past Life Analysis' <?= set_checkbox('expertise[]', 'Past Life Analysis'); ?>> Past Life Analysis <br />
                                <input type='checkbox' name='expertise[]' value='Numerology' <?= set_checkbox('expertise[]', 'Numerology'); ?>> Numerology <br />
                                <input type='checkbox' name='expertise[]' value='Astrology / Horoscopes' <?= set_checkbox('expertise[]', 'Astrology / Horoscopes'); ?>> Astrology / Horoscopes <br />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Have you given Email Readings previously?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_prev_readings' value='N' <?= set_radio('has_prev_readings', 'N'); ?>> No
                                <input type='radio' name='has_prev_readings' value='Y' <?= set_radio('has_prev_readings', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>List All Your Skills:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="skills" class="form-control" style="height: 150px;"><?= set_value('skills'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>What forms of divination do you practice?:</b> (List all applicable)
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="divine_practices" class="form-control" style="height: 150px;"><?= set_value('divine_practices'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Your Experience </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Years of Reading Experience:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='exp_years' class="form-control" style="width:15%; display: inline" value='<?= set_value('exp_years') ?>'> years
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Companies Worked For:</b> PLEASE TELL US THE COMPANY NAMES (List all please)
                                WITH THE NAME THE CLIENTS KNEW YOU AS: examples: [format = Company\Your name]
                                which means enter your info like this: "Psychic Contact "Joe Light", 
                                TarotQuest "Stargazer", Psychicfair "Suzie", etc.
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="companies" style="height: 150px;" class="form-control"><?= set_value('companies'); ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Articles / Blogs </h2>
                            </label>                    
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                "PLEASE ENTER YOUR ARTICLE(s) or Furnish us with links on the web to your
                                blog(s) and/or actual articles written by you (This cannot be left blank)
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="articles" class="form-control" style="height: 150px;"><?= set_value('articles'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                Add anything else here that you think we may need to know about you
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="bio" class="form-control" style="height: 150px;"><?= set_value('bio'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>*Captcha</b>
                            </label>
                            <div class="col-sm-7">                            
                                <div class="g-recaptcha" data-sitekey="6LceAxATAAAAAJyJPqyNm-ewf0sroy1fI8_THSYb"></div>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="pending" />
                        <input type="hidden" name="membership" value="<?= isset($_GET['mem']) ? "both" : "reader"; ?>" />

                    </div>
                    <span class="note">
                        By clicking the "Submit Now" button you are attesting to the accuracy and truthfulness of the information you have entered. Any inaccurate information or false statements will result in immediate termination if you are hired.
                    </span >
                    <br>
                    <br>
                    <div class="box-btn">
                        <button type="button" class="btn btn-primary btn-lg" id="btn-submit">Submit Now</button>
                    </div>
                </form>
            </article>

        </div>
    </div>
</div>



<!-- include the style -->
<link rel="stylesheet" href="/media/javascript/alertify/css/alertify.css" />
<link rel="stylesheet" href="/media/javascript/alertify/css/themes/bootstrap.min.css" />
<!-- include the script -->
<script src="/media/javascript/alertify/alertify.min.js"></script>

<script>
    $(document).ready(function () {

        $("#btn-submit").click(function () {

            var dates_avail = new Array();
            $('input:checkbox[name="date_avail[]"]:checked').each(function ()
            {
                dates_avail.push($(this).val());
            });

            var areas_expertise = new Array();
            $('input:checkbox[name="expertise[]"]:checked').each(function ()
            {
                areas_expertise.push($(this).val());
            });

            var applicant = {
                "isp": $("input[name='isp']").val(),
                "pc_age": $("input[name='pc_age']").val(),
                "os": $("input[name='os']").val(),
                "en_fluent": $("input[name='en_fluent']").is(":checked") ? "Y" : "N",
                "grammar_rate": $("input[name='com_skills']:checked").val(),
                "typing_skills": $("input[name='typing_skills']:checked").val(),
                "is_committed": $("input[name='is_committed']:checked").val(),
                "date_availability": dates_avail,
                "spoken_languages": $("input[name='languages']").val(),
                "areas_of_expertise": areas_expertise,
                "has_prev_readings": $("input[name='has_prev_readings']:checked").val(),
                "no_of_years": $("input[name='exp_years']").val()
            };

            $.ajax({
                url: '/register/checkSettings',
                data: {applicant: applicant},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if (data.application_status === "rejected")
                    {
                        var msg = data.reject_reasons;
                        alertify.confirm('You might be rejected!', msg, function () {
                            $('input[name="status"]').val("rejected");
                            $("#applicant-form").submit();
                        }, function () {
                            ;
                        }).setting('labels', {'ok': 'Continue', 'cancel': 'Cancel'});
                        $(".ajs-header").addClass("btn-danger");
                        $(".ajs-header").css("color", "white");
                        $(".ajs-button.ajs-ok").addClass("btn btn-danger");
                        $(".ajs-button.ajs-cancel").addClass("btn btn-default");
                    } else
                    {
                        $("#applicant-form").submit();
                    }
                },
                error: function () {
                    ;
                }
            });
        });


    });
</script>