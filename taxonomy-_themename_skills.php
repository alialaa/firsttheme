<?php get_header(); ?>
<div class="o-container u-margin-bottom-40">
	<div class="o-row">
		<div class="o-row__column o-row__column--span-12">
			<main role="main">
				<?php if(have_posts()) { ?>
					<?php while(have_posts()) { the_post(); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php } ?>
					<?php the_posts_pagination() ?>
				<?php } else { ?>
					<?php  esc_html_e( 'Sorry, no posts matched your criteria.', '_themename' ); ?>
				<?php } ?>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>

