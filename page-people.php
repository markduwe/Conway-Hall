<?php get_header(); ?>

<div class="row">

	<div class="nine columns">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<h2><?php the_title(); ?></h2>	
		<?php the_content(); ?>

		<?php
		// WP_Query arguments
		$args = array (
			'post_type' => 'people',
		);
		// The Query
		$room_hire = new WP_Query( $args );
		// The Loop
		if ( $room_hire->have_posts() ) {
			while ( $room_hire->have_posts() ) {
				$room_hire->the_post();
		?>
		<div <?php post_class('sticky'); ?>>
			<div class="row">
				<div class="twelve columns ">
					<h4><a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
					<h5><?php global $post; $text = get_post_meta( $post->ID, '_cmb_title', true ); echo $text; ?></h5>
				</div>
			</div>
			<div class="row">
				<div class="three columns">
					<a href="<?php the_permalink(); ?>" rel="permalink" title="Permalink to <?php the_title(); ?>" class="th"><?php the_post_thumbnail('article'); ?></a>
				</div>
				<div class="nine columns">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
		<?php
			}
		} else {
			// no posts found
		}
		// Restore original Post Data
		wp_reset_postdata();	
		?>
	
	<?php endwhile; ?>
	
	<?php endif; ?>
	
	</div>	
	
	<div class="three columns side">
		
		<div class="row">
			<div class="twelve columns">
				<ul>
					<?php dynamic_sidebar( 'homepage' ); ?>
				</ul>
			</div>
		</div>		

	</div>

</div>

<?php get_footer(); ?>