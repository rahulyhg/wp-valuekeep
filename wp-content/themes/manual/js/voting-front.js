jQuery(document).ready(function() {
	 
	"use strict";
	
    jQuery(".post-like a").on("click",function() { 
        var heart = jQuery(this);
        // Retrieve post ID from data attribute
        var post_id = heart.data("post_id");
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: doc_ajax_var.url,
			data: { action: 'post-like', 
					nonce: doc_ajax_var.nonce,
					post_id: post_id,
					post_like: '',
				  },
			success: function(data, textStatus, XMLHttpRequest){
					jQuery( "span.manual_doc_count" ).text(data); 
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				//alert(textStatus); 
			}
        });
        return false;
    })
	
	
    jQuery(".post-unlike a").on("click",function() { 
        var heart = jQuery(this);
        // Retrieve post ID from data attribute
        var post_id = heart.data("post_id");
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: doc_ajax_var.url,
			data: { action: 'post-unlike', 
					nonce: doc_ajax_var.nonce,
					post_id: post_id,
					post_like: '',
				  },
			success: function(data, textStatus, XMLHttpRequest){ 
					jQuery( "span.manual_doc_unlike_count" ).text(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				//alert(textStatus); 
			}
        });
        return false;
    })	
	
	
	
	jQuery(".post-reset a").on("click",function() { 
		var action = confirm("Are you sure you want to start reset (like/unlike/total post visitors) process. Once reset it cant be undone");
		if (action == true) {
				var heart = jQuery(this);
				// Retrieve post ID from data attribute
				var post_id = heart.data("post_id");
				// Ajax call
				jQuery.ajax({
					type: "post",
					url: doc_ajax_var.url,
					data: { action: 'post-reset-stats', 
							nonce: doc_ajax_var.nonce,
							post_id: post_id,
							post_reset: '',
						  },
					success: function(data, textStatus, XMLHttpRequest){ 
							jQuery( "span.manual_doc_count" ).text(''); 
							jQuery( "span.manual_doc_unlike_count" ).text('');
					},
					error: function(MLHttpRequest, textStatus, errorThrown){  
						//alert(textStatus); 
					}
				});
				return false;
		}
	})	

	
	
})