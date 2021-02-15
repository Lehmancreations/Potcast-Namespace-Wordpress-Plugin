<?PHP

/*
Plugin Name: Podcast Namespace
Plugin URI: https://github.com/Lehmancreations/Podcast-Namespace-Wordpress-Plugin
Description: A plugin to add the podcasting 2.0 namespace to your Powerpress feeds
Version: 1.2
Author: Lehmancreations
Author URI: https://lehmancreations.com
Requires at least: 3.6


*/


/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class PodcastNamespace {
	private $podcast_namespace_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'podcast_namespace_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'podcast_namespace_page_init' ) );
	}

	public function podcast_namespace_add_plugin_page() {
		add_options_page(
			'Podcast Namespace', // page_title
			'Podcast Namespace', // menu_title
			'manage_options', // capability
			'podcast-namespace', // menu_slug
			array( $this, 'podcast_namespace_create_admin_page' ) // function
		);
	}

	public function podcast_namespace_create_admin_page() {
		$this->podcast_namespace_options = get_option( 'podcast_namespace_option_name' ); ?>

		<div class="wrap">
			<h2>Podcast Namespace</h2>
			<p><b>Set these options for the podcast namespace at the channel level</b></p>
			
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'podcast_namespace_option_group' );
					do_settings_sections( 'podcast-namespace-admin' );
					submit_button();
				?>
			

			
			</form>
		</div>
<div>
				<p>
				<b>To use the item level namespace place the following each in a custom field on the post:</b><br><br>
			transcript is the name and value is a URL to the json encoded transcript file, you can have more than one of these but currently we only support json<br><br>
			chapters is the name and value is a URL to a json encoded chapter file<br><br>
			person: use the custom person box on the post	<br><br>
			soundbite: use the custom soundbite box on the post
				</p>
</div>

<div>
	<p>
		<hr>
		Do you like this plugin? <a href="https://dudesanddadspodcast.com/paypal"> Consider a paypal donation to the podcast I host/produce </a>
	</p>
