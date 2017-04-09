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
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/itwalker.png" alt="デフォルト画像" />
        <?php endif ; ?>
    </div>
	<ul class="details">
		<li class="author"><a href="#"><?php the_author(); ?></a></li>
		<li class="date"><?php the_date('Y-m-d'); ?></li>
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
		<h1><?php
$titleCountMax = 10;
if ( $titleCountMax < mb_strlen( $post->post_title, 'UTF-8' ) ) {
	echo mb_substr( $post->post_title, 0, $titleCountMax, 'UTF-8' ).'……';
} else {
	echo $post->post_title;
}
?></h1>
		<p>
<?php
//brだけ残す
$charCountMax = 45;
if ( $charCountMax < mb_strlen( $post->post_content, 'UTF-8' ) ) {
	echo mb_substr( strip_tags( $post->post_content, '<br>' ), 0, $charCountMax, 'UTF-8' ).'……';
} else {
	echo strip_tags( $post->post_content, '<br>' );
}
//brとspanを残す
if ( $charCountMax < mb_strlen( $post->post_content, 'UTF-8') ) {
	echo mb_substr( strip_tags( $post->post_content, '<br><span>' ), 0, $charCountMax, 'UTF-8' ).'……';
} else {
	echo strip_tags( $post->post_content, '<br><span>' );
}
?></p>
<p class="alingrignt"><a href="#">Read More</a></p>
	</div>
</article>
<!--END PEN CODE-->



