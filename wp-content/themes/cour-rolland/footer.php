<?php
/**
 * The template for displaying the footer
 *
 * @package cour_rolland
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="header-border"></div>
		<div class="site-info">
			<!-- Section Info -->
			<div class="info">
				<h2 class="title-footer">ATELIER DE LA COUR<span class="highlight">ROLAND</span></h2>
				<p class="footer-description">Un espace créatif dédié à l'apprentissage et à la pratique des arts plastiques.</p>
			</div>
			
			<!-- Section Liens rapides -->
			<div class="liens">
				<h2 class="title-footer">Liens rapides</h2>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></li>
					<li><a href="<?php echo esc_url( home_url( '/a-propos' ) ); ?>">À propos</a></li>
					<li><a href="<?php echo esc_url( home_url( '/ateliers' ) ); ?>">Nos ateliers</a></li>
					<li><a href="<?php echo esc_url( home_url( '/galerie' ) ); ?>">Galerie</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
				</ul>
			</div>
			
			<!-- Section Programmes -->
			<div class="programmes">
				<h2 class="title-footer">Programmes</h2>
				<ul>
					<li><a href="#">Peinture à l'huile</a></li>
					<li><a href="#">Aquarelle</a></li>
					<li><a href="#">Dessin</a></li>
					<li><a href="#">Acrylique</a></li>
					<li><a href="#">Stages intensifs</a></li>
				</ul>
			</div>
			
			<!-- Section Newsletter -->
			<div class="newsletter">
				<h2 class="title-footer">Newsletter</h2>
				<p class="newsletter-description">Recevez nos actualités et événements</p>
				<form class="newsletter-form" method="post">
					<div class="form-group">
						<input 
							type="email" 
							name="newsletter_email" 
							placeholder="Votre email" 
							required
						>
						<button type="submit" class="btn-newsletter">OK</button>
					</div>
				</form>
			</div>
		</div><!-- .site-info -->
		
		<!-- Section Mentions légales -->
		<div class="mention">
			<p class="copyright">© <?php echo date('Y'); ?> Atelier de la Cour Roland. Tous droits réservés.</p>
			<div class="footer-legal">
				<a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>">Mentions légales</a>
				<a href="<?php echo esc_url( home_url( '/politique-confidentialite' ) ); ?>">Politique de confidentialité</a>
				<a href="<?php echo esc_url( home_url( '/cgv' ) ); ?>">CGV</a>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>