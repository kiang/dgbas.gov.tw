<?php

$sourceFolder = __DIR__ . '/city_budget';
$targetFolder = __DIR__ . '/city_budget_clean';
if(!file_exists($targetFolder)) {
    mkdir($targetFolder, 0777, true);
}

$cols = array(
    0 => array(
        0 => '-',
        1 => '-',
        2 => '-',
        3 => '土地稅',
        4 => '-',
        5 => '房屋稅',
        6 => '使用牌照稅',
        7 => '契稅',
        8 => '印花稅',
        9 => '娛樂稅',
        10 => '遺產及贈與稅',
        11 => '菸酒稅',
        12 => '-',
        13 => '統籌分配稅',
        14 => '工程受益費收入',
        15 => '-',
        16 => '罰金罰鍰及怠金',
        17 => '沒入及沒收財物',
        18 => '賠償收入',
        19 => '-',
        20 => '-',
        21 => '行政規費收入',
        22 => '使用規費收入',
        23 => '信託管理收入',
        24 => '-',
        25 => '財產孳息',
        26 => '財產售價',
        27 => '財產作價',
        28 => '-',
        29 => '投資收回',
        30 => '廢舊物資售價',
        31 => '-',
        32 => '營業基金盈餘繳庫',
        33 => '非營業特種基金賸餘繳庫',
        34 => '投資收益',
        35 => '-',
        36 => '-',
        37 => '上級政府補助收入',
        38 => '地方政府協助收入',
        39 => '-',
        40 => '捐獻收入',
        41 => '贈與收入',
        42 => '自治稅捐收入',
        43 => '特別稅課',
        44 => '-',
        45 => '臨時稅課',
        46 => '附加稅課',
        47 => '-',
        48 => '學雜費收入',
        49 => '雜項收入',
    ),
    1 => array(
        0 => '-',
        1 => '合計',
        2 => '稅課收入',
        3 => '土地稅',
        4 => '-',
        5 => '房屋稅',
        6 => '使用牌照稅',
        7 => '契稅',
        8 => '印花稅',
        9 => '娛樂稅',
        10 => '遺產及贈與稅',
        11 => '菸酒稅',
        12 => '-',
        13 => '統籌分配稅',
        14 => '特別稅課',
        15 => '臨時稅課',
        16 => '附加稅課',
        17 => '工程受益費收入',
        18 => '罰款及賠償收入',
        19 => '罰金罰鍰及怠金',
        20 => '-',
        21 => '沒入及沒收財物',
        22 => '賠償收入',
        23 => '規費收入',
        24 => '行政規費收入',
        25 => '使用規費收入',
        26 => '信託管理收入',
        27 => '財產收入',
        28 => '-',
        29 => '財產孳息',
        30 => '財產售價',
        31 => '財產作價',
        32 => '投資收回',
        33 => '廢舊物資售價',
        34 => '營業盈餘及事業收入',
        35 => '營業基金盈餘繳庫',
        36 => '-',
        37 => '非營業特種基金賸餘繳庫',
        38 => '投資收益',
        39 => '補助及協助收入',
        40 => '上級政府補助收入',
        41 => '地方政府協助收入',
        42 => '捐獻及贈與收入',
        43 => '捐獻收入',
        44 => '贈與收入',
        45 => '-',
        46 => '自治稅捐收入',
        47 => '-',
        48 => '其他收入',
        49 => '學雜費收入',
        50 => '雜項收入',
    ),
    2 => array(
        0 => '-',
        1 => '-',
        2 => '-',
        3 => '政權行使支出',
        4 => '-',
        5 => '行政支出',
        6 => '民政支出',
        7 => '財務支出',
        8 => '-',
        9 => '教育支出',
        10 => '科學支出',
        11 => '文化支出',
        12 => '-',
        13 => '-',
        14 => '農業支出',
        15 => '工業支出',
        16 => '交通支出',
        17 => '其他經濟服務支出',
        18 => '-',
        19 => '社會保險支出',
        20 => '-',
        21 => '社會救助支出',
        22 => '福利服務支出',
        23 => '國民就業支出',
        24 => '醫療保健支出',
        25 => '-',
        26 => '社區發展支出',
        27 => '環境保護支出',
        28 => '-',
        29 => '-',
        30 => '退休撫卹給付支出',
        31 => '退休撫卹業務支出',
        32 => '-',
        33 => '警政支出',
        34 => '-',
        35 => '債務付息支出',
        36 => '-',
        37 => '還本付息事務支出',
        38 => '-',
        39 => '專案補助支出',
        40 => '平衡預算補助支出',
        41 => '協助支出',
        42 => '-',
        43 => '第二預備金',
        44 => '其他支出',
    ),
);