</div>
	<?php }

	public function podcast_namespace_page_init() {
		register_setting(
			'podcast_namespace_option_group', // option_group
			'podcast_namespace_option_name', // option_name
			array( $this, 'podcast_namespace_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'podcast_namespace_setting_section', // id
			'Settings', // title
			array( $this, 'podcast_namespace_section_info' ), // callback
			'podcast-namespace-admin' // page
		);

		add_settings_field(
			'locked_0', // id
			'Locked', // title
			array( $this, 'locked_0_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);

		add_settings_field(
			'locked_owner_1', // id
			'Locked Owner Email', // title
			array( $this, 'locked_owner_1_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);

		add_settings_field(
			'feedback_contact_email_2', // id
			'Feedback Contact Email', // title
			array( $this, 'feedback_contact_email_2_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);

		add_settings_field(
			'abuse_contact_email_3', // id
			'Abuse Contact Email', // title
			array( $this, 'abuse_contact_email_3_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);

		add_settings_field(
			'advertising_contact_email_3', // id
			'Advertising Contact Email', // title
			array( $this, 'advertising_contact_email_3_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
		
		
		
		add_settings_field(
			'funding_url_4', // id
			'Funding Url', // title
			array( $this, 'funding_url_4_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
		
		add_settings_field(
			'funding_description_0', // id
			'Funding Description', // title
			array( $this, 'funding_description_0_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
		add_settings_field(
			'location_description_0', // id
			'Location Description', // title
			array( $this, 'location_description_0_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
		
		add_settings_field(
			'location_geo_description_0', // id
			'Location Coordinates', // title
			array( $this, 'location_geo_description_0_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
		
		add_settings_field(
			'location_osm_description_0', // id
			'Location OSMID', // title
			array( $this, 'location_osm_description_0_callback' ), // callback
			'podcast-namespace-admin', // page
			'podcast_namespace_setting_section' // section
		);
	}

	public function podcast_namespace_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['locked_0'] ) ) {
			$sanitary_values['locked_0'] = $input['locked_0'];
		}

		if ( isset( $input['locked_owner_1'] ) ) {
			$sanitary_values['locked_owner_1'] = sanitize_text_field( $input['locked_owner_1'] );
		}

		if ( isset( $input['feedback_contact_email_2'] ) ) {
			$sanitary_values['feedback_contact_email_2'] = sanitize_text_field( $input['feedback_contact_email_2'] );
		}

		if ( isset( $input['abuse_contact_email_3'] ) ) {
			$sanitary_values['abuse_contact_email_3'] = sanitize_text_field( $input['abuse_contact_email_3'] );
		}
		
		if ( isset( $input['advertising_contact_email_3'] ) ) {
			$sanitary_values['advertising_contact_email_3'] = sanitize_text_field( $input['advertising_contact_email_3'] );
		}

		if ( isset( $input['funding_url_4'] ) ) {
			$sanitary_values['funding_url_4'] = sanitize_text_field( $input['funding_url_4'] );
		}
		
		if ( isset( $input['funding_description_0'] ) ) {
			$sanitary_values['funding_description_0'] = sanitize_text_field( $input['funding_description_0'] );
		}
		
		if ( isset( $input['location_description_0'] ) ) {
			$sanitary_values['location_description_0'] = sanitize_text_field( $input['location_description_0'] );
		}
		
		if ( isset( $input['location_geo_description_0'] ) ) {
			$sanitary_values['location_geo_description_0'] = sanitize_text_field( $input['location_geo_description_0'] );
		}

		if ( isset( $input['location_osm_description_0'] ) ) {
			$sanitary_values['location_osm_description_0'] = sanitize_text_field( $input['location_osm_description_0'] );
			
		return $sanitary_values;
		}
		
	}
	public function podcast_namespace_section_info() {
		
	}

	public function locked_0_callback() {
		?> <select name="podcast_namespace_option_name[locked_0]" id="locked_0">
			<?php $selected = (isset( $this->podcast_namespace_options['locked_0'] ) && $this->podcast_namespace_options['locked_0'] === 'yes') ? 'selected' : '' ; ?>
			<option value="yes" <?php echo $selected; ?>>Yes</option>
			<?php $selected = (isset( $this->podcast_namespace_options['locked_0'] ) && $this->podcast_namespace_options['locked_0'] === 'no') ? 'selected' : '' ; ?>
			<option value="no" <?php echo $selected; ?>>No</option>
		</select> <?php
	}

	public function locked_owner_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[locked_owner_1]" id="locked_owner_1" value="%s">',
			isset( $this->podcast_namespace_options['locked_owner_1'] ) ? esc_attr( $this->podcast_namespace_options['locked_owner_1']) : ''
		);
	}

	public function feedback_contact_email_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[feedback_contact_email_2]" id="feedback_contact_email_2" value="%s">',
			isset( $this->podcast_namespace_options['feedback_contact_email_2'] ) ? esc_attr( $this->podcast_namespace_options['feedback_contact_email_2']) : ''
		);
	}

	public function abuse_contact_email_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[abuse_contact_email_3]" id="abuse_contact_email_3" value="%s">',
			isset( $this->podcast_namespace_options['abuse_contact_email_3'] ) ? esc_attr( $this->podcast_namespace_options['abuse_contact_email_3']) : ''
		);
	}
	
	public function advertising_contact_email_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[advertising_contact_email_3]" id="adertising_contact_email_3" value="%s">',
			isset( $this->podcast_namespace_options['advertising_contact_email_3'] ) ? esc_attr( $this->podcast_namespace_options['advertising_contact_email_3']) : ''
		);
	}

	public function funding_url_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[funding_url_4]" id="funding_url_4" value="%s">',
			isset( $this->podcast_namespace_options['funding_url_4'] ) ? esc_attr( $this->podcast_namespace_options['funding_url_4']) : ''
		);
	}
		
	public function funding_description_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[funding_description_0]" id="funding_description_0" value="%s">',
			isset( $this->podcast_namespace_options['funding_description_0'] ) ? esc_attr( $this->podcast_namespace_options['funding_description_0']) : ''
		);
	}
		
	public function location_description_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[location_description_0]" id="location_description_0" value="%s">',
			isset( $this->podcast_namespace_options['location_description_0'] ) ? esc_attr( $this->podcast_namespace_options['location_description_0']) : ''
		);
	}
	
	public function location_geo_description_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[location_geo_description_0]" id="location_geo_description_0" value="%s">',
			isset( $this->podcast_namespace_options['location_geo_description_0'] ) ? esc_attr( $this->podcast_namespace_options['location_geo_description_0']) : ''
		);
	}
	
	public function location_osm_description_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="podcast_namespace_option_name[location_osm_description_0]" id="location_osm_description_0" value="%s">',
			isset( $this->podcast_namespace_options['location_osm_description_0'] ) ? esc_attr( $this->podcast_namespace_options['location_osm_description_0']) : ''
		);
	}

}
if ( is_admin() )
	$podcast_namespace = new PodcastNamespace();

