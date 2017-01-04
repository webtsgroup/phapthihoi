<footer>
    <div class="container">
        <div class="row">

          <div class="col-md-4">
            <h3><?=$urlSetting['contact']['text']?></h3>
            <div class="widget widget-address">
              <address>
                <span><?=$systemConfigs['cf_site_name']?></span>
                <span>Showroom:&nbsp;&nbsp;<?=$systemConfigs['cf_site_address']?></span>
                <span>Xưởng sản xuất:&nbsp;&nbsp;<?=$systemConfigs['cf_site_address1']?></span>
                <span><strong>Phone:</strong><?=$systemConfigs['cf_site_phone']?></span>
                <span><strong>Email:</strong><a href="<?=$systemConfigs['cf_site_email']?>"><?=$systemConfigs['cf_site_email']?></a></span>
                <span><strong>Hotline:</strong><?=$systemConfigs['cf_site_hotline']?></span>
              </address>
            </div>
          </div>
            <div class="col-md-4">
              <h3><?=$activity['title']?></h3>
              <div class="activity-summary">
                <?=$activity['content']?>
              </div>
            </div>
            <div class="col-md-4">
              <h3><?=__('Follow Us')?></h3><br>
              <iframe style="border: none; overflow: hidden;" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fasidec&amp;tabs=timeline&amp;width=340&amp;height=150&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <?=$systemConfigs['cf_site_copyright']?>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <div class="social-icons">
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-rss fa-lg"></i></a>
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-skype fa-lg"></i></a>
                        <a href="http://www.themenesia.com/themeforest/archi/index-slider-2.html#"><i class="fa fa-dribbble fa-lg"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="back-to-top" class="show"></a>
</footer>