$rows = array(
    0 => array(
        1 => '-',
        2 => '-',
        3 => '臺北市',
        4 => '新北市',
        5 => '臺中市',
        6 => '臺南市',
        7 => '高雄市',
        8 => '桃園縣',
        9 => '-',
        10 => '宜蘭縣',
        11 => '新竹縣',
        12 => '苗栗縣',
        13 => '彰化縣',
        14 => '南投縣',
        15 => '雲林縣',
        16 => '嘉義縣',
        17 => '屏東縣',
        18 => '臺東縣',
        19 => '花蓮縣',
        20 => '澎湖縣',
        21 => '基隆市',
        22 => '新竹市',
        23 => '嘉義市',
        24 => '金門縣',
        25 => '連江縣',
    ),
    1 => array(
        1 => '-',
        2 => '-',
        3 => '-',
        4 => '經資_臺北市',
        5 => '經資_新北市',
        6 => '經資_臺中市',
        7 => '經資_臺南市',
        8 => '經資_高雄市',
        9 => '經資_桃園縣',
        10 => '-',
        11 => '經資_宜蘭縣',
        12 => '經資_新竹縣',
        13 => '經資_苗栗縣',
        14 => '經資_彰化縣',
        15 => '經資_南投縣',
        16 => '經資_雲林縣',
        17 => '經資_嘉義縣',
        18 => '經資_屏東縣',
        19 => '經資_臺東縣',
        20 => '經資_花蓮縣',
        21 => '經資_澎湖縣',
        22 => '經資_基隆市',
        23 => '經資_新竹市',
        24 => '經資_嘉義市',
        25 => '經資_金門縣',
        26 => '經資_連江縣',
        27 => '-',
        28 => '-',
        29 => '-',
        30 => '經_臺北市',
        31 => '經_新北市',
        32 => '經_臺中市',
        33 => '經_臺南市',
        34 => '經_高雄市',
        35 => '經_桃園縣',
        36 => '-',
        37 => '經_宜蘭縣',
        38 => '經_新竹縣',
        39 => '經_苗栗縣',
        40 => '經_彰化縣',
        41 => '經_南投縣',
        42 => '經_雲林縣',
        43 => '經_嘉義縣',
        44 => '經_屏東縣',
        45 => '經_臺東縣',
        46 => '經_花蓮縣',
        47 => '經_澎湖縣',
        48 => '經_基隆市',
        49 => '經_新竹市',
        50 => '經_嘉義市',
        51 => '經_金門縣',
        52 => '經_連江縣',
        53 => '-',
        54 => '-',
        55 => '-',
        56 => '資_臺北市',
        57 => '資_新北市',
        58 => '資_臺中市',
        59 => '資_臺南市',
        60 => '資_高雄市',
        61 => '資_桃園縣',
        62 => '-',
        63 => '資_宜蘭縣',
        64 => '資_新竹縣',
        65 => '資_苗栗縣',
        66 => '資_彰化縣',
        67 => '資_南投縣',
        68 => '資_雲林縣',
        69 => '資_嘉義縣',
        70 => '資_屏東縣',
        71 => '資_臺東縣',
        72 => '資_花蓮縣',
        73 => '資_澎湖縣',
        74 => '資_基隆市',
        75 => '資_新竹市',
        76 => '資_嘉義市',
        77 => '資_金門縣',
        78 => '資_連江縣',
    ),
);

