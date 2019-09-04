
<!-- Add fancyBox -->
<link rel="stylesheet" href="/media/fancyapps-fancyBox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/media/fancyapps-fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/media/fancyapps-fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/media/fancyapps-fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/media/fancyapps-fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/media/fancyapps-fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/media/fancyapps-fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/media/fancyapps-fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<div>
    <label>Choose Domain:</label>
    <select id="sel-domain" class="form-control" style="width:50%">
        <option value="">Select Here</option>
        <?php foreach ($domains as $domain): ?>
            <option value="<?= $domain["id"]; ?>" <?= ($domain["id"]) == $selected ? 'selected="selected"' : "" ?>><?= $domain["url"]; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div id="products_gallery">


    <div>
        <ul class="pagination pagination-centered">
            <?php if ($current_page == 1): ?>
                <li class="disabled">
                    <a href="javascript:void(0)" disabled="disabled">Prev</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="/my_account/?p=<?= ($current_page - 1) < 1 ? 1 : $current_page - 1; ?>">Prev</a>
                </li>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                <li <?= $page == $current_page ? 'class="active"' : ''; ?>><a href="/my_account/?p=<?= $page ?>"><?= $page ?></a></li>
            <?php endfor; ?>

            <?php if ($current_page == $total_pages): ?>
                <li class="disabled">
                    <a href="javascript:void(0)" disabled="disabled">Next</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="/my_account/?p=<?= ($current_page + 1) > $total_pages ? $total_pages : $current_page + 1; ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>


    <ul class="thumbnails list">
        <?php if (count($designs) > 0): ?>
            <?php foreach ($designs as $p): ?>
                <li class="span4">
                    <div class="thumbnail">
                        <?php if ($p['is_available'] == 1): ?>
                            <a class="thumbnail fancybox-button" rel="fancybox-button" href="<?= $p['thumb_pic']; ?>" title="<?= $p['descriptions']; ?>">
                                <img data-src="holder.js/160x120" alt="" src="<?= $p['thumb_pic']; ?>">
                            </a>
                        <?php else: ?>
                            <div style="position: relative; left: 0; top: 0;" class="thumbnail">
                                <img style="position: relative; top: 0; left: 0;" alt="" src="<?= $p['thumb_pic']; ?>">
                                <img style="position: absolute; top: 4px; left: 15px;" alt="" src="/media/images/not-available.png">
                            </div>
                        <?php endif; ?>
                        <p><?= $p['descriptions']; ?></p>
                        <span style="text-align: center">
                            <?php if ($p['is_available'] == 1) : ?>

                                <?php if (!$has_requested): ?>
                                    <button class="btn btn-block btn-primary item-action-btn" style="padding: 7px 20px;" type="button" data-id="<?= $p['id']; ?>" data-action="request_promote">Select Design</button>
                                <?php else: ?>
                                    <button class="btn btn-block btn-primary item-action-btn" style="padding: 7px 20px;" type="button" data-id="<?= $p['id']; ?>" data-action="request_promote" disabled="disabled">Select Design</button>
                                <?php endif; ?>


                            <?php else : ?>

                                <?php if ($p['requested_by'] == $this->member->data['id']) : ?>
                                    <button class="btn btn-block item-action-btn" style="padding: 7px 20px;" type="button" data-id="<?= $p['id']; ?>" data-action="cancel_request">Cancel Request</button>
                                <?php else : ?>
                                    <button class="btn btn-block" type="button" style="padding: 7px 20px;" data-id="<?= $p['id']; ?>" data-action="none" disabled="disabled">Select Design</button>
                                <?php endif; ?>

                            <?php endif; ?>
                        </span>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>        
    </ul>
</div>

<style>
    .thumbnail > img {
        width: 100px !important;
        height: 100px !important;
    }

    .span4 {
        width: 140px !important;
    }
</style>

<script type="application/javascript">

    $(document).ready(function() {
    $('.fancybox-button').fancybox({
    prevEffect		: 'elastic',
    nextEffect		: 'elastic',
    closeBtn		: false,
    helpers		: {
    title	: { type : 'inside' },
    buttons	: {},
    thumbs	: {
    width	: 50,
    height	: 50
    }
    }
    });

    $('.fancybox-media').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
    media : {}
    }
    });

    $('button.item-action-btn').click(function(){            
    if( $(this).data('action') == 'request_promote' ){
    var selected = $("#sel-domain").val();        
    if (selected !== "")
    {
    btn_loadingState($(this));
    requestDesign($(this).data('id'), $(this))
    }
    else
    {
    alert("You must choose a domain");
    }
    }
    else if( $(this).data('action') == 'cancel_request' )
    {
    btn_loadingState($(this));
    cancelRequest($(this).data('id'), $(this))
    }
    });
    });

    function btn_enabledState(btn){
    btn.data('action', 'request_promote');
    btn.removeAttr('disabled');
    btn.removeClass('btn-info');
    btn.addClass('btn-primary');
    btn.html('Select Design');
    }

    function btn_loadingState(btn){
    btn.attr('disabled',true);
    btn.removeClass('btn-primary promoteBtn promoteBtn');
    btn.addClass('btn-info');
    btn.html('Processing...');
    }

    function btn_cancel(btn){
    btn.data('action', 'cancel_request');
    btn.removeClass('btn-info btn-primary promoteBtn');
    btn.html('Cancel Request');
    btn.removeAttr('disabled');
    }

    function requestDesign(designId, btn){
    var url = '/my_account/products/request_design';
    $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    data: {
    design_id: designId,
    domain_id: $("#sel-domain").val()
    },
    success: function (data) {
    location.reload();
    },

    }); 
    }

    function cancelRequest(designId, btn){
    var url = '/my_account/products/cancel_request';
    $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    data: {
    design_id: designId,   
    domain_id: $("#sel-domain").val()
    },
    success: function (data) {
    location.reload();
    },
    error: function (data) {
    alert('Oops! Unable to submit your request.');
    btn_cancel(btn);
    }
    });
    }
</script>