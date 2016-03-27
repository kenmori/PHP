<?php
/*
Plugin Name: Save Editor Scroll Position
Plugin URI: http://watchingnumbersgoup.com/save-editor-scroll-position
Description: Uses javascript to preserve the vertical scroll position within the Wordpress HTML or Visual TinyMCE post editor window between saves/updates to your post (CURRENTLY DOES NOT WORK IN IE).
Version: 1.1
Author: Seventhpath
Author URI: http://watchingnumbersgoup.com
License: GPL2
*/

/*  
Copyright 2011  WatchingNumbersGoUp.com  (email : seventhpath@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function save_editor_scroll_position() 
{
	?>
	<script language=javascript>
	
		//TODO: Figure out why sometimes the editor automatically scrolls back to the top (position 0) when clicking the save/update button (happens only sometimes, independent of whether this plugin is active).
	
		//Note that the TinyMCE Iframe and DOM objects load AFTER the page load finishes!  Furthermore, it only loads when the Visual editor tab has been enabled.
		//Therefore it is necessary to wait a small amount of time before attaching listeners to the TinyMCE DOM objects.
		var editorTextarea = document.getElementById("content");
		var editorContainer = document.getElementById("editorcontainer");
		
		var originalEditorScroll = window.name;
		
		//The editorTextarea should ALWAYS be present in the page/post editor windows.  If it isn't there, we shouldn't do anything!
		if(editorTextarea != null)
		{
			//Start recursive function that constantly checks for the TinyMCE editor (Visual tab).  If it finds it, it will attach a listen and stop looping.
			setTimeout("addTinyMCEScrollListener()", 1000);
		
			//If the user is using the HTML editor, there is no need to make them wait for the TinyMCE editor loading!
			editorTextarea.scrollTop = window.name;
			
			//Add a scroll listener to the HTML editor window.
			editorTextarea.addEventListener("scroll", function(event) { scrollPositionSave(event); }, false);
		}
		else
		{	
			//Do nothing, the editor is not present!
			//alert('Editor window not open!');
		}
		
		//Other potential tags for scroll listeners.
		//var editorPostContainer = document.getElementById("editorcontainer");
		//var editorContainer = document.getElementById("postdivrich");
		//editorContainer.addEventListener("mouseover", function(event) { scrollPositionSave(event); }, false);
		//editorIframe.addEventListener("scroll", scrollPositionSave, false); 
		
		//Debug: list window frame count within the current window.
		//alert('window frames array size ' + window.frames.length);
		
		
		//Save (or re-save) the scroll position variable for the most recently scrolled editor window (HTML or Visual).
		function scrollPositionSave(event)
		{
			//Debug: output the scroll position in an alert window every time the editor is scrolled.
			//alert(event.target.id + ' scrollTop: ' + event.target.scrollTop + ' tagName: ' + event.target.tagName + ' nodeName: ' + event.target.nodeName);
			
			//Display a property from the tinyMCE page object (this loads right away, different from the editor box).
			//alert(window.tinyMCE.baseURI.authority + '');
			
			//Retrieve the TinyMCE editor Iframe object (this loads AFTER the page has loaded and the Visual tab has been enabled.
			//var tinymceIframe = document.getElementById('content_ifr');

			
			//Store the scroll position of either the HTML or Visual editor scrollbar, depending on which one called this function.
			//Use the special window.name variable in order to persist across page refreshes within the same window.
			if(event.target.id == 'content')
			{
				//alert('Scroll position saved (HTML editor): ' + event.target.scrollTop);
				window.name = event.target.scrollTop;
			}
			else
			{
				//Retrieve the TinyMCE editor Iframe object's HTML document content and get the body element which has the id 'tinymce' and contains the actual page/post contents. 
				var tinymce = document.getElementById('content_ifr').contentDocument.getElementById('tinymce');
				
				//alert('Scroll position saved (tinymce visual): ' + tinymce.scrollTop + '');
				window.name = tinymce.scrollTop;
			}
		}
		
		//Attach onScroll listener to the TinyMCE visual editor window (which may not load until an arbitrary amount of time has passed and the user has activated the Visual tab).  Also, load the previously
		//saved scroll position as the current Visual editor window scroll position.
		function addTinyMCEScrollListener()
		{	
			//If the TinyMCE visual editor has loaded, load the page scroll position and attach a scroll listener.
			//Otherwise, have this function keep calling itself at a regular interval.
			if(document.getElementById('content_ifr') != null && 
				document.getElementById('content_ifr').contentDocument.getElementById('tinymce') != null && 
				document.getElementById('content_ifr').contentDocument.getElementById('tinymce').innerHTML != null)
			{
				//Retrieve the TinyMCE editor Iframe object's HTML document content and get the body element which has the id 'tinymce' and contains the actual page/post contents. 
				//
				//Do not understand the details, but the second parent from the Body node is actually the nodeName '#document' and NOT the Iframe tag.
				//This means that the HTML document INSIDE the Iframe tag receives the 'scroll' event and not the actual Iframe, yet at the same time the scrollTop value itself
				//belongs to the body tag within the #document (the #document.scrollTop value is undefined).
				var tinymce = document.getElementById('content_ifr').contentDocument.getElementById('tinymce');
			
				//We can only possibly restore the Visual editor position if the visual editor is actually present!
				//We will load the editor scroll position to what it was when this page first loaded (and NOT what the HTML editor may have been set to afterwards!).
				//alert('Reloading previous scroll position into TinyMCE: ' + originalEditorScroll);
				tinymce.scrollTop = originalEditorScroll;
			
				//Add a scroll listener to the Visual editor window.
				tinymce.parentNode.parentNode.addEventListener("scroll", function(event) { scrollPositionSave(event); }, false);
				
				//Show that the body parent is the HTML tag for the sub-window itself and contains the entire subdocument.
				//alert('tinymce body tag parent contents: ' + tinymce.parentNode.innerHTML);
			}
			else
			{
				setTimeout("addTinyMCEScrollListener()", 1000);
			}
		}
		
		//Pause execution without sleeping the Javascript thread.
		// www.sean.co.uk
		function pausecomp(millis)
		{
			var date = new Date();
			var curDate = null;

			do { curDate = new Date(); }
			while(curDate-date < millis);
		} 
		
		//Output scroll position directly into the page contents.
		//document.write('Scroll position: ' + document.getElementById('content').scrollTop);
	
	</script>
	<?php
}

//add_action('admin_menu', 'keep_editor_scroll_position');
//add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );
//add_action( 'edit_page_form', 'save_editor_scroll_position' );
//add_action( 'save_post', 'save_editor_scroll_position' );
//add_action( 'admin_header', 'save_editor_scroll_position' );
//add_action( 'the_editor', 'post_edit_form_tag' );
//add_filter( 'the_editor', 'post_edit_form_tag' );

//Call the PHP function which outputs the Javascript in the FOOTER of all admin pages.
add_action( 'admin_footer', 'save_editor_scroll_position' );
?>