<?php 

remove_action('wp_head', 'wp_resource_hints', 2);

if (!function_exists('manual_footer_social_share')) {
	function manual_footer_social_share(){
	global $theme_options;
	if( isset($theme_options['footer-social-twitter']) && $theme_options['footer-social-twitter'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-twitter']; ?>" title="Twitter" target="_blank"><i class="fa fa-twitter social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-facebook']) && $theme_options['footer-social-facebook'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-facebook']; ?>" title="Facebook" target="_blank"><i class="fa fa-facebook social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-youtube']) && $theme_options['footer-social-youtube'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-youtube']; ?>" title="YouTube" target="_blank"><i class="fa fa-youtube-play social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-google']) && $theme_options['footer-social-google'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-google']; ?>" title="Google+" target="_blank"><i class="fa fa-google-plus social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-instagram']) && $theme_options['footer-social-instagram'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-instagram']; ?>" title="Instagram" target="_blank"><i class="fa fa-instagram social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-linkedin']) && $theme_options['footer-social-linkedin'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-linkedin']; ?>" title="Linkedin" target="_blank"><i class="fa fa-linkedin social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-pinterest']) && $theme_options['footer-social-pinterest'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-pinterest']; ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-vimo']) && $theme_options['footer-social-vimo'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-vimo']; ?>" title="Vimo" target="_blank"><i class="fa fa-vimeo-square social-footer-icon"></i>
  </a>
</li>
<?php } ?>

<?php if( isset($theme_options['footer-social-tumblr']) && $theme_options['footer-social-tumblr'] != ''  ) {  ?>
<li>
  <a href="
    <?php echo $theme_options['footer-social-tumblr']; ?>" title="Tumblr" target="_blank"><i class="fa fa-tumblr-square social-footer-icon"></i>
  </a>
</li>
<?php }
	}
}

/*
if (!function_exists('build_content_translation_jobs')) {
public function build_content_translation_jobs() {
		?>

		<span class="spinner waiting-1" style="display: inline-block; float:none; visibility: visible"></span>

		<fieldset class="filter-row"></fieldset>
		<div class="listing-table wpml-translation-management-jobs" id="icl-tm-jobs-form" style="display: none;">
			<h3><?php _e( 'Jobs', 'wpml-translation-management' ) ?></h3>
			<table id="icl-translation-jobs" class="wp-list-table widefat fixed">
				<thead>
				<tr>
					<th scope="col" id="cb" class="manage-column check-column" style="">
						<label class="screen-reader-text" for="bulk-select-top"><?php _e( 'Select All', 'wpml-translation-management' ) ?></label>
						<input id="bulk-select-top" class="bulk-select-checkbox" type="checkbox">
					</th>
					<th scope="col" id="job_id" class="manage-column column-job_id" style="">
						<?php _e( 'Job ID', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="title" class="manage-column column-title" style="">
						<?php _e( 'Title', 'wpml-translation-management' ) ?>
					</th>
                    <th scope="col" id="title" class="manage-column column-tag" style="">
						<?php _e( 'Tags', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="language" class="manage-column column-language" style="">
						<?php _e( 'Language', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="status" class="manage-column column-status" style="">
						<?php _e( 'Status', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="translator" class="manage-column column-translator" style="">
						<?php _e( 'Translator', 'wpml-translation-management' ) ?>
					</th>
				</tr>
                </thead>
                <tfoot>
				<tr>
					<th scope="col" id="cb" class="manage-column check-column" style="">
						<label class="screen-reader-text" for="bulk-select-bottom"><?php _e( 'Select All', 'wpml-translation-management' ) ?></label>
						<input id="bulk-select-bottom" class="bulk-select-checkbox" type="checkbox">
					</th>
					<th scope="col" id="job_id" class="manage-column column-job_id" style="">
						<?php _e( 'Job ID', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="title" class="manage-column column-title" style="">
						<?php _e( 'Title', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="language" class="manage-column column-language" style="">
						<?php _e( 'Language', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="status" class="manage-column column-status" style="">
						<?php _e( 'Status', 'wpml-translation-management' ) ?>
					</th>
					<th scope="col" id="translator" class="manage-column column-translator" style="">
						<?php _e( 'Translator', 'wpml-translation-management' ) ?>
					</th>
				</tr>
				</tfoot>
                <tbody class="groups"></tbody>
            </table>

			<br/>

			<?php wp_nonce_field( 'assign_translator_nonce', '_icl_nonce_at' ) ?>
            <?php wp_nonce_field( 'check_batch_status_nonce', '_icl_check_batch_status_nonce' ) ?>
			<input type="hidden" name="icl_tm_action" value=""/>
			<input id="icl-tm-jobs-cancel-but" name="icl-tm-jobs-cancel-but" class="button-primary" type="submit" value="<?php _e( 'Cancel selected', 'wpml-translation-management' ) ?>" disabled="disabled"/>
			<span id="icl-tm-jobs-cancel-msg" style="display: none"><?php _e( 'Are you sure you want to cancel these jobs?', 'wpml-translation-management' ); ?></span>
			<span id="icl-tm-jobs-cancel-msg-2" style="display: none"><?php _e( 'WARNING: %s job(s) are currently being translated.', 'wpml-translation-management' ); ?></span>
			<span id="icl-tm-jobs-cancel-msg-3" style="display: none"><?php _e( 'Are you sure you want to abort this translation?', 'wpml-translation-management' ); ?></span>

			<span class="navigator"></span>

			<span class="spinner waiting-2" style="display: none; float:none; visibility: visible"></span>

			<?php wp_nonce_field( 'icl_cancel_translation_jobs_nonce', 'icl_cancel_translation_jobs_nonce' ); ?>
			<?php wp_nonce_field( 'icl_get_jobs_table_data_nonce', 'icl_get_jobs_table_data_nonce' ); ?>
		</div>

		<?php
		TranslationManagement::include_underscore_templates( 'listing' );
	}
}
*/

