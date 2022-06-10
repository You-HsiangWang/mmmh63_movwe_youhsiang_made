<?php

require './parts/movwe_connect_db.php';

$output = [
    'filtsuccess' => false,
    'code' => 0,
];
// 執行一次load幾片
// size
$pagesize = isset($_GET['pagesize']) ? intval($_GET['pagesize']) : 14;
// offset 起始點
$pagestart = isset($_GET['pagestart']) ? intval($_GET['pagestart']) : 0;
// 判斷是否有拿到參數
$fOtt = !empty(($_GET['f_ott'])) ? $_GET['f_ott'] : 0;
$fGenre = !empty(isset($_GET['f_genre'])) ? $_GET['f_genre'] : 0;
$fPlace = !empty(isset($_GET['f_place'])) ? $_GET['f_place'] : 0;
$fStyle = !empty(isset($_GET['f_style'])) ? $_GET['f_style'] : 0;

// 判斷ott 拿sql語法 多選
if (is_array($fOtt)) {
    $fOttSql1 = '%';
    $fOttSql2 = '%';
    $fOttSql3 = '%';
    $fOttSql4 = '%';
    foreach ($fOtt as $fOttinfo) {
        if ($fOttinfo == 1) {
            $fOttSql1 = '%1%';
        } else if ($fOttinfo == 2) {
            $fOttSql2 = '%2%';
        } else if ($fOttinfo == 3) {
            $fOttSql3 = '%3%';
        } else if ($fOttinfo == 4) {
            $fOttSql4 = '%4%';
        };
    };
} else if ($fOtt == 0) {
    $fOttSql1 = '%';
    $fOttSql2 = '%';
    $fOttSql3 = '%';
    $fOttSql4 = '%';
};
// 判斷genre 拿sql語法
if ($fGenre == 1) {
    $fGenreSql = '電影';
} else if ($fGenre == 2) {
    $fGenreSql = '影劇';
} else if ($fGenre == 3) {
    $fGenreSql = '綜藝';
} else if ($fGenre == 4) {
    $fGenreSql = '動畫';
} else {
    $fGenreSql = '%';
};
// 判斷place 拿sql語法
if ($fPlace == 1) {
    $fPlaceSql = '韓國';
} else if ($fPlace == 2) {
    $fPlaceSql = '日本';
} else if ($fPlace == 3) {
    $fPlaceSql = '歐美';
} else if ($fPlace == 4) {
    $fPlaceSql = '台灣';
} else if ($fPlace == 5) {
    $fPlaceSql = '中國';
} else {
    $fPlaceSql = '%';
};
// 判斷style 拿sql語法
if ($fStyle == 1) {
    $fStyleSql = '%浪漫愛情%';
} else if ($fStyle == 2) {
    $fStyleSql = '%輕鬆喜劇%';
} else if ($fStyle == 3) {
    $fStyleSql = '%劇情文藝%';
} else if ($fStyle == 4) {
    $fStyleSql = '%青春校園%';
} else if ($fStyle == 5) {
    $fStyleSql = '%奇幻冒險%';
} else if ($fStyle == 6) {
    $fStyleSql = '%科技未來%';
} else if ($fStyle == 7) {
    $fStyleSql = '%犯罪動作%';
} else if ($fStyle == 8) {
    $fStyleSql = '%懸疑推理%';
} else if ($fStyle == 9) {
    $fStyleSql = '%靈異驚悚%';
} else {
    $fStyleSql = '%';
};

