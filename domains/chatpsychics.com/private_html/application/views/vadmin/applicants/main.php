<link type="text/css" href="/media/css/icons.css" rel="stylesheet" />

<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<link type="text/css" href="/media/javascript/jquery.niftymodals/css/component.custom.css" rel="stylesheet" />
<script src="/media/javascript/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>

<link type="text/css" href="/media/javascript/jquery.switchbutton/jquery.switchButton.css" rel="stylesheet" />
<script src="/media/javascript/jquery.switchbutton/jquery.switchButton.js" type="text/javascript"></script>

<link type="text/css" href="/media/javascript/jquery.select2/css/select2.min.css" rel="stylesheet" />
<script src="/media/javascript/jquery.select2/js/select2.full.min.js" type="text/javascript"></script>

<style>
    .table select.form-control {
        width: 90% !important;
    }
</style>

<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Applicant Management 
        <div class="dropdown pull-right">
            <a href="javascript:void(0)" data-toggle="dropdown" title="Settings"><i class="icon-cog" style="background-position: -372px -152px; "></i></a>
            <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" id="show-ar-settings" style="font-size: 14px">Auto Reject Settings</a></li>   
            </ul>
        </div>
    </legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <table class="table table-bordered table-striped table-hover" id="table">
        <thead>
            <tr>
                <th>Username:</th>
                <th style="text-align: center;">First Name:</th>
                <th style="text-align: center;">Last Name:</th>
                <th style="text-align:center;">Status:</th>
                <td style="display: none">&nbsp;</td>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicants as $reader): ?>
                <tr>
                    <td><a href="/vadmin/main/edit_record/17/0/<?= $reader['id'] ?>"><?= $reader['username'] ?></a></td>
                    <td style="text-align: center;"><?= ucwords($reader['first_name']); ?></td>
                    <td style="text-align: center;"><?= ucwords($reader['last_name']); ?></td>
                    <td style="text-align: center;">
                        <span id="stat<?= $reader['member_id']; ?>">
                            <?php if ($reader['application_status'] === "rejected"): ?>
                                <a href="javascript:void(0)" title="View Reasons" class="btn-view-reasons" data-user-id="<?= $reader['member_id']; ?>"><?= ucwords($reader['application_status']); ?></a>
                            <?php else: ?>
                                <?= ucwords($reader['application_status']); ?>
                            <?php endif; ?>

                        </span>
                    </td>
                    <td style="display: none">
                        <?php
                        $yes_no = ["y" => "yes", "n" => "no"];

                        echo $reader['member_id'] . " ";
                        echo "gender=" . $reader['gender'] . " ";
                        echo "email=" . $reader['email'] . " ";
                        echo "phone=" . $reader['phone'] . " ";
                        echo "date of birth=" . $reader['dob'] . " ";
                        echo "address line 1=" . $reader['address1'] . " ";
                        echo "address line 2=" . $reader['address2'] . " ";
                        echo "city=" . $reader['city'] . " ";
                        echo "state=" . $reader['state'] . " ";
                        echo "zip=" . $reader['zip'] . " ";
                        echo "country=" . $reader['country'] . " ";
                        echo "ssn/sin=" . $reader['has_ssn'] . " ";
                        echo "U.S. Resident=" . $yes_no[strtolower($reader['is_us_resident'])] . " ";
                        echo "ISP=" . $reader['isp'] . " ";
                        echo "Computer=" . $reader['pc_age'] . " years ";
                        echo "Operating System=" . $reader['os'] . " ";
                        echo "Fluent in english=" . $reader['en_fluent'] . " ";
                        echo "grammar and communication skills=" . $reader['grammar_rate'] . " ";
                        echo "60 words per minute accurately=" . $reader['typing_skills'] . " ";
                        echo "15 hours per week=" . $reader['is_committed'] . " ";
                        echo "date available to work=" . implode(";", json_decode($reader['date_availability'])) . " ";
                        echo "languages=" . $reader['languages'] . " ";
                        echo "areas of expertise=" . implode(";", json_decode($reader['areas_of_expertise'])) . " ";
                        echo "previous email readings=" . $reader['has_prev_readings'] . " ";
                        echo "skills=" . $reader['skills'] . " ";
                        echo "divination practice=" . $reader['divine_practices'] . " ";
                        echo "reading experience=" . $reader['no_of_years'] . " ";
                        echo "companies=" . $reader['companies'] . " ";
                        echo "articles=" . $reader['articles'] . " ";
                        echo "biography=" . $reader['bio'] . " ";
                        ?>
                    </td>
                    <td style="width:175px; text-align: center; white-space: nowrap">
                        <a href='javascript:void(0)' class="btn view-quali" data-user-id="<?= $reader['member_id']; ?>">View Qualifications</a>
                        <button type="button" <?= ($reader['application_status'] === "rejected") ? "disabled='disabled'" : "" ?> class="btn btn-danger btn-reject" data-user-id="<?= $reader['member_id']; ?>">Reject</button>
                        <button type="button" <?= ($reader['application_status'] === "hired") ? "disabled='disabled'" : "" ?> class="btn btn-success btn-hire" data-user-id="<?= $reader['member_id']; ?>">Hire</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal:Details box -->
