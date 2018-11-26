<?php
/**
 * The template for displaying Author bios
 */
?>

<div>
  <div class="blog-author">
    <div class="author-img">
      <?php
		$author_bio_avatar_size = apply_filters( 'manual_author_bio_avatar_size', 100 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
    </div>
    <div class="author-content">
      <h5 class="author-title"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
      </h5>
      <p>
        <?php the_author_meta( 'description' ); ?>
      </p>
    </div>
  </div>
</div>
