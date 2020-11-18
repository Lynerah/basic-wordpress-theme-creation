<?php get_header(); ?>
	<h1>Le blog</h1>
	<?php if (have_posts()): while(have_posts()): the_post();?>
		<article class="post">
			<h2><?php the_title();?></h2>
			<?php the_post_thumbnail();?>
			<p class="post_meta">
				Publié le <?php the_time(get_option('date_format'));?> par <?php the_author();?>
			</p>
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>">Lire la suite</a>
		</article>
	<?php endwhile; endif;?>
<?php get_footer(); ?>