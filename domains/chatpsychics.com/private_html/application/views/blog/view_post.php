
	<style>
	
		h1.blog_title{ font-size:20px; font-weight:bold; text-decoration:none; line-height:28px; }
		.comment_div{ padding-bottom:15px; border-bottom:dotted 2px #E0E0E0; margin-bottom:15px; }
	
	</style>
        
        
        <div class="purple-bar">
    <h1>Our Blog</h1>
</div>
<div class="content-wrap">
    <div class="row ">
        <div class="col-md-8 content-main">
            <article>


                
	
		<?=($image ? "<img src='/media/assets/{$image}' width='250' class=\"img-polaroid pull-right\" style='margin-left:25px;margin-bottom:25px;' />" : "")?>
	
		<h1 class='blog_title'><?=$title?></h1>
		<div class='caption' style='font-size:14px;'>By Administrator on <?=date("F d, Y", strtotime($date))?></div>
		<div style='line-height:24px;font-size:15px;'><?=nl2br($content)?></div>
		
		<hr />
		
		<h1>Comments</h1>
		
		<?php
		
			// Show Comments
			if($comments)
			{
			
				foreach($comments as $c)
				{
				
					echo "
					<div class='comment_div'>
						<div>".nl2br($c['comments'])."</div>
						<div class='caption'>From: {$c['username']} on ".date("m/d/y @ h:i A", strtotime($c['datetime']))."</div>
					</div>
					";
				
				}
			
			}
			else
			{
			
				echo "<p>Be the first to comment on this post. Login and use the form below.</p><hr />";
			
			}
		
			// Post Comment
			if($this->session->userdata('member_logged'))
			{
			
				echo "
				<h1>Comment on this post:</h1>
				
				<form action='/blog/submit_comment/{$id}' method='POST'>
					<div class='caption'>Enter your comments in the text field here and click \"Post Comment\" bellow.</div>
					<div><textarea name='comments' style='width:90%;height:75px;'></textarea></div>
					<div style='padding:5px 0 0;'><input type='submit' name='sub' value='Post Comment' class='btn btn-primary'></div>
				</form>
				
				";
			
			}
			else
			{
			
				echo "<p align='center' style='padding:50px;'>To make comments on this blog post, <a href='/blog/login/{$url}'>please login.</a></p>";
			
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

	