/* 
 * Retrieve this value with:
 * $podcast_namespace_options = get_option( 'podcast_namespace_option_name' ); // Array of All Options
 * $locked_0 = $podcast_namespace_options['locked_0']; // Locked
 * $locked_owner_1 = $podcast_namespace_options['locked_owner_1']; // Locked Owner
 * $feedback_contact_email_2 = $podcast_namespace_options['feedback_contact_email_2']; // Feedback Contact Email
 * $abuse_contact_email_3 = $podcast_namespace_options['abuse_contact_email_3']; // Abuse Contact Email
 * $advertising_contact_email_3 = $podcast_namespace_options['advertising_contact_email_3']; // Advertising Contact Email
 * $funding_url_4 = $podcast_namespace_options['funding_url_4']; // Funding Url
 * $funding_description_0 = $podcast_namespace_options['funding_description_0']; // Funding Description
 * $location_description_0 = $podcast_namespace_options['location_description_0']; // Location Description
 * $location_geo_description_0 = $podcast_namespace_options['location_geo_description_0']; // Location Description Coordinates
 * $location_osm_description_0 = $podcast_namespace_options['location_osm_description_0']; // OSMID of the podcast
 */



function podcastindex_rss2_ns()
{
	if( !powerpress_is_podcast_feed() )
		return;

	// Okay, lets add the namespace
	echo 'xmlns:podcast="https://github.com/Podcastindex-org/podcast-namespace/blob/main/docs/1.0.md"'.PHP_EOL;
	
}

add_action('rss2_ns', 'podcastindex_rss2_ns');
add_action('rss2_ns_podcastindex', 'podcastindex_rss2_ns');




function podastindex_rss2_head()
{
	if( !powerpress_is_podcast_feed() )
		return;
	
	$podcast_namespace_options = get_option( 'podcast_namespace_option_name' ); // Array of All Options
	
	
	
	
	
		echo "<!-- Podcast Namespace Tags Added by LehmanCreations V1.2 -->".PHP_EOL;	
	
	    if (!empty ( $podcast_namespace_options['locked_owner_1'] )) {
			echo "\t".'<podcast:locked owner="' . $podcast_namespace_options['locked_owner_1'] .'">' . $podcast_namespace_options['locked_0'] . '</podcast:locked>'.PHP_EOL; }
		
		 if (!empty ( $podcast_namespace_options['feedback_contact_email_2'] )) {
			echo "\t".'<podcast:contact type="feedback" method="email">'. $podcast_namespace_options['feedback_contact_email_2'] .'</podcast:contact>'.PHP_EOL; }
	
		if (!empty ( $podcast_namespace_options['abuse_contact_email_3'] )) {
			echo "\t".'<podcast:contact type="abuse" method="email">' . $podcast_namespace_options['abuse_contact_email_3'] . '</podcast:contact>'.PHP_EOL; }
		
		if (!empty ( $podcast_namespace_options['advertising_contact_email_3'] )) {
			echo "\t".'<podcast:contact type="advertising" method="email">' . $podcast_namespace_options['advertising_contact_email_3'] . '</podcast:contact>'.PHP_EOL; }
		
		if (!empty ( $podcast_namespace_options['funding_url_4'] )) {
			echo "\t".'<podcast:funding url="'. $podcast_namespace_options['funding_url_4'] . '">' .$podcast_namespace_options['funding_description_0']. '</podcast:funding>'.PHP_EOL; }
	
	   if (!empty ( $podcast_namespace_options['location_description_0'] )) { 
	  		echo "\t".'<podcast:location geo="geo:' . $podcast_namespace_options['location_geo_description_0'] . '" osm="' . $podcast_namespace_options['location_osm_description_0'] . '">' .$podcast_namespace_options['location_description_0']. '</podcast:location>'.PHP_EOL; }

}

add_action('rss2_head', 'podastindex_rss2_head');



// Item level

//Chapters
function podcastindex_rss2_chapters( $content ) {

	if( !powerpress_is_podcast_feed() )
		return;


    global $post;
    $post_chapters = get_post_meta( $post->ID, 'chapters', TRUE );
    // add chapters only if the Custom Field is set
    if ( $post_chapters ) {
 echo '<podcast:chapters url="'.$post_chapters .'" type="application/json"/>'.PHP_EOL;
    } else {
        return;
    }
	
	
}

