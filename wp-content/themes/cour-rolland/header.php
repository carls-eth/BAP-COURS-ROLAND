<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cour_rolland
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cour-rolland' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-container">
			<div class="site-branding">
				<p>logo<p>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<div class="nav-menu">
					<a href="<?php echo esc_url( home_url( '/actualites' ) ); ?>" class="nav-link">Actualités</a>
					<a href="<?php echo esc_url( home_url( '/programmes' ) ); ?>" class="nav-link">Programmes</a>
					<a href="<?php echo esc_url( home_url( '/info.php' ) ); ?>" class="nav-link">Infos</a>
					
					<a href="<?php echo esc_url( home_url( '/inscription' ) ); ?>" class="btn-inscription">Inscription</a>
					<a href="<?php echo esc_url( home_url( '/connexion' ) ); ?>" class="btn-connexion">Se connecter</a>
				</div>
			</nav>
		</div>
		<div class="header-border"></div>
	</header><!-- #masthead -->