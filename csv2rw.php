<?
if(!is_file($argv[1]) || !is_readable($argv[1])){
    echo "Usage: php csv2rw.php path_to_csv_file\n";
    exit(0);
}

foreach(file($argv[1]) AS $line){

    $parts = explode(",",$line);
    $urlParts = parse_url($parts[0]);

    if($urlParts['query']){
        $rule = "RewriteCond %{QUERY_STRING} ^" . preg_quote($urlParts['query']) . "$\n".
                "RewriteRule ^" . preg_quote(ltrim($urlParts['path'],'/')) . "$   " . trim($parts[1]) . "? [R=301,L]\n";
    } else{
        $rule = "RewriteRule ^" . preg_quote(ltrim($urlParts['path'],'/')) . "$   " . trim($parts[1]) . "? [R=301,L]\n";
    }
    $rules[] = $rule;
}

echo implode("\n",$rules);
exit(0);

