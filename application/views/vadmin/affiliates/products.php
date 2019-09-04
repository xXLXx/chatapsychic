<link type="text/css" href="/media/css/icons.css" rel="stylesheet" />

<script src='/media/javascript/datatables/datatables.min.js'></script>
<link rel="stylesheet" href="/media/javascript/datatables/datatables.css" />

<link type="text/css" href="/media/javascript/jquery.niftymodals/css/component.custom.css" rel="stylesheet" />
<script src="/media/javascript/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>

<script src="/media/javascript/plupload/plupload.full.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>


<div style="padding:20px;background:#FFF;margin:20px;">

    <legend>Affiliate Management </legend>
    <div class="clearfix" style="margin:15px 0;"></div>

    <ul class="nav nav-tabs">
        <li><a href="/vadmin/affiliate_management">Affiliate Members</a></li>
        <li class="active"><a href="/vadmin/affiliate_management/product_groups">Product Groups</a></li>
        <li><a href="/vadmin/affiliate_management/banners">Banner and Ads</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="products">
            <button class="btn btn-primary pull-right btn-upload" style="margin-bottom: 5px;" type="button"><i class="icon-upload"></i> Add New Banner</button>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%">Thumb:</th>
                        <th style="text-align: center">Descriptions:</th>
                        <th style="text-align: center">URL:</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><img src="<?= $product['thumb']; ?>" /></td>
                            <td><?= $product["descriptions"]; ?></td>
                            <td><?= $product["product_url"]; ?></td>
                            <td>&nbsp;</td>
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
            <h3>New Banner & Ads</h3>
            <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body form">
            <div id="contents">
                <div id="progress" class="overlay"></div>
                <div class="progress progress-task" style="height: 4px; width: 15%; margin-bottom: 2px; display: none">
                    <div style="width: 0%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-info">
                    </div>                                    
                </div>

                <div id="container">
                    <a id="pickfiles" href="javascript:;" class="btn btn-default" data-product-id="">Browse</a> 
                </div>
                <input type="hidden" id="sessionid" value="<?= random_string('alnum', 16); ?>" />

                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" /></td>
                    </tr>
                    <tr>
                        <td>Descriptions</td>
                        <td>
                            <textarea></textarea>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-flat"><i class="icon-save"></i> Save</button>
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


        // Uploader scripts
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',
            browse_button: 'pickfiles', // you can pass in id...
            container: document.getElementById('container'), // ... or DOM Element itself
            url: '/vadmin/affiliate_management/upload/',
            unique_names: true,
            resize: {width: 500, height: 500, quality: 100},
            max_retries: 3,
            flash_swf_url: 'Moxie.swf',
            silverlight_xap_url: 'Moxie.xap',
            multipart_params: {
                product_id: $("#pickfiles").data("product-id"),
                session_id: $("#sessionid").val()
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
                    $(".progress-bar").width(file.percent);
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
            alert(myData.product_id);
            $("#pickfiles").attr("data-product-id", myData.product_id);
            //$("#filelist").append("<li><div style='text-align:center'><a href=\"uploads/loan-" + myData.product_id + "/" + myData.filename + "\" target=\"_blank\" title=\"" + myData.filename + "\"><img src=\"" + myData.icon + "\" /></a><span class=\"close remove-file\" data-file-id=\"" + myData.id + "\" title=\"Remove this file\"><i class=\"fa fa-times-circle\"></i></span></div><div><input type=\"text\" placeholder=\"descriptions\" class='attach-desc' data-id='" + myData.id + "' title='Description of this file is automatically saved.' /></div></li>");
        });

        uploader.init();


    });
</script>