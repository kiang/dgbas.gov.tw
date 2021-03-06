<?php

$sourceFolder = __DIR__ . '/city_budget_clean';
$targetFolder = __DIR__ . '/city_budget_tree';
if (!file_exists($targetFolder)) {
    mkdir($targetFolder, 0777, true);
}

foreach (glob($sourceFolder . '/*.json') AS $jsonFile) {
    $baseName = basename($jsonFile);
    $targetName = 1911 + intval(substr($baseName, 0, strpos($baseName, '年')));
    $data = json_decode(file_get_contents($jsonFile), true);
    $accountData = array();
    $treeData = new stdClass();
    $treeData->name = $targetName;
    $treeData->children = array();
    if (false === strpos($baseName, '歲入')) {
        $targetName .= '_expense_by_city.json';
        $treeData->name .= '歲出';
        foreach ($data AS $city => $accounts) {
            if (false !== strpos($city, '經資_')) {
                $city = substr($city, strpos($city, '_') + 1);
                $cityNode = new stdClass();
                $cityNode->name = $city;
                $cityNode->children = array();
                $cityNodeSize = 0;
                foreach ($accounts AS $account => $value) {
                    $accountNode = new stdClass();
                    $accountNode->name = $account;
                    $accountNode->size = $value;
                    $cityNode->children[] = $accountNode;
                    $cityNodeSize += $value;
                    if (!isset($accountData[$account])) {
                        $accountData[$account] = array();
                    }
                    $accountData[$account][$city] = $value;
                }
                $treeData->children[] = $cityNode;
            }
        }
    } else {
        $targetName .= '_income_by_city.json';
        $treeData->name .= '歲入';
        foreach ($data AS $city => $accounts) {
            $cityNode = new stdClass();
            $cityNode->name = $city;
            $cityNode->children = array();
            $cityNodeSize = 0;
            foreach ($accounts AS $account => $value) {
                $accountNode = new stdClass();
                $accountNode->name = $account;
                $accountNode->size = $value;
                $cityNode->children[] = $accountNode;
                $cityNodeSize += $value;
                if (!isset($accountData[$account])) {
                    $accountData[$account] = array();
                }
                $accountData[$account][$city] = $value;
            }
            $treeData->children[] = $cityNode;
        }
    }
    file_put_contents($targetFolder . '/' . $targetName, json_encode($treeData));
    $targetName = str_replace('by_city', 'by_account', $targetName);
    $treeData = new stdClass();
    $treeData->name = substr($targetName, 0, strpos($targetName, '.'));
    $treeData->children = array();

    foreach ($accountData AS $account => $lv1) {
        $accountNode = new stdClass();
        $accountNode->name = $account;
        $accountNode->children = array();
        foreach ($lv1 AS $city => $value) {
            $cityNode = new stdClass();
            $cityNode->name = $city;
            $cityNode->size = $value;
            $accountNode->children[] = $cityNode;
        }
        $treeData->children[] = $accountNode;
    }

    file_put_contents($targetFolder . '/' . $targetName, json_encode($treeData));
}