<?php
    echo "Test view<br />";
    echo "<pre>";
    echo print_r($this->session->all_userdata());
    echo "</pre>";
    
    echo "--------------<br />";
	echo "Email: ".$this->session->flashdata('email');
?>
