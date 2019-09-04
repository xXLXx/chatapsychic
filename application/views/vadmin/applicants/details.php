
<ul class="nav nav-tabs">
    <li class="active"><a href="#info" data-toggle="tab">Personal Information</a></li>
    <li><a href="#technical" data-toggle="tab">Computer / Internet / Technical Information</a></li>
    <li><a href="#qualifications" data-toggle="tab">Qualifications</a></li>
    <li><a href="#experience" data-toggle="tab">Experience</a></li>
    <li><a href="#articles" data-toggle="tab">Articles / Blogs</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="info">
        <h4>Personal Information</h4>
        <table class="table">
            <tr>
                <td>Username:</td>
                <td><?= $username; ?></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><?= $first_name; ?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><?= $last_name; ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?= $gender; ?></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><?= $email; ?></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><?= $phone; ?></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><?= $dob; ?></td>
            </tr>
            <tr>
                <td>Address Line 1:</td>
                <td><?= $address1; ?></td>
            </tr>
            <tr>
                <td>Address Line 2:</td>
                <td><?= $address2; ?></td>
            </tr>
            <tr>
                <td>City/Town:</td>
                <td><?= $city; ?></td>
            </tr>
            <tr>
                <td>State/Province:</td>
                <td><?= $state; ?></td>
            </tr>
            <tr>
                <td>Zip/Postal Code:</td>
                <td><?= $zip; ?></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><?= $country; ?></td>
            </tr>
            <tr>
                <td>SSN/SIN#:</td>
                <td><?= $has_ssn; ?></td>
            </tr>
            <tr>
                <td>U.S. Resident:</td>
                <td><?= $is_us_resident; ?></td>
            </tr>
        </table>
    </div>

    <div class="tab-pane" id="technical">
        <h4>Computer / Internet / Technical Information</h4>
        <table class="table">
            <tr>
                <td>ISP:</td>
                <td><?= $isp; ?></td>
            </tr>
            <tr>
                <td>Computer(yrs old):</td>
                <td><?= $pc_age; ?></td>
            </tr>
            <tr>
                <td>Operating System:</td>
                <td>
                    <?php
                    $i = 0;
                    $names = ["device_mac","device_ipad", "device_ios", "device_droid", "device_other"];
                    foreach ($os as $key => $device)
                    {
                        if ($key !== "divice_names")
                        {
                            echo $device . ":" . $os["divice_names"][$names[$i]] . "<br/>";
                        }
                        $i++;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Fluent in English:</td>
                <td><?= $en_fluent; ?></td>
            </tr>
            <tr>
                <td>Grammar and Communication Skills:</td>
                <td><?= $grammar_rate; ?></td>
            </tr>
            <tr>
                <td>Type at least 60 words per minute accurately:</td>
                <td><?= $typing_skills; ?></td>
            </tr>
            <tr>
                <td>Able to commit to a minimum of 15 hours per week:</td>
                <td><?= $is_committed; ?></td>
            </tr>
            <tr>
                <td>Date available to work:</td>
                <td>
                    <?php
                    foreach (json_decode($date_availability) as $date):
                        echo ucwords($date) . "; ";
                    endforeach;
                    ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="tab-pane" id="qualifications">
        <h4>Qualifications</h4>
        <table class="table">
            <tr>
                <td>Languages / Speak:</td>
                <td><?= $languages; ?></td>
            </tr>
            <tr>
                <td>Areas of Expertise:</td>
                <td>
                    <?php
                    foreach (json_decode($areas_of_expertise) as $expert):
                        echo $expert . "<br/>";
                    endforeach;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Have been given Email Readings previously:</td>
                <td><?= $has_prev_readings; ?></td>
            </tr>
            <tr>
                <td>Skills:</td>
                <td><?= $skills; ?></td>
            </tr>
            <tr>
                <td>Forms of Divination being practice:</td>
                <td><?= $divine_practices; ?></td>
            </tr>
        </table>
    </div>
    <div class="tab-pane" id="experience">
        <h4>Experience</h4>
        <table class="table">
            <tr>
                <td>Years of Reading Experience:</td>
                <td><?= $no_of_years; ?></td>
            </tr>
            <tr>
                <td>Companies:</td>
                <td><?= $companies; ?></td>
            </tr>
        </table>
    </div>
    <div class="tab-pane" id="articles">
        <h4>Articles / Blogs</h4>
        <table class="table">
            <tr>
                <td>
                    <h5>Articles</h5>
                    <?= $articles; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h5>Biography</h5>
                    <?= $bio; ?>
                </td>
            </tr>
        </table>
    </div>
</div>




