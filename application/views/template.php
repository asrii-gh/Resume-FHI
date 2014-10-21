<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    ob_start("ob_gzhandler"); else
    ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?= $description ?>"/>
        <meta content="<?= $keywords ?>" name="keywords" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
        <title><?= $title ?></title>
        <link rel="shortcut icon" href="<? ?>favicon.png" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" href="<?= CSSPATH ?>bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= CSSPATH ?>template/style.css">
        <?= $_styles ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= JSPATH ?>jquery-2.1.1.js"></script>
        <script type="text/javascript" src="<?= JSPATH ?>bootstrap.js"></script>
        <script type="text/javascript" src="<?= JSPATH ?>home.js"></script>
        <?= $_scripts ?>
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="navbarcollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>  
                </button>
                <?php if ($this->session->userdata('login_state') == TRUE) { ?>
                    <?php if ($this->session->userdata('user_type_id') == 2) { ?>
                        <a href="<?= BASEURL . 'login' ?>" id="home-logo">HR Philippines</a>
                    <?php } else if ($this->session->userdata('user_type_id') == 1) { ?>
                        <a href="<?= BASEURL . 'admin' ?>" id="home-logo">HR Philippines</a>
                    <?php } else { ?> 
                        <a href="<?= BASEURL . 'employer' ?>" id="home-logo">HR Philippines</a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="<?= BASEURL . 'home' ?>" id="home-logo">HR Philippines</a>
                <?php } ?>
            </div>

            <div class="navbar-collapse collapse">                
                <ul class="nav navbar-nav navbar-right" id="ul">
                    <?php if ($this->session->userdata('login_state') == TRUE) { ?>
                        <?php if ($this->session->userdata('user_type_id') == 1) { ?>
                            <li id="sett-logo"><a class="btn" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true"></a></li>
                            <div id="popover-content" class="hide">
                                <form class="form-inline" role="form">
                                    <div class="form-group">
                                        <a href="<?= BASEURL . 'admin/logout'?>" id="setting-logout">Logout</a>                       
                                    </div>
                                </form>
                            </div>
                        <?php } else if ($this->session->userdata('user_type_id') == 2) { ?>
                            <li id="sett-logo"><a class="btn" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true"></a></li>
                            <div id="popover-content" class="hide">
                                <form class="form-inline" role="form">
                                    <div class="form-group">
                                        <a href="<?= BASEURL . 'login/logout'?>" id="setting-logout">Logout</a>                       
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <li id="sett-logo"><a class="btn" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true"></a></li>
                            <div id="popover-content" class="hide">
                                <form class="form-inline" role="form">
                                    <div class="form-group">
                                        <a href="<?= BASEURL . 'employer/logout'?>" id="setting-logout">Logout</a>                       
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    <?php } else {?>
                        <a class="btn btn-default" href="<?= BASEURL . 'login' ?>" id="login-btn">LOGIN</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="content">
        <?= $main_content ?>
    </div>
<br/>
    <footer id="footer">
        <div id="line-footer" >
        </div>
        <div class="container main_footer">
            <div class="footer_wrapper">
                <div class="footer_box" id="about">
                    <b>ABOUT US</b>
                    <p id="par-about">
                        Vivamus tellus diam, pharetra at dictum id, dignissim vel erat. Cras semper molestie odio a commodo. 
                        In bibendum quam elit, semper euismod diam fringilla nec. Aenean lacus enim, ullamcorper interdum sem in, 
                        dictum vestibulum justo. Cras lacinia turpis nec accumsan sagittis. Cras pulvinar ipsum at dictum mattis.
                    </p>
                </div>
                <div class="footer_box" id="positions">
                    <b>HOT POSITIONS LIST</b>
                    <p id="par-positions">
                        <span style="color: #362f2d"><b>1.Compliance Associate</b></span><br>
                        Pellentesque nisl velit, ultricies ut auctor in, maximus eget diam. Cras ac ex tortor.<br>
                        <span style="color: #362f2d"><b>2.Tax Supervisor</b></span><br>
                        Aliquam ac diam eu arcu posuere mattis. Fusce commodo vitae urna lobortis semper.<br>
                        <span style="color: #362f2d"><b>3.Sales Executive</b></span><br>
                        Nullam varius urna interdum ipsum gravida.</p>
                </div>
                <div class="footer_box" id="contact">
                    <b>CONTACT US</b>
                    <p id="par-contact">
                        Address:<br>
                        UG01 Herrera Tower, Rufino Corner Valero<br>
                        Streets, Makati City, Metro Manila, Philippines<br><br>
                        Tel. No.: (02)9142890<br>
                        (+63)9178894680
                    </p>
                    <a href="https://twitter.com/" id="twitter-logo"><img id="twitter-icon" src="http://localhost/Project_fhi/resources/images/extra/twitter icon.png"></a>
                    <a href="https://www.facebook.com/" id="fb-logo"><img id="fb-icon" src="http://localhost/Project_fhi/resources/images/extra/fb icon.png"></a>
                </div>
                
            </div>

        </div>

        <div id="hr">
            <div class="footer_wrapper">
                <div class="container main_footer">
                    <p id="copyright">Copyright <?php echo date('Y'); ?> HR Philippines. All Right Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>

<script type="text/javascript">

    $("[data-toggle=popover]").popover({
        html: true, 
        content: function() {
              return $('#popover-content').html();
            }
    });

    // $('.btn').popover();

</script>
