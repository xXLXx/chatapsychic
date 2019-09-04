
<style>

    .large_anchor{ color:#489006 !important; font-size:22px !important; text-decoration:none !important; }

    #faq_list{ margin:0; padding:0; }
    #faq_list li{ list-style:none; margin-bottom:25px; }
    #faq_list li a{ display:block; color:orange !important; font-size:14px !important; text-decoration:none !important; background-image:url(/media/images/plus.png); padding-left:20px; background-repeat: no-repeat; background-position:0 1px; }
    #faq_list li a.open{ background-image:url(/media/images/minus.png); }
    #faq_list li .answer{ display:none; padding:10px 0; }

    #faq_list li{  }

</style>

<script>

    $(function ()
    {

        $('#faq_list .title').click(function (e)
        {

            e.preventDefault();

            if ($(this).parent().find('.answer').css('display') == 'none')
            {

                $(this).parent().find('a').addClass('open');
                $(this).parent().find('.answer').show();

            } else
            {

                $(this).parent().find('a').removeClass('open');
                $(this).parent().find('.answer').hide();

            }

        });

    });

</script>


<div class="purple-bar">
    <h1>FAQ</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>


                <div style='float:left;width:48%'>

                    <h2>Applicant FAQs</h2>
                    <div>&nbsp;</div>

                    <ul id='faq_list'>
                        <?php
                        foreach ($applicants as $q)
                        {

                            echo "
					<li>
						<div class='title'><a href='/'>{$q['question']}</a></div>
						<div class='answer'>{$q['answer']}</div>
					</li>";
                        }
                        ?>
                    </ul>

                </div>

                <div style='float:right;width:48%'>

                    <h2>Affiliate FAQs</h2>
                    <div>&nbsp;</div>

                    <ul id='faq_list'>
                        <?php
                        foreach ($affiliates as $q)
                        {

                            echo "
					<li>
						<div class='title'><a href='/'>{$q['question']}</a></div>
						<div class='answer'>{$q['answer']}</div>
					</li>";
                        }
                        ?>
                    </ul>

                </div>

                <div class='clear'></div>



            </article>

        </div>
        <div class="col-md-4">
            <aside>
                <?=$this->system_vars->show_side_topics(); ?>
            </aside>
        </div>
    </div>
</div>