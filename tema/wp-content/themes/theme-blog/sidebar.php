<div class="col-md-4 col-sm-12">

  <?php // adiciona a barra lateral
    dynamic_sidebar('Barra lateral');
  ?>
      
      <div class="col ">
      
      <div id="carouselBSWP" class="carousel slide p-0 m-0" data-ride="carousel">
      
        <div class="carousel-inner">            
          <?php 
          // args
          $my_args_banner = array(
            'post_type' => 'banners',
            'posts_per_page' => 3,
          );

          // query
          $my_query_banner = new WP_Query ( $my_args_banner );
          ?>

          <?php if( $my_query_banner->have_posts()) : 
            //$banner = $banners[0];
            $c = 0;
            while( $my_query_banner->have_posts() ) : 
            $my_query_banner->the_post(); 
          ?>

            <div class="carousel-item <?php $c++; if($c == 1) { echo ' active'; } ?>">
              <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')) ?>
              <div class="carousel-caption d-none d-md-block">
                <h5>
                  <?php the_title(); ?>
                </h5>
              </div>
            </div>

          <?php endwhile; endif; ?>

          <?php wp_reset_query(); ?>            
        </div>

        <a class="carousel-control-prev" href="#carouselBSWP" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only">Anterior</span>
        </a>

        <a class="carousel-control-next" href="#carouselBSWP" role="button" data-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only">Próximo</span>
        </a>
      
      </div>
    
    </div>

</div>