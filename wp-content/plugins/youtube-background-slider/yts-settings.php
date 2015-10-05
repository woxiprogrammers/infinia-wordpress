<?php
// YTSLIDER ADMIN SETTING OPTIONS ---------------------------

function yts_backend_menu()
{
?>
<div id="yts-admin-wrap">

	<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php _e('YouTube Background Slider '.yts_plugin_version().' Setting\'s','ytslider'); ?></h2>
	</div>
	<div id="poststuff" style="position:relative;">
		<div class="postbox" id="yts_admin">
			<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php _e("Slider Settings",'ytslider'); ?></span></h3>
			<div class="inside" style="padding: 15px;margin: 0;">
				<form method="post" action="options.php">
					<?php
						wp_nonce_field('update-options');
						$options = get_option('yts_options');
						#print_r($options);
					?>
					<table>
						<tr>
							<td><?php _e("Show Playlist",'ytslider'); ?> :</td>
							<td>
								<select name="yts_options[show_playlist]">
									<option value="1" <?php selected('1', $options['show_playlist']); ?>><?php _e('Enable','ytslider'); ?></option>
									<option value="0" <?php selected('0', $options['show_playlist']); ?>><?php _e('Disable','ytslider'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Auto Play",'ytslider'); ?> :</td>
							<td>
								<select name="yts_options[auto]">
									<option value="1" <?php selected('1', $options['auto']); ?>><?php _e('Enable','ytslider'); ?></option>
									<option value="0" <?php selected('0', $options['auto']); ?>><?php _e('Disable','ytslider'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Random Start",'ytslider'); ?> :</td>
							<td>
								<select name="yts_options[random]">
									<option value="1" <?php selected('1', $options['random']); ?>><?php _e('Enable','ytslider'); ?></option>
									<option value="0" <?php selected('0', $options['random']); ?>><?php _e('Disable','ytslider'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Repeat Playlist",'ytslider'); ?> :</td>
							<td>
								<select name="yts_options[repeat_playlist]">
									<option value="1" <?php selected('1', $options['repeat_playlist']); ?>><?php _e('Enable','ytslider'); ?></option>
									<option value="0" <?php selected('0', $options['repeat_playlist']); ?>><?php _e('Disable','ytslider'); ?></option>
								</select>
							</td>
						</tr>
					</table>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="yts_options" />					
					<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','ytslider'); ?>" class="button-primary" id="yts_update" name="yts_update"></p>
			</div>
		</div>
	</div>
	<div id="poststuff" style="position:relative;">
		<div class="postbox" id="yts_admin">
			<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php _e("YouTube Video URL's",'ytslider'); ?></span></h3>
			<div class="inside" style="padding: 15px;margin: 0;">
					<table>			
						<!-- Video 1 Section Starts -->
							<tr>
								<td><?php _e("Video 1 URL", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_video1]" value="<?php echo $options['yts_video1']; ?>" /></td>
							</tr>
							<tr>
								<td><?php _e("Video 1 Title", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_title1]" value="<?php echo $options['yts_title1']; ?>" /></td>
							</tr>
						<!-- Video 1 Section Ends -->
							
							<tr><td height="30" colspan="2"><hr style="color: #DDDDDD;" /></td></tr>
						
						<!-- Video 2 Section Starts -->
							<tr> 
								<td><?php _e("Video 2 URL", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_video2]" value="<?php echo $options['yts_video2']; ?>" /></td>
							</tr>
							<tr>
								<td><?php _e("Video 2 Title", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_title2]" value="<?php echo $options['yts_title2']; ?>" /></td>
							</tr>
						<!-- Video 2 Section Ends -->
							
							<tr><td height="30" colspan="2"><hr style="color: #DDDDDD;" /></td></tr>
						
						<!-- Video 3 Section Starts -->
							<tr>
								<td><?php _e("Video 3 URL", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_video3]" value="<?php echo $options['yts_video3']; ?>" /></td>
							</tr>
							<tr>
								<td><?php _e("Video 3 Title", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_title3]" value="<?php echo $options['yts_title3']; ?>" /></td>
							</tr>
						<!-- Video 3 Section Ends -->
						
							<tr><td height="30" colspan="2"><hr style="color: #DDDDDD;" /></td></tr>
						
						<!-- Video 4 Section Starts -->
							<tr>
								<td><?php _e("Video 4 URL", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_video4]" value="<?php echo $options['yts_video4']; ?>" /></td>
							</tr>
							<tr>
								<td><?php _e("Video 4 Title", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_title4]" value="<?php echo $options['yts_title4']; ?>" /></td>
							</tr>
						<!-- Video 4 Section Ends -->
						
							<tr><td height="30" colspan="2"><hr style="color: #DDDDDD;" /></td></tr>
						
						<!-- Video 5 Section Starts -->
							<tr>
								<td><?php _e("Video 5 URL", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_video5]" value="<?php echo $options['yts_video5']; ?>" /></td>
							</tr>
							<tr>
								<td><?php _e("Video 5 Title", 'ytslider'); ?> :</td>
								<td><input type="text" name="yts_options[yts_title5]" value="<?php echo $options['yts_title5']; ?>" /></td>
							</tr>
						<!-- Video 5 Section Ends -->

					</table>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="yts_options" />		
					<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','ytslider'); ?>" class="button-primary" id="yts_update" name="yts_update"></p>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}