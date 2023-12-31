<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller'][] = function () {
    $this->CI = &get_instance();
    $profiler = $this->CI->config->item('profiler_hook');
    if (ENVIRONMENT === 'development' and $profiler === true) {
        if ($this->CI->router->class == 'dev') {
            return;
        }
        $this->CI->output->enable_profiler(true);
    }
};
