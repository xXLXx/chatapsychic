<script src='/media/javascript/jqui/jquery-ui-1.8.16.custom.min.js'></script>
<link rel="stylesheet" href="/media/javascript/jqui/css/overcast/jquery-ui-1.8.16.custom.css" />
<script>
    $(document).ready(function ()
    {
        $('.datetime').datepicker({
            ampm: true
        });
    });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="purple-bar">
    <h1>Reader Application Form</h1>
</div>

<div class="content-wrap">
    <div class="row ">
        <div class="col-md-12 content-main">
            <article>
                <p>• Dear Applicant: Please fill in this form. Your information will be kept completely confidential. </p>

                <p>• By submitting this form: You are creating a non-binding “Registration Account”.
                    (You can check the status of your application- by logging on to your new registration account NOTE: Applications may take up to 36hrs to process)</p>

                <p>• All Fields Are Required! (except where indicated as “optional”).</p>
                <p>• Enter N/A where indicated- if not applicable to you. </p>


                <div class="div-error"><?php echo $error; ?></div>
                <form action='/register/reader_submit' id="applicant-form" method='POST' enctype="multipart/form-data">
                    <div class="well form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Personal Information </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Username</label>
                            <div class="col-sm-7">
                                <input type='text' class="form-control" name='username' value='<?= set_value('username') ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Password</label>
                            <div class="col-sm-7">
                                <input type='password' class="form-control" name='password' value='<?= set_value('password') ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Re-Type Password</label>
                            <div class="col-sm-7">
                                <input type='password' name='password2' value='<?= set_value('password2') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">First Name</label>
                            <div class="col-sm-7">
                                <input type='text' name='first_name' value='<?= set_value('first_name') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Last Name</label>
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
                            <label class="col-sm-5 control-label" for="firstname">Country</label>
                            <div class="col-sm-7">                            
<?= $this->system_vars->country_array_select_box('country', set_value('country')) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Email Address</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='email' value='<?= set_value('email') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Phone Number</label>
                            <div class="col-sm-7">                            
                                <input type='text' name='phone' value='<?= set_value('phone') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">Date of Birth</label>
                            <div class="col-sm-7">                            
