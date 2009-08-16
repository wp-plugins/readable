<?


/*  Copyright 2009  Waseem Senjer  (email : waseem.senjer@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



/*
Plugin Name: Readable
Plugin URI: http://shamekh.ws
Description: Let your blog RSS link readable .
Author: Waseem Senjer
Version: 1.0
Author URI: http://www.secretspedia.com
*/




function readable()
{
$options = (array) get_option('widget_readable');

 

if ($options['service1']==1) {
echo '<p><a title="Add to Google" href="http://fusion.google.com/add?feedurl='.get_bloginfo('rss2_url').'"><img border=0  src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/google.gif" ></a>';	
	
} 
if ($options['service2']==1) {
	
echo '<a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url='.get_bloginfo('rss2_url').'
" target="_blank">
<img runat="server" src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/ngsub1.gif" title="Subscribe in NewsGator Online" border="0" /></a>';	
}
if ($options['service3']==1) {
echo '<a href="http://www.bloglines.com/sub/'.get_bloginfo('rss2_url').'" target="_blank">
<img src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/bloglines.gif" border="0" title="Subscribe with Bloglines" />
</a>';	
	
}
if ($options['service4']==1) {
echo '<a href="http://add.my.yahoo.com/rss?url='.get_bloginfo('rss2_url').'" target="_blank">
<img src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/yahoo.gif" border="0" title="Add to Yahoo" />
</a>';	
	
}
if ($options['service5']==1) {
echo '<a href="http://feeds.my.aol.com/add.jsp?url='.get_bloginfo('rss2_url').'" target="_blank">
<img src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/myaol.gif" border="0" title="Add to AOL" />
</a>';	
	
}
if ($options['service6']==1) {
echo '<a href="http://www.netvibes.com/subscribe.php?url='.get_bloginfo('rss2_url').'" target="_blank">
<img src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/netvibes.gif" border="0" title="subscribe to netvibes" />
</a>';	
	
}
if ($options['service7']==1) {
echo '<a href="http://www.pageflakes.com/subscribe.aspx?url='.get_bloginfo('rss2_url').'" target="_blank">
<img src="'.get_bloginfo("wpurl").'/wp-content/plugins/readable/images/pageflakes.gif" border="0" title="subscribe to PageFlakes" />
</a>';	
	
}




  
  
 
			
			
}





////the widget function

function widget_readable($args) {
  extract($args);
  $defaults = array('title'=>'readable' );
  $options = (array) get_option('widget_readable');
  
  
  echo $before_widget;
  echo $before_title;
 
  if ($options['title']!="") {
  echo $options['title'];
  } else { echo $defaults['title']; }
  
  echo $after_title;
  readable();
  echo $after_widget;
}
/////////////////////////////////////////////////



//////////////////////////////////////////////////
function readable_init()
{
  register_sidebar_widget(__('readable'), 'widget_readable'); 
  register_widget_control('readable', 'readable_control');
  $options['service1'] = 1;  
}
add_action("plugins_loaded", "readable_init");

////////////////////////////////////////////////////

//////////////////////////////////////////////////////
// CONTROL
function readable_control () {
		$options = $newoptions = get_option('widget_readable');
		if ( $_POST['readable-submit'] ) {
			$newoptions['service1'] = strip_tags(stripslashes(isset($_POST['service1'])));
			$newoptions['service2'] = strip_tags(stripslashes(isset($_POST['service2']))); 
			$newoptions['service3'] = strip_tags(stripslashes(isset($_POST['service3'])));
			$newoptions['service4'] = strip_tags(stripslashes(isset($_POST['service4'])));
			$newoptions['service5'] = strip_tags(stripslashes(isset($_POST['service5'])));
			$newoptions['service6'] = strip_tags(stripslashes(isset($_POST['service6'])));
			$newoptions['service7'] = strip_tags(stripslashes(isset($_POST['service7'])));
			$newoptions['title'] = strip_tags(stripslashes($_POST['readable-title']));
			
			
		}
		// if the options are new , swap between the old and the new options .
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_readable', $options);
		}
?>
				
					<label for="readable-title" ><?php _e('Widget name:', 'widgets'); ?> <input type="text" id="readable-title" name="readable-title" value="<?php echo $options['title']; ?>" /></label><br/><br/>
				
				<label for="service1"><input class="checkbox" id="service1" name="service1" type="checkbox"   <?php if ($options['service1']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/google.gif" /></label><br/><br/>
                
                
                <label for="service2"><input class="checkbox" id="service2" name="service2" type="checkbox"   <?php if ($options['service2']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/ngsub1.gif" /></label><br/><br/>
                
                
               <label for="service3"><input class="checkbox" id="service3" name="service3" type="checkbox"   <?php if ($options['service3']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/bloglines.gif" /></label><br/><br/>
               
               
                <label for="service4"><input class="checkbox" id="service4" name="service4" type="checkbox"   <?php if ($options['service4']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/yahoo.gif" /></label><br/><br/>
                
                
                 <label for="service5"><input class="checkbox" id="service5" name="service5" type="checkbox"   <?php if ($options['service5']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/myaol.gif" /></label><br/><br/>
                 
                 
                  <label for="service6"><input class="checkbox" id="service6" name="service6" type="checkbox"   <?php if ($options['service6']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/netvibes.gif" /></label><br/><br/>
                  
                  
                  <label for="service7"><input class="checkbox" id="service7" name="service7" type="checkbox"   <?php if ($options['service7']) {echo ' checked="checked"';}  ?> > <img src="<? bloginfo("wpurl"); ?>/wp-content/plugins/readable/images/pageflakes.gif" /></label>
				
									


					<input type="hidden" name="readable-submit" id="feeds-submit" value="1" />
					
<?php
	}


	// Uninstallation
register_deactivation_hook( __FILE__, 'readable_unistall' );
	
	// Uniinstallation
function readable_unistall () {
	delete_option('widget_readable');
}
?>