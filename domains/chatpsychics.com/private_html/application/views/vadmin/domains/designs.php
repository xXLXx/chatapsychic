<link type="text/css" href="/media/css/icons.css" rel="stylesheet" />

<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<link type="text/css" href="/media/javascript/jquery.niftymodals/css/component.custom.css" rel="stylesheet" />
<script src="/media/javascript/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>

<script src="/media/javascript/plupload/plupload.full.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>


<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Domain Management </legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <ul class="nav nav-tabs">
        <li><a href="/vadmin/domain_management">Domain Users</a></li>
        <li><a href="/vadmin/domain_management/domains">Domains</a></li>
        <li class="active"><a href="/vadmin/domain_management/designs">Designs</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="products">
            <button class="btn btn-primary pull-right btn-upload" style="margin-bottom: 5px;" type="button"><i class="icon-upload"></i> Upload Design</button>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%">Thumb:</th>
                        <th style="text-align: center">Descriptions:</th>                        
                        <th style="width: 5%">Action:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($designs as $design): ?>
                        <tr>
                            <td><img src="/uploads/<?= $design['filename']; ?>" /></td>
                            <td><?= $design["descriptions"]; ?></td>                            
                            <td><a class="btn-delete" href="javascript:void(0)" data-id="<?=$design["id"];?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal:Upload box -->
<div class="md-modal colored-header custom-width md-effect-9" id="upload-dlg" style="width: 70%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3>Upload Design</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents">
                <div id="filelist"></div>
                <div id="progress" class="overlay"></div>
                <div class="progress progress-task" style="height: 4px; width: 15%; margin-bottom: 2px; display: none">
                    <div style="width: 0%; height: 5px" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-info">
                    </div>                                    
                </div>

                <div id="container">
                    <a id="pickfiles" href="javascript:;" class="btn btn-default" data-id="">Browse</a> 
                </div>
                <input type="hidden" id="session_id" name="session_id" value="" />
                <label style="margin-top: 10px;">Descriptions</label>
                <textarea id="img_descriptions" style="width: 98%; height: 150px"></textarea>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat" id="btn-fin-upload"><i class="icon-upload"></i> Upload</button>
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- Modal:Upload box -->


<!-- Modal:Upload box -->
<div class="md-modal colored-header custom-width md-effect-9" id="delete-dlg" style="width: 30%; z-index: 1040">
    <div class="md-content">
        <div class="modal-header">
            <h3>Warning!</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents">            
                Are you sure you want to delete this design?
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary btn-flat" id="btn-delete"><i class="icon-trash"></i> Delete</a>
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

        $('.btn-upload').click(function () {
            $("#upload-dlg").niftyModal("show");
        });

        $(".btn-delete").click(function () {
            $("#btn-delete").prop("href", "/vadmin/domain_management/delete_design?id=" + $(this).data("id"));
            $("#delete-dlg").niftyModal("show");
        });

        $("#btn-fin-upload").click(function () {
            $(this).prop("disabled", true);
            $.ajax({
                url: "/vadmin/domain_management/finish_upload",
                data: {session_id: $("#session_id").val(), desc: $("#img_descriptions").val()},
                type: "post",
                success: function (data) {
                    $("#upload-dlg").niftyModal("hide");
                    $("#btn-fin-upload").prop("disabled", false);
                    location.reload();
                },
                error: function () {}
            });
        });

        // Uploader scripts
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',
            browse_button: 'pickfiles', // you can pass in id...
            container: document.getElementById('container'), // ... or DOM Element itself
            url: '/vadmin/domain_management/upload/',
            unique_names: true,
            resize: {width: 500, height: 500, quality: 100},
            max_retries: 3,
            flash_swf_url: 'Moxie.swf',
            silverlight_xap_url: 'Moxie.xap',
            multipart_params: {
                id: $("#pickfiles").data("id")
            },
            filters: {
                max_file_size: '10mb',
                mime_types: [
                    {title: "All files", extensions: "jpg,gif,png,xls,xlsx,csv,doc,docx,pdf"},
                ]
            },
            init: {
                FilesAdded: function (up, files) {
                    $(".progress").hide();
                    $(".progress-bar").width(0);
                    up.start();
                },
                UploadProgress: function (up, file) {
                    $(".progress").show();
                    $(".progress-bar").width(file.percent + "%");
                },
                Error: function (up, err) {
                    console.log("\nError #" + err.code + ": " + err.message);
                }
            }
        });

        uploader.bind('FileUploaded', function (upldr, file, object) {
            var myData;
            try {
                myData = eval(object.response);
            } catch (err) {
                myData = eval('(' + object.response + ')');
            }

            $("#pickfiles").attr("id", myData.id);
            $("#session_id").val(myData.session_id);
            $("#filelist").html("<img style='width:15%' src=\"/uploads/" + myData.filename + "\" />");
        });

        uploader.init();


    });
</script>