add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );

function new_nav_menu_items($items, $args) {
            #$seletordeperfil = 'Admin';
            #$_SESSION["pedro"] = "";
            $cookie_name = "perfil";
            #setcookie($cookie_name);
            $var = $_COOKIE[$cookie_name];
            $valor = traduzirCookie($var);
            if (!empty($var)){  
            $items = $items.'<li id="perfilselecionado" class="menu-item menu-item-type-post_type menu-item-object-page" ><a><span>' . $valor . '</span></a></li>';
            }
        else {
            
        }
        
    return $items;
    
}


function custom_languages_menu($items,$args) {
    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=1');
	       $items = $items.'<li class="dropdown">
                            	<button id="clicker" onclick="myFunction()" class="dropbtn">
								<span class="fa fa-globe"></span>
                            	<span class="caret"></span></button>
								<ul id="myDropdown" class="dropdown-content">';
	       if(1 < count($languages)){
            foreach($languages as $l){
			$dif = explode("-",$l['language_code']);
                if(!$l['active']) {
                    $items = $items.'<li id="myDropdown"> <a id="myDropdown" href="'. $l['url'].'">'. $dif[0] .'</a></li>';
                }
            }
        }
        $items = $items.'</ul></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'custom_languages_menu',10,2 );



function get_top_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        if ($cat->parent == 0) {
            $top_cat_obj[] = $cat;  
        }
    }
    $top_cat_obj = $top_cat_obj[0];
    return $top_cat_obj;
}



if (!function_exists('manual_social_share')) {
	function manual_social_share($url){
		global $theme_options;
		if( isset($theme_options['theme-social-box']) && $theme_options['theme-social-box'] == true ) {
			if( isset($theme_options['theme-social-box-mailto-subject']) ){
				$mailto = $theme_options['theme-social-box-mailto-subject'];
			} else {
				$mailto = '';
			}
			
		?>
		<div class="social-box">
		<?php 
		if( !empty($theme_options['theme-social-share-displaycrl-status']) ) {
        $current_lang = apply_filters( 'wpml_current_language', NULL );
            if($current_lang == "en" ){
                echo "<h2> Share this article!</h2>";
            }
            else if($current_lang == "es"){
                echo "<h2> Comparte este artículo!</h2>";
            }
            else if($current_lang == "pt-pt"){
                echo "<h2> Partilha este artigo!</h2>";
            }
            else{
                echo "<h2> Share this article!</h2>";
            }
			foreach ( $theme_options['theme-social-share-displaycrl-status'] as $key => $value ) {
				if( $key == 'linkedin' && $value == 1 ) {
					echo '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$url.'"><i class="fa fa-linkedin social-share-box"></i></a>';
				} 
				if( $key == 'twitter' && $value == 1 ) {
					echo '<a target="_blank" href="https://twitter.com/home?status='.$url.'"><i class="fa fa-twitter social-share-box"></i></a>';
				}
				if( $key == 'facebook' && $value == 1 ) {
					echo '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" title="facebook"><i class="fa fa-facebook social-share-box"></i></a>';
				}
				if( $key == 'pinterest' && $value == 1 ) {
					echo '<a target="_blank" href="https://pinterest.com/pin/create/button/?url='. $url .'&media=&description="><i class="fa fa-pinterest social-share-box"></i></a>';
				}
				if( $key == 'google-plus' && $value == 1 ) {
					echo '<a target="_blank" href="https://plus.google.com/share?url='.$url.'"><i class="fa fa-google-plus social-share-box"></i></a>';
				}
				if( $key == 'email' && $value == 1 ) {
					echo '<a target="_blank" href="mailto:?Subject='.$mailto. '&amp;body='.$url.'"><i class="fa fa-envelope-o social-share-box"></i></a>';
				}
			}
		} 
		?>
		</div>
		<?php 
		}
	}
}


