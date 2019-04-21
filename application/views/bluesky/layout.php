<?php
	$data['url']=base_url();
	$this->parser->parse('bluesky/header',$data);
    
    $this->parser->parse($template,$data);
    
    $this->parser->parse('bluesky/footer',$data)
?>