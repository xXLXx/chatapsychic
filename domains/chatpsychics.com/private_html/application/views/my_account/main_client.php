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
                <section>
                    <div class="boxed">
                        <div class="border-wrap ">
                            <div class="top"></div>
                            <div class="mid">
                                <div class="inner">
                                    <h2>Apply as a reader</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. </p>

                                </div>
                            </div>
                            <div class="footer-box">
                                <div class="box-btn"><a class="btn btn-primary btn-lg" href="#" role="button">View details</a></div>

                            </div>
                            <div class="curve"></div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="boxed">
                        <div class="border-wrap">
                            <div class="top"></div>
                            <div class="mid">
                                <div class="inner">
                                    <h2>Launch Your Own Psychic Site: <br/> at no cost to you!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                </div>
                            </div>
                            <div class="footer-box">
                                <div class="box-btn"><a class="btn btn-primary btn-lg" href="#" role="button">View details</a></div>
                            </div>
                            <div class="curve"></div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="boxed">
                        <div class="border-wrap">
                            <div class="top"></div>
                            <div class="mid">
                                <div class="inner">
                                    <h2>Interested in both options?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>

                                </div>
                            </div>
                            <div class="footer-box">
                                <div class="box-btn"><a class="btn btn-primary btn-lg" href="#" role="button">View details</a></div>
                            </div>
                            <div class="curve"></div>

                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>
</div>