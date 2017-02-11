<?php
  use Cake\Routing\Router;
?>
<div class="padding p-b-0">
	<div class="page-title m-b">
		<h1 class="inline m-a-0"><?=__('Album mới nhất', true)?></h1>
	</div>
	<div class="row row-sm item-masonry item-info-overlay">
		<div class="col-sm-6 text-white m-b-sm">
        <div class="owl-carousel owl-theme owl-dots-sm owl-dots-bottom-left " data-ui-jp="owlCarousel" data-ui-options="{
                     items: 1
                    ,loop: true
                    ,autoplay: true
                    ,nav: true
                    ,animateOut:&#x27;fadeOut&#x27;
                  }">
          <?php
          foreach ($latest as $ind => $item) {
            ?>
            <div class="js-obj-mp3 item r" data-id="item-117" data-src="<?=$item['audio'][0]['url']?>">
              <div class="item-media accent item-media-4by3">
                <a href="<?=Router::url(['controller' => 'Albums','action' => 'detail', $item['id']])?>" class="item-media-content" style="background-image: url('<?=$item['img']?>');"></a>
                <div class="item-overlay center">
                  <button class="btn-playpause">Play</button>
                </div>
              </div>
              <div class="item-info">
                <div class="item-overlay bottom text-right">
                  <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                  <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu pull-right black lt"></div>
                </div>
                <div class="item-title text-ellipsis">
                  <a href="<?=Router::url(['controller' => 'Albums', 'action' => 'detail', $item['id']])?>"><?=$item['name']?></a>
                </div>
                <div class="item-author text-sm text-ellipsis">
                  <a href="<?=Router::url(['controller' => 'Singers', 'action' => 'detail', $item['singer']['id']])?>" class="text-muted"><?=$item['singer']['name']?></a>
                </div>
              </div>
            </div>
            <?php
          } ?>
        </div>
	    </div>
	        <div class="col-sm-3 col-xs-6">
	        	<div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
	    			<div class="item-media item-media-4by3">
	    				<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
	    				<div class="item-overlay center">
	    					<button  class="btn-playpause">Play</button>
	    				</div>
	    			</div>
	    			<div class="item-info">
	    				<div class="item-overlay bottom text-right">
	    					<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
	    					<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
	    					<div class="dropdown-menu pull-right black lt"></div>
	    				</div>
	    				<div class="item-title text-ellipsis">
	    					<a href="track.detail.html">Pull Up</a>
	    				</div>
	    				<div class="item-author text-sm text-ellipsis ">
	    					<a href="artist.detail.html" class="text-muted">Summerella</a>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	</div>
</div>
<div class="row-col">
		<div class="col-lg-9 b-r no-border-md">
			<div class="padding">
				<h2 class="widget-title h4 m-b">Treading</h2>
				<div class="owl-carousel owl-theme owl-dots-center" data-ui-jp="owlCarousel" data-ui-options="{
					margin: 20,
					responsiveClass:true,
				    responsive:{
				    	0:{
				    		items: 2
				    	},
				        543:{
				            items: 3
				        }
				    }
				}">
				  <div class="">
				    	<div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
							<div class="item-media item-media-4by3">
								<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
								<div class="item-overlay center">
									<button  class="btn-playpause">Play</button>
								</div>
							</div>
							<div class="item-info">
								<div class="item-overlay bottom text-right">
									<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
									<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
									<div class="dropdown-menu pull-right black lt"></div>
								</div>
								<div class="item-title text-ellipsis">
									<a href="track.detail.html">Live Radio</a>
								</div>
								<div class="item-author text-sm text-ellipsis ">
									<a href="artist.detail.html" class="text-muted">Radionomy</a>
								</div>


							</div>
						</div>
					</div>
				</div>
				<h2 class="widget-title h4 m-b">New</h2>
				<div class="row">
				  <div class="col-xs-4 col-sm-4 col-md-3">
				    	<div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
							<div class="item-media ">
								<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
								<div class="item-overlay center">
									<button  class="btn-playpause">Play</button>
								</div>
							</div>
							<div class="item-info">
								<div class="item-overlay bottom text-right">
									<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
									<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
									<div class="dropdown-menu pull-right black lt"></div>
								</div>
								<div class="item-title text-ellipsis">
									<a href="track.detail.html">I Wanna Be In the Cavalry</a>
								</div>
								<div class="item-author text-sm text-ellipsis ">
									<a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
		</div>
		<?=$this->element('right')?>
	</div>
