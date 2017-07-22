<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       chaksaray.com
 * @since      1.0.0
 *
 * @package    Wp_Gen_Template
 * @subpackage Wp_Gen_Template/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2 class="nav-tab-wrapper"><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <form method="post" name="cleanup_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // template fields
        $art_title = $options['art_title'];
        $art_desc = $options['art_desc'];
        $cdn_provider = $options['cdn_provider'];
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

    <!-- Article Title -->
        <fieldset>
            <p>Please enter your article title</p>
            <legend class="screen-reader-text"><span><?php _e('Write your article title', $this->plugin_name); ?></span></legend>
             <label for="<?php echo $this->plugin_name;?>-art_title">
            	<input type="text" class="large-text" id="<?php echo $this->plugin_name; ?>-art_title" name="<?php echo $this->plugin_name; ?>[art_title]" value="<?php if(!empty($art_title)) echo $art_title; ?>"/>
            </label>
        </fieldset>

        <fieldset>
            <p>Please enter your article description</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <textarea id="<?php echo $this->plugin_name; ?>-art_desc" name="<?php echo $this->plugin_name; ?>[art_desc]" cols="80" rows="10" class="large-text"><?php if(!empty($art_desc)) echo $art_desc; ?></textarea><br>
        </fieldset>

    <!-- Input artcle image url-->
    <fieldset>
        <fieldset>
            <p>Artile image url here</p>
            <legend class="screen-reader-text"><span><?php _e('Input article image url', $this->plugin_name); ?></span></legend>
            <input type="url" class="large-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" name="<?php echo $this->plugin_name; ?>[cdn_provider]" value="<?php if(!empty($cdn_provider)) echo $cdn_provider; ?>"/>
        </fieldset>
    </fieldset>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

        <!-- add post,page or product slug class to body class -->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-body_class_slug">
                <span><?php esc_attr_e('HTML template generated', $this->plugin_name); ?></span>
            </label>
            <textarea id="" name="" cols="80" rows="10" class="large-text">

            	<h1><?php echo $art_title; ?></h1>
            	<div> 
            		<span><?php echo $art_desc; ?></span>
            		<img src="<?php echo $cdn_provider; ?>">
            	</div>

            </textarea><br>
        </fieldset> 

    </form>

</div>