<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.rooftopcms.com
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Rooftop Content Hierarchy
 * Plugin URI:        http://errorstudio.co.uk
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Error
 * Author URI:        https://www.rooftopcms.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       rooftop-content-hierarchy
 * Domain Path:       /languages
 */

function add_default_content($blog_id, $user_id, $domain, $path, $site_id, $meta) {
    $example_post_content = <<<EOF
This is just a regular post. You can access it via the API once you've set up your <a href='/wp-admin/admin.php?page=rooftop-api-authentication-overview'>API user</a>.
EOF;

    $example_page_content = <<<EOF
This is an example page. It's different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:
<blockquote>Hi there! I'm a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin' caught in the rain.)</blockquote>
...or something like this:
<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>
As a new Rooftop user, you should go to <a href="http://rooftopcms.io/docs/">documentation</a> to delete this page and create new pages for your content. Have fun!
EOF;

    switch_to_blog($blog_id);

    wp_update_post(array(
        'ID' => 1,
        'post_title'   => "Welcome to Rooftop",
        'post_content' => $example_post_content
    ));

    wp_update_post(array(
        'ID' => 2,
        'post_title'   => "Here's a Rooftop page",
        'post_content' => $example_page_content
    ));

    restore_current_blog();
}

add_filter('wpmu_new_blog', 'add_default_content', 10, 6);

?>


