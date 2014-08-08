<?php

$cacheFolder = __DIR__ . '/cache/city_budget';
$targetFolder = __DIR__ . '/city_budget';

if (!file_exists($cacheFolder)) {
    mkdir($cacheFolder, 0777, true);
}

if (!file_exists($targetFolder)) {
    mkdir($targetFolder, 0777, true);
}

$listFile = $cacheFolder . '/list';
if (!file_exists($listFile)) {
    file_put_contents($listFile, file_get_contents('http://www.dgbas.gov.tw/lp.asp?CtNode=4971&CtUnit=756&BaseDSD=7&mp=1'));
}
$listContent = file_get_contents($listFile);

$pos = strpos($listContent, 'ct.asp');

while (false !== $pos) {
    $posEnd = strpos($listContent, '"', $pos);
    $pageUrl = substr($listContent, $pos, $posEnd - $pos);
    if ('ct.asp?xItem=17596&CtNode=4900' !== $pageUrl) {
        $pageUrl = 'http://www.dgbas.gov.tw/' . $pageUrl;
        $pageUrlCache = $cacheFolder . '/list_' . md5($pageUrl);
        if (!file_exists($pageUrlCache)) {
            file_put_contents($pageUrlCache, file_get_contents($pageUrl));
        }
        $page = mb_convert_encoding(file_get_contents($pageUrlCache), 'utf8', 'big5');

        $parts = explode('<title>', $page);
        $parts = explode('</title>', $parts[1]);
        $pageTitle = str_replace(array('(', ')'), array('', ''), $parts[0]);

        $fPos = strpos($page, 'public/Attachment/');
        while (false !== $fPos) {
            $fPosEnd = strpos($page, '"', $fPos);
            $fileUrl = 'http://www.dgbas.gov.tw/' . substr($page, $fPos, $fPosEnd - $fPos);

            $tPos = strpos($page, '>', $fPosEnd) + 1;
            $tPosEnd = strpos($page, '<', $tPos + 1);
            $fileTitle = substr($page, $tPos, $tPosEnd - $tPos);
            echo "{$pageTitle}_{$fileTitle} => {$fileUrl}\n";

            $xlsCache = $cacheFolder . '/' . basename($fileUrl);
            if (!file_exists($xlsCache)) {
                file_put_contents($xlsCache, file_get_contents($fileUrl));
            }

            exec("xlsx2csv {$xlsCache} {$targetFolder}/{$pageTitle}_{$fileTitle}.csv");

            if (!file_exists($targetFolder . '/src')) {
                mkdir($targetFolder . '/src', 0777, true);
            }
            copy($xlsCache, "{$targetFolder}/src/{$pageTitle}_{$fileTitle}.xls");

            $fPos = strpos($page, 'public/Attachment/', $fPos + 1);
        }
    }
    $pos = strpos($listContent, 'ct.asp', $pos + 1);
}