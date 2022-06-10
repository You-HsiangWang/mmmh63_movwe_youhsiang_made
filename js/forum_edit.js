// 文章分類click

$('.d-filter-m').click(function () {
    console.log('hello', this);
    $(this).css('box-shadow', '0 0 5px #10FFA2');
    $(this).siblings().css('box-shadow', '0 0 5px transparent');
});

$('.d-filter-d').click(function () {
    console.log('hello', this);
    $(this).css('box-shadow', '0 0 5px #FC6F51');
    $(this).siblings().css('box-shadow', '0 0 5px transparent');
});

$('.d-filter-e').click(function () {
    console.log('hello', this);
    $(this).css('box-shadow', '0 0 5px #FEB73A');
    $(this).siblings().css('box-shadow', '0 0 5px transparent');
});

$('.d-filter-a').click(function () {
    console.log('hello', this);
    $(this).css('box-shadow', '0 0 5px #1CD8FF');
    $(this).siblings().css('box-shadow', '0 0 5px transparent');
});


// 文章編輯器
// https://github.com/pulipulichen/TinyMCE-Online-Editor
// https://ithelp.ithome.com.tw/articles/10197824

// tinyMCE.init({
//     // 初始化參數設定[註1]
//     selector: "textarea", // 目標物件
//     auto_focus: "editor1", // 聚焦物件
//     language: "zh_TW", // 語系(CDN沒有中文，需要下載原始source才有)
//     theme: "modern", // 模板風格
//     plugins: "advlist autolink link image lists charmap print preview", // 套件設定: 進階清單、自動連結、連結、上傳圖片、清單、特殊字元表、列印、預覽
//     mobile: { // 行動裝置設定
//         theme: "mobile", // 模板風格
//         plugins: ["autosave", "lists", "autolink"], // 套件設定: 自動儲存、清單、自動連結
//         toolbar: ["undo", "bold", "italic", "styleselect"] // 工具列設定: 復原、粗體、斜體、樣式表
//     }
// });

// textarea 大小

// $('#editor1').css('height', '500px');


// 捨棄文章

function myFunction() {
        if (confirm("確定要捨棄文章嗎?") == true) {
            location.href = './forum.php'
        }
};