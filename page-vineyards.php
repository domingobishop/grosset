<?php
/**
 * Template Name: Vineyards Page
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
                    
                           <div class="container vineyards">
                                <div class="row">
								<div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="<?php echo esc_url( home_url( '/' ) ); ?>polish-hill-riesling/grosset-polish-hill-vineyard/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vineyard1.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Grosset Polish Hill Vineyard</h5></a>
                                            <p><small>Situated just north of Mount Horrocks in the Clare Valley, the Polish Hill vineyard is a ‘hard rock’ site with shallow shale and a crust of clay marl over slate. These thin soils hamper the roots’ downward development therefore the vines struggle. The distinctively flavoured fruit typically has small berry and bunch size. Organically managed without tillage, natural composting and hand-tending have been practiced since 1996.</small></p>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="<?php echo esc_url( home_url( '/' ) ); ?>springvale-watervale-riesling/grosset-springvale-vineyard/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vineyard2.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Grosset Springvale Vineyard</h5></a>
                                            <p><small>The hilltop-sited ‘Springvale’ is the highest (460 metres) and coolest vineyard in the Watervale subregion. Planted on red loam over limestone, this is a ‘soft rock’ site. This highly sustaining combination of soil and rock insulates the drought sensitive riesling vines, which produce lime-green fruit with medium-sized berries and bunches. ‘Springvale’ is named after the original property where riesling vines were first planted in the 1860’s.</small></p>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="<?php echo esc_url( home_url( '/' ) ); ?>gaia/grosset-gaia-vineyard/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vineyard3.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Grosset Gaia Vineyard</h5></a>
                                            <p><small>Planted in the 1980s with cabernet sauvignon and cabernet franc, the Gaia vineyard is named after James Lovelock’s Gaia Theory. Lovelock proposed that the Earth is a single organism, reliant on the complexity and diversity of its species to maintain ecological health. At an altitude of 570 metres, this isolated and windswept vineyard has been farmed continuously for 33 years in accordance with this prescient concept.</small></p>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="<?php echo esc_url( home_url( '/' ) ); ?>alea-riesling/grosset-alea-vineyard/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vineyard4.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Grosset Alea Vineyard</h5></a>
                                            <p><small>In 2000, a detailed geological survey highlighted a narrow corridor of land, just 300 by 22 metres wide, on the Grosset property in Watervale. Consisting of hard red rock and poor red loam as topsoil, it appears highly suited to the production of powerful, generous flavoured riesling. This became the ‘Alea’ vineyard (pronounced Ah-Iee-uh), after the Greek goddess of wisdom, courage and agriculture, Athena Alea.</small></p>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vineyard5.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Grosset Adelaide Hills Vineyards</h5></a>
                                            <p><small>Grosset Wines’ chardonnay, pinot noir and sauvignon blanc grapes are grown in three privately owned vineyards in the Adelaide Hills. In the early 1990’s Grosset was drawn to the intriguing high-acid fruit from these sites. Two are in the Piccadilly Valley, the second coldest place in South Australia and for that reason they can be accurately described as ‘marginal’. In terms of quality however, the rewards of working with such challenging sites have proved to be substantial.</small></p>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                			<a href="<?php echo esc_url( home_url( '/' ) ); ?>about/seasonal-activity/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/seasonal.jpg" class="img-responsive" alt="vineyard" />
                                            <h5>Seasonal Activity</h5></a>
                                            <p><small>It is often asked; if the Grosset Spring Releases are all but sold out by Christmas each year, then what else is there to do? Each season brings with it a crucial stage in the winemaking process.</small></p>
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