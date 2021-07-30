<?php
/*
Plugin Name: 列出Hook function名稱 (請自行修改)
Description: 列出全部functions  (請自行修改)
Version: 0.1  (請自行修改)
Author: 陳亮瑜 (請自行修改)
License: GPL2
*/

//新增一個動作
add_action('admin_menu', 'list_hooked');

function list_hooked()
{
    //新增 wordpress 左邊列表的資料
    add_menu_page(
        'Hook列表',
        '列出hooked功能名稱',
        'administrator',
        __FILE__,
        'list_hooked_functions'
    );
    
    //將註冊的們訂 function 新增到 admin_init
    add_action('admin_init', 'register_list_hooked_functions');
}

//註冊一個function
function register_list_hooked_functions()
{
    register_setting('list-hooked-function-group', 'list_hooked_function');
}

//主要的執行 function
function list_hooked_functions($tag=false)
{
    global $wp_filter;
    if ($tag) {
        $hook[$tag]=$wp_filter[$tag];
        if (!is_array($hook[$tag])) {
            trigger_error("Nothing found for ".$tag." hook", E_USER_WARNING);
            return;
        }
    } else {
        $hook=$wp_filter;
        ksort($hook);
    }
    echo '<pre>';
    foreach ($hook as $tag => $priority) {
        echo "<br>>>>>>\t<strong>$tag</strong><br>";
        ksort($priority);
        foreach ($priority as $priority => $function) {
            echo $priorityority;
            foreach ($function as $name => $properties) {
                echo "\t$name<br>";
            }
        }
    }
    echo '</pre>';
    return;
}
