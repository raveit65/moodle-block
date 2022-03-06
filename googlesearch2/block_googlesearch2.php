<?php
defined('MOODLE_INTERNAL') || die();

class block_googlesearch2 extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_googlesearch2');
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_config() {
        return true;
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass();
        $this->content->items  = array();
        $apiKey = '[API-Key]';

        $jsonResponse = file_get_contents('https://customsearch.googleapis.com/customsearch/v1?cx=fd58b2a4eb55453c2&num=10&q=Moodle%20Blocks&key='.$apiKey);

        $jsonDecoded = json_decode($jsonResponse, true);
        $titles = array();
        $links = array();
        $snippets = array();
        foreach($jsonDecoded["items"] as $key=>$value){
            $titles[] = $value["title"];
            $links[] = $value["link"];
            $snippets[] = $value["snippet"];
        }
        $resultString = "";
        for ($i = 0; $i<count($titles);$i++) {
            $resultString .= "Titel: ".$titles[$i]."<br>Link: <a href='$links[$i]' target='_blank'>".$links[$i]."</a><br>Summary: ".$snippets[$i]."<br><br>";
        }
        $this->content->text = $resultString;

        return $this->content;
    }

    public function applicable_formats() {
        return array('all' => true);
    }
}
