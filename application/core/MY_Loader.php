<?php

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {
	public function append($text,$return=false){
		$this->output->append_output($text);
		if($return) return $text;
	}
    public function template($template_name, $vars = array(), $show=false,$return = FALSE)
    {
        $content  = $this->view('header', $vars, $return);
		$content .= $this->append('<div id=content>');
		if($template_name=='home'){
			 $content  = $this->view('slider', $vars, $return);
		}
		
		$content .= $this->append('<div id=container class=container-fluid><div class=row><div id=content_left class="col-md-9 col-xs-12" >');
		$content .= $this->view($template_name, $vars, $return);
		if($show){
			$content  = $this->view('other_news', $vars, $return);
		}
		$content .= $this->append('</div>');
        $content .= $this->view('side_bar', $vars, $return);
        $content .= $this->view('footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
	public function template_admin($template_name, $vars = array(),$return = FALSE)
    {
    	$content  = $this->view('admin/header', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);

			$content .= $this->view('admin/footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
}