function traduzirCookie($var){
    $current_lang = apply_filters( 'wpml_current_language', NULL );
    if($var == 'Administrator'){
        if($current_lang == "en" ){
            $perfilselect = "Administrator";
        }
        else if($current_lang == "es"){
            $perfilselect = "Administrador";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Administrador";
        }
        else{
            $perfilselect = "Administrator";
        }
    }
    
    else if($var == 'Subscriber'){
        if($current_lang == "en" ){
            $perfilselect = "Subscriber";
        }
        else if($current_lang == "es"){
            $perfilselect = "Suscriptor";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Subscritor";
        }
        else{
            $perfilselect = "Subscriber";
        }
        
    }
    
    else if($var == 'Manager'){
        if($current_lang == "en" ){
            $perfilselect = "Manager";
        }
        else if($current_lang == "es"){
            $perfilselect = "Gestor";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Gestor";
        }
        else{
            $perfilselect = "Manager";
        }
    }
    
    else if($var == 'Technician'){
        if($current_lang == "en" ){
            $perfilselect = "Technician";
        }
        else if($current_lang == "es"){
            $perfilselect = "Técnico";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Técnico";
        }
        else{
            $perfilselect = "Technician";
        }
    }
    
    else if($var == 'Requester'){
        if($current_lang == "en" ){
            $perfilselect = "Requester";
        }
        else if($current_lang == "es"){
            $perfilselect = "Solicitante";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Requisitante";
        }
        else{
            $perfilselect = "Requester";
            
        }
        
    }
    
    else if($var == 'Developer'){
        if($current_lang == "en" ){
            $perfilselect = "Developer";
        }
        else if($current_lang == "es"){
            $perfilselect = "Developer";
        }
        else if($current_lang == "pt-pt"){
            $perfilselect = "Developer";
        }
        else{
            $perfilselect = "Developer";
            
        }
        
    }
    return $perfilselect;
}

function traduzirString(){
     $current_lang = apply_filters( 'wpml_current_language', NULL );
        if($current_lang == "es"){
            $idiomaStrg = 'Ver Todos ';
        }
        else if($current_lang == "pt-pt"){
            $idiomaStrg = 'Ver Todos ';
        }
        else{
            $idiomaStrg = 'View All ';
        }
    return $idiomaStrg;
}


function categoriaid(){
    $paginaID = selecionaPerfilPagID();
    $conteudo = printPageContent( $paginaID );
    $padrao = '/"([0-9+\,]+)"/';
    $group = array();
    $vetor = preg_match_all( $padrao , $conteudo , $soma);
    foreach($soma[0] as $uni){
        $filtro = str_replace('"' , "", $uni);
        $pieces = explode(",", $uni);
        foreach ($pieces as $piece){
            array_push( $group, (str_replace('"' , "", $piece)));
        }
        #array_push( $group, (str_replace('"' , "", $uni)));
    }
    return $group;
}

function printPageContent($pagina){
    $post = get_post( $pagina );
    $conteudo = $post->post_content;
    return $conteudo;
}

