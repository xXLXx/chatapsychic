<aside>
    <?php $side_topics = $this->system_vars->get_side_topics(); ?>
    <?php foreach ($side_topics as $side_topic): ?>
        <section>
            <div class="boxed">
                <div class="border-wrap ">
                    <div class="top"></div>
                    <div class="mid">
                        <div class="inner">
                            <h2><?php echo $side_topic["title"]; ?></h2>
                            <?php echo $this->system_vars->truncateHtml($side_topic["content"], 300); ?>
                        </div>
                    </div>
                    <div class="footer-box">
                        <div class="box-btn"><a class="btn btn-primary btn-lg" href="/<?=$side_topic["url"];?>" role="button">View details</a></div>
                    </div>
                    <div class="curve"></div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</aside>