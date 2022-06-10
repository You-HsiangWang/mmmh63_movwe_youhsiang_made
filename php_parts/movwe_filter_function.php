<?php

require './parts/movwe_connect_db.php';

?>

<div class="index_filter" id="index_filter">
    <div class="ott_platform">
        <div class="ott_platform_title">
            <span>平台 / </span>
        </div>
        <ul class="platform">
            <button class="filter_2w platform__1 filter_function ff_plat" data-filter='1'>Netflix
            </button>
            <button class="filter_2w platform__2 filter_function ff_plat" data-filter='2'>iQiYi
            </button>
            <button class="filter_2w platform__3 filter_function ff_plat" data-filter='3'>KKTV
            </button>
            <button class="filter_2w platform__4 filter_function ff_plat" data-filter='4'>Friday
            </button>
        </ul>
    </div>
    <div class="genre">
        <div class="genre_title">
            <span>類別 / </span>
        </div>
        <ul class="genre_item">
            <button class="filter_2w genre_item__1 filter_function ff_genr" data-filter='1'>電影
            </button>
            <button class="filter_2w genre_item__2 filter_function ff_genr" data-filter='2'>電視劇
            </button>
            <button class="filter_2w genre_item__3 filter_function ff_genr" data-filter='3'>綜藝
            </button>
            <button class="filter_2w genre_item__4 filter_function ff_genr" data-filter='4'>動畫
            </button>
        </ul>
    </div>
    <ul class="browse-filters">
        <li class="browse-filter">
            <div class="browse-filter-title">
                <div class="location">地區 /</div>
            </div>
            <ul class="browse-filter-items">
                <button class="browse-filter-item filter_2w browse_item__1 filter_function ff_plac" data-filter='1'>
                    韓國
                </button>
                <button class="browse-filter-item filter_2w browse_item__2 filter_function ff_plac" data-filter='2'>
                    日本
                </button>
                <button class="browse-filter-item filter_2w browse_item__3 filter_function ff_plac" data-filter='3'>
                    歐美
                </button>
                <button class="browse-filter-item filter_2w browse_item__4 filter_function ff_plac" data-filter='4'>
                    台灣 </button>
                <button class="browse-filter-item filter_2w browse_item__5 filter_function ff_plac" data-filter='5'>
                    中國 </button>
            </ul>
        </li>
        <li class="browse-filter">
            <div class="browse-filter-title">
                <div class="Style">風格 /</div>
            </div>
            <ul class="browse-filter-items">
                <button class="browse-filter-item filter_2w style_item__1 filter_function ff_styl" data-filter='1'>
                    浪漫愛情</button>
                <button class="browse-filter-item filter_2w style_item__2 filter_function ff_styl" data-filter='2'>
                    輕鬆喜劇</button>
                <button class="browse-filter-item filter_2w style_item__3 filter_function ff_styl" data-filter='3'>
                    劇情文藝</button>
                <button class="browse-filter-item filter_2w style_item__4 filter_function ff_styl" data-filter='4'>
                    青春校園</button>
                <button class="browse-filter-item filter_2w style_item__5 filter_function ff_styl" data-filter='5'>
                    奇幻冒險</button>
                <button class="browse-filter-item filter_2w style_item__6 filter_function ff_styl" data-filter='6'>
                    科技未來</button>
                <button class="browse-filter-item filter_2w style_item__7 filter_function ff_styl" data-filter='7'>
                    犯罪動作</button>
                <button class="browse-filter-item filter_2w style_item__8 filter_function ff_styl" data-filter='8'>
                    懸疑推理</button>
                <button class="browse-filter-item filter_2w style_item__9 filter_function ff_styl" data-filter='9'>
                    靈異驚悚</button>

            </ul>
        </li>
    </ul>
</div>

<!------篩選後_BOX----------------------------------->
<div class="Filter__text__box filter_d_none" id="ottFilterSearchFunc">
</div>