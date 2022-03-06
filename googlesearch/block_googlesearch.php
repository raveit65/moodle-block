<?php
defined('MOODLE_INTERNAL') || die();

class block_googlesearch extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_googlesearch');
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

        $apiKey = '[API-Key]';

        $jsonResponse = file_get_contents('https://customsearch.googleapis.com/customsearch/v1?cx=fd58b2a4eb55453c2&num=10&q=Moodle%20Blocks&key='.$apiKey);

        $jsonData = json_decode($jsonResponse);
        $items = $jsonData->items;

        $searchstring = 'Search Results for "Moodle Blocks": <br><br>';

        foreach($items as $key=>$value){
            $searchstring .= '<a href="' . $value->link . '">' . $value->link . '</a><br>';
        }

        $this->content = new stdClass();
        $this->content->text = $searchstring;

        return $this->content;
    }

    public function applicable_formats() {
        return array('all' => true);
    }
}
