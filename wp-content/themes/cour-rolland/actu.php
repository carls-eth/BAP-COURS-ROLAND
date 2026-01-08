<?php
/**
 * Template Name: Page Actualités
 * 
 * @package cour_rolland
 */

get_header();
?>

<main id="primary" class="site-main actualites-page">
    
    <!-- Hero Section -->
    <section class="actualites-hero">
        <div class="hero-content">
            <h1 class="hero-title">Actualites</h1>
            <p class="hero-description">Restez informé de nos événements, expositions et nouvelles de l'atelier.</p>
        </div>
    </section>

    <!-- Actualités Grid -->
    <section class="actualites-listing">
        <div class="actualites-container">
            
            <?php
            // Arguments pour récupérer les actualités
            $args = array(
                'post_type' => 'actualite',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $actualites_query = new WP_Query($args);

            if ($actualites_query->have_posts()) :
                while ($actualites_query->have_posts()) : $actualites_query->the_post();
                
                    // Récupérer les champs ACF (utilise les noms de tes champs)
                    $type = get_field('type_actualite');
                    $date_evenement = get_field('date_evenement');
                    $image = get_field('image_actualite');
                    $extrait = get_field('extrait');
                    
                    // Badge
                    $badge_class = ($type == 'Événement') ? 'badge-evenement' : 'badge-actualite';
                    $badge_text = ($type == 'Événement') ? 'Événement' : 'Actualité';
            ?>

            <div class="actualite-card">
                <div class="actualite-image">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php else : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                    
                    <span class="actualite-badge <?php echo $badge_class; ?>"><?php echo esc_html($badge_text); ?></span>
                </div>
                
                <div class="actualite-content">
                    <?php if ($date_evenement) : ?>
                        <div class="actualite-date">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <?php echo esc_html($date_evenement); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3><?php the_title(); ?></h3>
                    
                    <?php if ($extrait) : ?>
                        <p><?php echo esc_html($extrait); ?></p>
                    <?php else : ?>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <?php endif; ?>
                    
                    <a href="<?php the_permalink(); ?>" class="actualite-link">
                        Lire plus
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="no-actualites">Aucune actualité disponible pour le moment.</p>
            <?php endif; ?>

        </div>
    </section>


</main>

<?php
get_footer();
?>