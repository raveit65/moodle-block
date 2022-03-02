<?php
defined('MOODLE_INTERNAL') || die();

class block_firsttest extends block_base {
    public function init() {
        $this->title = get_string('firsttest', 'block_firsttest');
        $this->blockname = get_class($this);
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
        $this->content->text = "The content of our FirstTest block!";
        $this->content->footer = 'Footer here...';

        return $this->content;
    }

    public function applicable_formats() {
        return array('all' => true);
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
}
