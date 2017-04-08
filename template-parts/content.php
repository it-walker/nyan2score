<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nyan2score
 */

?>


<!--PEN CODE-->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
	<div class="photo">
        <?php if (has_post_thumbnail()) : ?>
            <!--アイキャッチ画像-->
            <?php the_post_thumbnail('thumbnail'); ?>
        <?php else : ?>
            <!--　アイキャッチ画像がないときはNo Image-->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/itwalker.png" width="200" height="100" alt="デフォルト画像" />
        <?php endif ; ?>
    </div>
	<ul class="details">
		<li class="author"><a href="#"><?php the_author(); ?></a></li>
		<li class="date"><?php the_date('Y-m-d', '<h2>', '</h2>'); ?></li>
		<li class="tags">
			<ul>
				<?php
				$posttags = get_the_tags();
				if ( $posttags ) {
					foreach ( $posttags as $tag ) { 
                ?>
				<li><a href="#" ><?php $tag->name ?></a></li>
					<?php }
				}
				?>
			</ul>
		</li>
	</ul>
	<div class="description">
		<h1>Learning to Code</h1>
		<h2>Opening a door to the future</h2>
		<p class="summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
		<a href="#">Read More</a>
	</div>
</article>
<!--END PEN CODE-->



