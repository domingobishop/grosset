<?php
/**
 * The main template file
 *
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <div id="carousel-example-generic" class="carousel slide text-center" data-ride="carousel" style="width:100%;margin:30px auto;">
                <div class="glogo-trans">

                </div>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/img/slide1.jpg) no-repeat center center;background-size:cover;">

                        <div class="carousel-caption">
                            <h3>The best thing about Grosset, is the sheer enthusiasm, utter commitment and genuine love for making something sublime and brilliant.</h3>
                            <p>Andrew Caillard MW, Langton's Classification of Australian Wine 2010</p>
                        </div>
                    </div>
                    <div class="item" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/img/slide2.jpg) no-repeat center center;background-size:cover;">

                        <div class="carousel-caption">
                            <h3>Grosset's pre-eminence in riesling making is recognised... however, he merits equal recognition for the other wines in his portfolio... These are all benchmarks.</h3>
                            <p>James Halliday, Australian Wine Companion, 2014 Edition</p>
                        </div>
                    </div>
                    <div class="item" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/img/slide3.jpg) no-repeat center center;background-size:cover;">

                        <div class="carousel-caption">
                            <h3>The undisputed monarch of Clare Valley is Jeffrey Grosset, whose 32-year reign has seen a raft of superlative wines set standards to which other winemakers can only aspire.</h3>
                            <p>Tyson Stelzer, Qantas Inflight Wine Guide 2012, Dec 2012</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.carousel -->

            <div class="container">



                <!-- Three columns of text -->
                <div class="row text-center marketing">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="mbox">
                            <h2>Latest Releases</h2>
                            <p>See the range</p>
                            <a class="btn btn-default" href="http://www.grosset.com.au/wines/" role="button">View »</a>
                        </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="mbox">
                            <h2>Buy</h2>
                            <p>Go to Shop</p>
                            <a class="btn btn-default" href="http://www.grosset.com.au/members-online/" role="button">Shop now »</a>
                        </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="mbox">
                            <h2>Grosset</h2>
                            <p>The story behind the name...</p>
                            <a class="btn btn-default" href="<?php echo esc_url( home_url( '/' ) ); ?>about/" role="button">Read more »</a>
                        </div>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->

            </div> <!-- /.container -->

            <?php if ( have_posts() ) : ?>

                <?php /* The loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php /* get_template_part( 'content', get_post_format() ); */ ?>
                <?php endwhile; ?>

                <?php /* twentythirteen_paging_nav(); */ ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>


        </div><!-- #content -->
    </div><!-- #primary -->


<?php get_footer(); ?>