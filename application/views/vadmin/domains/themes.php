<link type="text/css" href="/media/css/icons.css" rel="stylesheet" />

<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<link type="text/css" href="/media/javascript/jquery.niftymodals/css/component.custom.css" rel="stylesheet" />
<script src="/media/javascript/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>

<script src="/media/javascript/plupload/plupload.full.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>


<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Themes </legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <ul class="nav nav-tabs">
        <li><a href="/vadmin/domain_management">Domain Users</a></li>
        <li><a href="/vadmin/domain_management/domains">Domains</a></li>
        <li><a href="/vadmin/domain_management/designs">Designs</a></li>
        <li class="active"><a href="/vadmin/domain_management/themes">Themes</a></li>
        <li><a href="/vadmin/domain_management/moods">Moods</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="products">
            <button class="btn btn-primary pull-right" style="margin-bottom: 5px;" type="button" id="btn-new"><i class="icon-upload"></i> Add New Theme</button>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 30%">Name:</th>                        
                        <th style="text-align: center">Descriptions:</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($themes as $theme): ?>
                        <tr>
                            <td><?= $theme["name"]; ?></td>
                            <td><?= $theme["descriptions"]; ?></td>
                            <td style="width: 5%;white-space: nowrap">
                                <a href="javascript:void(0)" class="btn-edit" data-id="<?=$theme["id"];?>">Edit</a>&nbsp;
                                <a href="javascript:void(0)" class="btn-delete" data-id="<?=$theme["id"];?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal:Upload box -->
<div class="md-modal colored-header custom-width md-effect-9" id="delete-dlg" style="width: 30%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3>Warning!</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents">            
                Are you sure you want to delete this theme?
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary btn-flat" id="btn-delete"><i class="icon-trash"></i> Delete</a>
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Upload box -->

<!-- Modal:Upload box -->
<div class="md-modal colored-header custom-width md-effect-9" id="theme-dlg" style="width: 70%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3><span id="dlg-title">New</span> Theme</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents">
                <input type="hidden" id="id" value="" />
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" id="name" style="width: 100%" /></td>
                    </tr>                    
                    <tr>
                        <td>Descriptions</td>
                        <td>
                            <textarea id="desc" style="width: 100%; height: 150px"></textarea>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-save"><i class="icon-save"></i> Save</button>
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Upload box -->

<div class="md-overlay"></div>

<script>
    $(document).ready(function () {
        var table = $('#table').DataTable({
            "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]]
        });
        
        $('#btn-new').click(function () {
            $("#id").val("");
            $("#name").val("");
            $("#desc").val("");
            $("#dlg-title").html("New");
            $("#theme-dlg").niftyModal("show");
        });
        
        $(".btn-edit").click(function(){
            $("#id").val($(this).data("id"));
            $("#name").val($(this).parent().prev().prev().html());
            $("#desc").val($(this).parent().prev().html());
            $("#dlg-title").html("Edit");
            $("#theme-dlg").niftyModal("show");
        });
        
        $(".btn-delete").click(function(){
            $("#btn-delete").prop("href", "/vadmin/domain_management/delete_theme?id="+$(this).data("id"));
            $("#delete-dlg").niftyModal("show");
        });

        $("#btn-save").click(function () {
            $(this).attr("disabled", true);
            $.ajax({
                url: "/vadmin/domain_management/save_theme",
                data: {id:$("#id").val(),name:$("#name").val(),url:$("#url").val(),desc:$("#desc").val()},
                type: "post",
                dataType: "json",
                success: function (data) {
                    if(data.success)
                    {
                        $(this).attr("disabled", false);
                        location.reload();
                    }
                }
            });
        });
    });
</script>