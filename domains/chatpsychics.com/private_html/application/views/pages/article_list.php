<div class="purple-bar">
    <h1>Our Blog</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>


                <h2 style='margin:15px 0;'><?= $title ?></h2>

                <?php
                if ($articles)
                {

                    echo "
				
				<table class='table table-striped table-hover'>";

                    foreach ($articles as $a)
                    {

                        echo "
					<tr>
						<td width='75'>" . date("m/d/y", strtotime($a['datetime'])) . "</td>
						<td><a href='/articles/{$a['category_url']}/{$a['url']}'>{$a['title']}</a></td>
						<td align='right' width='120'><a href='/articles/{$a['category_url']}/{$a['url']}' class='btn btn-primary'>View Article</a></td>
					</tr>
					";
                    }

                    echo "</table>";
                }
                else
                {

                    echo "<p align='left'>There are no articles to show</p>";
                }
                ?>

                <div align='center'>
                    <?php
                    if ($archive)
                    {

                        echo "<a href='/articles' class='btn'>Most Recent Articles</a>";
                    }
                    else
                    {

                        echo "<a href='/articles/archive/{$category}' class='btn'>Article Archive</a>";
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

