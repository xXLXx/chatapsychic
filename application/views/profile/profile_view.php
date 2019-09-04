<style>

    .desc{ margin-bottom:35px; line-height:22px; }

</style>

<div class="purple-bar">
    <h1>Profile View</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>


                <h2 style='margin:15px 0;'><?= $title ?></h2>

                <?php
                $this->load->view('profile/badge');

                echo "
			<h2>Biography</h2>
			<div class='desc'>" . nl2br($this->reader->data['biography']) . "</div>
			
			<h2>Area of Expertise</h2>
			<div class='desc'>" . nl2br($this->reader->data['area_of_expertise']) . "</div>
			";
                if (count($testis) > 0)
                {
                    echo "<h2>Testimonials</h2>";
                    echo "<table style='margin-top:5px;' class='table table-bordered'>";
                    echo "<tr>
                        <th>Chat ID</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Username</th>
                        <th>Review</th>
                      </tr>";
                    foreach ($testis as $t)
                    {
                        echo "<tr>
                                <td style='vertical-align:top;width:50px;'>{$t['chat_id']}</td>
                                <td style='vertical-align:top;width:200px;'>" . date("m/d/Y @ h:i:s a", strtotime($t['datetime'])) . "</td>
                                <td style='vertical-align:top;width:50px;'>{$t['rating']}</td>
                                <td style='vertical-align:top;width:100px;'>{$t['username']}</td>
                                <td>" . nl2br($t['review']) . "</td>
                         </tr>";
                    }
                    echo "</table>";
                }
                ?>


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