$fileList = array(
    '100年度直轄市及縣市總預算彙編_歲入來源別預算總表.csv' => array(
        'colsType' => 0,
        'rowsType' => 0,
        'rowsBegin' => 7,
        'rowsEnd' => 31,
    ),
    '100年度直轄市及縣市總預算彙編_歲出政事別預算總表.csv' => array(
        'colsType' => 2,
        'rowsType' => 1,
        'rowsBegin' => 7,
        'rowsEnd' => 84,
    ),
    '101年度直轄市及縣市總預算彙編_歲入來源別預算總表.csv' => array(
        'colsType' => 0,
        'rowsType' => 0,
        'rowsBegin' => 7,
        'rowsEnd' => 31,
    ),
    '101年度直轄市及縣市總預算彙編_歲出政事別預算總表.csv' => array(
        'colsType' => 2,
        'rowsType' => 1,
        'rowsBegin' => 7,
        'rowsEnd' => 84,
    ),
    '102年度直轄市及縣市總預算彙編_歲入來源別預算總表.csv' => array(
        'colsType' => 0,
        'rowsType' => 0,
        'rowsBegin' => 7,
        'rowsEnd' => 31,
    ),
    '102年度直轄市及縣市總預算彙編_歲出政事別預算總表.csv' => array(
        'colsType' => 2,
        'rowsType' => 1,
        'rowsBegin' => 7,
        'rowsEnd' => 84,
    ),
    '103年度直轄市及縣市總預算彙編_歲入來源別預算總表.csv' => array(
        'colsType' => 1,
        'rowsType' => 0,
        'rowsBegin' => 7,
        'rowsEnd' => 31,
    ),
    '103年度直轄市及縣市總預算彙編_歲出政事別預算總表.csv' => array(
        'colsType' => 2,
        'rowsType' => 1,
        'rowsBegin' => 7,
        'rowsEnd' => 84,
    ),
    '90年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '90年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '91年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '91年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '92年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '92年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '93年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '93年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '94年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '94年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '95年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '95年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '96年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '96年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '97年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '97年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '98年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '98年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
    '99年度縣市總預算彙編_歲入來源別預算總表.csv' => array(
    ),
    '99年度縣市總預算彙編_歲出政事別預算總表.csv' => array(
    ),
);

foreach ($fileList AS $file => $options) {
    if (empty($options)) {
        continue;
    }
    $targetData = array();
    $rowsType = $rows[$options['rowsType']];
    $fh = fopen($sourceFolder . '/' . $file, 'r');
    $lineCount = 0;
    while ($line = fgetcsv($fh, 2048)) {
        ++$lineCount;
        if ($lineCount >= $options['rowsBegin'] && $lineCount <= $options['rowsEnd']) {
            $rowsTypeKey = $lineCount - $options['rowsBegin'] + 1;
            if ($rowsType[$rowsTypeKey] === '-') {
                continue;
            }
            $colsCount = count($cols[$options['colsType']]);
            foreach ($line AS $k => $v) {
                if ($k >= $colsCount) {
                    unset($line[$k]);
                }
            }
            if ($colsCount !== count($line)) {
                print_r($line);
                exit();
            }
            $combinedLine = array_combine($cols[$options['colsType']], $line);
            if (isset($combinedLine['-'])) {
                unset($combinedLine['-']);
            }
            $targetData[$rowsType[$rowsTypeKey]] = $combinedLine;
        }
    }
    file_put_contents($targetFolder . '/' . substr(basename($file), 0, -4) . '.json', json_encode($targetData));
}