<div class="md-modal colored-header custom-width md-effect-9" id="details" style="width: 70%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3>Applicant Details</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents" style="height: 550px">
                contents here
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Details box -->


<!-- Modal:Reasons box -->
<div class="md-modal colored-header custom-width md-effect-9" id="reasons" style="width: 60%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3>Reasons to Reject</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="reasons-contents" style="min-height: 150px;">
                <textarea name="reject_reasons" id="reject_reasons" class="form-control" style="width: 98%; height: 150px;" placeholder="Type your text here..."><?= set_value('reject_reasons'); ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat" id="btn-submit-reasons"><i class="icon-save"></i> Submit</button>
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Reasons box -->

<!-- Modal:Auto-Reject Settings -->
<div class="md-modal colored-header custom-width md-effect-9" id="ar-settings" style="width: 80%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3><i class="icon-wrench"></i> &nbsp;Auto Reject - Settings</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 40%">Must have ISP</td>
                    <td><input type="checkbox" name="isp_required" class="switches" id="isp_required" <?=$settings['isp_required']==="true"?"checked='checked'":"";?> /></td>
                </tr>
                <tr>
                    <td>Maximum Age of Computer</td>
                    <td><input type="text" name="min_pc_age" id="min_pc_age" class="form-control" value="<?=$settings['min_pc_age'];?>" /> years</td>
                </tr>
                <tr>
                    <td>Required Operating System</td>
                    <td><input type="text" name="os_required" id="os_required" class="form-control" value="<?=$settings['os_required']?>" /></td>
                </tr>
                <tr>
                    <td>Must Read and Write English Fluently</td>
                    <td><input type="checkbox" name="en_required" class="switches" id="en_required" <?=$settings['en_required']==="true"?"checked='checked'":"";?> /></td>
                </tr>
                <tr>
                    <td>Grammar and Communication must rate</td>
                    <td>
                        <select class="form-control mult-select" multiple="multiple" name="grammar_rate" id="grammar_rate">
                            <?php foreach ($grammar_rates as $key => $grammar_rate): ?>
                            <option value="<?= $key ?>" <?=(in_array($key, $settings['grammar_rate'])) ? "selected='selected'" : ""; ?>><?= $grammar_rate; ?></option>
                            <?php endforeach; ?>                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Must type at least 60 words per minute accurately</td>
                    <td><input type="checkbox" name="type_skills_required" class="switches" id="type_skills_required" <?=$settings['type_skills_required']==="true"?"checked='checked'":"";?> /></td>
                </tr>
                <tr>
                    <td>Must able to commit to a minimum of 15 hours per week</td>
                    <td><input type="checkbox" name="commit_required" class="switches" id="commit_required" <?=$settings['commit_required']==="true"?"checked='checked'":"";?> /></td>
                </tr>
                <tr>
                    <td>Availability to work must be</td>
                    <td>
                        <select class="form-control mult-select" multiple="multiple" name="dates_required" id="dates_required">
                            <?php foreach ($dates as $key => $date): ?>
                                <option value="<?= $key ?>" <?=(in_array($key, $settings['dates_required'])) ? "selected='selected'" : ""; ?>><?= $date; ?></option>
                            <?php endforeach; ?>                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Must also speak (separated by semicolon ; )</td>
                    <td>
                        <textarea class="form-control" style="width: 88%" name="languages" id="languages"><?=$settings["languages"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Must have Areas of Expertise to</td>
                    <td>
                        <select class="form-control mult-select" multiple="multiple" name="expertise_required" id="expertise_required">
                            <?php foreach ($areas_of_expertise as $expertise): ?>
                                <option value="<?= $expertise ?>" <?=(in_array($expertise, $settings['expertise_required'])) ? "selected='selected'" : ""; ?>><?= $expertise; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Must have given Email Readings previously</td>
                    <td><input type="checkbox" name="prev_read_required" class="switches" id="prev_read_required" <?=$settings['prev_read_required']==="true"?"checked='checked'":"";?> /></td>
                </tr>
                <tr>
                    <td>Minimum of Years of Reading Experience</td>
                    <td><input type="text" name="min_years" id="min_years" class="form-control" value="<?=$settings["min_years"];?>" /> years</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-save-settings"><i class="icon-save"></i> Save</button>
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Reasons box -->

<div class="md-overlay"></div>

<script>
    $(document).ready(function () {
        var table = $('#table').DataTable({
            "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]]
        });

        // init switch button
        $(".switches").switchButton();

        // init select2
        $(".mult-select").select2();

        $('.view-quali').click(function () {
            $.ajax({
                url: '/vadmin/applicant_management/view_qualifications',
                data: {id: $(this).data("user-id")},
                type: 'get',
                dataType: 'html',
                success: function (data) {
                    $("#contents").html(data);
                    $("#details").niftyModal("show");
                },
                error: function () {
                    ;
                }
            });
        });

        $('.btn-reject').click(function () {
            $("#btn-submit-reasons").show();
            $('#btn-submit-reasons').data("user-id", $(this).data("user-id"));
            $("#reasons").niftyModal("show");
        });

        $('#btn-submit-reasons').click(function () {
            var member_id = $(this).data("user-id");
            $.ajax({
                url: '/vadmin/applicant_management/reject_applicant',
                data: {id: member_id, reasons: $("#reject_reasons").val()},
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    $("#reasons").niftyModal("hide");
                    $("#reject_reasons").val("");
                    $("#stat" + member_id).html("<a href=\"javascript:void(0)\" title=\"View Reasons\" class=\"btn-view-reasons\" data-user-id=\"" + member_id + "\">Rejected");
                    $(".btn-reject[data-user-id='" + member_id + "']").attr("disabled", true);
                    $(".btn-hire[data-user-id='" + member_id + "']").attr("disabled", false);
                },
                error: function () {
                    ;
                }
            });
        });

        $(document).on("click", ".btn-view-reasons", function () {
            var member_id = $(this).data("user-id");
            $.ajax({
                url: '/vadmin/applicant_management/view_reasons',
                data: {id: member_id},
                type: 'post',
                dataType: 'html',
                success: function (data) {
                    $("#btn-submit-reasons").hide();
                    $("#reject_reasons").val(data);
                    $("#reasons").niftyModal("show");
                },
                error: function () {
                    ;
                }
            });
        });

        // Hire applicant ajax
        $('.btn-hire').click(function () {
            var button_hire = $(this);
            var member_id = button_hire.data("user-id");
            $.ajax({
                url: '/vadmin/applicant_management/hire_applicant',
                data: {id: member_id},
                type: 'post',
                dataType: 'html',
                success: function (data) {
                    button_hire.attr("disabled", true);
                    $("#stat" + member_id).html("Hired");
                    $(".btn-reject[data-user-id='" + member_id + "']").attr("disabled", false);
                },
                error: function () {
                    ;
                }
            });
        });

        $("#show-ar-settings").click(function () {
            $("#ar-settings").niftyModal("show");
        });

        $("#btn-save-settings").click(function () {
            var btn_settings = $(this);
            btn_settings.html("<i class='icon-save'></i> Saving...");
            btn_settings.attr("disabled", true);
            
            var isp_required = $("#isp_required").is(":checked");
            var min_pc_age = $("#min_pc_age").val();
            var os_required = $("#os_required").val();
            var en_required = $("#en_required").is(":checked");
            var grammar_rate = $("#grammar_rate").val();
            var type_skills_required = $("#type_skills_required").is(":checked");
            var commit_required = $("#commit_required").is(":checked");

            var dates_required = [];
            $('#dates_required :selected').each(function (i, selected) {
                dates_required[i] = $(selected).val();
            });
            
            var languages = $("#languages").val();
            
            var expertise_required = [];
            $('#expertise_required :selected').each(function (i, selected) {
                expertise_required[i] = $(selected).val();
            });
            
            var prev_read_required = $("#prev_read_required").is(":checked");
            var min_years = $("#min_years").val();
            
            var values = {
                isp_required: isp_required,
                min_pc_age: min_pc_age,
                os_required: os_required,
                en_required: en_required,
                grammar_rate: grammar_rate,
                type_skills_required: type_skills_required,
                commit_required: commit_required,
                dates_required: dates_required,
                languages: languages,
                expertise_required: expertise_required,
                prev_read_required: prev_read_required,
                min_years: min_years
            };
            
            $.ajax({
                url: '/vadmin/applicant_management/save_settings',
                data: values,
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    $("#ar-settings").niftyModal("hide");
                    btn_settings.html("<i class='icon-save'></i> Save");
                    btn_settings.attr("disabled", false);
                },
                error: function () {
                    ;
                }
            });
        });
    });
</script>