<?php
/**
 * The template part for displaying results in search pages
*/

        $post_id = get_the_ID();
        $listatags = get_the_terms( $post_id , 'manual_kb_tag');
        if( !empty($listatags)){
            $valores = array_values($listatags);
            $tamanho = count($valores);
        }
        else( $tamanho = 0 );
        #$tamanho = count($valores);
        for ($i = 0; $i <= $tamanho; $i++) { 
        ob_start();
        echo esc_html($valores[$i] -> name);
        $myStr[] = ob_get_contents();
        ob_end_clean();
        }

    if (((in_array("star", $myStr)) || (in_array("Star", $myStr))) && 
               ((in_array("galaxy", $myStr)) || (in_array("Galaxy", $myStr))) && 
               ((in_array("universe", $myStr)) || (in_array("Universe", $myStr)))){
            $seletordelinha = 'alllines';
        }
        elseif(((in_array("galaxy", $myStr)) || (in_array("Galaxy", $myStr))) && ((in_array("universe", $myStr)) || (in_array("Universe", $myStr)))){
            $seletordelinha = 'galaxyuniverse';
        }
        elseif(((in_array("star", $myStr)) || (in_array("Star", $myStr))) && ((in_array("galaxy", $myStr)) || (in_array("Galaxy", $myStr)))){
            $seletordelinha = 'stargalaxy';
        }
        elseif((in_array("galaxy", $myStr)) || (in_array("Galaxy", $myStr))){
            $seletordelinha = 'galaxy';
        }
        elseif((in_array("universe", $myStr)) || (in_array("Universe", $myStr))){
            $seletordelinha = 'universe';
        }
        elseif((in_array("star", $myStr)) || (in_array("Star", $myStr))){
            $seletordelinha = 'star';
        }
        else{
            $seletordelinha = 'post-<?php the_ID(); ?>';
        }



?>
<div class="search" id="<?php echo $seletordelinha; ?>">
  <?php //manual_post_thumbnail(); ?>
  <div class="caption">
    <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <p> <i class="fa fa-calendar"></i> <span>
      <?php the_time( get_option('date_format') ); ?>
      </span> <i class="fa fa-user"></i> 
      <span>
      <?php $author_id = $post->post_author; echo the_author_meta( 'user_nicename' , $author_id ); ?>
      </span> <i class="fa fa-file"></i>
      <span> <?php 
          $teste = get_top_category();
          $post_id = get_the_ID();
          $categoria = get_the_terms( $post_id , 'manualknowledgebasecat')  ; 
          $listacategoria = get_the_term_list( $post_id , 'manualknowledgebasecat')  ; 
          #$topParentName = get_category_parents( $post_id , true, ' &raquo ' );
          #echo $topParentName;
          
          
          $numero =  $categoria[0] -> term_id;
          
          if (!empty($numero)){
          $list = get_category_parents( $numero, true, ' ');      
          $pedacos = explode("</a>", $list);
          #$pedacos = ltrim($pedacos, '-' );
          #echo $pedacos[1];
          echo esc_html( $categoria[0] -> name ) ; 
          #echo ' &raquo ' ;
          #echo esc_html( $topcat[0] -> name ) ;
          #echo $listacategoria;
          }
                   
          ?></span></p>
  </div>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-footer">
    <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span>', '</span>' ); ?>
  </div>
  
  <?php else : ?>
  <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<span>', '</span><!-- .entry-footer -->' ); ?>
  <?php endif; ?>
</div>
