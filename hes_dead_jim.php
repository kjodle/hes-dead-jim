<?php
/*
Plugin Name: He's Dead, Jim
Plugin URI: http://www.kjodle.net/wordpress/hes-dead-jim/
Description: Do you like the idea behind Matt's "Hello, Dolly" plugin, but feel that it doesn't feed your inner nerd? Then here's "He's Dead, Jim" which has been shamelessly ported from Matt's plugin. The concept is the same, except that instead of lines from "Hello, Dolly" you get lines from Star Trek: The Original Series. 
Most of the quotations were taken from: http://en.wikiquote.org/wiki/Star_Trek:_The_Original_Series
Version: 1.1
Author: Kenneth John Odle
Author URI: http://techblog.kjodle.net
Author Support: http://kjodle.info/support

Copyright 2015 Kenneth John Odle
© 2015 Kenneth John Odle

Released under the GPL v.3, http://www.gnu.org/copyleft/gpl.html

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 3, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Prevent this page from being loaded directly.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Let's add our stylesheets:
function d12_hdj_styles() {
	wp_register_style( 'd12hdj_admin_css', plugins_url('/css/d12hdjstyle.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'd12hdj_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'd12_hdj_styles' );

// Our set of Star Trek The Original Series lines:
function hes_dead_jim_get_line() {
	/** These are famous lines from "Star Trek: The Original Series" */
	$lines = "He's dead, Jim.
	They'll be no tribble at all.
	Computer, compute to the last digit the value of pi.
	Now this is a drink for a man.
	You may find that having is not so pleasing a thing as wanting.This is not logical, but it is often true.
	The best diplomat that I know is a fully-loaded phaser bank.
	I signed aboard this ship to practice medicine, not to have my atoms scattered back and forth across space by this gadget.
	You will die of suffocation, in the icy cold of space.
	Shut-up, Spock! We're rescuing you!
	Evil does seek to maintain power by suppressing the truth.
	How many more men must die before you two begin to act like military men instead of fools?
	Brain and brain!  What is brain?
	Random chance seems to have operated in our favor.
	Mr. Spock, the women on your planet are logical.That's the only planet in the galaxy that can make that claim.
	I'm a doctor, not a bricklayer.
	My dear girl, I'm a doctor. When I peek, it is in the line of duty.
	I'm a doctor, not a mechanic.
	I'm a doctor, not an engineer.
	I'm a doctor, not a coal miner.
	Instruments register only those things they're designed to register.Space still contains infinite unknowns.
	Infinite diversity in infinite combinations.
	Our spectro-readings showed no contamination, no unusual elements present.
	Don't risk your life on a theory!
	Are you aware it's the captain's guts you're analyzing?
	Computer, go to sensor probe. Any unusual readings?
	The fact that my internal arrangement differs from yours, Doctor, pleases me to no end.
	We humans are full of unpredictable emotions that logic cannot solve.
	You and I are of a kind. In a different reality, I could have called you friend.
	Life and death are seldom logical.
	Oh, how absolutely typical of your species!You don't understand something so you become fearful.
	I object to intellect without discipline.I object to power without constructive purpose.
	I made an error in my computations.
	Oh, I like them fine, but a computer takes less space.
	Your statement is irrelevant.
	Without freedom of choice there is no creativity.
	You'd make a splendid computer, Mr Spock.
	Aye, the haggis is in the fire, for sure.
	I have never understood the female capacity to avoid a direct answer to any question.
	Annihilation Jim. Total, complete, absolute annihilation.
	Insults are effective only where emotion is present.
	You can't evaluate a man by logic alone.
	Immortality consists largely of boredom.
	I'm a doctor, not an escalator.
	In the strict scientific sense, Doctor, we all feed on death, even vegetarians.
	Brace yourself. The area of penetration will no doubt be sensitive.
	I'm trying to thank you, you pointy-eared hobgoblin!
	It would be illogical to assume that all conditions remain stable.
	Live long and prosper.
	There's another way to survive: mutual trust and help.
	The prejudices people feel about each other disappear when they get to know each other.
	Change is the essential process of all existence.
	Death, when unnecessary, is a tragic thing.
	Violence in reality is quite different from theory.
	I am pleased to see that we have differences.May we together become greater than the sum of both of us.
	History tends to exaggerate.
	There is nothing good in war except its ending. 
	Youth doesn't excuse everything.
	Sometimes, a man will tell his bartender things he'll never tell his doctor.
	Fascinating.";

	// Here we split them into individual lines
	$lines = explode( "\n", $lines );

	// And then randomly choose a line
	return wptexturize( $lines[ mt_rand( 0, count( $lines ) - 1 ) ] );
}

// Echo the chosen line and make sure it stays out of the way of "Hello, Dolly" 
function d12_hes_dead_jim() {
	$chosen = hes_dead_jim_get_line();
	/*
	// If "Hello, Dolly" is activated, move the output of this plugin to a new line
	if ( function_exists( 'hello_dolly_get_lyric' ) ) {
		echo '<div class="d12hdjclear"></div>';
	}
	*/
	echo "<p id='hesdeadjim'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'd12_hes_dead_jim' );

?>
