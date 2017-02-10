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
<!-- header ends-->
<div id="layerslider">
    <!--layer slider starts-->
    <div class="slider-shadow-top">
    </div>
    <div class="slider-shadow-bottom">
    </div>
    <?php if(is_array($gimages)): foreach($gimages as $key=>$gimage): ?><div class="ls-layer"
             style="slidedirection: top; slidedelay: 6000; durationin: 1500; durationout: 1500; delayout: 500;">
            <img src="<?php echo ($gimage["imgurl"]); ?>" class="ls-bg" alt="">

            <h1 class="ls-s3 ls_large_text_01"
                style="position: absolute; top:100px; left: 490px; slidedirection : top; slideoutdirection : top; durationin : 3000; durationout : 750; easingin : easeInOutQuint; easingout : easeInBack; delayin : 1000;">
                <?php echo ($gimage["information"]); ?></h1>
            <a class="button huge color round ls-s8" href="<?php echo ($gimage["url"]); ?>"
               style="position: absolute; top:270px; left: 490px; slidedirection : bottom; slideoutdirection : bottom; durationin : 3000; durationout : 750; easingin : easeInOutQuint; easingout : easeInOutQuint; delayin : 1100;">详情</a>
        </div><?php endforeach; endif; ?>
</div>
<!--layer slider ends-->
<div id="content">
    <div class="home-intro"><!-- home intro starts -->
        <div class="container">
            <div class="three-fourth">
                <p style="margin-top:19px"><?php echo ($home["introduction"]); ?></p>
            </div>
            <div class="one-fourth">
                <a href="<?php echo U('message/index');?>" class="button grey huge round">联系我们</a>
            </div>
        </div>
    </div>


    <!--home intro ends-->
    <div class="container">
        <?php if(is_array($articles_1)): foreach($articles_1 as $key=>$article): ?><div class="one-third">
                <img src="<?php echo ($article["cover"]); ?>" style="height: 150px;width: 300px">
            </div><?php endforeach; endif; ?>
    </div>
    <div class="container">
        <?php if(is_array($articles_1)): foreach($articles_1 as $key=>$article1): ?><div class="one-third">
                <div class="feature-block"><!-- features blocks starts -->
                    <div class="feature-block-title">
                        <div class="feature-block-icon">
                            <i class="icon-lightbulb"></i><span></span>
                        </div>
                        <a href="<?php echo U('index/article');?>?id=<?php echo ($article["id"]); ?>"><h4><?php echo ($article1["title"]); ?></h4></a>
                        <a href="<?php echo U('index/article_list');?>?category=<?php echo ($article["category"]); ?>"><h6>
                            <?php echo ($article1["categoryname"]); ?></h6></a>
                    </div>
                    <div style="width:100%;height:120px;overflow: hidden;"><?php echo ($article1["abstract"]); ?></div>
                </div>
            </div><?php endforeach; endif; ?>
    </div>
    <div class="intro-features"><!-- intro features panel starts -->
        <div class="container">
            <h4><?php echo ($home["categoryname"]); ?></h4>
            <div class="slidewrap">
                <!--project carousel starts-->
                <ul class="slider" id="sliderName">
                    <li class="slide"><!-- carousel item starts -->
                        <?php if(is_array($articles_2)): foreach($articles_2 as $key=>$article2): ?><div class="one-fourth">
                                <div class="item-wrapp">
                                    <div class="portfolio-item">
                                        <a href="<?php echo U('index/article');?>?id=<?php echo ($article["id"]); ?>" class="item-permalink"><i class="icon-link"></i></a>
                                        <a href="<?php echo ($article["cover"]); ?>"
                                           data-rel="prettyPhoto"
                                           class="item-preview"><i class="icon-zoom-in"></i></a>
                                        <img src="<?php echo ($article["cover"]); ?>" alt="" style="width: 219px;height: 151px;"/>
                                    </div>
                                    <div class="portfolio-item-title">
                                        <a href="<?php echo U('index/article');?>?id=<?php echo ($article["id"]); ?>"><?php echo ($article2["title"]); ?></a>
                                        <div style="height:90px;overflow: hidden; "><?php echo ($article2["abstract"]); ?></div>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; ?>
                    </li>
                </ul><!-- carousel items UL ends -->
            </div>
        </div>
    </div><!-- intro features panel ends -->
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