<?= $this->system_vars->dob_custom('dob', set_value('dob_month'), set_value('dob_day'), set_value('dob_year')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Gender:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='gender' value='Male' <?= set_radio('gender', 'Male') ?>> Male &nbsp; &nbsp; 
                                <input type='radio' name='gender' value='Female' <?= set_radio('gender', 'Female') ?>> Female
                                <input type='radio' name='gender' value='Other' <?= set_radio('gender', 'Other') ?>> Other
                                <br/>(NOTE to applicant: We do not discriminate)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>PLEASE ANSWER THE FOLLOWING AS TRUTHFULLY AS POSSIBLE: </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Are you a U.S. resident?:</b> (Do you file U.S. taxes?)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='us_resident' value='N' <?= set_radio('us_resident', 'N'); ?>> No &nbsp;
                                <input type='radio' name='us_resident' value='Y' <?= set_radio('us_resident', 'Y'); ?>> Yes
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
                            <label class="col-sm-5 control-label">
                                Will you be able to furnish us with your Govt. issued Photo ID 
                                (driver's license/passport/med I.D. card etc.)?                                                                
                            </label>



                            <div class="col-sm-7">                            
                                <input type='radio' name='has_gov_id' value='N' <?= set_radio('has_gov_id', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_gov_id' value='Y' <?= set_radio('has_gov_id', 'Y'); ?>> Yes
                            </div>

                            <label class="col-sm-12 control-label" style="text-align: center">
                                <i>INSTRUCTIONS FOR SENDING YOUR PHOTO I.D.WILL BE EMAILED TO YOU UPON ACCEPTANCE</i>
                            </label>                    
                        </div>



                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Do you know any readers or clients on our site(s)?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_friends' value='N' <?= set_radio('has_friends', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_friends' value='Y' <?= set_radio('has_friends', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Are you related to, or know any other recent applicants to our site(s)?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_relatives' value='N' <?= set_radio('has_relatives', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_relatives' value='Y' <?= set_radio('has_relatives', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Are you willing to be tested?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='for_testing' value='N' <?= set_radio('for_testing', 'N'); ?>> No &nbsp;
                                <input type='radio' name='for_testing' value='Y' <?= set_radio('for_testing', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Are you willing to promote our sites by writing articles and/or blogging?<br/>
                                If you have no experience with this- are you willing to learn?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_willing' value='N' <?= set_radio('is_willing', 'N'); ?>> No &nbsp;
                                <input type='radio' name='is_willing' value='Y' <?= set_radio('is_willing', 'Y'); ?>> Yes
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                List your experience in Article Writing and/or Blogging:
                            </label>
                            <div class="col-sm-7">                            
                                <input type="text" name="writing_years" style="width: 15%; display: inline" class="form-control" value="<?php echo set_value('writing_years'); ?>" /> years
                                <input type='radio' name='has_writing_experience' value='N' <?= set_radio('has_writing_experience', 'N'); ?>> N/A &nbsp;                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Do you have a Skype acct? Skype is required!!!
                                <br/>(It's how the Admin communicates with the Readers)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_skype' value='N' <?= set_radio('has_skype', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_skype' value='Y' <?= set_radio('has_skype', 'Y'); ?>> Yes
                                <br/>
                                <input type="text" placeholder="PLEASE ENTER YOUR SKYPE CONTACT ID HERE" name="skype_id" id="skype_id" class="form-control" value="<?php echo set_value("skype_id"); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Do you have a PayPal acct?
                                <br/>(Required)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_paypal' value='N' <?= set_radio('has_paypal', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_paypal' value='Y' <?= set_radio('has_paypal', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                If you are based in the USA: Do you have a U.S. based checking acct?
                                <br/>(you will need one so that we can pay you via Direct Deposit)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_us_checking' value='N' <?= set_radio('has_us_checking', 'N'); ?>> No &nbsp;
                                <input type='radio' name='has_us_checking' value='Y' <?= set_radio('has_us_checking', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Are you currently on any govt. disability or subsidy program?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_gov_subsidize' value='N' <?= set_radio('is_gov_subsidize', 'N'); ?>> No &nbsp;
                                <input type='radio' name='is_gov_subsidize' value='Y' <?= set_radio('is_gov_subsidize', 'Y'); ?>> Yes
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                <h2>Your Computer / Internet / Technical Information </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="isp">
                                <b>Who is your ISP? (Internet Service Provider)</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='isp' id="isp" value='<?= set_value('isp') ?>' class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>How old is your Computer/Device</b>
                                <br/>(the one you will use for our sites/Readings)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='pc_age' style="width:15%; display: inline;" class="form-control" value='<?= set_value('pc_age') ?>'>/years
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Operating System</b>
                            </label>
                            <div class="col-sm-7">          
                                <input type='checkbox' name='device[]' value='windows' <?= set_checkbox('device[]', 'windows'); ?>> Windows:
                                <input type="text" name="device_win" value="<?php echo set_value("device_win"); ?>" class="form-control" style="width: 40%; display: inline" />
                                (incl which version: 7 8 10 etc)
                                <br/><br/>
                                <input type='checkbox' name='device[]' value='mac' <?= set_checkbox('device[]', 'mac'); ?>> MAC:
                                <input type="text" name="device_mac" value="<?php echo set_value("device_mac"); ?>" class="form-control" style="width: 40%; display: inline" /> <br/><br/>

                                <input type='checkbox' name='device[]' value='ipad' <?= set_checkbox('device[]', 'ipad'); ?>> I-Pad:
                                <input type="text" name="device_ipad" class="form-control" value="<?php echo set_value("device_ipad"); ?>" style="width: 40%; display: inline" /> <br/><br/>
                                <input type='checkbox' name='device[]' value='ios' <?= set_checkbox('device[]', 'ios'); ?>> iOS:
                                <input type="text" name="device_ios" class="form-control" value="<?php echo set_value("device_ios"); ?>" style="width: 40%; display: inline" /> <br/><br/>
                                <input type='checkbox' name='device[]' value='droid' <?= set_checkbox('device[]', 'droid'); ?>> Droid:
                                <input type="text" name="device_droid" class="form-control" value="<?php echo set_value("device_droid"); ?>" style="width: 40%; display: inline" /> <br/><br/>
                                <input type='checkbox' name='device[]' value='other' <?= set_checkbox('device[]', 'other'); ?>> Other:
                                <input type="text" name="device_other" class="form-control" value="<?php echo set_value("device_other"); ?>" style="width: 60%; display: inline" /> <br/><br/>                                
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                <h2>Your Other Qualifications </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Do you read and write English fluently?:</b>
                                (This website supports primarily the English language. 
                                BUT WE WILL CONSIDER ACCEPTING APPLICANTS THAT CAN ALSO GIVE CLIENTS READINGS IN OTHER LANGUAGES.
                                (Applicants who require translation software will not be considered.)
                            </label>
                            <div class="col-sm-7">                            
                                <label><input type='radio' name='en_fluent' value='Y' <?= set_radio('en_fluent', 'Y') ?>> Yes, I am fluent in English </label><br/>
                                <label><input type='radio' name='en_fluent' value='Y' <?= set_radio('en_fluent', 'N') ?>> No, I am NOT fluent in English</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Other Languages:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='languages' class="form-control" value='<?= set_value('languages') ?>'>(optional)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
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
                            <label class="col-sm-5 control-label">
                                <b>Do you type at least 60 words per minute accurately?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='typing_skills' value='N' <?= set_radio('typing_skills', 'N'); ?>> No
                                <input type='radio' name='typing_skills' value='Y' <?= set_radio('typing_skills', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Are you able to commit to a minimum of 15 hours per week?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_committed' value='N' <?= set_radio('is_committed', 'N'); ?>> No
                                <input type='radio' name='is_committed' value='Y' <?= set_radio('is_committed', 'Y'); ?>> Yes
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Are you available to log on to take client readings/calls during Late Hours/“Wee” hours? (from midnight to 3am EST)
                                <br/>
                                NOTE: IT IS REQUIRED THAT YOU AGREE TO DOING “LATE SHIFT READINGS- <u>AT LEAST ONE NIGHT PER WEEK</u>).
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_wee_available' value='N' <?= set_radio('is_wee_available', 'N'); ?>> No
                                <input type='radio' name='is_wee_available' value='Y' <?= set_radio('is_wee_available', 'Y'); ?>> Yes
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                If accepted: Date Available For Starting Work?:
                            </label>
                            <div class="col-sm-7">                            
                                <input type="text" name="start_date" id="start_date" class="form-control" style="width: 30%" value="<?php echo set_value("start_date"); ?>" />                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>What days of the week do you prefer working: </b>
                                <br/>(select ALL if you plan on working 7 days a week - consistently)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='date_avail[]' value='mon' <?= set_checkbox('date_avail[]', 'mon'); ?>> Mondays
                                <input type='checkbox' name='date_avail[]' value='tue' <?= set_checkbox('date_avail[]', 'tue'); ?>> Tuesdays
                                <input type='checkbox' name='date_avail[]' value='wed' <?= set_checkbox('date_avail[]', 'wed'); ?>> Wednesdays
                                <input type='checkbox' name='date_avail[]' value='thu' <?= set_checkbox('date_avail[]', 'thu'); ?>> Thursdays
                                <input type='checkbox' name='date_avail[]' value='fri' <?= set_checkbox('date_avail[]', 'fri'); ?>> Fridays
                                <input type='checkbox' name='date_avail[]' value='sat' <?= set_checkbox('date_avail[]', 'sat'); ?>> Saturdays
                                <input type='checkbox' name='date_avail[]' value='sun' <?= set_checkbox('date_avail[]', 'sun'); ?>> Sundays
                                <label><input type='checkbox' class="checkAll" name='date_avail[]' value='all' <?= set_checkbox('date_avail[]', 'all'); ?>> All</label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Areas of Expertise:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='expertise[]' value='Love / Romance / Relationship Advice' <?= set_checkbox('expertise[]', 'Love / Romance / Relationship Advice'); ?>> Love / Romance / Relationship Advice <br />
                                <input type='checkbox' name='expertise[]' value='Career / Finance / Money Advice' <?= set_checkbox('expertise[]', 'Career / Finance / Money Advice'); ?>> Career / Finance / Money Advice <br />
                                <input type='checkbox' name='expertise[]' value='Tarot Cart Readings' <?= set_checkbox('expertise[]', 'Tarot Cart Readings'); ?>> Tarot Cart Readings <br />
                                <input type='checkbox' name='expertise[]' value='Health' <?= set_checkbox('expertise[]', 'Health'); ?>> Health (WE URGE CAUTION WITH THESE TYPES OF READINGS!) <br />
                                <input type='checkbox' name='expertise[]' value='Animal Communication' <?= set_checkbox('expertise[]', 'Animal Communication'); ?>> Animal Communication <br />
                                <input type='checkbox' name='expertise[]' value='Any Holistic Therapies' <?= set_checkbox('expertise[]', 'Any Holistic Therapies'); ?>> Any Holistic Therapies <br />
                                <input type='checkbox' name='expertise[]' value='Angels / Guides' <?= set_checkbox('expertise[]', 'Angels / Guides'); ?>> Angels / Guides <br />
                                <input type='checkbox' name='expertise[]' value='Channeling / Mediumship' <?= set_checkbox('expertise[]', 'Channeling / Mediumship'); ?>> Channeling / Mediumship <br />
                                <input type='checkbox' name='expertise[]' value='Dream Interpretation' <?= set_checkbox('expertise[]', 'Dream Interpretation'); ?>> Dream Interpretation <br />
                                <input type='checkbox' name='expertise[]' value='Past Life Analysis' <?= set_checkbox('expertise[]', 'Past Life Analysis'); ?>> Past Life Analysis <br />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>What forms of <i>Divination Tools</i> do you use for your Readings?:</b> 
                                (You must choose at least one- Please list all that are applicable- NOTE: Some of these
                                may be used on your profile for our sites- if accepted)
                            </label>
                            <div class="col-sm-7">                            
                                <input type='checkbox' name='divine_practices[]' value='Numerology' <?= set_checkbox('divine_practices[]', 'Numerology'); ?>> Numerology <br />
                                <input type='checkbox' name='divine_practices[]' value='Astrology / Horoscopes' <?= set_checkbox('divine_practices[]', 'Astrology / Horoscopes'); ?>> Astrology / Horoscopes <br />
                                <input type='checkbox' name='divine_practices[]' value='Palm Reading' <?= set_checkbox('divine_practices[]', 'Palm Reading'); ?>> Palm Reading <br />
                                <input type='checkbox' name='divine_practices[]' value='Runes' <?= set_checkbox('divine_practices[]', 'Runes'); ?>> Runes <br />
                                <input type='checkbox' name='divine_practices[]' value='Cartomancy' <?= set_checkbox('divine_practices[]', 'Cartomancy'); ?>> Cartomancy <br />
                                <input type='checkbox' name='divine_practices[]' value='Tarot' <?= set_checkbox('divine_practices[]', 'Tarot'); ?>> Tarot <br />
                                <input type='checkbox' name='divine_practices[]' value='Pendulum' <?= set_checkbox('divine_practices[]', 'Pendulum'); ?>> Pendulum <br />
                                <input type='checkbox' name='divine_practices[]' value='Tea Leaves' <?= set_checkbox('divine_practices[]', 'Tea Leaves'); ?>> Tea Leaves <br />
                                <input type='checkbox' name='divine_practices[]' value='Crystals' <?= set_checkbox('divine_practices[]', 'Crystals'); ?>> Crystals <br />
                                <input type='checkbox' name='divine_practices[]' value='Other' <?= set_checkbox('divine_practices[]', 'Other'); ?>> Other 
                                <input type="text" name="divine_other" value="<?php echo set_value("divine_other"); ?>" class="form-control" style="width: 60%" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Do you consider yourself:
                                <br/>Clairvoyant?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_clairvoyant' value='N' <?= set_radio('is_clairvoyant', 'N'); ?>> No
                                <input type='radio' name='is_clairvoyant' value='Y' <?= set_radio('is_clairvoyant', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">                        
                                Empathic?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_empathic' value='N' <?= set_radio('is_empathic', 'N'); ?>> No
                                <input type='radio' name='is_empathic' value='Y' <?= set_radio('is_empathic', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">                        
                                Clairsentient?
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='is_clairsentient' value='N' <?= set_radio('is_clairsentient', 'N'); ?>> No
                                <input type='radio' name='is_clairsentient' value='Y' <?= set_radio('is_clairsentient', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">                        
                                Other?
                            </label>
                            <div class="col-sm-7">                            
                                <input type="text" name="other_self" value="<?php echo set_value("other_self"); ?>" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12 control-label" style="text-align:center">
                                What method of delivering Readings do you prefer to use (select yes to all that apply to you):
                                <br/><br/>
                            </label>
                            <label class="col-sm-5 control-label">
                                Email:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_email' value='N' <?= set_radio('method_email', 'N'); ?>> No
                                <input type='radio' name='method_email' value='Y' <?= set_radio('method_email', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Chat:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_chat' value='N' <?= set_radio('method_chat', 'N'); ?>> No
                                <input type='radio' name='method_chat' value='Y' <?= set_radio('method_chat', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Phone:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_phone' value='N' <?= set_radio('method_phone', 'N'); ?>> No
                                <input type='radio' name='method_phone' value='Y' <?= set_radio('method_phone', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Video Chat:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_vidchat' value='N' <?= set_radio('method_vidchat', 'N'); ?>> No
                                <input type='radio' name='method_vidchat' value='Y' <?= set_radio('method_vidchat', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                SMS Text:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_sms' value='N' <?= set_radio('method_sms', 'N'); ?>> No
                                <input type='radio' name='method_sms' value='Y' <?= set_radio('method_sms', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Private In Person:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_private_person' value='N' <?= set_radio('method_private_person', 'N'); ?>> No
                                <input type='radio' name='method_private_person' value='Y' <?= set_radio('method_private_person', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Radio:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_radio' value='N' <?= set_radio('method_radio', 'N'); ?>> No
                                <input type='radio' name='method_radio' value='Y' <?= set_radio('method_radio', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                T.V:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_tv' value='N' <?= set_radio('method_tv', 'N'); ?>> No
                                <input type='radio' name='method_tv' value='Y' <?= set_radio('method_tv', 'Y'); ?>> Yes
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Public Venue:
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='method_public_venue' value='N' <?= set_radio('method_public_venue', 'N'); ?>> No
                                <input type='radio' name='method_public_venue' value='Y' <?= set_radio('method_public_venue', 'Y'); ?>> Yes
                            </div>
                        </div>



                        <!--
                        <div class="form-group">
                            <label class="col-sm-5 control-label" for="firstname">
                                <b>Have you given Email Readings previously?:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='radio' name='has_prev_readings' value='N' <?= set_radio('has_prev_readings', 'N'); ?>> No
                                <input type='radio' name='has_prev_readings' value='Y' <?= set_radio('has_prev_readings', 'Y'); ?>> Yes
                            </div>
                        </div>
                        -->

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>List All Your <i>NON</i> Divination Skills (in particular as related to the Internet):</b>
                            </label>
                            <div class="col-sm-7">
                                <label><input type='radio' name='has_other_skills' value='N' <?= set_radio('has_other_skills', 'N'); ?>> N/A</label>
                                <textarea name="skills" placeholder="Type your NON Divination Skills here" class="form-control" style="height: 150px;"><?= set_value('skills'); ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12 control-label">
                                <h2>Your Experience </h2>
                            </label>                    
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Years of Reading Experience:</b>
                            </label>
                            <div class="col-sm-7">                            
                                <input type='text' name='exp_years' class="form-control" style="width:15%; display: inline" value='<?= set_value('exp_years') ?>'> years
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                <b>Companies Worked For:</b> PLEASE TELL US THE COMPANY NAMES (List all please)
                                WITH THE NAME THE CLIENTS KNEW YOU AS: examples: [format = Company\Your name]
                                which means enter your info like this: "Psychic Contact "Joe Light", 
                                TarotQuest "Stargazer", Psychicfair "Suzie", etc.
                            </label>
                            <div class="col-sm-7">                            
                                <textarea name="companies" placeholder="Type the company names here" style="height: 150px;" class="form-control"><?= set_value('companies'); ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12 control-label" for="firstname">
                                <h2>Articles / Blogs </h2>
                            </label>                    
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                "PLEASE ENTER YOUR ARTICLE(s) or Furnish us with links on the web to your
                                blog(s) and/or actual articles written by you (This cannot be left blank)
                            </label>
                            <div class="col-sm-7">     
                                <label><input type='radio' name='has_articles' value='N' <?= set_radio('has_articles', 'N'); ?>> N/A</label>
                                <textarea name="articles" placeholder="List URLs here:" class="form-control" style="height: 150px;"><?= set_value('articles'); ?></textarea>
                                <input type="file" style="margin-top: 5px" name="article_file" size="20" /> (File type: docx, doc, txt)

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                BLOGS:
                            </label>
                            <div class="col-sm-7">     
                                <label><input type='radio' name='has_blogs' value='N' <?= set_radio('has_blogs', 'N'); ?>> N/A</label>
                                <textarea name="blogs" placeholder="List URLs of blogs you have contributed to here:" class="form-control" style="height: 150px;"><?= set_value('blogs'); ?></textarea>                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Add anything else here that you think we may need to know about you
                            </label>
                            <div class="col-sm-7">
                                <label><input type='radio' name='has_bio' value='N' <?= set_radio('has_bio', 'N'); ?>> N/A</label>
                                <textarea name="bio" placeholder="Type anything about you here:" class="form-control" style="height: 150px;"><?= set_value('bio'); ?></textarea>
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
                        <p>
                            <label><input type="checkbox" name="agree_terms" value="Y" <?php echo set_checkbox('agree_terms', 'Y'); ?> /> I agree to the JaysonLynn.Net Inc terms of agreement</label> (click here for details on the agreement)
                        </p>
                        <p>
                            <label><input type="checkbox" name="accept_contractual" value="Y" <?php echo set_checkbox('accept_contractual', 'Y'); ?> /> I acknowledge that if accepted as a Reader for any JaysonLynn.Net Inc. website- that I am being listed as an Independent Contractor</label>
                        </p>
                        <p>
                            <label><input type="checkbox" name="accept_responsibility" value="Y" <?php echo set_checkbox('accept_responsibility', 'Y'); ?> /> I acknowledge that if accepted as a Reader to Read on or for any JaysonLynn.Net Inc website- that I am RESPONSIBLE FOR PAYING MY OWN TAXES FOR ALL MONIES EARNED BY ME FOR FURNISHING READINGS TO JAYSONLYNN.NET CLIENTELE</label>
                        </p>
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
<script src="/media/themes/yello-cool/js/jquery.browser.min.js"></script>

<script>
    $(document).ready(function ()
    {
        $("#start_date").datepicker();

        $(".checkAll").click(function ()
        {
            if ($(this).is(":checked"))
            {
                $("input[name='date_avail[]']").prop("checked", true);
            }
            else
            {
                $("input[name='date_avail[]']").prop("checked", false);
            }
        });

        $("#skype_id").click(function ()
        {
            $("input[name='has_skype']:radio[value=Y]").prop("checked", true);
        });
        $("input[name='has_skype']:radio[value=N]").click(function ()
        {
            $("#skype_id").val("")
        });

        $("textarea[name='skills']").click(function ()
        {
            $("input[name='has_other_skills']:radio[value=N]").prop("checked", false);
        });
        $("textarea[name='articles']").click(function ()
        {
            $("input[name='has_articles']:radio[value=N]").prop("checked", false);
        });
        $("textarea[name='blogs']").click(function ()
        {
            $("input[name='has_blogs']:radio[value=N]").prop("checked", false);
        });
        $("textarea[name='bio']").click(function ()
        {
            $("input[name='has_bio']:radio[value=N]").prop("checked", false);
        });
        $("input[name='writing_years']").click(function ()
        {
            $("input[name='has_writing_experience']:radio[value=N]").prop("checked", false);
        });
        $("input[name='has_writing_experience']:radio[value=N]").click(function ()
        {
            $("input[name='writing_years']").val("")
        });

        $("#btn-submit").click(function ()
        {
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
            
            var os = new Array();
            $("input[name='device[]']").each(function(){
                if ($(this).is(":checked"))
                {
                    os.push($(this).val());
                }
            });

            var applicant = {
                "isp": $("input[name='isp']").val(),
                "pc_age": $("input[name='pc_age']").val(),
                "os": os,
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
            
            console.log(applicant)

            $.ajax({
                url: '/register/checkSettings',
                data: {applicant: applicant},
                type: 'post',
                dataType: 'json',
                success: function (data)
                {
                    if (data.application_status === "rejected")
                    {
                        var msg = data.reject_reasons;
                        alertify.confirm('You might be rejected!', msg, function ()
                        {
                            $('input[name="status"]').val("rejected");
                            $("#applicant-form").submit();
                        }, function ()
                        {
                            ;
                        }).setting('labels', {'ok': 'Continue', 'cancel': 'Cancel'});
                        $(".ajs-header").addClass("btn-danger");
                        $(".ajs-header").css("color", "white");
                        $(".ajs-button.ajs-ok").addClass("btn btn-danger");
                        $(".ajs-button.ajs-cancel").addClass("btn btn-default");
                    }
                    else
                    {
                        $("#applicant-form").submit();
                    }
                },
                error: function ()
                {
                    ;
                }
            });
        });


    });
</script>