// 執行sql語法
$ottFilterSql = ' SELECT * FROM `video` WHERE (`video_ott` LIKE :fOttSql1) AND (`video_ott` LIKE :fOttSql2) AND (`video_ott` LIKE :fOttSql3) AND (`video_ott` LIKE :fOttSql4) AND (`video_genre` LIKE :fGenreSql) AND (`video_place` LIKE :fPlaceSql) AND (`video_style` LIKE :fStyleSql) ORDER BY `video_sid` DESC LIMIT :pagestart ,:numPerSearch';
$ottFilterStmt = $pdo->prepare($ottFilterSql);
$ottFilterStmt->bindValue(':pagestart', intval($pagestart), PDO::PARAM_INT);
$ottFilterStmt->bindValue(':numPerSearch', intval($pagesize), PDO::PARAM_INT);
$ottFilterStmt->bindValue(':fOttSql1', $fOttSql1, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fOttSql2', $fOttSql2, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fOttSql3', $fOttSql3, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fOttSql4', $fOttSql4, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fGenreSql', $fGenreSql, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fPlaceSql', $fPlaceSql, PDO::PARAM_STR);
$ottFilterStmt->bindValue(':fStyleSql', $fStyleSql, PDO::PARAM_STR);
// $ottFilterStmt->execute([$fOttSql1, $fOttSql2, $fOttSql3, $fOttSql4, $fGenreSql, $fPlaceSql, $fStyleSql]);
$ottFilterStmt->execute();
$ottFilterRow = $ottFilterStmt->fetchAll();

if (empty($ottFilterRow)) {
    echo '';
    exit;
};

$videoIds = [];
foreach ($ottFilterRow as $r) {
    $videoIds[] = $r['video_sid'];
}

$actors_sql = sprintf("SELECT * FROM `video_actor_combine` WHERE `vac_video_sid` IN (%s)", implode(',', $videoIds));

$actors = $pdo->query($actors_sql)->fetchAll();
/*
if (empty($ottFilterRow)) {
    $output = [
        'filtsuccess' => false,
        'code' => 401,
        'error' => '影劇查找失敗'
    ];
    // echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // exit;
};
if (!empty($ottFilterRow)) {
    $output = [
        'filtsuccess' => true,
        'code' => 200,
        'error' => '影劇查找成功',
        'test' => $ottFilterRow[0]['video_name'],
        'dom' => $ottFilterRow
    ];
};
*/
?>

<?php foreach ($ottFilterRow as $ottFilterRowInfo) : ?>
    <div class="filter__card" data-videoSid="<?= $ottFilterRowInfo['video_sid'] ?>">
        <div class="filter__card__box">
            <div class="imge__card__information">
                <div class="information__top">
                    <img class="information__video" src="./videodb/video/<?= $ottFilterRowInfo['video_poster_hor'] ?>" alt="">
                </div>
                <a href="#">
                    <div class="information__bottom">
                        <div class="information__bottom_1 Bottom__display">
                            <p class="information__typ" style="<?php
                                                        $ottcolor = [
                                                            '2' => '#10FFA2',
                                                            '3' => '#1CD8FF',
                                                            '1' => '#FC6F51',
                                                        ];
                                                        if($ottFilterRowInfo['video_genre'] == '影劇'){
                                                            $color = $ottcolor['1'];
                                                        }else if($ottFilterRowInfo['video_genre'] == '電影'){
                                                            $color = $ottcolor['2'];
                                                        }else if($ottFilterRowInfo['video_genre'] == '動畫'){
                                                            $color = $ottcolor['3'];
                                                        };
                                                        echo 'color:' . $color .'; border: 1px solid' . $color;
                                                        ?>"><?= $ottFilterRowInfo['video_genre'] ?></p>
                            <div class="bottom_6_icon_box">
                                <?php
                                $ottdata = [
                                    '4' => 'friday_s.svg',
                                    '2' => 'iqiyi_s.svg',
                                    '3' => 'kktv_s.svg',
                                    '1' => 'netflix_s.svg',
                                ];
    
                                $ar = json_decode($ottFilterRowInfo['video_ott'], true);
                                if ($ar and count($ar)) {
                                    foreach ($ar as $v) {
                                        if (!empty($ottdata[$v])) {
                                            echo '<a href="#">
                                            <p class="bottom_6_icon">
                                                <img src="./img/logo/' . $ottdata[$v] . '" alt="">
                                            </p>
                                        </a>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="information__bottom_2 Bottom__display">
                            <p class="information__name"><?= $ottFilterRowInfo['video_name'] ?></p>
                        </div>
                        <div class="information__bottom_3 Bottom__display">
                            <div class="information__star">
                                <div class="information__staricon_box">
                                    <img src="./img/icons/start.svg" alt="">
                                </div>
                            </div>
                            <div class="information__point">
                                <p><?= $ottFilterRowInfo['video_rating'] ?></p>
                            </div>
                        </div>
                        <div class="information__bottom_4 Bottom__display">
                            <p><?= str_replace('，', ' / ', str_replace(' ', '', $ottFilterRowInfo['video_style'])) ?></p>
                        </div>
                        <div class="information__bottom_5 Bottom__display">
                                    <?php
                                    $actori = 0;
                                    foreach ($actors as $a) :
                                        if (($ottFilterRowInfo['video_sid'] == $a['vac_video_sid']) && $actori < 1) {
                                            if(!empty($a['vac_actorname'])){
                                                $slash = ' / ';
                                            }else{
                                                $slash = '';
                                            };
                                            echo '<a href="#"><p class="information__actor__name">' . $a['vac_actorname']. '</p>';
                                            $actori = $actori + 1;
                                        };
                                    endforeach;
                                    ?>
                                    <?php
                                    $actori = 0;
                                    foreach ($actors as $a) :
                                        if (($ottFilterRowInfo['video_sid'] == $a['vac_video_sid']) && $actori == 1) {
                                            if(!empty($a['vac_actorname'])){
                                                $slash = ' / ';
                                            }else{
                                                $slash = '';
                                            };
                                            echo '</a><span class="speace">'.$slash.'</span><a href="#"><p class="information__actor__name">' . $a['vac_actorname']. '</p>
                                            </a>
                                            <span class="speace">'.$slash.'</span>';
                                            $actori = $actori + 1;
                                            continue;
                                        } else if (($ottFilterRowInfo['video_sid'] == $a['vac_video_sid']) && $actori < 2) {
                                            $actori = $actori + 1;
                                        };
                                    endforeach;
                                    ?>
                            <a href="#">
                                <p class="information__actor__name">
                                    <?php
                                    $actori = 0;
                                    foreach ($actors as $a) :
                                        if (($ottFilterRowInfo['video_sid'] == $a['vac_video_sid']) && $actori == 2) {
                                            echo " {$a['vac_actorname']}";
                                            $actori = $actori + 1;
                                            continue;
                                        } else if (($ottFilterRowInfo['video_sid'] == $a['vac_video_sid']) && $actori < 3) {
                                            $actori = $actori + 1;
                                        };
                                    endforeach;
                                    ?>
                                </p>
                            </a>
    
                        </div>
    
                        <div class="information__bottom_6-5 Bottom__display">
                            <a href="./single-movie-page0511.html">
                                <p class="detail">
                                    查看詳細...
                                </p>
                            </a>
                        </div>
                        <div class="information__bottom_6 Bottom__display">
                            <button class="push__up">
                                <p>
                                    ＋ 加入片單
                                </p>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            <div class="carousel__images__box">
                <img class="carousel__images" src="./videodb/video/<?= $ottFilterRowInfo['video_poster_ver'] ?>" alt="">
                <div class="image__card__text">
                    <div class="movie__name">
                        <p><?= $ottFilterRowInfo['video_name'] ?></p>
                    </div>
                    <div class="movie__icons">
                        <?php
                        $ottdata = [
                            '4' => 'friday_s.svg',
                            '2' => 'iqiyi_s.svg',
                            '3' => 'kktv_s.svg',
                            '1' => 'netflix_s.svg',
                        ];
    
                        $ar = json_decode($ottFilterRowInfo['video_ott'], true);
                        if ($ar and count($ar)) {
                            foreach ($ar as $v) {
                                if (!empty($ottdata[$v])) {
                                    echo '<div class="movie__icon__box">
                                    <a href="">
                                    <img src="./img/logo/' . $ottdata[$v] . '" alt="">
                                    </a>
                                    </div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php endforeach; ?>