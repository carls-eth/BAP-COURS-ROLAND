<?php
/**
 * Template Name: Tous les Ateliers
 * 
 * @package cour_rolland
 */

get_header();
?>

<main id="primary" class="site-main tous-ateliers-page">
    
    <section class="tous-ateliers-hero">
        <div class="hero-content">
            <h1 class="hero-title">Tous nos ateliers</h1>
        </div>
    </section>

    <!-- Ateliers Grid -->
    <section class="ateliers-grid-section">
        <div class="ateliers-grid-container">
            
            <?php
            // Arguments pour récupérer TOUTES les activités
            $args = array(
                'post_type' => 'activite',
                'posts_per_page' => -1, // Tous les posts
                'orderby' => 'title',
                'order' => 'ASC'
            );

            $activites_query = new WP_Query($args);

            if ($activites_query->have_posts()) :
                while ($activites_query->have_posts()) : $activites_query->the_post();
                
                    // Récupérer l'image ACF
                    $image = get_field('image_activite');
            ?>

            <a href="<?php the_permalink(); ?>" class="atelier-card">
                <div class="atelier-image">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php elseif (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default-atelier.jpg" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    
                    <div class="atelier-overlay"></div>
                    <div class="atelier-title">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
            </a>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="no-ateliers">Aucun atelier disponible pour le moment.</p>
            <?php endif; ?>

        </div>
    </section>

    <!-- Nos Avantages Section -->
    <section class="avantages-section">
        <div class="avantages-container">
            
            <div class="avantages-header">
                <p class="avantages-subtitle">POURQUOI NOUS REJOINDRE</p>
                <h2 class="avantages-title">Nos Avantages</h2>
                <p class="avantages-description">Un environnement d'excellence pour développer votre pratique artistique avec passion.</p>
                <div class="title-underline"></div>
            </div>

            <div class="avantages-grid">
                
                <!-- Avantage 1 -->
                <div class="avantage-item">
                    <div class="avantage-line avantage-line-teal"></div>
                    <div class="avantage-icon avantage-icon-teal">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h3 class="avantage-title">Artistes professionnels</h3>
                    <p class="avantage-text">Nos enseignants sont des artistes reconnus avec une expérience internationale et une formation dans les grandes écoles d'art européennes.</p>
                </div>

                <!-- Avantage 2 -->
                <div class="avantage-item">
                    <div class="avantage-line avantage-line-orange"></div>
                    <div class="avantage-icon avantage-icon-orange">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <h3 class="avantage-title">Atelier bien équipé</h3>
                    <p class="avantage-text">Matériel professionnel à disposition dans un espace lumineux et inspirant, situé dans un cadre authentique et convivial.</p>
                </div>

                <!-- Avantage 3 -->
                <div class="avantage-item">
                    <div class="avantage-line avantage-line-teal"></div>
                    <div class="avantage-icon avantage-icon-teal">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="avantage-title">Petits groupes</h3>
                    <p class="avantage-text">Cours en petits groupes pour un suivi personnalisé de qualité. Une ambiance conviviale et créative pour progresser ensemble.</p>
                </div>

            </div>

            <!-- CTA Button -->
            <div class="avantages-cta">
                <a href="<?php echo esc_url( home_url( '/infos' ) ); ?>" class="btn-decouvrir">Découvrir l'atelier</a>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
?>