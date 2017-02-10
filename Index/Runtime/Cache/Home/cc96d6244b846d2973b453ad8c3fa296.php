<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<!--[if lt IE 9]>
<script src="http//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php echo ($home["name"]); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/england/Public/images/favicon.gif"/>
    <link rel="stylesheet" href="/england/Public/css/style.css" media="screen"/><!-- MAIN STYLE CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/responsive.css" media="screen"/><!-- RESPONSIVE CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/responsive.css" media="screen"/><!-- RESPONSIVE CSS FILE -->
    <link rel="stylesheet" id="style-color" href="/england/Public/css/colors/blue-color.css" media="screen"/>
    <!-- DEFAULT BLUE COLOR CSS FILE -->
    <link href='http//fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
    <!-- ROBOTO FONT FROM GOOGLE CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/prettyPhoto.css" media="screen"/><!--PRETTYPHOTO CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/font-awesome/font-awesome.min.css" media="screen"/>
    <!-- FONT AWESOME ICONS CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/layer-slider.css" media="screen"/><!-- LAYER SLIDER CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/flexslider.css" media="screen"/><!-- FLEX SLIDER CSS FILE -->
    <link rel="stylesheet" href="/england/Public/css/revolution-slider.css" media="screen"/>
    <!-- REVOLUTION SLIDER CSS FILE -->
    <!-- All JavaScript Files (FOR FASTER LOADING OF YOUR SITE, REMOVE ALL JS PLUGINS YOU WILL NOT USE)-->
    <script type="text/javascript" src="/england/Public/js/jquery.min.js"></script><!-- JQUERY JS FILE -->
    <script type="text/javascript" src="http//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- JQUERY UI JS FILE -->
    <script type="text/javascript" src="/england/Public/js/flex-slider.min.js"></script><!-- FLEX SLIDER JS FILE -->
    <script type="text/javascript" src="/england/Public/js/navigation.min.js"></script><!-- MAIN NAVIGATION JS FILE -->
    <script type="text/javascript" src="/england/Public/js/jquery.layerslider.js"></script><!-- LAYER SLIDER JS FILE -->
    <script type="text/javascript" src="/england/Public/js/layerslider.transitions.js"></script>
    <!-- LAYER SLIDER TRANSITIONS JS FILE -->
    <script type="text/javascript" src="/england/Public/js/map.min.js"></script><!-- GOOGLE MAP JS FILE -->
    <script type="text/javascript" src="/england/Public/js/carousel.js"></script><!-- CAROUSEL SLIDER JS -->
    <script type="text/javascript" src="/england/Public/js/jquery.theme.plugins.min.js"></script>
    <!-- REVOLUTION SLIDER PLUGINS JS FILE -->
    <script type="text/javascript" src="/england/Public/js/jquery.themepunch.revolution.min.js"></script>
    <!-- REVOLUTION SLIDER JS FILE -->
    <script type="text/javascript" src="/england/Public/js/flickr.js"></script><!-- FLICKR WIDGET JS FILE -->
    <script type="text/javascript" src="/england/Public/js/instagram.js"></script><!-- INSTAGRAM WIDGET JS FILE -->
    <script type="text/javascript" src="/england/Public/js/jquery.twitter.js"></script><!--TWITTER WIDGET JS FILE -->
    <script type="text/javascript" src="/england/Public/js/prettyPhoto.min.js"></script><!-- PRETTYPHOTO JS FILE -->
    <script type="text/javascript" src="/england/Public/js/jquery.tooltips.min.js"></script><!-- TOOLTIPS JS FILE -->
    <script type="text/javascript" src="/england/Public/js/isotope.min.js"></script><!--ISOTOPE JS FILE -->
    <script type="text/javascript" src="/england/Public/js/scrolltopcontrol.js"></script><!-- SCROLL TO TOP JS PLUGIN -->
    <script type="text/javascript" src="/england/Public/js/jquery.easy-pie-chart.js"></script><!-- EASY PIE JS FILE -->
    <script type="text/javascript" src="/england/Public/js/jquery.transit.min.js"></script><!-- TRANSITION JS FILE -->
    <script type="text/javascript" src="/england/Public/js/custom.js"></script><!-- CUSTOM JAVASCRIPT JS FILE -->