add_filter( 'rss2_item', 'podcastindex_rss2_chapters' );



//Transcripts

function podcastindex_rss2_transcript( $content ) {

	if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $post_transcripts = get_post_meta( $post->ID, 'transcript');
    // add chapters only if the Custom Field is set
    if ( $post_transcripts ) {
		
		foreach( $post_transcripts as $post_transcript ) {
		echo "\t".'<podcast:transcript url="'.$post_transcript .'" type="application/json"/>'.PHP_EOL;
		}
		
		
 
    } else {
        return;
    }
	
	
}

add_filter( 'rss2_item', 'podcastindex_rss2_transcript' );



//Person
//Person - Custom Meta box

// START CUSTOM META BOX PERSON
//Add metabox with dynamically added key-value (with more values possible) custom fields


//TO CUSTOMIZE FIND AND REPLACE ANYTHING WITH psn in it

// Caution, there're 2 set of options below
//Variables used in the following functions should be mentioned in the 'global' statement of each of them appropriately
//=======Options 1=======
$psn_post_type = 'post';
$psn_metabox_label = 'Podcast Person';
$psn_cf_name = 'person';

// Add actions, initialise functions
add_action( 'add_meta_boxes', 'psn_dynamic_add_custom_box' );
add_action( 'save_post', 'psn_dynamic_save_postdata' );

//Function to add a meta box 
function psn_dynamic_add_custom_box() {
	global $psn_post_type, $psn_metabox_label;

	add_meta_box('psn_dynamic_sectionid', $psn_metabox_label, 'psn_dynamic_inner_custom_box', $psn_post_type);
}

//Function that defines metabox contents
function psn_dynamic_inner_custom_box() {

	//=======Options 2=======
	$psn_label_addnew = 'Add Person';
	$psn_label_remove = 'Remove person';

	$psn_key_name = 'name';
	$psn_value_name = 'role';
	$psn_value2_name = 'img';
	$psn_value3_name = 'url';

	
	$psn_key_label = 'Name';
	$psn_value_label = 'Role (host/guest)';
	$psn_value2_label = 'Image URL';
	$psn_value3_label = 'URL';


	global $post;
	global $psn_cf_name;

	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'psn_dynamicMeta_noncename' );

	//OPTIONAL - if using a date field
	//Load admin scripts & styles for JS datepicker via the class from Meta Box plugin. This requires Meta Box plugin by Rilwis installed http://x.co/1YgqA
	// $loadJqUIfromMetaboxPlugin = new RWMB_Date_Field();
	// $loadJqUIfromMetaboxPlugin->admin_enqueue_scripts();

	?>
	<div id="psn_dynamic_inner_custom_box">
	<?php
	$psn_items = get_post_meta($post->ID,$psn_cf_name,true);
	$c = 0;
	if ( is_array($psn_items) && count( $psn_items ) > 0 ) {
		foreach( $psn_items as $psn_item ) {
		
		
			if ( isset( $psn_item[$psn_key_name] ) || isset( $psn_item[$psn_value_name] ) ) {
				printf( '<p class="psn_parent"><label for=""%6$s[%1$s][%4$s]">%8$s</label> <input type="text" name="%6$s[%1$s][%4$s]" id="%6$s[%1$s][%4$s]" value="%2$s"> <label for="%6$s[%1$s][%5$s]">%9$s</label> <input id="%6$s[%1$s][%5$s]" type="text" name="%6$s[%1$s][%5$s]" value="%3$s"><label for="%6$s[%1$s][%10$s]">%11$s</label> <input type="text" id="%6$s[%1$s][%10$s]" name="%6$s[%1$s][%10$s]" value="%12$s"><label for="%6$s[%1$s][%13$s]">%14$s</label> <input type="text" id="%6$s[%1$s][%13$s]" name="%6$s[%1$s][%13$s]" value="%15$s"> <a href="#" class="psn_remove">%7$s</a></p>', 
			/*1*/   $c, 
			/*2*/   $psn_item[$psn_key_name], 
			/*3*/   $psn_item[$psn_value_name], 
			/*4*/   $psn_key_name, 
			/*5*/   $psn_value_name, 
			/*6*/   $psn_cf_name, 
			/*7*/   $psn_label_remove,
			/*8*/   $psn_key_label,
			/*9*/   $psn_value_label,
			/*10*/   $psn_value2_name,
			/*11*/   $psn_value2_label,
			/*12*/   $psn_item[$psn_value2_name], 
			/*13*/   $psn_value3_name,
			/*14*/   $psn_value3_label,
			/*15*/   $psn_item[$psn_value3_name]
				);
				$c = $c + 1;
			}
		}
	}
	?>
	<span id="psn_here"></span>
	<a href="#" class="psn_add button-secondary"><?php echo $psn_label_addnew; ?></a>
	<style type="text/css">
		.psn_parent {display: flex;}
		.psn_parent > * {flex:1 1 auto;}
		.psn_parent label {padding-right:5px; text-align: right;}
		.psn_parent .psn_remove {padding-left: 5px;}
	</style>
	<script>
		var $ =jQuery.noConflict();
		$(document).ready(function() {
			
			//OPTIONAL
			//Add datepicker to an input
			//$('body').on('focus',".choosedate", function(){ //Allows to init datepicker on non existing yet elements
			//	$(this).datepicker({ dateFormat: "dd.mm.yy" });
			//});

			var count = <?php echo $c; ?>;
			$(".psn_add").on('click',function(e) {
				e.preventDefault();
				count = count + 1;
				$('#psn_here').append('<p class="psn_parent"><label for="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_key_name; ?>]"><?php echo $psn_key_label; ?></label> <input type="text" id="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_key_name; ?>]" name="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_key_name; ?>]" value="">  <label for="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value_name; ?>]"><?php echo $psn_value_label; ?></label> <input type="text" name="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value_name; ?>]" id="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value_name; ?>]" value=""><label for="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value2_name; ?>]"><?php echo $psn_value2_label; ?></label> <input type="text" name="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value2_name; ?>]" id="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value2_name; ?>]" value=""><label for="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value3_name; ?>]"><?php echo $psn_value3_label; ?></label> <input type="text" name="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value3_name; ?>]" id="<?php echo $psn_cf_name; ?>['+count+'][<?php echo $psn_value3_name; ?>]" value=""><a href="#" class="psn_remove"><?php echo $psn_label_remove; ?></a></p>');
				return false;
			});
			$("#psn_dynamic_inner_custom_box").on('click', '.psn_remove', function(e) {
				e.preventDefault();
				$(this).parent().remove();
			});
		});
		</script>
	</div><?php
}

