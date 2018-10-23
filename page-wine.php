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
                                            <p><small>A striking example of Clare Valley riesling; intensely citrus, pristine and persistent.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>springvale-watervale-riesling/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle2.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Springvale Riesling</h5></a>
                                            <p><small>A pure, lime driven, mineral, dry riesling, reflective of the vineyard's limestone and slate.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>alea-riesling/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle3.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Alea Riesling</h5></a>
                                            <p><small>From the estate owned Rockwood Vineyard, this wine is a wonderfully different expression of the variety.</small></p>
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
                                            <p><small>Estate-grown Clare Valley semillon is seamlessly blended with Adelaide Hills sauvignon blanc.</small></p>
					    </div>
					    <div class="col-wine">
					    <a href="<?php echo esc_url( home_url( '/' ) ); ?>nereus/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle10.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Nereus</h5></a>
                                            <p><small>Clare Valley shiraz is blended with nero d'avola to produce perfumed, complex, weighty, perfectly balanced wine.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>gaia/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle6.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Gaia</h5></a>
                                            <p><small>An elegant, savoury blend of cabernet sauvignon and cabernet franc from the isolated Gaia vineyard.</small></p>
                                            </div>
                                            <div class="clear-wine"></div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>piccadilly-chardonnay/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle7.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Piccadilly Chardonnay</h5></a>
                                            <p><small>This Piccadilly Valley chardonnay exhibits grapefruit, honeydew melon and is beautifully focused.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>pinot-noir/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle8.png" class="img-responsive" alt="bottle" />
                                            <h5>Grosset Pinot Noir</h5></a>
                                            <p><small>This complex, lively, engaging pinot noir is from a single site in the Adelaide Hills.</small></p>
                                            </div>
                                            <div class="col-wine">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>grosset45-spirit"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/bottle9.png" class="img-responsive" alt="bottle" />
                                            <h5>'Grosset45' Spirit</h5></a>
                                            <p><small>Grosset’s fascination with the ancient art of distillation has led to the creation of a unique spirit from premium riesling.</small></p>
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