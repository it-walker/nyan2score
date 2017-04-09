<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nyan2score
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<?php wp_deregister_script("jquery"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/javascripts/bootstrap.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nyan2score' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</div>
				<?php 
					wp_nav_menu(array(
						// functions.phpに登録したregister_nav_menu()の第1引数
						'menu-id'         => 'nyan2score',
						// 出力するメニューの名前（管理画面「外観」→「メニュー」の設定ページの「メニューの名前」欄で設定した名前）
						'menu'            => 'primary',
						// 出力するメニューの種類（register_nav_menusで登録した名前）
						'theme_location'  => 'menu-1',
						// 出力するメニュー階層の上限
						'depth'           => 2,
						// ul 要素を囲む要素
						'container'       => 'div',
						// メニューの ul 要素を囲む要素に割り当てる クラス名
						'container_class' => 'collapse navbar-collapse',
						// メニューの ul 要素を囲む要素に割り当てる ID
						'container_id'    => 'bs-example-navbar-collapse-1',
						// メニューの ul 要素に割り当てる クラス名
						'menu_class'      => 'nav navbar-nav',
						// メニューが存在しないときに実行する関数名
						'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
						// 
						'walker'          => new wp_bootstrap_navwalker())
						);
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="page" class="site">
		<div id="content" class="site-content row">