/* When the post is saved, saves our custom data */
function psn_dynamic_save_postdata( $post_id ) {
global $psn_cf_name;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	if ( !isset( $_POST['psn_dynamicMeta_noncename'] ) )
		return;
	if ( !wp_verify_nonce( $_POST['psn_dynamicMeta_noncename'], plugin_basename( __FILE__ ) ) )
		return;
	
	$data2post = $_POST[$psn_cf_name];
	
	if (is_null($data2post)) {
		$psn_items = get_post_meta($post->ID,$psn_cf_name,true);
		delete_post_meta($post_id,$psn_cf_name, $psn_items);
	} else {

	update_post_meta($post_id,$psn_cf_name,$data2post);
	}
}	


// END CUSTOM META BOX



//Person RSS feed
function podcastindex_rss2_person( $content ) {
		if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $post_person = get_post_meta($post->ID, 'person',true); // get the value 

    // add person only if the Custom Field is set
    if ( $post_person ) {
		
		foreach( $post_person as $k => $v) {

			
		echo "\t".'<podcast:person role="'. $v['role'] .'" img="' . $v['img'] . '" href="' . $v['url'] . '">' . $v['name'] .'</podcast:person>' .PHP_EOL;
		}
		
		
 
    } else {
        return;
    }
}


add_filter( 'rss2_item', 'podcastindex_rss2_person' );

// Soundbite 

//Soundbite - custom metabox

//=======Options 1=======
$sbite_post_type = 'post';
$sbite_metabox_label = 'Podcast Soundbites';
$sbite_cf_name = 'soundbites';

// Add actions, initialise functions
add_action( 'add_meta_boxes', 'sbite_dynamic_add_custom_box' );
add_action( 'save_post', 'sbite_dynamic_save_postdata' );

//Function to add a meta box 
function sbite_dynamic_add_custom_box() {
	global $sbite_post_type, $sbite_metabox_label;

	add_meta_box('sbite_dynamic_sectionid', $sbite_metabox_label, 'sbite_dynamic_inner_custom_box', $sbite_post_type);
}

