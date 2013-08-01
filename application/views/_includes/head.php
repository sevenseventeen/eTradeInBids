<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>eTradeInBids</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'_css/reset.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'_css/main.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'_css/jquery.lightbox-0.5.css'; ?>" media="screen" />
    
    <script type="text/javascript" src="<?php echo base_url().'_javascript/jquery-1.4.2.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'_javascript/jquery.lightbox-0.5.js'; ?>"></script>
    
    
    <!--  Uploadify -->
    
    
    <link href="<?php echo base_url().'application/uploadify/uploadify.css'; ?>" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url().'_javascript/swfobject.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'_javascript/jquery.uploadify.v2.1.4.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'_javascript/jquery.formatCurrency-1.4.0.js'; ?>"></script>
    <script type="text/javascript">

    $(document).ready(function() {

    	// Format Currency Fields

		$('.currency').keyup(function(event) {
			$(this).formatCurrency({roundToDecimalPlace:0});	
		});

		// Toggle Input Fields With Default Values, Toggle Password Fields
		
		$('#password_password').hide();
		$('#password_password').css('color','black');
		$('#password_text').focus(function() {
			$('#password_text').hide();
			$('#password_password').show();
			$('#password_password').focus();
		});

		$('#password_password').blur(function() {
			if ($('#password_password').val() == '') {
				$('#password_text').show();
				$('#password_password').hide();
			}
		});
    	
    	$('.toggle_input_value').each(function() {
		    var default_value = this.value;
		    $(this).focus(function() {
		        if(this.value == default_value) {
		            this.value = '';
		            $(this).css('color','#000000');
		        }
		        if($(this).hasClass('password_field')) {
			        this.type = 'password';
		        }
		    });

		    $(this).blur(function() {
		        if(this.value == '') {
		            this.value = default_value;
		            this.type = 'text';
		            $(this).css('color','#CCCCCC');
		        }
		    });
		});

		// Uploadify
        
    	$('#file_upload').uploadify({
        	'uploader'  : "<?php echo base_url().'application/uploadify/uploadify.swf'; ?>",
        	'script'    : "<?php echo base_url().'application/uploadify/uploadify.php'; ?>",
        	'cancelImg' : "<?php echo base_url().'application/uploadify/cancel.png'; ?>",
        	'folder'    : "<?php echo base_url().'application/uploads'; ?>",
        	'fileExt'   : '*.jpg;*.gif;*.png',
        	'fileDesc'  : 'Image Files',
        	'removeCompleted' : true,
        	'auto'      : true,
        	'sizeLimit' : 4194304, 
        	'multi' : true,
        	onComplete : function(event, queueID, fileObj, response, data) {
				$.post('<?php echo site_url('site/uploadify'); ?>',{ filearray: response }, function(info){ $("#fileinfotarget").append(info); });
			},
			onAllComplete : function(event, data) {
		    	$("#skip_this").hide();
		    	$("#im_done").fadeIn();
		    	//location.reload();
			}
      	});
    });
    </script>
    
    <!--  Lightbox Plugin http://leandrovieira.com/projects/jquery/lightbox/ -->
    
    

	<!-- $.post('<?php //echo site_url('site/uploadify'); ?>',{ filearray:response }); -->    
    <!--  $.post('<?php //echo site_url('site/uploadify'); ?>',{ filearray: response }, function(info){ $("#fileinfotarget").append(info); }); -->
    
    <!--  onComplete : function(event,queueID,fileObj,response,data){ alert('alert'); } This is how custom event functions need to go in. -->
    
    <!--  End Uploadify -->
    
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-29551291-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    
    </script>
    
</head>

<?php 
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
?> 

<body>