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
                    <div class='well'>
                        <div class='pull-left' style='width:445px;'>
                            <div class="pull-left" style="width:100px;">
                                <div align="center">
                                    <a href='/my_account/account' style="font-size:11px;"><img src="<?= $this->member->data['profile_image'] ?>" class="img-polaroid" width="75" /></a>
                                    <div><a href='/my_account/account' style="font-size:11px;">Change Image</a></div>
                                </div>
                            </div>
                            <div class="pull-left" style="width:250px;margin-left:10px;">
                                <h2 style='margin-top:10px;padding-top:10px;line-height:0;'>Hi <?= $this->member->data['first_name'] ?> <?= $this->member->data['last_name'] ?></h2>
                                <span>Username: <?= $this->member->data['username'] ?></span>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class='pull-right' style='width:190px;text-align:right;'>        
                            <?php if ($this->member->data['member_type'] !== "affiliate"): ?>
                                <div style='margin:10px 0 0;'>
                                    <h4>Status: <?= ucwords($this->member->data['application_status']); ?></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                    
                    <?=$gallery;?>
                    
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