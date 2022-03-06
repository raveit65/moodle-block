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
        $this->content = new stdClass();
        $this->content->text = "Display search results as raw jason";

        return $this->content;
    }

    public function applicable_formats() {
        return array('all' => true);
    }
}
