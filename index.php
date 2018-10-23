<?php
/**
 * The main template file
 *
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php get_template_part( 'inc/slider' ); ?>

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
                            <a class="btn btn-default" href="http://www.grosset.com.au/members-online/" role="button">Shop
                                now »</a>
                        </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="mbox">
                            <h2>Grosset</h2>
                            <p>The story behind the name...</p>
                            <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>about/" role="button">Read
                                more »</a>
                        </div>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->

            </div> <!-- /.container -->

            <?php if (have_posts()) : ?>

                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php /* get_template_part( 'content', get_post_format() ); */ ?>
                <?php endwhile; ?>

                <?php /* twentythirteen_paging_nav(); */ ?>

            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>


        </div><!-- #content -->
    </div><!-- #primary -->


<?php get_footer(); ?>