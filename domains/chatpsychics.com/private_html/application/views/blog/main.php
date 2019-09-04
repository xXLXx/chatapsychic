
<style>

    .blog_entry{ padding:20px; }
    .blog_entry .title a{ font-size:20px; font-weight:bold; text-decoration:none; line-height:28px; }
    .blog_entry .blog_caption{ font-size:12px; color:#C0C0C0; margin:15px 0 0; }
    .blog_entry .pull-left{ width:250px; }
    .blog_entry .pull-right{ width:446px; }
    .blog_entry .read_more{ padding:5px 0 0; }

</style>


<div class="purple-bar">
    <h1>Our Blog</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>


                <?php
                foreach ($posts as $b)
                {

                    $total_comments = $this->blog_model->totalComments($b['id']);

                    echo "
			<div class='blog_entry'>
				<div class='pull-left'>
					" . ($b['image'] ? "<img src='/media/assets/{$b['image']}' width='250' class=\"img-polaroid\" />" : "") . "
				</div>
				<div class='pull-right'>
					<div class='title'><a href='/blog/{$b['url']}'>{$b['title']}</a></div>
					<div class='blog_caption'>Written By: Administrator on " . date("F d, Y", strtotime($b['date'])) . "</div>
					<div class='description'>" . nl2br($b['short_description']) . "</div>
					<div class='read_more'><span class='icon-chevron-right'></span> <a href='/blog/{$b['url']}'>Read More</a>" . ($total_comments > 0 ? " &nbsp; &nbsp; - {$total_comments} Comment(s)" : "") . "</div>
				</div>
				<div class='clearfix'></div>
				<hr />
				
			</div>
			";
                }
                ?>

                <div align='center'>
                    <?php
                    if (isset($pagination))
                    {

                        echo "<div align='center'>{$pagination}</div>";
                    }
                    else
                    {

                        //echo "<a href='/blog/archive' class='btn'>Archived Blog Entries</a>";
                    }
                    ?>
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