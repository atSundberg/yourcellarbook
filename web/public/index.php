<?php

/*$output = var_export($_POST, true);
error_log($output, 0, "./post_dump.log");
*/

require 'lib/flight/Flight.php';

const ROOT_LOCAL    = '../data';
const ROOT_PROD     = './data';
const ROOT = ROOT_LOCAL;

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// Remove ROOT & Extension from FileName
function fixFileName($fn, $rootDir, $ext) {
    $s1 = str_replace($rootDir, '', $fn);
    return str_replace('.' . $ext, '', $s1);
}
function listFiles($rootDir, $ext) {
    $fileList = glob($rootDir . '*.' . $ext);
    $lst = [];
    foreach ($fileList as $fn) {
        array_push($lst, fixFileName($fn, $rootDir, $ext));
    }
    return $lst;
}

// Get text from file
function get_text($text_filename) {
//    $text = $text_filename . ":";
    $text = "";
    if ($text_filename != "") {
        $text_file = fopen($text_filename, "r");
        while (!feof($text_file)) {
            $text = $text . fgets($text_file, 4096);
        }
        fclose($text_file);     
    }
    return $text;
}
function jsonReply($data) {
    return Flight::json(array('data' => $data));
}

/*
$request = Flight::request();
debug_to_console(Flight::json($request));

    foreach (getallheaders() as $name => $value) {
        array_push($data, "$name: $value");
    }

*/

// *** List data ***
Flight::route('GET /api/v1/wines', function() {
/*    
    $db = new SQLite3(ROOT . '/wine_db.db');

    $result = $db->query('SELECT ticker, stop_loss, last_close, 
                            first_close, created_at, updated_at 
                            FROM stocks_tbl order by ticker');
    $data= array();
    while ($res= $result->fetchArray(1)) {
//        if($res['stop_loss']) < 0) continue;    // Skipp if not set(first day?)    
        array_push($data, $res);                //insert row into array
    }

    jsonReply($data);
*/    
});

// *** UPDATE data ***
Flight::route('POST /api/v1/cmd/wine', function() {
/*
    $data = Flight::request()->data;
    debug_to_console(Flight::json($data));

    $db = new SQLite3(ROOT . '/ssi_db.db');

    $stm = $db->prepare('UPDATE stocks_tbl set stop_loss=?, last_close=?, 
                            updated_at=datetime("now","localtime") 
                            WHERE ticker = ? ');
    $stm->bindValue(1, $data->sl, SQLITE3_FLOAT);
    $stm->bindValue(2, $data->close, SQLITE3_FLOAT);
    $stm->bindValue(3, $data->ticker, SQLITE3_TEXT);

    $res = $stm->execute();
*/    
});

Flight::route('POST /api/v1/cmd/stocki', function() {
/*
    $data = Flight::request()->data;
    debug_to_console(Flight::json($data));

    $db = new SQLite3(ROOT . '/ssi_db.db');

    $stm = $db->prepare('UPDATE stocks_tbl set first_close = ? WHERE ticker = ? ');
    $stm->bindValue(1, $data->close, SQLITE3_FLOAT);
    $stm->bindValue(2, $data->ticker, SQLITE3_TEXT);

    $res = $stm->execute();
*/    
});


/*
Flight::route('POST /api/v1/cmd/recpwd', function() {
});


Flight::route('POST /api/v1/cmd', function() {
    //"cmd" : ["req_pwd", "reg_user", "stockadd", "stock_init", "stock_upd"

});
*/

// *** homepage ***
Flight::route('GET /', function() {
    Flight::set('flight.views.path', './views');

    Flight::render('header', array('heading' => 'Hello'), 'header_content');
    Flight::render('body', array('body' => 'World'), 'body_content');
    Flight::render('footer', array('footer' => 'End'), 'footer_content');
    Flight::render('layout', array('title' => 'Home Page'));    
});

// *** MD filerna ***
Flight::route('GET /api/info', function() {    
    jsonReply(listFiles(ROOT . '/info/', 'md'));
});

// *** Get one ***
Flight::route('GET /api/info/@id', function($id) {   
    jsonReply(get_text(ROOT . '/info/' . $id . '.md'));
});

// ========================================
Flight::before('start', function(&$params, &$output){
/*    foreach (getallheaders() as $name => $value) {
        echo "$name: $value";
    }*/
});


Flight::start();

?>