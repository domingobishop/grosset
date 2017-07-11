<?php
/**
 * Template Name: Wine Page
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
					</header><!-- .entry-header -->
                    
                           <div class="container wines">
                                <div class="row">
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>polish-hill-riesling/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle1.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Polish Hill Riesling</h5></a>
                                            <p><small>A striking example of Clare Valley riesling. One of ‘25 Great Vineyards of the World’ (Wine and Spirit Magazine, USA), rated Exceptional’ by Langton’s Wine Classification.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>springvale-watervale-riesling/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle2.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Springvale Riesling</h5></a>
                                            <p><small>This single-site wine epitomises riesling from the Watervale sub-region. One of ‘Australia’s Five Most Collected White Wines’ (Wine Ark), rated ‘Outstanding’ by Langton’s Wine Classification.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>alea-riesling/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle3.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Alea Riesling</h5></a>
                                            <p><small>Harvested from an estate-owned vineyard dedicated to this distinctive style, this wine is a wonderfully different expression of the variety.</small></p>
                                            </div>
                                            <div class="clear-wine"></div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>apiana/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle4.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Apiana</h5></a>
                                            <p><small>Fiano is a variety originating from the south of Italy, and in ancient Rome it was said to make wine that resembled honey.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>semillon-sauvignon-blanc/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle5.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Semillon Sauvignon Blanc</h5></a>
                                            <p><small>Estate-grown Clare Valley semillon seamlessly blended with single vineyard Adelaide Hills sauvignon blanc. James Halliday has rated it in his ‘Top 100 Wines’ for three consecutive years.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>gaia/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle6.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Gaia</h5></a>
                                            <p><small>An elegant, savoury blend of cabernet sauvignon and cabernet franc, the vineyard’s altitude imparts a uniqueness to this wine. ‘…a model of consistency.’ James Halliday (Weekend Australian).</small></p>
                                            </div>
                                            <div class="clear-wine"></div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>piccadilly-chardonnay/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle7.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Piccadilly Chardonnay</h5></a>
                                            <p><small>From the exceptionally cool Piccadilly Valley in the Adelaide Hills, this chardonnay is deliberately restrained.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>pinot-noir/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle8.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Pinot Noir</h5></a>
                                            <p><small>Rising from the shadow of the rieslings is this limited production from the Adelaide Hills. One of Australia’s ‘Top 20 Pinot Noirs’, (Gourmet Traveller Wine).</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>grosset45-spirit"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle9.png" class="img-responsive" alt="bottle" />
                                            <h5>'Grosset45' Spirit</h5></a>
                                            <p><small>Jeffrey Grosset’s fascination with the ancient art of distillation has led to the creation of a unique spirit from premium riesling.</small></p>
                                            </div>
                                    
                                </div>
                                </div>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					
				</article><!-- #post -->

				
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>