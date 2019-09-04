<style>
    table td {
        border-top: none !important;
    }
</style>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>

                <div class='pull-left' style='width:200px;'>

                    <div class='btn-group btn-group-vertical' style='width:200px;'>

                        <?= $nav;?>

                    </div>

                </div>

                <div class='pull-right' style='width:520px;'>


                    <h2>Update My Account</h2>

                    <hr />

                    <form action='/my_account/account/save_account' method='POST' enctype="multipart/form-data">

                        <table width='100%' class="table">

                            <tr>
                                <td style='width:150px;'><b>Email Address:</b></td>
                                <td><?= $this->member->data['email'] ?></td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Username:</b></td>
                                <td><?= $this->member->data['username'] ?></td>
                            </tr>

                            <tr><td colSpan='2'><div style='color:#C0C0C0;'>Leave password fields blank to keep your current password</div></td></tr>

                            <tr>
                                <td style='width:150px;'><b>Choose A New Password:</b></td>
                                <td><input type='password' class="form-control" name='password' value='<?= set_value('password') ?>'></td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Re-Type New Password:</b></td>
                                <td><input type='password' class="form-control" name='password2' value='<?= set_value('password2') ?>'></td>
                            </tr>

                            <tr><td colSpan='2'><hr style='margin:10px 0;' /></td></tr>

                            <tr>
                                <td style='width:150px;'><b>First Name:</b> <span style='color:red;'>*</span></td>
                                <td><input type='text' class="form-control" name='first_name' value='<?= set_value('first_name', $this->member->data['first_name']) ?>'></td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Last Name:</b> <span style='color:red;'>*</span></td>
                                <td><input type='text' class="form-control" name='last_name' value='<?= set_value('last_name', $this->member->data['last_name']) ?>'></td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Gender:</b> <span style='color:red;'>*</span></td>
                                <td><div><input type='radio' name='gender' value='Male' <?= set_radio('gender', 'Male', ($this->member->data['gender'] == 'Male' ? TRUE : FALSE)) ?>> Male &nbsp; &nbsp; <input type='radio' name='gender' value='Female' <?= set_radio('gender', 'Female', ($this->member->data['gender'] == 'Female' ? TRUE : FALSE)) ?>> Female</div></td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Date of Birth:</b> <span style='color:red;'>*</span></td>
                                <td>
                                    <?

                                    list($dob_year,$dob_month,$dob_day)=explode("-", $this->member->data['dob']);
                                    echo $this->system_vars->dob_custom('dob', set_value('dob_month', $dob_month), set_value('dob_day', $dob_day), set_value('dob_year', $dob_year));

                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td style='width:150px;'><b>Country:</b> <span style='color:red;'>*</span></td>
                                <td><?= $this->system_vars->country_array_select_box('country', set_value('country', $this->member->data['country'])) ?></td>
                            </tr>

                            <tr><td colSpan='2'><hr style='margin:10px 0;' /></td></tr>

                            <tr>
                                <td style='width:150px;'><b>Profile Image:</b></td>
                                <td>

                                    <img src='<?= $this->member->data['profile_image'] ?>' style='border:solid 1px #000;'>

                                    <div style='padding:10px 0;color:#C0C0C0'>To keep your current profile image, leave the field below blank3</div>

                                    <input type='file' name='profile_image'>

                                </td>
                            </tr>


                            <tr><td colSpan='2'><hr style='margin:10px 0;' /></td></tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><input type='submit' name='submit' value='Save My Profile' class='btn btn-large btn-warning'></td>
                            </tr>

                        </table>

                    </form>

                </div>

            </article>

        </div>
        <div class="col-md-4">
            <aside>
                <?=$this->system_vars->show_side_topics(); ?>
            </aside>
        </div>
    </div>
</div>