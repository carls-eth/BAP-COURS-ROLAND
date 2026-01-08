<?php
/**
 * Template pour afficher une activité individuelle
 * 
 * @package cour_rolland
 */

get_header();
?>

<main id="primary" class="site-main single-activite-page">

    <?php
    while ( have_posts() ) :
        the_post();
        
        // Récupérer les champs ACF
        $niveau = get_field('niveau');
        $duree = get_field('duree');
        $participants_max = get_field('participants_max');
        $jour = get_field('jour');
        $horaire = get_field('horaire'); // Si tu as ce champ
        $prix = get_field('prix'); // Si tu as ce champ
        $image = get_field('image_activite');
        $description = get_field('description'); // Description complète
        $description_courte = get_field('description_courte');
        $materiel = get_field('materiel'); // Liste du matériel si tu l'as
        $prerequis = get_field('prerequis'); // Prérequis si tu l'as
        
        // Badge class
        $badge_class = 'badge-debutant';
        if ($niveau == 'Intermédiaire') {
            $badge_class = 'badge-intermediaire';
        } elseif ($niveau == 'Tous niveaux') {
            $badge_class = 'badge-tous';
        }
    ?>

    <!-- Hero Section -->
    <section class="activite-hero">
        <div class="activite-hero-container">
            <div class="activite-hero-content">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
                    <span class="separator">/</span>
                    <a href="<?php echo esc_url( home_url( '/atelier' ) ); ?>">Programmes</a>
                    <span class="separator">/</span>
                    <span class="current"><?php the_title(); ?></span>
                </div>
                
                <?php if ($niveau) : ?>
                    <span class="activite-badge-hero <?php echo $badge_class; ?>"><?php echo esc_html($niveau); ?></span>
                <?php endif; ?>
                
                <h1 class="activite-title"><?php the_title(); ?></h1>
                
                <?php if ($description_courte) : ?>
                    <p class="activite-subtitle"><?php echo esc_html($description_courte); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="activite-content-section">
        <div class="activite-content-container">
            
            <!-- Image principale -->
            <?php if ($image) : ?>
                <div class="activite-image-main">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
            <?php endif; ?>

            <!-- Informations et Description -->
            <div class="activite-main-grid">
                
                <!-- Colonne gauche : Description -->
                <div class="activite-description">
                    <h2 class="section-title">À propos de cet atelier</h2>
                    
                    <?php if ($description) : ?>
                        <div class="description-content">
                            <?php echo wpautop($description); ?>
                        </div>
                    <?php else : ?>
                        <div class="description-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($materiel) : ?>
                        <div class="activite-section">
                            <h3 class="subsection-title">Matériel fourni</h3>
                            <div class="materiel-content">
                                <?php echo wpautop($materiel); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($prerequis) : ?>
                        <div class="activite-section">
                            <h3 class="subsection-title">Prérequis</h3>
                            <div class="prerequis-content">
                                <?php echo wpautop($prerequis); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Colonne droite : Informations pratiques -->
                <div class="activite-sidebar">
                    <div class="info-card">
                        <h3 class="info-card-title">Informations pratiques</h3>
                        
                        <div class="info-items">
                            <?php if ($niveau) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Niveau</span>
                                        <span class="info-value"><?php echo esc_html($niveau); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duree) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Durée</span>
                                        <span class="info-value"><?php echo esc_html($duree); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($participants_max) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Participants</span>
                                        <span class="info-value"><?php echo esc_html($participants_max); ?> maximum</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($jour) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Jour</span>
                                        <span class="info-value"><?php echo esc_html($jour); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($horaire) : ?>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Horaire</span>
                                        <span class="info-value"><?php echo esc_html($horaire); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($prix) : ?>
                                <div class="info-item info-item-price">
                                    <div class="info-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </div>
                                    <div class="info-details">
                                        <span class="info-label">Tarif</span>
                                        <span class="info-value info-value-price"><?php echo esc_html($prix); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="info-card-actions">
                            <a href="<?php echo esc_url( home_url( '/inscription' ) ); ?>" class="btn-inscription-full">S'inscrire à cet atelier</a>
                            <a href="<?php echo esc_url( home_url( '/info' ) ); ?>" class="btn-contact">Nous contacter</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Autres ateliers similaires -->
    <section class="autres-ateliers-section">
        <div class="autres-ateliers-container">
            <h2 class="section-title-center">Découvrez aussi</h2>
            
            <div class="autres-ateliers-grid">
                <?php
                // Récupérer 3 autres activités
                $args_autres = array(
                    'post_type' => 'activite',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                );

                $autres_query = new WP_Query($args_autres);

                if ($autres_query->have_posts()) :
                    while ($autres_query->have_posts()) : $autres_query->the_post();
                        $other_image = get_field('image_activite');
                        $other_niveau = get_field('niveau');
                ?>
                
                <a href="<?php the_permalink(); ?>" class="autre-atelier-card">
                    <div class="autre-atelier-image">
                        <?php if ($other_image) : ?>
                            <img src="<?php echo esc_url($other_image['url']); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <?php if ($other_niveau) : ?>
                            <span class="autre-badge"><?php echo esc_html($other_niveau); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="autre-atelier-content">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            
            <div class="autres-ateliers-cta">
                <a href="<?php echo esc_url( home_url( '/atelier' ) ); ?>" class="btn-voir-tous">Voir tous les programmes</a>
            </div>
        </div>
    </section>

    <?php endwhile; ?>

</main>

<?php
get_footer();
?>