function selecionaPerfilPagID(){
    $current_lang = apply_filters( 'wpml_current_language', NULL );
    $var = $_COOKIE["perfil"];
    if($var == 'Administrator'){
        if($current_lang == "en" ){
            $pageID = '84';
        }
        else if($current_lang == "es"){
            $pageID = '1357';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '1338';
        }
        else{
            $pageID = '84';
        }
    }
    
    else if($var == 'Subscriber'){
        if($current_lang == "en" ){
            $pageID = '13';
        }
        else if($current_lang == "es"){
            $pageID = '1397';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '1394';
        }
        else{
            $pageID = '13';
        }
        
    }
    
    else if($var == 'Manager'){
        if($current_lang == "en" ){
            $pageID = '86';
        }
        else if($current_lang == "es"){
            $pageID = '1378';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '1368';
        }
        else{
            $pageID = '86';
        }
    }
    
    else if($var == 'Technician'){
        if($current_lang == "en" ){
            $pageID = '88';
        }
        else if($current_lang == "es"){
            $pageID = '1405';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '1400';
        }
        else{
            $pageID = '88';
        }
    }
    
    else if($var == 'Requester'){
        if($current_lang == "en" ){
            $pageID = '84';
        }
        else if($current_lang == "es"){
            $pageID = '';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '';
        }
        else{
            $pageID = '';
        }
        
    }
    
    else if($var == 'Developer'){
        if($current_lang == "en" ){
            $pageID = '90';
        }
        else if($current_lang == "es"){
            $pageID = '1390';
        }
        else if($current_lang == "pt-pt"){
            $pageID = '1387';
        }
        else{
            $pageID = '90';
        }
    }
    return $pageID;
}



add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
    register_taxonomy_for_object_type( 'post_tag', 'fork' );
};

/*
function customjs(){
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array ( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'customjs' );


function customjavas(){
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery') , 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'customjavas' );
*/

wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/listacategorias.php');


function targetProfile($query){
    if ( $query->is_main_query() ) {
        if(isset($_COOKIE["perfil"])) {
            $perfil = $_COOKIE["perfil"];
            $listaoriginal = categoriaid();
            $recipiente = array();
            foreach( $listaoriginal as $idlink ) {
                $categorias = get_terms(array('taxonomy' => 'manualknowledgebasecat', 'parent' => $idlink));
                foreach( $categorias as $categoria ) {
                    $vart = $categoria->term_id;
                    array_push( $recipiente, $vart );
                }

            }
            foreach( $listaoriginal as $idlink ) {
                array_push( $recipiente, $idlink );
            }

            $recipiente = array_unique( $recipiente );
            $string = rtrim(implode(',', $recipiente), ',');
            #$lista = "'".$string."'";
            $lista = $string;
            #$query->query_vars['taxonomy'] = 'manualknowledgebasecat';
            #$query->query_vars['terms'] = array(40,43,41,42,48,44,45,49,4,39,373,51,387,369,370,396,452);
            #$query->query_vars['category__in'] = '399';
            #$query->query_vars['posts_per_page'] = 10;
            $args = array(
                            'post_type' => 'manual_kb',
                            #'cat' => $lista,
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'manualknowledgebasecat',
                                'terms'  => array(399)
                                ),
                            )
        );
            $query = new WP_Tax_Query( $args );
        }    
    }
    return $query;
}

add_action( 'pre_get_posts', 'targetProfile' );


function strip_tags_content($text, $tags = '', $invert = FALSE) { 

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  } 
  return $text; 
}


add_filter( 'bulk_actions-edit-fork', 'register_my_bulk_actions' );


function register_my_bulk_actions($bulk_actions) {
  $bulk_actions['my_bulk_action'] = __( 'Merge Fork', 'merge_fork');
  return $bulk_actions;
}


add_filter( 'handle_bulk_actions-edit-fork', 'my_bulk_action_handler', 10, 3 );
 
function my_bulk_action_handler( $redirect_to, $action_name, $post_ids ) { 
  if ( 'my_bulk_action' !== $action_name ) { 
      return $redirect_to;
  }
    foreach ( $post_ids as $post_id ) { 
      //$post = get_post($post_id); 
      //process $post wp_update_post($post); 
        $some_var = new Fork_Merge( $post_id );
        $some_var->merge( $post_id );
    }
    $redirect_to = add_query_arg( 'bulk_forks_processed', count( $post_ids ), $redirect_to ); 
    #$redirect_to = add_query_arg( 'bulk_forks_processed', $teste , $redirect_to ); 
    return $redirect_to;
}


add_action( 'admin_notices', 'my_bulk_action_admin_notice' );
 
function my_bulk_action_admin_notice() {
  if ( ! empty( $_REQUEST['bulk_forks_processed'] ) ) {
    $emailed_count = intval( $_REQUEST['bulk_forks_processed'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Merged %s post to HelpCenter.',
        'Merged %s posts to HelpCenter.',
        $emailed_count,
        'merge_fork'
      ) . '</div>', $emailed_count );
  }
}


?>