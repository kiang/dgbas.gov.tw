<?php

$sourceFolder = __DIR__ . '/city_budget_clean';

// year => type => account => city => value
$baseData = array();

foreach (glob($sourceFolder . '/*.json') AS $jsonFile) {
    $baseName = basename($jsonFile);
    $theYear = intval(substr($baseName, 0, strpos($baseName, '年')));
    if (!isset($baseData[$theYear])) {
        $baseData[$theYear] = array();
    }
    $data = json_decode(file_get_contents($jsonFile), true);
    if (false === strpos($baseName, '歲入')) {
        if (!isset($baseData[$theYear]['expense'])) {
            $baseData[$theYear]['expense'] = array();
        }
        foreach ($data AS $city => $accounts) {
            if (false !== strpos($city, '經資_')) {
                $city = substr($city, strpos($city, '_') + 1);
                foreach ($accounts AS $account => $value) {
                    if (!isset($baseData[$theYear]['expense'][$account])) {
                        $baseData[$theYear]['expense'][$account] = array();
                    }
                    $baseData[$theYear]['expense'][$account][$city] = $value;
                }
            }
        }
    } else {
        foreach ($data AS $city => $accounts) {
            foreach ($accounts AS $account => $value) {
                if (!isset($baseData[$theYear]['income'][$account])) {
                    $baseData[$theYear]['income'][$account] = array();
                }
                $baseData[$theYear]['income'][$account][$city] = $value;
            }
        }
    }
}

$targetData = array();

foreach ($baseData AS $year => $lv1) {
    foreach ($lv1 AS $type => $lv2) {
        $typeSum = 0;
        foreach ($lv2 AS $account => $lv3) {
            if (!isset($targetData[$account])) {
                $targetData[$account] = array();
            }
            if (!isset($targetData[$account][$year])) {
                $targetData[$account][$year] = 0;
            }
            if (!isset($targetData[$account][$year . '比例'])) {
                $targetData[$account][$year . '比例'] = '';
            }

            $targetData[$account][$year . '排名'] = 1;
            $accountSum = 0;
            foreach ($lv3 AS $city => $value) {
                if ('臺南市' === $city) {
                    $targetData[$account][$year] = $value;
                    $typeSum += $value;
                }
                $accountSum += $value;
            }
            foreach ($lv3 AS $city => $value) {
                if ('臺南市' !== $city && $value > $targetData[$account][$year]) {
                    ++$targetData[$account][$year . '排名'];
                }
            }
            if (isset($targetData[$account][$year]) && $accountSum > 0) {
                $targetData[$account][$year . '比例'] = round(100 * $targetData[$account][$year] / $accountSum, 2);
            }
        }
        if (!isset($targetData["小計[{$type}]"])) {
            $targetData["小計[{$type}]"] = array();
        }
        $targetData["小計[{$type}]"][$year] = $typeSum;
        $targetData["小計[{$type}]"][$year . '比例'] = '';
        $targetData["小計[{$type}]"][$year . '排名'] = '';
    }
    if (!isset($targetData['結餘'])) {
        $targetData['結餘'] = array();
    }
    $targetData['結餘'][$year] = $targetData["小計[income]"][$year] - $targetData["小計[expense]"][$year];
    $targetData['結餘'][$year . '比例'] = '';
    $targetData['結餘'][$year . '排名'] = '';
}

$fh = fopen(__DIR__ . '/tainan.csv', 'w');
$label = false;
foreach ($targetData AS $account => $data) {
    if (false === $label) {
        fputcsv($fh, array_merge(array('項目'), array_keys($data)));
        $label = true;
    }
    fputcsv($fh, array_merge(array($account), $data));
}
fclose($fh);