<?php 
	/**
	 * _displayRSS
	 * 
	 * @param string $url
	 * @param int $num_items
	 */
if(!function_exists('_displayRSS')){	 
	function _displayRSS( $url, $num_items = -1 ){
		include_once ABSPATH . WPINC . '/rss.php';			
		$rss = fetch_rss( $url );
		print '<h4>From the News:</h4>' . chr(13) . chr(10);
		if ( $rss ) {
			echo '<ul>';
			if ( $num_items !== -1 ) {
				$rss->items = array_slice( $rss->items, 0, $num_items );
			}
			if ($rss->items){
				foreach ( (array) $rss->items as $item ) {
					$date = new DateTime($item['pubdate']);
					printf(
						'<li><div class="date">%4$s</div><div class="thethefly-news-item">%2$s</div></li>',
						esc_url( $item['link'] ),
						( $item['description']),
						esc_html( $item['title'] ),
						$date->format('D, d M Y')
					);
				}
			} else {				
				echo '<li>Unfortunately the news channel is temporarily closed</li>';
			}
			echo '</ul>';
		} else {
			_e( 'An error has occurred, which probably means the feed is down. Try again later.' );
		}
	} // end func _displayRSS
}
?>

<div id="thethefly" class="about-us">
  <div class="wrap">
    <h2 id="thethefly-panel-title"> <span id="thethefly-panel-icon" class="icon48">&nbsp;</span> About TheThe Fly</h2>
    <div id="thethefly-panel-frame">
      <div id="menu-management-liquid">
        <div id="menu-management">
          <div class='menu-edit tab-overview'>
            <div id='nav-menu-header'>
              <div class='major-publishing-actions'> <span>About the Club</span>
                <div class="sep">&nbsp;</div>
              </div>
              <!-- END .major-publishing-actions --> 
            </div>
            <!-- END #nav-menu-header -->
            <div id='post-body'>
              <div id='post-body-content'>
                <div class="screenshot-wrap">
                  <div class="inner">
                    <div class='screenshot'><img src="<?php echo $GLOBALS['TheTheSP']['wp_plugin_dir_url'];?>style/admin/images/thethefly.jpg" /></div>
                    <div class='action-links'><strong>Home page: <a href="http://thethefly.com/" title="TheThe Fly" target="_blank">TheTheFly.com</a>.</strong></div>
                  </div>
                </div>
                <div class="info">
                  <p><em>Have WordPress but want more?</em></p>
                  <p align="justify">We fully believe in WP and its power to create state-of-the-art websites and blogs loaded with functionalities beyond imagination!</p>
                  <p align="justify">And that's the beauty of <strong>TheThe Fly</strong> - we provide a wide array of FREE WP Themes and Plugins that will help you do just anything under the sun on your WordPress Blog. </p>
                  <p align="justify"><strong>TheThe Fly</strong> WordPress Themes and Plugins are meant for businesses and individuals who are looking to offer extras to their visitors by adding more functionalities, better themes and want to get more than what is already out there.</p>
                  <p align="justify"><strong>TheThe Fly</strong> is a team of WordPress developers who think out-of-the-box and love to code. We create clean, smart and user-friendly WordPress theme designs and value added plugins for private and commercial use.</p>
                  <p>To learn more about us or to download more of <strong>TheThe Fly</strong> WordPress Themes and Plugins, please visit our website at <a href="http://TheTheFly.com" target="_blank">TheTheFly.com</a>.</p>
                </div>
                <div class="clear">&nbsp;</div>
                <div class="thethefly-latest-new">
                  <h4>More Resources:</h4>
                  <ol>
                    <li><a href="http://thethefly.com/members/forms/freeclub/" target="_blank">Become Premium Club Member</a> and gain FREE access to <strong>TheThe Fly</strong> Premium Themes and Plugins.</li>
                    <li>Join our <a href="http://thethefly.com/support/forum/" target="_blank">Support Forum</a> to get WordPress help and support from our experienced team of WordPress developers.</li>
                    <li>Earn money with our <a href="http://thethefly.com/affiliate-program/" target="_blank">Affiliate Program</a>.</li>
                  </ol>
                </div>
                <div class="thethefly-latest-news">
                  <?php _displayRSS('http://news.thethefly.com/category/latest/feed/', 5);?>
                </div>
              </div>
              <!-- /#post-body-content --> 
            </div>
            <!-- /#post-body --> 
          </div>
          <!-- /.menu-edit --> 
          
        </div>
      </div>
      <!-- sidebar -->
      <div id="thethefly-admin-sidebar" class="metabox-holder">
        <div class="meta-box-sortables">
          <?php include 'inc.sidebar.newsletter.php';?>
          <?php include 'inc.sidebar.themes.php';?>
          <?php include 'inc.sidebar.plugins.php';?>
          <?php include 'inc.sidebar.help.php';?>
        </div>
      </div>
      <!-- /sidebar -->
      <div class="clear"></div>
    </div>
  </div>
</div>
