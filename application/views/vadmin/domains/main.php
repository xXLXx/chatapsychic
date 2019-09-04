<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Domain Management</legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#members">Domain Users</a></li>
        <li><a href="/vadmin/domain_management/domains">Domains</a></li>
        <li><a href="/vadmin/domain_management/designs">Designs</a></li>
        <li><a href="/vadmin/domain_management/themes">Themes</a></li>
        <li><a href="/vadmin/domain_management/moods">Moods</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="members">
            <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th>Username:</th>
                        <th style="text-align: center;">First Name:</th>
                        <th style="text-align: center;">Last Name:</th>
                        <th style="text-align: center;">Email:</th>
                        <th style="text-align: center;">Domain<br/>Requested:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($domain_users as $user): ?>
                        <tr>
                            <td><a href="/vadmin/main/edit_record/17/0/<?= $user['id'] ?>"><?php echo $user['username'] ?></a></td>
                            <td style="text-align: center;"><?php echo ucwords($user['first_name']); ?></td>
                            <td style="text-align: center;"><?php echo ucwords($user['last_name']); ?></td>
                            <td style="width:175px; text-align: center; white-space: nowrap"><?php echo $user['email']; ?></td>
                            <td style="width:175px; text-align: center; white-space: nowrap" 
                                title="<?php echo 
                                    "<img src='/uploads/".$user['domain_request']["filename"]."' />
                                    <strong style='font-size:14px'>Domain Name: " . $user["domain_request"]["name"] . "</strong> " . 
                                    "<br/>".$user["domain_request"]["descriptions"] ?>">
                                    <?= $user['domain_request']["url"]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#table').DataTable({
            "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]]
        });
        $(document).tooltip();
    });

    $.widget("ui.tooltip", $.ui.tooltip, {
        options: {
            content: function () {
                return $(this).prop('title');
            }
        }
    });
</script>