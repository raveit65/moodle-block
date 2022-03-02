<?php
defined('MOODLE_INTERNAL') || die();

class block_firsttest extends block_base {
    public function init() {
        $this->title = get_string('firsttest', 'block_firsttest');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
}