</head>
<body>
<div id="container">
    <!-- main container starts-->
    <div id="wrapp">
        <!-- main wrapp starts-->
        <header id="header" style="margin-top: 30px">
            <!--header starts -->
            <div class="container">
                <div class="head-wrapp">
                    <a href="<?php echo U('index/index');?>" id="logo"><img
                            src="/england/Public/logo.png" alt="">
                        </a>
                    <!--your logo-->
                    <nav class="top-search" style="margin-top: 15px">
                        <!-- search starts-->
                        <form action="<?php echo U('index/article_list');?>" method="get">
                            <button class="search-btn"></button>
                            <input name="search" class="search-field" type="text" onblur="if(this.value=='')this.value='Search';"
                                   onfocus="if(this.value=='Search')this.value='';" value="Search"/>
                        </form>
                    </nav>
                    <!--search ends -->
                </div>
            </div>
            <div id="main-navigation" class="fixed">
                <!--main navigation wrapper starts -->
                <div class="container">
                    <ul class="main-menu">
                        <?php if(is_array($category)): foreach($category as $key=>$cate): if($cate["url"] == '0'): ?><li><a href="#"><?php echo ($cate["categoryname"]); ?></a>
                                    <?php else: ?>
                                <li><a href="<?php echo ($cate["url"]); ?>"><?php echo ($cate["categoryname"]); ?></a><?php endif; ?>
                            <ul>
                                <?php if(is_array($categories)): foreach($categories as $key=>$it): if($cate["id"] == $it['type']): if($it["url"] == '0'): ?><li><a href="<?php echo U('index/article_list');?>?category=<?php echo ($it["id"]); ?>"><?php echo ($it["categoryname"]); ?></a>
                                            </li>
                                            <?php else: ?>
                                            <li><a href="<?php echo ($it["url"]); ?>"><?php echo ($it["categoryname"]); ?></a></li><?php endif; endif; endforeach; endif; ?>
                            </ul>
                            </li><?php endforeach; endif; ?>
                        <li><a href="<?php echo U('index/change');?>"><?php echo ($home["lan"]); ?></a></li>
                    </ul>
                </div>
            </div>
            <!--main navigation wrapper ends -->
        </header>

<div id="content">
    <div id="small-map" style="height: 80px">
    </div>
    <div class="container">
        <section class="three-fourth">
            <form action="<?php echo U('message/add');?>" id="contact-form" class="simple-form " method="post">
                <div id="error-field">
                </div>
                <fieldset>
                    <i class="icon-user tooltip left" title="Your Name"></i><input type="text" title="Your Name" value="你的姓名" onblur="if(this.value=='')this.value='你的姓名';" onfocus="if(this.value=='你的姓名')this.value='';" type="text" class="text requiredField" name="name"/>
                </fieldset>
                <fieldset>
                    <i class="icon-envelope tooltip left" title="Your Email"></i><input type="text" title="Your Email" value="你的邮箱" onblur="if(this.value=='')this.value='你的邮箱';" onfocus="if(this.value=='你的邮箱')this.value='';" class="email requiredField" name="email"/>
                </fieldset>
                <fieldset>
                    <i class="icon-globe tooltip left" title="Your Website"></i><input type="text" title="Your Website" value="你的微信或者qq" onblur="if(this.value=='')this.value='你的微信或者qq';" onfocus="if(this.value=='你的微信或者qq')this.value='';" class="text" name="wq"/>
                </fieldset>
                <fieldset>
                    <i class="icon-search tooltip left" title="Your School"></i><input type="text" title="Your School" value="你的意向" onblur="if(this.value=='')this.value='你的意向';" onfocus="if(this.value=='你的意向')this.value='';" class="text" name="idea"/>
                </fieldset>
                <fieldset>
                    <i class="icon-user tooltip left" title="Your Recommend"></i><input type="text" title="Your Recommend" value="你的推荐人或推荐机构" onblur="if(this.value=='')this.value='你的推荐人或推荐机构';" onfocus="if(this.value=='你的推荐人或推荐机构')this.value='';" class="text" name="who"/>
                </fieldset>
                <fieldset>
                    <div class="input-title">
                        咨询内容:
                    </div>
                    <textarea cols="30" rows="12" title="Your Message" class="text requiredField" name="message"></textarea>
                </fieldset>
                <div class="three-fourth">
                    <input type="submit" value="发送信息" class="button big grey round"/>
                </div>
            </form>
        </section>
        
<div class="one-fourth sidebar right">
    <div class="widget">
        <h4 class="widget-title">联系方式</h4>
        <?php if(is_array($information)): foreach($information as $k=>$v): endforeach; endif; ?>
        <p><?php echo ($k); ?>： <?php echo ($v); ?></p>
    </div>
    <div>
        <a href="<?php echo U('message/index');?>" class="button grey huge round">联系我们</a>
    </div>
</div>
</div>
</div>
</div>

<!-- 调用脚部文件 -->

<!-- 滚动logo-->
<div class=" clients-wrapp">
    <div class="container">
        <div class="flexslider clients-slider ">
            <ul class="slides client-block">
                <li>
                    <?php if(is_array($limages)): foreach($limages as $key=>$limage): ?><div class="one-fifth">
                            <a href="<?php echo ($limage["url"]); ?>" class="tooltip" title="<?php echo ($limage["information"]); ?>"><img src="<?php echo ($limage["imgurl"]); ?>" alt=""/></a>
                        </div><?php endforeach; endif; ?>
            </ul>
        </div><!-- flex slider ends -->
    </div>
</div>
<section id="copyrights">
    <section class="container">
        <div class="one-half">
            <p>
                Copyright &copy; 2016  All rights reserved.
            </p>
        </div>
        <div class="one-half">
            <ul class="copyright_links">
                <li><a href="#" title="Home">Home</a></li>
            </ul>
        </div>
    </section>
</section>
</div>
<!-- main wrapp starts-->
</div>
<!-- main container ends-->

</body>
</html>