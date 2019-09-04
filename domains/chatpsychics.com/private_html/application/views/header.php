<?php
$meta = $this->system_vars->meta_tags($this->uri->uri_string());

if (!isset($meta['title']))
{

    $meta = $this->system_vars->meta_tags();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title><?= $meta['title'] ?></title>

        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta name="Description" content="Psychic Contact offers Online Psychic Chat and Email Readings - free reading for first time clients" />
        <meta name="Keywords" content="Free Psychic Chat, Online Psychic Chat Readings, Free Psychic Readings, chat live online, psychic readers online, free pschic readings, psychics, psychic reading, psychic readings, psychic chat reading, Email Readings, tarot reading, free psychic online chat" />

        <meta name="keywords" content="<?= $meta['keywords'] ?>" />
        <meta name="description" content="<?= $meta['description'] ?>" />
        <meta name="robots" content="all" />

        <script>
            if (typeof console === "undefined" || typeof console.log === "undefined") {
                console = {};
                console.data = [];
                console.log = function (enter) {
                    console.data.push(enter);
                };
            }
        </script>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        
        <script src="/media/themes/yello-cool/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/media/themes/yello-cool/assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- yello-cool start -->
        <!-- Bootstrap core CSS -->
        <link href="/media/themes/yello-cool/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="/media/themes/yello-cool/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"/>

        <!-- Custom styles for this template -->
        <link href="/media/themes/yello-cool/styles.css?v=<?=time();?>" rel="stylesheet"/>
        <!-- yellow cool end -->

        <script src='/media/javascript/placeholder.js'></script>
        <script src='/media/javascript/rating/jquery.raty.min.js'></script>            
        <script src='/media/javascript/jqui/jquery-ui-1.8.16.custom.min.js'></script>
        <link rel="stylesheet" href="/media/javascript/jqui/css/overcast/jquery-ui-1.8.16.custom.css" />

        <style>
            .page-notifs{ margin:20px 20px 0 20px; }
            .datetime{ width:206px !important; cursor:pointer; background-image:url(/media/images/calendar.png); background-position:193px 6px; background-repeat: no-repeat; }
        </style>

        <script>

            $(document).ready(function ()
            {
                $('.datetime').datepicker({
                    ampm: true
                });

                $('.open_reviews').click(function (e) {
                    e.preventDefault();
                    var profile_id = $(this).attr('profile_id');
                    NewWindow('/profile/reviews/' + profile_id, 'expertReviews', 550, 500, '', 'center');
                });

                $('.rating').raty({
                    readOnly: true,
                    starHalf: 'sm-half.png',
                    starOff: 'sm-off.png',
                    starOn: 'sm-on.png',
                    size: 16,
                    half: true,
                    space: false,
                    score: function ()
                    {
                        return $(this).attr('data-rating');
                    }
                });

                $('.favorite').click(function (e) {
                    e.preventDefault();
                    var profile_id = $(this).attr('profile_id');
                    if (profile_id) {
                        $.get('/main/favorite/' + profile_id, function (data)
                        {
                            alert(data.message);
                        }, 'json');
                    } else {
                        alert("You did not set a expert's profile id.");
                    }
                });

                $('input[placeholder], textarea[placeholder]').placeholder();

                $('.submit').click(function (e) {
                    e.preventDefault();
                    $(this).closest('form').submit();
                });
            });

            function NewWindow(mypage, myname, w, h, scroll, pos) {
                if (pos == "random") {
                    LeftPosition = (screen.width) ? Math.floor(Math.random() * (screen.width - w)) : 100;
                    TopPosition = (screen.height) ? Math.floor(Math.random() * ((screen.height - h) - 75)) : 100;
                }
                if (pos == "center") {
                    LeftPosition = (screen.width) ? (screen.width - w) / 2 : 100;
                    TopPosition = (screen.height) ? (screen.height - h) / 2 : 100;
                } else if ((pos != "center" && pos != "random") || pos == null) {
                    LeftPosition = 0;
                    TopPosition = 20
                }
                settings = 'width=' + w + ',height=' + h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=1,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes';
                win = window.open(mypage, myname, settings);
            }

        </script>
        
    </head>

    <body>
  <div class="topbar    ">
      <div class="container">
          <div class="wrap-social pull-right">
              <a href="#"><img src="/media/themes/yello-cool/images/social-fb.png" alt="" /></a>
              <a href="#"><img src="/media/themes/yello-cool/images/social-twitter.png" alt="" /></a>
              <a href="#"><img src="/media/themes/yello-cool/images/social-insta.png" alt="" /></a>
              <a href="#"><img src="/media/themes/yello-cool/images/social-ln.png" alt="" /></a>
          </div>
      </div>
  </div>

  <div class="container">
      <!-- Static navbar -->

      <nav class="navbar navbar-default top-navbar">

          <div class="container-fluid">

              <div class="row">
                  <div class="col-md-3">
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="/"><img src="/media/themes/yello-cool/images/logo.png" alt="" /></a>
                      </div>
                  </div>
                  <div class="col-md-9" id="topnav">

                      <div id="navbar" class="navbar-collapse collapse">

                          <div class="navbar-form navbar-right">

                              <div class="form-group top-signin">
                                  <div class="wrap ">
                                      <?php if (!$this->session->userdata('member_logged')): ?>
                                      <span class="create"><a href="/register/choose_membership">CREATE AN ACCOUNT</a></span>                                      
                                      <span class="sigin"><a href="/register/login">SIGN IN</a></span>
                                      <?php else:?>
                                      <span class="sigin"><a href="/main/logout">SIGN OUT</a></span>
                                      <?php endif;?>
                                  </div>

                              </div>                                                          
                              
                              <div class="visible-sm br"><br></div>

                              <div class="form-group wrap-search">
                                  <div class="input-group  search-group">
                                      <form action="/se/search.php" method="get">
                                          <input type="hidden" name="search" value="1" /> 
                                          <input type="hidden" name="log" value="<?=$this->session->userdata('member_logged');?>" /> 
                                          <input type="text" name="query" id="query" class="form-control" placeholder="Search"/>
                                          <span class="input-group-btn" style="display: inline;">
                                              <button class="btn btn-default" type="submit" style="height: 34px"><img src="/media/themes/yello-cool/images/icon-search.png" alt=""/></button>
                                          </span>
                                      </form>
                                  </div><!-- /input-group -->
                              </div>

                          </div>
                          <div class="clearfix"></div>
                          <ul class="nav navbar-nav">
                              <li><a href="/my_account">Application Status</a></li>
                              <li><a href="/faqs">FAQ</a></li>
                              <li><a href="/psychics">Our Psychics Online / Earnings</a></li>
                              <li><a href="/about-us">About Us</a></li>
                              <li><a href="/blog">Our Blog</a></li>
                              <li><a href="/articles">Articles</a></li>
                              <li><a href="/contact-us">Contact Us</a></li>
                          </ul>
                      </div><!--/.navbar-collapse -->

                      <!--<a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>-->
                  </div>

              </div>
          </div><!--/.container-fluid -->
      </nav>
  </div>