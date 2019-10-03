<?php

/*
Plugin Name: GamiPress Leaderboard Display
Plugin URI: https://erayus.com
Description: This plugin provides a shortcode to display the Gamipress leaderboard
Version: 1.0
Author: Raymond@Erayus
Author URL: https://erayus.com
License: GPL2
Text Domain: gamipress-leaderboard-display

*/

/* HOOKS */
// Register all custom shortcodes on init
add_action('init', 'gamlead_register_shortcodes');
add_action('init', 'slb_register_shortcodes');

// /* SHORTCODES  */
function gamlead_register_shortcodes(){

    add_shortcode('gam_leaderboard', 'gam_leaderboard_generator');
}

function gam_leaderboard_generator( $args, $content="" ){
    // setup output variable 
    $output = '
        <div class="gam-leaderboard">
            <h1>Hello This is a leaderboard </h1>
        </div>
    ';
    return $output;
}




/* !2. SHORTCODES */

// 2.1
// hint: registers all our custom shortcodes
function slb_register_shortcodes() {
	
	add_shortcode('slb_form', 'slb_form_shortcode');
	
}

// 2.2
// hint: returns a html string for a email capture form
function slb_form_shortcode( $args, $content="") {
	
	// setup our output variable - the form html 
	$output = '
	
		<div class="slb">
		
			<form id="slb_form" name="slb_form" class="slb-form" method="post">
			
				<p class="slb-input-container">
				
					<label>Your Name</label><br />
					<input type="text" name="slb_fname" placeholder="First Name" />
					<input type="text" name="slb_lname" placeholder="Last Name" />
				
				</p>
				
				<p class="slb-input-container">
				
					<label>Your Email</label><br />
					<input type="email" name="slb_email" placeholder="ex. you@email.com" />
				
				</p>';
				
				// including content in our form html if content is passed into the function
				if( strlen($content) ):
				
					$output .= '<div class="slb-content">'. wpautop($content) .'</div>';
				
				endif;
				
				// completing our form html
				$output .= '<p class="slb-input-container">
				
					<input type="submit" name="slb_submit" value="Sign Me Up!" />
				
				</p>
			
			</form>
		
		</div>
	
	';
	
	// return our results/html
	return $output;
	
}
