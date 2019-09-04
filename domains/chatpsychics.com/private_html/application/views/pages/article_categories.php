	
<style>

    .ulp{ padding:0; margin:0; }
    .ulp li{ list-style:none; }
    .ulp li span{ color:#C0C0C0; font-size:12px; }

    .article_div{ margin:0 0 25px 0; }
    .article_div .title a{ font-size:16px; font-weight:bold;  }
    .article_div .description { font-size:14px; color:#666; line-height:20px; }

</style>



<div class="purple-bar">
    <h1><?= $title ?></h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>




                <div class='pull-left' style='width:200px;'>

                    <h2 style='margin:15px 0 15px;'>Article Categories</h2>

                    <ul class='ulp'>
                        <?php
                        foreach ($this->site->get_categories() as $c)
                        {

                            $totalArticles = $this->db->query("SELECT id FROM articles WHERE category_id = {$c['id']} and approved = 1 ")->num_rows();

                            if ($totalArticles > 0)
                            {

                                echo "<li><a class='btn' style='width:100%;text-align:left;margin-bottom:10px;' href='/articles/{$c['url']}' style='font-weight:Bold;'><b>{$c['title']}</b> <span style='color:#949494;'>({$totalArticles} articles)</span></a></li>";
                            }
                        }
                        ?>
                    </ul>

                </div>

                <div class='pull-right' style='width:530px;'>

                    <h2 style='margin:15px 0 15px;'><?= $title ?></h2>

                    <hr />

                    <?php
                    if ($articles)
                    {

                        foreach ($articles as $a)
                        {

                            echo "
						<div class='article_div'>
							<div class='title'><a href='/articles/{$a['category_url']}/{$a['url']}'>{$a['title']}</a></div>
							<div class='description'>" . substr($a['content'], 0, 250) . "...</div>
						</div>
						";
                        }
                    }
                    else
                    {

                        echo "<p align='left'>There are no articles to show</p>";
                    }
                    ?>

                    <div align='center'>

                        <?php
                        if (isset($category['url']))
                        {

                            echo "<hr />";

                            if ($archive)
                            {

                                echo "<div style='padding:10px 0;'>" . $pagination . "</div>";
                            }
                            else
                            {

                                //echo "<a href='/articles/{$category['url']}/archive' class='btn'>Article Archive</a>";
                            }
                        }
                        ?>
                    </div>

                </div>

                <div class='clearfix'></div>


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





