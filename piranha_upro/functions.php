<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('my-font', get_stylesheet_directory_uri() . '/css/font.css');
    wp_enqueue_style('my-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('my-fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('my-styles', get_stylesheet_directory_uri() . '/css/styles.css');
    wp_enqueue_style('my-responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('my-style-main', get_stylesheet_directory_uri() . '/style.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('my-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('my-gsap', get_stylesheet_directory_uri() . '/js/gsap.js', array(), false, true);
    wp_enqueue_script('my-ScrollTrigger', get_stylesheet_directory_uri() . '/js/ScrollTrigger.js', array(), false, true);
    wp_enqueue_script('my-lenis', get_stylesheet_directory_uri() . '/js/lenis.js', array(), false, true);
    wp_enqueue_script('my-split-type', get_stylesheet_directory_uri() . '/js/split-type.js', array(), false, true);
    wp_enqueue_script('my-mask', get_stylesheet_directory_uri() . '/js/jquery.mask.js', array(), false, true);
    wp_enqueue_script('my-dotdotdot', get_stylesheet_directory_uri() . '/js/jquery.dotdotdot.js', array(), false, true);
    wp_enqueue_script('my-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
    wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/script.js', array(), false, true);
    wp_enqueue_script('my-add', get_stylesheet_directory_uri() . '/js/add.js', array(), false, true);
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer-1' => 'Footer menu 1',
        'footer-2' => 'Footer menu 2',
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
    $siteURL = get_bloginfo('stylesheet_directory').'/img/acf/';
    ?>
    <style>
        .imagePreview { position:absolute; right:100%; bottom:0; z-index:999999; border:1px solid #f2f2f2; box-shadow:0 0 3px #b6b6b6; background-color:#fff; padding:20px;}
        .imagePreview img { width:500px; height:auto; display:block; }
        .acf-tooltip li:hover { background-color:#0074a9; }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var waitForEl = function(selector, callback) {
                if (jQuery(selector).length) {
                    callback();
                } else {
                    setTimeout(function() {
                        waitForEl(selector, callback);
                    }, 100);
                }
            };
            $(document).on('click', 'a[data-name=add-layout]', function() {
                waitForEl('.acf-tooltip li', function() {
                    $('.acf-tooltip li a').hover(function() {
                        var imageTP = $(this).attr('data-layout');
                        var imageFormt = '.png';
                        $(this).append('<div class="imagePreview"><img src="<?php echo $siteURL; ?>'+ imageTP + imageFormt+'"></div>');
                    }, function() {
                        $('.imagePreview').remove();
                    });
                });
            })
        })
    </script>
    <?php
}


function add_class_content($string, $p_class='', $h_class='') {

    if (str_contains($string, '<h') && $h_class) {
        foreach (range(1,6) as $i) {
            $from[] = "<h$i";
            $to[] = '<h'. $i .' class="'. $h_class . '"';
        }
    } 
    if (str_contains($string, '<p') && $p_class){
        $from[] = "<p";
        $to[] = '<p class="'. $p_class . '"';
    }

    return str_replace ($from, $to, $string);

}


function checkArrayForValues($arr) {
    foreach ($arr as $value) {
        if (is_array($value)) {
            if (checkArrayForValues($value)) {
                return true;
            }
        } else {
            if (!empty($value)) {
                return true;
            }
        }
    }
    return false;
}


function custom_language_switcher(){
    $languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
    if(!empty($languages)){ 
        ?>

        <div class="lang-switcher">

            <?php
            foreach($languages as $index => $language){
                if($language['active'] === '1') echo '<button type="button">' . $language['native_name'] . '</button>';
            }
            ?>

            <ul>

                <?php
                foreach($languages as $index => $language){
                    echo '<li><a href="' . $language['url'] . '">' . $language['native_name'] . '</a></li>';
                }
                ?>

            </ul>
        </div>

        <?php
    }
}