//Function that defines metabox contents
function sbite_dynamic_inner_custom_box() {

	//=======Options 2=======
	$sbite_label_addnew = 'Add Soundbite';
	$sbite_label_remove = 'Remove Soundbite';

	$sbite_key_name = 'startTime';
	$sbite_value_name = 'title';
	$sbite_value2_name = 'duration';

	
	$sbite_key_label = 'Start Time (seconds)';
	$sbite_value_label = 'Title';
	$sbite_value2_label = 'Duration (seconds)';


	global $post;
	global $sbite_cf_name;

	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'sbite_dynamicMeta_noncename' );

	//OPTIONAL - if using a date field
	//Load admin scripts & styles for JS datepicker via the class from Meta Box plugin. This requires Meta Box plugin by Rilwis installed http://x.co/1YgqA
	// $loadJqUIfromMetaboxPlugin = new RWMB_Date_Field();
	// $loadJqUIfromMetaboxPlugin->admin_enqueue_scripts();

	?>
	<div id="sbite_dynamic_inner_custom_box">
	<?php
	$sbite_items = get_post_meta($post->ID,$sbite_cf_name,true);
	$c = 0;
	if ( is_array($sbite_items) && count( $sbite_items ) > 0 ) {
		foreach( $sbite_items as $sbite_item ) {
		
		
			if ( isset( $sbite_item[$sbite_key_name] ) || isset( $sbite_item[$sbite_value_name] ) ) {
				printf( '<p class="sbite_parent"><label for=""%6$s[%1$s][%5$s]">%9$s</label> <input type="text" name="%6$s[%1$s][%5$s]" id="%6$s[%1$s][%5$s]" value="%3$s"> <label for="%6$s[%1$s][%4$s]">%8$s</label> <input id="%6$s[%1$s][%4$s]" type="text" name="%6$s[%1$s][%4$s]" value="%2$s"><label for="%6$s[%1$s][%10$s]">%11$s</label> <input type="text" id="%6$s[%1$s][%10$s]" name="%6$s[%1$s][%10$s]" value="%12$s"> <a href="#" class="sbite_remove">%7$s</a></p>', 
			/*1*/   $c, 
			/*2*/   $sbite_item[$sbite_key_name], 
			/*3*/   $sbite_item[$sbite_value_name], 
			/*4*/   $sbite_key_name, 
			/*5*/   $sbite_value_name, 
			/*6*/   $sbite_cf_name, 
			/*7*/   $sbite_label_remove,
			/*8*/   $sbite_key_label,
			/*9*/   $sbite_value_label,
			/*10*/   $sbite_value2_name,
			/*11*/   $sbite_value2_label,
			/*12*/   $sbite_item[$sbite_value2_name]  
				);
				$c = $c + 1;
			}
		}
	}
	?>
	<span id="sbite_here"></span>
	<a href="#" class="sbite_add button-secondary"><?php echo $sbite_label_addnew; ?></a>
	<style type="text/css">
		.sbite_parent {display: flex;}
		.sbite_parent > * {flex:1 1 auto;}
		.sbite_parent label {padding-right:5px; text-align: right;}
		.sbite_parent .sbite_remove {padding-left: 5px;}
	</style>
	<script>
		var $ =jQuery.noConflict();
		$(document).ready(function() {
			
			//OPTIONAL
			//Add datepicker to an input
			//$('body').on('focus',".choosedate", function(){ //Allows to init datepicker on non existing yet elements
			//	$(this).datepicker({ dateFormat: "dd.mm.yy" });
			//});

			var count = <?php echo $c; ?>;
			$(".sbite_add").on('click',function(e) {
				e.preventDefault();
				count = count + 1;
				$('#sbite_here').append('<p class="sbite_parent"><label for="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value_name; ?>]"><?php echo $sbite_value_label; ?></label> <input type="text" id="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value_name; ?>]" name="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value_name; ?>]" value="">  <label for="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_key_name; ?>]"><?php echo $sbite_key_label; ?></label> <input type="text" name="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_key_name; ?>]" id="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_key_name; ?>]" value=""><label for="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value2_name; ?>]"><?php echo $sbite_value2_label; ?></label> <input type="text" name="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value2_name; ?>]" id="<?php echo $sbite_cf_name; ?>['+count+'][<?php echo $sbite_value2_name; ?>]" value=""> <a href="#" class="sbite_remove"><?php echo $sbite_label_remove; ?></a></p>');
				return false;
			});
			$("#sbite_dynamic_inner_custom_box").on('click', '.sbite_remove', function(e) {
				e.preventDefault();
				$(this).parent().remove();
			});
		});
		</script>
	</div><?php
}

