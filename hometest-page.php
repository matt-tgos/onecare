<?php /* Template name: Home (V2) */ 

 /*
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post (); ?>
<section class="home_header">
  <div class="container">
    <div class="five columns">
      <h2><?php the_field('hero_title'); ?></h2>
      <p><?php the_field('hero_content'); ?></p>
      <a href="<?php the_field('button_link'); ?>" class="btn white"><?php the_field('button_text'); ?></a>
    </div>
  </div>
</section>
<!-- Services -->
<section class="our_services">
  <div class="container">
    <div class="alignment">
      <div class="eight columns offset-by-two">
        <h3>Our services</h3>
        <?php the_field('services_content'); ?>
      </div>
      <div class="twelve columns">
        <?php       
        query_posts(array( 
          'post_type' => 'services',
          'showposts' => -1,
          'orderby'   => 'rand',
          'order'     => 'ASC',
                
        ));  
        ?>
        <div class="service-scroll">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        
          <?php $icon = get_field('service_icon'); ?>
          
          <div class="service_item">
            <a href="<?php echo get_permalink(); ?>">
            <div class="service_icon">
              <img src="<?php the_field('service_icon'); ?>" class="svg">
            </div>

            <h3><?php the_title(); ?></h3>
            </a>
  				</div>
        
        <?php endwhile; ?>
        </div>
        <?php else : endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<!-- Reports -->
<section class="reports-full-width">
  <div class="background"></div>
  <div class="container">
    <div class="reports one-half column">
      <h3>General practice intelligence reports</h3>
      <ul class="benefits">
        <li>Lorem ipsum dolor sit amet</li>
        <li>Consectetur adipisicing elit</li>
        <li>Sed do eiusmod tempor incididunt ut labore</li>
        <li>Et dolore magna aliqua. Ut enim ad minim veniam</li>
        <li>Quis nostrud exercitation ullamco laboris nisi ut aliquip</li>
      </ul>
      <a href="#" class="btn">Find out more</a>
    </div>
    <div class="reports-icon one-half column">

    </div>
  </div>
</section>
<!-- Browse -->
<section class="browse">
  <div class="container">
    <div class="twelve columns">
      <p>Browse and compare all of One Care’s primary care network services <a href="<?php echo get_site_url(); ?>/services" class="btn white">See all services</a></p>
  </div>
</section>
<!-- Support -->
<section class="support">
  <div class="container">
    <?php if( have_rows('slide') ): ?>
    <div class="support_slider six columns">
      <?php while( have_rows('slide') ): the_row(); 
        // vars
        $title = get_sub_field('slide_title');
        $content = get_sub_field('slide_content');
        $link = get_sub_field('slide_link');
        $button = get_sub_field('slide_button_text');
		  ?>
      <div class="support_slide">
			<h3><?php echo $title; ?></h3>
      <p><?php echo $content; ?></p>
      <a href="<?php echo $link; ?>" class="btn"><?php echo $button; ?></a>
		  </div> 
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <div class="image six columns">
      <?php
        $field = get_field_object( 'illustration' );
        $value = $field['value'];
        $label = $field['choices'][ $value ];
        ?>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo esc_html($value); ?>.svg" />
    </div>
  </div>
</section>
<!-- News -->
<section class="news-full-width">
  <div class="background"></div>
  <div class="container">
    <div class="news-icon one-half column"></div>
    <div class="latest-news one-half column">
      <h3>Latest news</h3>
      <div class="news-slider">
      <?php $args = array('post_type'=> 'post','order' => 'DESC','post_status' => 'publish','posts_per_page'=> 5); query_posts($args); ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <div class="news_item">
            <div class="content">
              <span class="date"><?php the_time('j F Y'); ?></span>
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <p><?php echo excerpt(25); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn white">Read more</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<!-- Map -->
<section class="map_heading">
  <div class="container">
    <div class="twelve columns">
      <h3>Find your local practice or surgery</h3>
      <p>Search for a One Care affiliated practise near you</p>
    </div>
  </div>
</section>
<div id="homepage_map">
  <?php echo do_shortcode('[gmw_global_map form="1"]'); ?>
</div>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>