<?php

function generate()
{
    $nodes = [
        ["id" => 0, "parent" => null,]
    ];
    for ($i = 1; $i < 1000; $i++) {
        $nodes[] = ["id" => $i, "parent" => rand(0, $i - 1)];
    }
    echo "id,parent\n";
    foreach ($nodes as $n) {
        echo $n["id"] . "," . $n["parent"] . "\n";
    }

}

$c = fopen("./e5.csv", "r");
$header = null;
$items = [];
while ($row = fgetcsv($c)) {
    if ($header === null) {
        $header = $row;
        continue;
    }
    $r = array_combine($header, $row);
    if (strlen($r["parent"]) > 0) {
        $items[$r["parent"]]["nodes"] = $items[$r["parent"]]["nodes"] ?? [];
        $items[$r["parent"]]["nodes"][] = &$items[$r["id"]];
    }
    //unset($r["parent"]);
    $items[$r["id"]] = $r;

}
print_r($items);
die();
//echo json_encode($items[0], JSON_PRETTY_PRINT);
//die();

$max = 0;
$maxPaths = [];
foreach ($items as $i) {
    $path = getNodePath($items, $i, []);
    echo implode(",",$path).PHP_EOL;

    switch ($max <=> count($path)) {
        case -1:
            $max = count($path);
            $maxPaths = [];
        case 0:
            $maxPaths[] = $path;
            break;
    }
}


print_r($max);
echo "\n";
print_r(count($maxPaths));

function getNodePath($items, $item, $path = [])
{
    array_unshift($path, $item["id"]);
    if (strlen($item["parent"]) === 0) {
        return $path;
    }
    return getNodePath($items, $items[$item["parent"]], $path);
}




