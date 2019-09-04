<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Affiliate Management</legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#members">Affiliate Members</a></li>
        <li><a href="/vadmin/affiliate_management/product_groups">Product Groups</a></li>
        <li><a href="/vadmin/affiliate_management/banners">Banner and Ads</a></li>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($affiliates as $affiliate): ?>
                        <tr>
                            <td><a href="/vadmin/main/edit_record/17/0/<?= $affiliate['id'] ?>"><?= $affiliate['username'] ?></a></td>
                            <td style="text-align: center;"><?= ucwords($affiliate['first_name']); ?></td>
                            <td style="text-align: center;"><?= ucwords($affiliate['last_name']); ?></td>
                            <td style="width:175px; text-align: center; white-space: nowrap"><?= $affiliate['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var table = $('#table').DataTable({
            "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]]
        });
    });
</script>