/* When the post is saved, saves our custom data */
function sbite_dynamic_save_postdata( $post_id ) {
global $sbite_cf_name;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	if ( !isset( $_POST['sbite_dynamicMeta_noncename'] ) )
		return;
	if ( !wp_verify_nonce( $_POST['sbite_dynamicMeta_noncename'], plugin_basename( __FILE__ ) ) )
		return;
	
	$data2post = $_POST[$sbite_cf_name];
	
	if (is_null($data2post)) {
		$sbite_items = get_post_meta($post->ID,$sbite_cf_name,true);
		delete_post_meta($post_id,$sbite_cf_name, $sbite_items);
	} else {

	update_post_meta($post_id,$sbite_cf_name,$data2post);
	}
}	


// END CUSTOM META BOX



//Soundbite - rss function

function podcastindex_rss2_soundbite( $content ) {
		if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $post_soundbites = get_post_meta($post->ID, 'soundbites',true); // get the value 

    // add soundbite only if the Custom Field is set
    if ( $post_soundbites ) {
		
		foreach( $post_soundbites as $k => $v) {
		
			
		echo "\t".'<podcast:soundbite startTime="'. $v['startTime'] .'" duration="' . $v['duration'] . '">' . $v['title'] . '</podcast:soundbite>'.PHP_EOL;
		}
		
		
 
    } else {
        return;
    }
}


add_filter( 'rss2_item', 'podcastindex_rss2_soundbite' );



// Podcast Season
// 
// Add new meta box

function podcast_season_meta_box() {
	add_meta_box('podcast_season','Podcast Season and Episode ','podcast_season_callback','post');
}
add_action('add_meta_boxes','podcast_season_meta_box');

function pdetails_callback( $post ) {

	wp_nonce_field('podcast_season_save','podcast_season_meta_box_nonce');
	$podcast_season =  get_post_meta($post->ID,'_podcast_season_key',false);
}



// create three new fields inside the box

function podcast_season_callback( $post ) {

	wp_nonce_field('podcast_season_save','podcast_season_meta_box_nonce');
	$podcast_season =  get_post_meta($post->ID,'_podcast_season_key',false);

	?>

<table>
	<th>Podcast Season</th>
	<tr><td><label for="">Season Number</label></td>
	<td>	<input type="number" name="season_number_field" placeholder="Season Number" value="<?php echo $podcast_season[0]['season_number']; ?>"></td></tr>
   <tr> <td><label for="">Season Name (optional)</label></td>
  <td>  <input type="text" name="season_name_field" placeholder="Enter Season Name" value="<?php echo $podcast_season[0]['season_name']; ?>"></td></tr>
<!-- </table>


<table> -->
	<th>Podcast Episode</th>
	<tr><td><label for="">Episode Number</label></td>
	<td>	<input type="number" name="episode_number_field" placeholder="Episode Number" value="<?php echo $podcast_season[0]['episode_number']; ?>"></td></tr>
   <tr> <td><label for="">Episode Name (optional)</label></td>
  <td>  <input type="text" name="episode_name_field" placeholder="Enter Season Name" value="<?php echo $podcast_season[0]['episode_name']; ?>"></td></tr>
</table>


    <?php
}





//save metabox field values in the database

function podcast_season_save( $post_id ) {

	if( ! isset($_POST['podcast_season_meta_box_nonce'])) {
		return;
	}

	if( ! wp_verify_nonce( $_POST['podcast_season_meta_box_nonce'], 'podcast_season_save') ) {
		return;
	}

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can('edit_post', $post_id)) {
		return;
	}

	$podcast_season_details = [
	    'season_number' => $_POST['season_number_field'],
        'season_name' => $_POST['season_name_field'],
		'episode_number' => $_POST['episode_number_field'],
		'episode_name' => $_POST['episode_name_field']
    ];

if ( $_POST['season_number_field'] == 0 AND $_POST['episode_number_field'] == 0) {
	$podcast_season_items = get_post_meta($post->ID,'_podcast_season_key',true);
		delete_post_meta($post_id,'_podcast_season_key', $podcast_season_items);
	
	} else {
	update_post_meta( $post_id,'_podcast_season_key', $podcast_season_details );
	}
}
add_action('save_post','podcast_season_save');
//End Meta box

//Season - rss function

