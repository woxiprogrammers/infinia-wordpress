<?php
//Create YouTube Background Slider
function ytslider()
{
	$options = get_option('yts_options');
	global $wp_query;
	$postid = $wp_query->post->ID;
	$yts_status = get_post_meta($postid, '_yts_status', true);	
	$yts_status = (isset($yts_status) && $yts_status ) ? $yts_status : '0';
	
	for($i=1;$i < 6;$i++){

		$yts_vdoUrl = $options["yts_video$i"];
		$yts_title  = $options["yts_title$i"];

		if($yts_vdoUrl && $yts_title){

			if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $yts_vdoUrl, $id)) {
				$output = $id[1];
			} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $yts_vdoUrl, $id)) {
				$output = $id[1];
			} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $yts_vdoUrl, $id)) {
				$output = $id[1];
			} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $yts_vdoUrl, $id)) {
				$output = $id[1];
			}
			
			$yts_vdoArr[] = $output; 

		}
	}
	
	for($i=1;$i < 6;$i++){
		$yts_vdoUrl = $options["yts_video$i"];
		$yts_title  = $options["yts_title$i"];
		if($yts_vdoUrl && $yts_title){
			$yts_ttlArr[] = $yts_title; 
		}
	}
	
	$yts_count = count($yts_vdoArr);
		
	if((is_page() && $yts_status) || is_front_page())
	{
	?>
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" />
	<div id="yts_centered">
		<div class="youtube-player">
			<div class="youtube-player-video">
				<div class="youtube-player-object">
					<?php _e('You need Flash player 8+ and JavaScript enabled to view this video.','ytslider'); ?>
				</div>
			</div>
		</div>
	</div>
	
	<a style="display: none;" id="yts_upArr" title="Open" class="yts_botsec" href="JavaScript:void(0);"></a>
	<div id="yts_player">
		<div id="yts_toolbar">
			<a style="display: none;" id="yts_downArr" title="Close" class="yts_botsec" href="JavaScript:void(0);"></a>
			<div id="yts_time" style="display: none;"></div>
		</div>
		<div id="yts_playlist"></div>
	</div>
	
	<style type="text/css">
	
		#yts_centered .youtube-player {width:100% !important;height:100% !important;}
		#yts_centered .youtube-player-video{height:100% !important;}
		#yts_player .youtube-player-toolbar li.youtube-player-time{display:block !important}
		#yts_downArr.yts_botsec {
			bottom: 0px;
		}
		#yts_link{
			padding: 0;
			position: fixed;
			right: 6px !important;
			bottom: 50px;
		}
		#yts_upArr.yts_botsec {
			bottom: 0px;
		}
		#yts_centered{
			top: 0;
			width: 100%;
			z-index: -1;
			position:fixed;
			height:100%;
		}
		#yts_toolbar{
			position:fixed;
			width:100%;
			bottom:0
		}
		#yts_playlist{
			position:fixed;
			bottom:32px;
			width:100%;
		}
		#yts_player .youtube-player-playlist-container{
			bottom: 0;
			position: absolute;
			display:none;
			width:100%;
		}		
		#yts_time{
			bottom: 9px;
			position: absolute;
			right: 40px;
			color: #fff;
		}
		#yts_player .youtube-player-playlist-container{
			border-radius: 0px !important;
			border: 0 !important;
		}		
		#yts_toolbar ul li, #yts_playlist ol li{
			background:none !important;
			background-color: #000000 !important;
		}		
		#yts_playlist ol li.ui-state-active{
			background-color:#e1e1e1  !important;
		}
		
	</style>
	
	<script type="text/javascript">
		(function($){
			var config =  {
				showToolbar: 1,
				toolbarAppendTo: '#yts_toolbar',	// selector
				playlistAppendTo: '#yts_playlist',	// selector
				toolbar: 'play,prev,next,mute<?php if($options['show_playlist']){ echo ',playlistToggle'; } ?>',
				timeAppendTo: '#yts_time',		// selector
				chromeless: 1,
				autoPlay: <?php echo $options['auto'];?>,
				playlistSpeed: 100,
				showPlaylist: <?php echo $options['show_playlist'];?>,
				randomStart: <?php echo $options['random'];?>,
				playlistHeight: <?php echo $yts_count; ?>,
				showTime: 1,			// show current time and duration in toolbar (boolean)
				repeatPlaylist: <?php echo $options['repeat_playlist'];?>,
				videoParams: {			// video <object> params (object literal)
					allowfullscreen: 'true',
					allowScriptAccess: 'always',
					wmode: 'transparent'
				},
				// Custom playlist
				playlist: {
					title: 'Random videos',
					videos: [
							<?php
								for($i=0;$i < 6;$i++) {
									if($yts_vdoArr[$i] && $yts_ttlArr[$i]) {
										echo "{ id: '$yts_vdoArr[$i]', title: '$yts_ttlArr[$i]' },";
									}
								}
							?>
					]
				}
			};

			$('.youtube-player').player(config)

		})(this.jQuery);
		
		jQuery(window).load(function(){
			setTimeout(function(){jQuery('#yts_downArr,#yts_time').fadeIn(300);},1000);
			setTimeout(function(){jQuery('#yts_player').fadeOut(300);jQuery('#yts_downArr').fadeOut(300);jQuery('#yts_upArr').fadeIn(300);},2000);
		});
		
		jQuery('#yts_upArr').click(function(){
			jQuery('#yts_player').fadeIn(300)
			jQuery('#yts_upArr').fadeOut(300)
			jQuery('#yts_downArr').fadeIn(300);
		});
		
		jQuery('#yts_downArr').click(function(){
			jQuery('#yts_player').fadeOut(300)
			jQuery('#yts_downArr').fadeOut(300)
			jQuery('#yts_upArr').fadeIn(300);
		});
	</script>
	<?php
	}
}
add_action('wp_footer', 'ytslider');
?>