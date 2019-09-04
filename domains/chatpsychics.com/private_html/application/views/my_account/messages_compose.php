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

                    <div style='padding-bottom:25px;'>
                        <h2>Compose A New Message</h2>
                    </div>

                    <ul class="nav nav-tabs">
                        <li <?= ($this->uri->segment('3') == '' ? " class=\"active\"" : "") ?>><a href="/my_account/messages">Inbox</a></li>
                        <li <?= ($this->uri->segment('3') == 'outbox' ? " class=\"active\"" : "") ?>><a href="/my_account/messages/outbox">Outbox</a></li>
                        <li <?= ($this->uri->segment('3') == 'compose' ? " class=\"active\"" : "") ?>><a href="/my_account/messages/compose"><span class='icon icon-comment'></span> Compose A New Message</a></li>
                    </ul>

                    <div class="well" style="margin-top: 5px">
                        <form action='/my_account/messages/compose_submit' method='POST'>

                            <table width='100%' class="table">

                                <tr>
                                    <td width='150'><b>Recipient:</b></td>
                                    <td>
                                        <?php
                                        if ($this->uri->segment('4'))
                                        {

                                            echo "User: #{$to} <input type='hidden' name='to' value='{$to}' class='input-mini form-control'>";
                                        }
                                        else
                                        {

                                            echo "
							<select name='to' class='form-control'>
								<option value=''></option>";

                                            foreach ($users as $u)
                                            {

                                                echo "<option value='{$u['id']}'" . set_select('to', $u['id'], ($to == $u['id'] ? TRUE : FALSE)) . ">{$u['username']}</option>";
                                            }

                                            echo "
							</select>
							";
                                        }
                                        ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td width='150'><b>Subject:</b></td>
                                    <td><input type='text' name='subject' class="form-control" value='<?= set_value('subject', $subject) ?>'></td>
                                </tr>

                                <tr>
                                    <td width='150'><b>Message:</b></td>
                                    <td><textarea name='message' class="form-control" style='width:100%;height:150px;'><?= set_value('message', $message) ?></textarea></td>
                                </tr>

                                <tr>
                                    <td width='150'>&nbsp;</td>
                                    <td><input type='submit' name='submit' value='Send Message' class='btn btn-large btn-primary'></td>
                                </tr>

                            </table>

                        </form>
                    </div>

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