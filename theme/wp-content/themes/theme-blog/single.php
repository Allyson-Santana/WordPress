<?php get_header(); ?>

      <main class="row p-2">
        <div class="col-md-8 col-sm-12">

          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

          <?php endwhile; ?>

          <?php else : get_404_template();  endif; ?>

        </div>

        <?php get_sidebar(); ?>

      </main>
    </div>

<?php get_footer(); ?>