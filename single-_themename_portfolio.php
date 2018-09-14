<?php get_header(); ?>
<div class="o-container u-margin-bottom-40">
	<div class="o-row">
		<div class="o-row__column o-row__column--span-12">
			<main role="main">
				<?php while(have_posts()) { the_post(); ?>
                    
					<?php the_title(); ?>
					<?php the_content(); ?>
				
				<?php } ?>

			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>

