<?php
/**
 * Template Name: Infos Pratiques
 * 
 * @package cour_rolland
 */

get_header();
?>

<main id="primary" class="site-main infos-pratiques-page">
    
    <!-- Info Section  -->
    <section class="infos-info">
        <div class="info-content">
            <p class="info-subtitle">Atelier de la Cour Roland</p>
            <h1 class="info-title">Infos <span class="highlight">pratiques</span></h1>
        </div>
    </section>

        <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="contact-container">
            <h2 class="contact-title"><span class="highlight">Contactez</span>-nous</h2>
            
            <?php echo do_shortcode('[contact-form-7 id="123" title="contact"]'); ?>
        </div>
    </section>

    <!-- Info Cards Section -->
    <section class="info-cards-section">
        <div class="info-cards-container">
            
            <!-- Card 1: Adresse -->
            <div class="info-card">
                <div class="card-header">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <h3>Atelier de la Cour Roland</h3>
                </div>
                <div class="card-content">
                    <p class="address-title">Adresse</p>
                    <p>Domaine de La Cour Roland<br>78730 Rochefort en Yvelines</p>
                    
                    <p class="phone-title">Téléphone</p>
                    <p>01 30 41 69 96</p>
                </div>
            </div>

            <!-- Card 2: Comment venir -->
            <div class="info-card">
                <div class="card-header">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3>Comment venir</h3>
                </div>
                <div class="card-content transport-info">
                    <div class="transport-item">
                        <div class="transport-icon">🚗</div>
                        <div>
                            <p class="transport-label">Transports</p>
                            <ul>
                                <li><strong>R.E.R C</strong> gare de Chaville-Vélizy, puis bus 6432 ou 6433</li>
                                <li><strong>S.N.C.F</strong> gare de Chaville-Rive Droite/Rive Gauche ou Chaville-Rive Gauche puis bus 6432 ou 6433*</li>
                            </ul>
                        </div>
                    </div>

                    <div class="transport-item">
                        <div class="transport-icon">🚌</div>
                        <div>
                            <p class="transport-label">Bus</p>
                            <ul>
                                <li><strong>Bus 6432</strong> : gare de Saint-Quentin-en-Yvelines</li>
                                <li><strong>Bus 6432</strong> : Versailles Chantiers</li>
                                <li><strong>Bus 6432</strong> : Pont de Sèvres</li>
                            </ul>
                        </div>
                    </div>

                    <p class="transport-note">* Arrêts Pointe Ouest ou Pont Balançon ou Barrage des Barges.</p>
                    <p class="transport-access">L'atelier est accessible aux personnes à mobilité réduite.</p>
                </div>
            </div>

        </div>
    </section>

    <section class="hours-map-section">
        <div class="hours-map-container">
            
            <div class="hours-card">
                <h3 class="hours-title">Horaires d'ouverture</h3>
                
                <div class="schedule-block">
                    <div class="schedule-item">
                        <span class="day">Lundi</span>
                        <span class="time">9h30 - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                    <div class="schedule-item">
                        <span class="day">Mardi</span>
                        <span class="time">9h30 - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                    <div class="schedule-item">
                        <span class="day">Mercredi</span>
                        <span class="time">9h30h - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                    <div class="schedule-item">
                        <span class="day">Jeudi</span>
                        <span class="time">9h30 - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                    <div class="schedule-item">
                        <span class="day">Vendredi</span>
                        <span class="time">9h30 - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                    <div class="schedule-item">
                        <span class="day">Samedi</span>
                        <span class="time">9h30 - 12h</span>
                        <span class="time">14h - 17h</span>
                    </div>
                </div>

                <h4 class="vacation-title">Fermetures vacances scolaires</h4>
                <div class="vacation-block">
                    <div class="vacation-item">
                        <span class="day">Lundi - Jeudi</span>
                        <span class="time">9h30 - 12h30/14h</span>
                        <span class="time">13h30 - 17h</span>
                    </div>
                    <div class="vacation-item">
                        <span class="day">Vendredi</span>
                        <span class="time">9h30 - 12h30/14h</span>
                        <span class="time">13h30 - 18h</span>
                    </div>
                </div>
            </div>

            <div class="map-card">
                <img src="<?php echo get_template_directory_uri(); ?>/img/ImageWithFallback.png" alt="Carte du monde" class="map-image">
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
?>