
<div class="purple-bar">
    <h1>Our Psychics Online / Earnings</h1>

</div>
<div class="content-wrap">
    <div class="row">
        <div class="content-main psychics">
            <article>
                <?php if (!$this->session->userdata('member_logged')): ?>
                <div align='center' style='margin:0 0 25px 0;'>
                    <h1 style='margin-bottom:0; padding-bottom:0; '>Meet our Professional Psychic Readers!</h1>
                    <div>Login to read more information about each reader and select your favorite.</div>
                </div>
                <?php endif;?>
            </article>
            <div class="well">
                
                
                
        <?php
        if (isset($readers) && $readers)
        {
            // pre ordering 
            $ordered_readers = array();
            $online_readers = array();
            $offline_readers = array();
            $blocked_readers = array();
            $break_readers = array();
            $away_readers = array();
            $busy_readers = array();
            $other_readers = array();
            foreach ($readers as $r)
            {
                switch ($r['status'])
                {
                    case "online":
                        $online_readers[] = $r;
                        break;
                    case "offline":
                        $offline_readers[] = $r;
                        break;
                    case "blocked":
                        $blocked_readers[] = $r;
                        break;
                    case "break":
                        $break_readers[] = $r;
                        break;
                    case "away":
                        $away_readers[] = $r;
                        break;
                    case "busy":
                        $busy_readers[] = $r;
                        break;
                    default:
                        $other_readers[] = $r;
                }
            }
            $ordered_readers = array_merge($ordered_readers, $online_readers);
            $ordered_readers = array_merge($ordered_readers, $offline_readers);
            $ordered_readers = array_merge($ordered_readers, $blocked_readers);
            $ordered_readers = array_merge($ordered_readers, $break_readers);
            $ordered_readers = array_merge($ordered_readers, $away_readers);
            $ordered_readers = array_merge($ordered_readers, $busy_readers);
            $ordered_readers = array_merge($ordered_readers, $other_readers);

            foreach ($ordered_readers as $r)
            {
                $link = "#";
                $target = "_self";
                if ($r['status'] == "online")
                {
                    if (!empty($r['username']))
                    {
                        $link = "/chat/main/index/" . $r['username'];
                        $target = "_blank";
                    }
                }
                
                ?>
                <div class="col-md-3">
                        <section>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href='/profile/{$r['username']}'><img src='<?=$r['profile']?>' class='img-circle' style='width:100px;'></a>
                                    <p><a href='/profile/<?=$r['username']?>'><?=$r['username']?></a></p>
                                </div>
                                <div class="panel-footer clearfix">
                                    <div>
                                        Earnings for the
                                        last two weeks:
                                    </div>
                                    <div class="rate"> $00.00

                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                <?php

                /*echo "
        <div class='reader_div'>
        <div style='float:left;width:110px;text-align:center;'>
        <a href='/profile/{$r['username']}'><img src='{$r['profile']}' class='profile img-polaroid' style='width:100px;'></a>

        <!-- chat button-->

        <div class='btn-group' style='margin:15px 0 0;'>
        <a href='$link' target='$target'  class='btn btn-mini chatButton' data-username='{$r['username']}'></a>
        </div>

        <!-- Mod: status button
        <img src='/media/images/{$r['status']}.jpg' style='width:102px;border:none;margin-top:0px;'>    
        -->                                                    

        </div>

        <div style='float:right;width:150px;overflow:hidden;'>

        <div class='username'><a href='/profile/{$r['username']}'>{$r['username']}</a></div>

        <div style='padding:5px 0 0;'>
        <div class='description'>" . (strlen($r['biography']) > 130 ? substr($r['biography'], 0, 90) . "…" : $r['biography']) . "</div>

        <a href='/profile/{$r['username']}' class='btn btn-mini' style='float:right'>Read Bio</a>

        </div>

        </div>
        <div class='clearfix'></div>
        </div>
        ";
        */
            }

            echo "<div class='clearfix'></div>";
        }
        ?>
                
                
                
                
                
                

            </div>
        </div>
        <div class="row ">
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
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
            </div>
        </div>
    </div>
</div>


<?php
$client_id;
if ($this->session->userdata('member_logged'))
{
    $client_id = $this->session->userdata('member_logged');
}
else
{
    $client_id = '';
}
?>

<div class='content_area'>
    <div align='center' style='margin:0 0 25px 0;'>
        <h1 style='margin-bottom:0; padding-bottom:0; '>Meet our Professional Psychic Readers!</h1>
        <div>Login to read more information about each reader and select your favorite.</div>
    </div>

    <div align='center' style='margin:0 0 45px 0;'>

        <form action='/psychics/search/' method='POST'>

            <input type='hidden' name='page' value='<?= $page ?>'>

            <table cellPadding='5'>
                <tr>
                    <td><?= $this->site->category_select_box('category', $this->input->post('category')) ?></td>
                    <td><input type='text' name='query' value='<?= $this->input->post('query') ?>' style='margin:0;' placeholder='Enter name, username or keyword' class='input-xlarge'></td>
                    <td><input type='submit' value='Search' class='btn btn-primary' style='margin:0;'></td>
                </tr>
            </table>

        </form>

    </div>

    <div class='readerList'>
    </div>

</div>

<script src='/chat/button.js?client_id=<? echo $client_id ?>'></script>