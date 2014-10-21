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
        <link rel="stylesheet" type="text/css" href="<?= CSSPATH ?>template_admin/style.css">
        <link rel="stylesheet" type="text/css" href="<?= CSSPATH ?>plugins/dataTables.bootstrap.css">
        <?= $_styles ?>

        <script type="text/javascript" src="<?= JSPATH ?>jquery-2.1.1.js"></script>
        <script type="text/javascript" src="<?= JSPATH ?>bootstrap.js"></script>
        <script type="text/javascript" src="<?= JSPATH ?>plugins/dataTables/jquery.dataTables.js"></script>
        <?= $_scripts ?>

    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="navbarcollapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                    </button>
                    <a class="navbar-brand" href="<?= BASEURL . 'admin/admin_index' ?>">FHI HR System</a>
                </div>            
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->userdata('login_state') == TRUE) { ?>
                        <li><a>Welcome <?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname') ?>!</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="a-sett-glyph"><h2 id="h2-sett-glyph"><span class="glyphicon glyphicon-cog"></span></h2></a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= BASEURL . 'admin/logout'?>"></i> Logout</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <?= $main_content ?>
            </div>
        </div>
        <footer>
            <div class="container">
                <center><div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <!-- <p>Copyright &copy; FH International Consulting Inc. 2014</p> -->
                </div>
            </div></center>
        </footer>
    </body>
</html>

<script type="text/javascript">
    $(document).ready( function() {
        $("a.btns").click( function() {
            $("a.btns.active").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
