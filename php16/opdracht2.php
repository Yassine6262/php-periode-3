<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function get_user_agent_info($user_agent) {
    $browser_name = '';
    $os_name = '';

    if (preg_match('/Chrome/i', $user_agent)) {
        $browser_name = 'Chrome';
    } elseif (preg_match('/Safari/i', $user_agent)) {
        $browser_name = 'Safari';
    } elseif (preg_match('/Firefox/i', $user_agent)) {
        $browser_name = 'Firefox';
    } elseif (preg_match('/MSIE/i', $user_agent) || preg_match('/Trident/i', $user_agent)) {
        $browser_name = 'Internet Explorer';
    }

    if (preg_match('/Windows NT 10\.0/i', $user_agent)) {
        $os_name = 'Windows 10';
    } elseif (preg_match('/Windows NT 6\.3/i', $user_agent)) {
        $os_name = 'Windows 8.1';
    } elseif (preg_match('/Windows NT 6\.2/i', $user_agent)) {
        $os_name = 'Windows 8';
    } elseif (preg_match('/Windows NT 6\.1/i', $user_agent)) {
        $os_name = 'Windows 7';
    } elseif (preg_match('/Macintosh/i', $user_agent)) {
        $os_name = 'Mac OS X';
    } elseif (preg_match('/Linux/i', $user_agent)) {
        $os_name = 'Linux';
    }

    return array('browser_name' => $browser_name, 'os_name' => $os_name);
}

$user_agent_info = get_user_agent_info($user_agent);

echo "Browser: " . $user_agent_info['browser_name'] . "\n";
echo "Operating System: " . $user_agent_info['os_name'] . "\n";

?>
