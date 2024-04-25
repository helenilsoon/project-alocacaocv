<?php

function dd( $var,$msg=null){
    echo '<pre>';
    
    echo "----------dd $msg----------------\n";
    echo "<br>";
    // echo ($msg) ? $msg . "\n" : '';
    var_dump($var);
    echo "<br>";
  
    echo "<br>";
    echo '</pre>';
    // die();
}
function ddArray($var,$msg=null){
    echo '<pre>';
    echo "<br>";
    echo "----------ddArray $msg----------------\n";
    echo "<br>";
    // echo ($msg) ? $msg . "\n" : '';
    print_r($var);
    echo "<br>";
  
    echo "<br>";
    echo '</pre>';
    // die();
}
function ddCaller($var){
    echo '<pre>';
    vardump_caller($var);
    echo '</pre>';
    // die();
}

function vardump_caller($variable) {
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
    $caller = isset($backtrace[1]) ? $backtrace[1] : null;

    if ($caller) {
        $file = isset($caller['file']) ? $caller['file'] : 'Unknown file';
        $line = isset($caller['line']) ? $caller['line'] : 'Unknown line';

        echo "Caller: $file (line $line)\n";
    }

    var_dump($variable);
}

function show_backtrace_info() {
    $backtrace = debug_backtrace();
    foreach ($backtrace as $index => $trace) {
        echo "Call $index:\n";
        foreach ($trace as $key => $value) {
            if ($key === 'args') {
                echo "  $key:\n";
                foreach ($value as $argIndex => $arg) {
                    echo "    Arg $argIndex: ";
                    var_dump($arg);
                }
            } else {
                echo "  $key: ";
                var_dump($value);
            }
        }
        echo "\n";
    }
}