function podcastindex_rss2_season( $content ) {
		if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $podcast_season = get_post_meta($post->ID, '_podcast_season_key',false); // get the value 

    // add soundbite only if the Custom Field is set
  if ( $podcast_season ) {

		if ($podcast_season[0]['season_name'] =="") {
			
		echo "\t".'<podcast:season>' . $podcast_season[0]['season_number'] . '</podcast:season>'.PHP_EOL;
		} else {
		echo "\t".'<podcast:season name="' . $podcast_season[0]['season_name'] . '">' . $podcast_season[0]['season_number'] . '</podcast:season>'.PHP_EOL;	
		}		
 
   } else {
       return;
   }
}

add_filter( 'rss2_item', 'podcastindex_rss2_season' );


//Episode - rss function

function podcastindex_rss2_episode( $content ) {
		if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $podcast_season = get_post_meta($post->ID, '_podcast_season_key',false); // get the value 

    // add soundbite only if the Custom Field is set
  if ( $podcast_season ) {

		if ($podcast_season[0]['episode_name'] =="") {
			
		echo "\t".'<podcast:episode>' . $podcast_season[0]['episode_number'] . '</podcast:episode>'.PHP_EOL;
		} else {
		echo "\t".'<podcast:episode display="' . $podcast_season[0]['episode_name'] . '">' . $podcast_season[0]['episode_number'] . '</podcast:episode>'.PHP_EOL;	
		}		
 
   } else {
       return;
   }
}

add_filter( 'rss2_item', 'podcastindex_rss2_episode' );



//Start Location
// 
// Add new meta box

function podcast_location_meta_box() {
	add_meta_box('podcast_location','Podcast Episode Location ','podcast_location_callback','post');
}
add_action('add_meta_boxes','podcast_location_meta_box');





// create three new fields inside the box

function podcast_location_callback( $post ) {

	wp_nonce_field('podcast_location_save','podcast_location_meta_box_nonce');
	$podcast_location =  get_post_meta($post->ID,'_podcast_location_key',false);

	?>
For more information about location see <a href="https://github.com/Podcastindex-org/podcast-namespace/blob/main/location/location.md" target="loc"> this document</a>
<table>
	<tr><td><label for="">Location Name (required)</label></td>
	<td>	<input type="text" name="location_name_field" placeholder="Location Name" value="<?php echo $podcast_location[0]['location_name']; ?>"></td></tr>
   <tr> <td><label for="">Lat/Long</label></td>
  <td>  <input type="text" name="geo_field" placeholder="Coordinates" value="<?php echo $podcast_location[0]['lat_long_name']; ?>"></td></tr>
  <tr> <td><label for="">OSMID</label></td>
  <td>  <input type="text" name="osm_field" placeholder="OSMID" value="<?php echo $podcast_location[0]['osmid']; ?>"></td></tr>
</table>


    <?php
}





//save metabox field values in the database

function podcast_location_save( $post_id ) {

	if( ! isset($_POST['podcast_location_meta_box_nonce'])) {
		return;
	}

	if( ! wp_verify_nonce( $_POST['podcast_location_meta_box_nonce'], 'podcast_location_save') ) {
		return;
	}

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can('edit_post', $post_id)) {
		return;
	}

	$podcast_location_details = [
	    'location_name' => $_POST['location_name_field'],
        'lat_long_name' => $_POST['geo_field'],
        'osmid' => $_POST['osm_field']		
    ];

if ( $_POST['location_name_field'] == "") {
	$podcast_location_items = get_post_meta($post->ID,'_podcast_location_key',true);
		delete_post_meta($post_id,'_podcast_location_key', $podcast_location_items);
	
	} else {
	update_post_meta( $post_id,'_podcast_location_key', $podcast_location_details );
	}
}
add_action('save_post','podcast_location_save');

//end meta box

////Location - rss function

function podcastindex_rss2_location( $content ) {
		if( !powerpress_is_podcast_feed() )
		return;

    global $post;
    $podcast_location = get_post_meta($post->ID, '_podcast_location_key',false); // get the value 

    // add soundbite only if the Custom Field is set
  if ( $podcast_location ) {

		echo "\t".'<podcast:location geo="geo:'. $podcast_location[0]['lat_long_name'].'" osm="'. $podcast_location[0]['osmid'] . '">' . $podcast_location[0]['location_name'] . '</podcast:location>'.PHP_EOL;


 
   } else {
       return;
   }
}

add_filter( 'rss2_item', 'podcastindex_rss2_location' );
?>