<article <?php post_class(); ?>>
  <div class="content-box">
    <header class="entry-header">    
      <?php get_template_part('template-parts/entry-header'); ?>
      <div class="entry-meta">
        <?php get_template_part('template-parts/entry-meta'); ?>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <?php 
      if (is_active_sidebar( 'post-footer' )) :
    ?>
    <aside class="widget-area section">
      <?php dynamic_sidebar( 'post-footer' ); ?>
    </aside>
    <?php endif; ?>
    <div class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( __( ', ', 'mmtheme' ) );
      
      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ', 'mmtheme' ) );

      $footer_meta = '';
      if ( '' != $categories_list ) {
         $footer_meta .= sprintf(__( 'Posted in: %1$s <br>', 'mmtheme' ), $categories_list);
      } 

      if ( '' != $tag_list ) {
        $footer_meta .= sprintf(__( 'Tags: %1$s', 'mmtheme' ), $tag_list);
      }

      if( '' != $footer_meta) {
        echo '<p>' . $footer_meta . '</p>';
      }
    ?>
    </div>
    <footer>
      <?php wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mmtheme' ),
          'after'  => '</div>',
        ) ); ?>
    </footer>
  </div>
</article>

<?php 
  if (is_active_sidebar( 'below-post' )) :
?>
<div class="below-post">
  <aside class="widget-area">
    <?php dynamic_sidebar( 'below-post' ); ?>
  </aside>
</div>
<?php endif; ?>

<?php
$about_author_visiblity = get_theme_mod('about_author_visiblity', '2');
if ($about_author_visiblity === '2') :
?>
  <div class="about-author content-box section">
    <h3 class="h4 section-title"><?php echo __('About the author', 'mmtheme'); ?></h2>
    <div class="media media-left">
      <div class="thumbnail thumbnail-rounded">
        <?php echo get_avatar( get_the_author_meta('ID'), 140 ) ?>
      </div>
      <div class="media-body">
        <strong><?php echo get_the_author_meta('display_name'); ?></strong>
        <?php echo wpautop(get_the_author_meta('description')); ?>
      </div>
    </div>
  </div>
<?php endif; ?>