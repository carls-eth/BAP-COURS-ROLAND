<?php
/**
 * Template Name: Accueil
 * 
 * @package cour_rolland
 */

get_header();
?>

<main id="primary" class="site-main home-page">

    <!-- Hero Section -->
    <section class="accueil-section">
        <div class="accueil-container">
            <div class="accueil-content">
                <div class="accueil-left">
                    <p class="accueil-label">Ateliers de la Cour Roland</p>
                    <h1 class="accueil-title">PEINDRE</h1>
                    <p class="accueil-subtitle">Découvrez l'art de la peinture dans notre atelier créatif</p>
                    
                    <p class="accueil-description">
                        Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.
                    </p>
                    
                    <div class="accueil-buttons">
                        <a href="<?php echo esc_url( home_url( '/programmes' ) ); ?>" class="accueil-btn accueil-btn-primary">Découvrir nos ateliers</a>
                        <a href="<?php echo esc_url( home_url( '/infos' ) ); ?>" class="accueil-btn accueil-btn-secondary">En savoir plus</a>
                    </div>
                    
                    <div class="accueil-stats">
                        <div class="accueil-stat-item">
                            <span class="accueil-stat-number">15+</span>
                            <span class="accueil-stat-label">Années</span>
                        </div>
                        <div class="accueil-stat-item">
                            <span class="accueil-stat-number">500+</span>
                            <span class="accueil-stat-label">Élèves</span>
                        </div>
                        <div class="accueil-stat-item">
                            <span class="accueil-stat-number">20+</span>
                            <span class="accueil-stat-label">Ateliers</span>
                        </div>
                    </div>
                </div>
                
                <div class="accueil-right">
                    <div class="accueil-images">
                        <div class="accueil-image-main">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/Container.png" alt="Pinceaux de peinture">
                        </div>
                        
                        <div class="accueil-card">
                            <p class="accueil-card-label">Prochaine session</p>
                            <h3 class="accueil-card-title">Inscrivez-vous maintenant pour notre prochain atelier de peinture</h3>
                            <a href="<?php echo esc_url( home_url( '/programmes' ) ); ?>" class="accueil-card-link">Voir le programme →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Nos Programmes (4 derniers) -->
    <section class="programmes-section">
        <div class="programmes-container">
            <p class="programmes-label">Ateliers de la Cour Roland</p>
            <h2 class="programmes-title">Nos <span class="programmes-highlight">Programmes</span></h2>
            <p class="programmes-subtitle">Découvrez nos ateliers d'art conçus pour tous les niveaux. Chaque programme est animé par des artistes professionnels passionnés.</p>
            
            <div class="programmes-grid">
                <?php
                // Récupérer les 4 dernières activités
                $args_activites = array(
                    'post_type' => 'activite',
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $activites_query = new WP_Query($args_activites);

                if ($activites_query->have_posts()) :
                    while ($activites_query->have_posts()) : $activites_query->the_post();
                    
                        // Récupérer les champs ACF
                        $niveau = get_field('niveau');
                        $duree = get_field('duree');
                        $participants_max = get_field('participants_max');
                        $jour = get_field('jour');
                        $image = get_field('image_activite');
                        $description = get_field('description_courte');
                        
                        // Badge class
                        $badge_class = 'programme-badge-debutant';
                        if ($niveau == 'Intermédiaire') {
                            $badge_class = 'programme-badge-intermediaire';
                        } elseif ($niveau == 'Tous niveaux') {
                            $badge_class = 'programme-badge-tous';
                        }
                ?>
                
                <div class="programme-card">
                    <div class="programme-image">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php elseif (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default-programme.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        
                        <?php if ($niveau) : ?>
                            <span class="programme-badge <?php echo $badge_class; ?>"><?php echo esc_html($niveau); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="programme-content">
                        <h3 class="programme-title"><?php the_title(); ?></h3>
                        
                        <?php if ($description) : ?>
                            <p class="programme-description"><?php echo esc_html($description); ?></p>
                        <?php else : ?>
                            <p class="programme-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php endif; ?>
                        
                        <div class="programme-info">
                            <?php if ($duree) : ?>
                                <span class="programme-meta-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    <?php echo esc_html($duree); ?>
                                </span>
                            <?php endif; ?>
                            
                            <?php if ($participants_max) : ?>
                                <span class="programme-meta-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg>
                                    <?php echo esc_html($participants_max); ?> max
                                </span>
                            <?php endif; ?>
                            
                            <?php if ($jour) : ?>
                                <span class="programme-meta-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <?php echo esc_html($jour); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="programme-buttons">
                            <a href="<?php echo esc_url( home_url( '/inscription' ) ); ?>" class="programme-btn programme-btn-primary">S'inscrire</a>
                            <a href="<?php the_permalink(); ?>" class="programme-btn programme-btn-secondary">Plus d'infos</a>
                        </div>
                    </div>
                </div>
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p class="no-content">Aucun programme disponible pour le moment.</p>
                <?php endif; ?>
            </div>
            
            <div class="programmes-cta">
                <a href="<?php echo esc_url( home_url( '/programmes' ) ); ?>" class="programmes-btn-all">Voir tous les programmes</a>
            </div>
        </div>
    </section>

    <!-- Section Actualités (3 dernières) -->
    <section class="actualites-section">
        <div class="actualites-container">
            <h2 class="actualites-title">Actualités</h2>
            <p class="actualites-subtitle">Restez informé de nos événements, expositions et nouvelles de l'atelier.</p>
            
            <div class="actualites-grid">
                <?php
                // Récupérer les 3 dernières actualités
                $args_actualites = array(
                    'post_type' => 'actualite',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $actualites_query = new WP_Query($args_actualites);

                if ($actualites_query->have_posts()) :
                    while ($actualites_query->have_posts()) : $actualites_query->the_post();
                    
                        // Récupérer les champs ACF
                        $type = get_field('type_actualite');
                        $date_evenement = get_field('date_evenement');
                        $image = get_field('image_actualite');
                        $extrait = get_field('extrait');
                        
                        // Badge
                        $badge_class = ($type == 'Événement') ? 'actualite-badge-evenement' : 'actualite-badge-actualite';
                        $badge_text = ($type == 'Événement') ? 'Événement' : 'Actualité';
                ?>
                
                <div class="actualite-card">
                    <div class="actualite-image">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php elseif (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default-actualite.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        
                        <span class="actualite-badge <?php echo $badge_class; ?>"><?php echo esc_html($badge_text); ?></span>
                    </div>
                    
                    <div class="actualite-content">
                        <?php if ($date_evenement) : ?>
                            <div class="actualite-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <?php echo esc_html($date_evenement); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h3 class="actualite-title"><?php the_title(); ?></h3>
                        
                        <?php if ($extrait) : ?>
                            <p class="actualite-description"><?php echo esc_html($extrait); ?></p>
                        <?php else : ?>
                            <p class="actualite-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="actualite-link">Lire plus →</a>
                    </div>
                </div>
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p class="no-content">Aucune actualité disponible pour le moment.</p>
                <?php endif; ?>
            </div>
            
            <div class="actualites-cta">
                <a href="<?php echo esc_url( home_url( '/actualites' ) ); ?>" class="actualites-btn-all">Voir toutes les actualités</a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>