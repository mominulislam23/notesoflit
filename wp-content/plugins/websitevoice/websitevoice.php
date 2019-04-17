<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WebsiteVoice
 * Plugin URI:        https://websitevoice.com
 * Description:       Turn your articles into high-quality audio for your audience to listen while they’re busy multitasking or on the go.
 * Version:           1.1.1
 * Author:            WebsiteVoice
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
defined('ABSPATH') or die('No script kiddies please!');

if (!defined('WEBSITEVOICE_VERSION_NUM'))
  define('WEBSITEVOICE_VERSION_NUM', '1.1.1');

if (!defined('WEBSITEVOICE_VERSION_KEY'))
  define('WEBSITEVOICE_VERSION_KEY', 'websitevoice_version');

add_option(WEBSITEVOICE_VERSION_KEY, WEBSITEVOICE_VERSION_NUM);

function websitevoice_load_scripts() {
  if (get_option('script') === false) {
    return;
  }
  if (get_option('show_only_posts') === 'on' && !is_single()) {
    return;
  }
  wp_enqueue_script('websitevoice', 'https://widget.websitevoice.com/' . get_option('user_id'), array(), null, true);
  wp_add_inline_script('websitevoice', get_option('inline_script'));
}

function websitevoice_register_settings() {
  register_setting('websitevoice_plugin_settings_group', 'script');
  register_setting('websitevoice_plugin_settings_group', 'user_id');
  register_setting('websitevoice_plugin_settings_group', 'inline_script');
  register_setting('websitevoice_plugin_settings_group', 'show_only_posts');
}

function websitevoice_plugin_page_links($links, $file) {
  $plugin = plugin_basename(__FILE__);
  if ($plugin === $file) {
    $settings = array('settings' => '<a href="'. esc_url(get_admin_url(null, 'options-general.php?page=websitevoice')) .'">' . __('Settings') . '</a>');
    $links = array_merge($settings, $links);
  }

  return $links;
}

function websitevoice_admin_menu() {
  add_options_page('WebsiteVoice Configuration', 'WebsiteVoice', 'manage_options', 'websitevoice', 'websitevoice_admin_options');
}

function websitevoice_admin_options() {
  if (!current_user_can('manage_options'))  {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  } ?>

  <div class="wrap">
    <h2>WebsiteVoice widget</h2>
    <p>
      Paste the installation code which you can obtain from <a href="https://websitevoice.com/dashboard" target="_blank" title="Obtain code">WebsiteVoice dashboard here</a>.
    </p>
    <form method="POST" action="options.php">
      <?php settings_fields('websitevoice_plugin_settings_group'); ?>
      <?php do_settings_sections('websitevoice_plugin_settings_group'); ?>
      <textarea id="pasted-script" name="script" cols="80" rows="10"><?php echo esc_attr(get_option('script')); ?></textarea><br>
      <div id="submit-error" class="notice notice-error inline hidden">
	      <p>
          Seems like there is an error in the copied script.<br>
          Please copy the code from your <a href="https://websitevoice.com/dashboard" target="_blank" title="Obtain code">WebsiteVoice dashboard here</a>.
        </p>
      </div>
      <input type="checkbox" name="show_only_posts" <?php if (get_option('show_only_posts') === 'on') echo 'checked'; ?>> Select here to show only in blog posts instead of all pages.
      <p><strong>Please read:</strong></p>
      <p>Please note that the widget uses an algorithm to figure out where and when it should be displayed. Therefore it might not appear in all pages if the widget considers that the text is not relevant to be read by voice.</p>
      <p>If you want it to be displayed in specific places where is not displayed, please use the "Custom text selector" option in WebsiteVoice dashboard.</p>
      <p>The widget style "Button" is not compatible with this plugin. If you want to use that widget style, you have to manually edit your theme files.</p>
      <input id="user-id" type="hidden" name="user_id">
      <input id="inline-script" type="hidden" name="inline_script">
      <?php submit_button(); ?>
    </form>
  </div>

  <?php
}

function websitevoice_admin_enqueue_scripts($hook) {
  if ($hook !== 'settings_page_websitevoice') {
    return;
  }
  wp_enqueue_script('admin_websitevoice', plugin_dir_url(__FILE__) . 'websitevoice-admin.js');
}

function websitevoice_admin_notice_activation_hook() {
  set_transient('websitevoice_admin_notice', true, 5);
}

function websitevoice_admin_notice() {
  if (get_transient('websitevoice_admin_notice')) { ?>
    <div class="updated notice is-dismissible">
      <p>Thank you for installing <strong>WebsiteVoice</strong>.</p>
      <p>
        Please don't forget to setup your plugin.<br><br>
        <a href="<?php echo admin_url('options-general.php?page=websitevoice'); ?>" title="Setup plugin" class="button-primary">Setup your plugin here</a>
      </p>
    </div>
    <?php delete_transient('websitevoice_admin_notice');
  }
}

add_action('wp_enqueue_scripts', 'websitevoice_load_scripts');
add_filter('plugin_action_links', 'websitevoice_plugin_page_links', 10, 2);
register_activation_hook(__FILE__, 'websitevoice_admin_notice_activation_hook');

add_action('admin_menu', 'websitevoice_admin_menu');
add_action('admin_init', 'websitevoice_register_settings');
add_action('admin_enqueue_scripts', 'websitevoice_admin_enqueue_scripts');
add_action('admin_notices', 'websitevoice_admin_notice');
