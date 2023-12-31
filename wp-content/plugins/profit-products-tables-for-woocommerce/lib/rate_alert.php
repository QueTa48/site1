<?php

/**
 * WOOT Rate Alert
 *
 * Handles alert about the plugin review on the admin panel
 *
 * @since   1.0.0
 */
//delete_option('woot_manage_rate_alert');//for tests
//disabled
class WOOT_RATE_ALERT {

    protected $notes_for_free = true;
    private $show_after_time = 86400 * 2;
    private $meta_key = 'woot_manage_rate_alert';

    public function __construct($for_free) {
        $this->notes_for_free = $for_free;
        add_action('wp_ajax_woot_manage_alert', array($this, 'manage_alert'));
    }

    /**
     * Get fixed time
     *
     * @since 1.0.0
     * 
     * @return int
     */
    private function get_time() {
        $time = intval(get_option($this->meta_key, -1));

        if ($time === -1) {
            add_option($this->meta_key, time());
            $time = time();
        }

        if ($time === -2) {
            $time = time(); //user already set review
        }

        return $time;
    }

    /**
     * Show review alert on the plugin admin panel
     *
     * @since 1.0.0
     * 
     * @return void
     */
    public function show_alert() {
        $show = false;

        if (($this->get_time() + $this->show_after_time) <= time()) {
            $show = true;
        }

        //***

        if ($show) {
            if (isset($_GET['page']) AND $_GET['page'] == 'woot') {
                $support_link = 'https://pluginus.net/support/forum/woot-woocommerce-active-products-tables/';
                ?>
                <div id="woot-rate-alert">
                    <p>
                        <?php printf("Hi, looks like you using <b>WOOT - WooCommerce Active Products Tables</b> for some time and I hope this software helped you with your business. If you satisfied with the plugin functionality, could you please give us BIG favor and give it a 5-star rating to help us spread the word and boost our motivation?<br /><br /><strong>~ PluginUs.NET developers team</strong>", "<a href='{$support_link}' target='_blank'>" . __('support', 'profit-products-tables-for-woocommerce') . "</a>") ?>
                    </p>

                    <hr />

                    <?php
                    $link = 'https://codecanyon.net/downloads#item-27928580';
                    if ($this->notes_for_free) {
                        $link = 'https://wordpress.org/support/plugin/profit-products-tables-for-woocommerce/reviews/#new-post';
                    }
                    ?>

                    <table>
                        <tr>
                            <td>
                                <a href="javascript: woot_manage_alert(0);void(0);" class="button button-large dashicons-before dashicons-clock">&nbsp;<?php echo __('Nope, maybe later!', 'profit-products-tables-for-woocommerce') ?></a>
                            </td>

                            <td>
                                <a href="<?php echo $link ?>" target="_blank" class="woot-panel-button dashicons-before dashicons-star-filled">&nbsp;<?php echo __('Ok, you deserve it', 'profit-products-tables-for-woocommerce') ?></a>
                            </td>

                            <td>
                                <a href="javascript: woot_manage_alert(1);void(0);" class="button button-large dashicons-before dashicons-thumbs-up">&nbsp;<?php echo __('Thank you, I did it!', 'profit-products-tables-for-woocommerce') ?></a>
                            </td>
                        </tr>
                    </table>


                </div>
                <script>
                    function woot_manage_alert(value) {
                        //1 - did it, 0 - later
                        jQuery('#woot-rate-alert').hide(333);
                        jQuery.post(ajaxurl, {
                            action: "woot_manage_alert",
                            value: value
                        }, function (data) {
                            console.log(data);
                        });
                    }
                </script>

                <?php
            }
        }
    }

    /**
     * Fixing of customer action
     *
     * @since 1.0.0
     * 
     * @return void
     */
    public function manage_alert() {

        if (intval($_REQUEST['value'])) {
            update_option($this->meta_key, -2);
        } else {
            update_option($this->meta_key, time());
        }

        die('Thank you!');
    }

}
