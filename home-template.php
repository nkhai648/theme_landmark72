
<?php /* Template Name: Home */ ?>

<?php 
get_header(); 
$slider = get_field('slider');

//* DATA BUSINESS 
$business = get_field('business');
$content_business_1 = $business['content_column_1'];

// DATA COL 2 BUSINESS
$content_row_2 = $business['content_column_2'];
$content_row_3 = $business['content_column_3'];

$store = get_field('store');

$mall = get_field('mall');

$map = get_field('map');

//* Page RedApple 
$page_id = 322;
$linkPageApple = get_permalink($page_id);
$imagesApple = get_field('page_images', $page_id);
$descriptionPageApple = get_field('page_description', $page_id);

//* Page Jejuice 
$page_id = 325;
$linkPageJejuice = get_permalink($page_id);
$imagesJejuice = get_field('page_images', $page_id);
$descriptionPageJejuice = get_field('page_description', $page_id);

//* Page Book 
$page_id = 327;
$linkPageBook = get_permalink($page_id);
$imagesBook = get_field('page_images', $page_id);
$descriptionPageBook = get_field('page_description', $page_id);

echo "<pre>";
// print_r($descriptionPageBook);
echo "</pre>";
?>

    

<!-- visual_cover -->
<div class="main-visual-cover" id="contents">

<!-- slide img -->
<div class="slider">
    <ul class="bxslider7">
        <li>
            <div class="item">
                <div class="main_img main-visual01" style="background: url('<?=$slider['slide_images'][0]['url']?>') center center; background-size:cover; ">
                    <div class="slide_txt slide_txt_1">
                        <h1><?=$slider['title_slider']?></h1>
                        <p id="txt_slide_1"><?=$slider['text_slider_1']?></p>
                    </div>
                </div>
            </div>
        </li>

        <li>
            <div class="item">
                <div class="main_img main-visual02" style="background: url('<?=$slider['slide_images'][1]['url']?>') center center; background-size:cover; ">
                    <div class="slide_txt slide_txt_2">
                        <h1><?=$slider['title_slider']?></h1>
                        <p><?=$slider['text_slide_2']?></p>
                    </div>
                </div>
            </div>
        </li>

        <li>
            <div class="item">
                <div class="main_img main-visual03" style="background: url('<?=$slider['slide_images'][2]['url']?>') center center; background-size:cover; ">
                    <div class="slide_txt slide_txt_3">
                        <h1><?=$slider['title_slider']?></h1>
                        <p><?=$slider['text_slide_3']?></p>
                    </div>
                </div>
            </div>
        </li>

    </ul>
</div>
<!--// slide img -->

<div class="ico_more" style="cursor:pointer";></div>
</div>
<!-- //visual_cover -->

<!-- contents 02 -->
<div class="main_con1" id="section1">
<?=$business['heading_business']?>

<div class="con_box">
    <div class="left" style="background: url('<?=$business['business_images'][0]['url']?>')  no-repeat center; background-size: cover;">
        <a href="#intro2023">
            <?=$content_business_1?>
            <div class="go">바로가기</div>
        </a>
    </div>
    <div class="right">
        <ul>
            <li class="r01">
                <?=$content_row_2['row_1']?>
                <button type="button" class="btn btn-grey-thick"><?=$content_row_2['button_row_1']?></button>
            </li>
            <li class="r02"  style="background: url('<?=$business['business_images'][1]['url']?>'); background-size: cover;">
                <?=$content_row_3['row_1']?>
                <button type="button" class="btn btn-blue"><?=$content_row_3['button_row_1']?></button>
            </li>
            <li class="r03"  style="background: url('<?=$business['business_images'][2]['url']?>'); background-size: cover;">
                <?=$content_row_2['row_2']?>
                <button type="button" class="btn btn-blue"><?=$content_row_2['button_row_2']?></button>
            </li>
            <li class="r04">
                <?=$content_row_3['row_2']?>
                <button type="button" class="btn btn-grey-thick"><?=$content_row_3['button_row_2']?></button>
            </li>
        </ul>
    </div>
</div>
</div>
<!--// contents 02 -->

<!-- NEW STORE -->
<div class="mall-new container2">
<h4><?=$store['heading_store']?></h4>
<h2><?=$store['sub_heading_store']?></h2>

<ul class="new-cate">
    <?php foreach ($store['category_store'] as $key => $item): ?>
        <li><a href="#mall-main2023"><?=$item?></a></li>
    <?php endforeach ?>
</ul>

<div class="new-item">
    <div class="item">
        <a href="<?=$linkPageApple?>">
            <div class="ico_new"></div>
            <div class="item_img"><img src="<?=$imagesApple[0]['url']?>" alt="제주스" /></div>
        </a>
        <div class="item_con">
            <div class="item-logo"><img src="<?=$imagesApple[1]['url']?>" /></div>
            <?=$descriptionPageApple?>
            <div class="more"><a href="<?=$linkPageApple?>">more ></a></div>
        </div>
    </div>

    <div class="item">
        <a href="<?=$linkPageJejuice?>">
            <div class="ico_new"></div>
            <div class="item_img"><img src="<?=$imagesJejuice[0]['url']?>" alt="제주스" /></div>
        </a>
        <div class="item_con">
            <div class="item-logo"><img src="<?=$imagesJejuice[1]['url']?>" /></div>
            <?=$descriptionPageJejuice?>
            <div class="more"><a href="<?=$linkPageJejuice?>">more ></a></div>
        </div>
    </div>

    <div class="item">
        <a href="<?=$linkPageBook?>">
            <div class="ico_new"></div>
            <div class="item_img"><img src="<?=$imagesBook[0]['url']?>" alt="제주스" /></div>
        </a>
        <div class="item_con">
            <div class="item-logo"><img src="<?=$imagesBook[1]['url']?>" /></div>
            <?=$descriptionPageBook?>
            <div class="more"><a href="<?=$linkPageBook?>">more ></a></div>
        </div>
    </div>

</div>

<div class="mall_com">
    <ul>
        <?php foreach ($mall as $key => $item) : ?>
            <li><a href="#"><img src="<?=$item['url']?>"/></a></li>
        <?php endforeach; ?>
    </ul>
</div>

</div>
<!--// NEW STORE -->
<div style="margin-top: 60px; text-align: center">
<h4 style="font-size: 20px;color: #0081c4;font-weight: bold;">MAPS</h4>
<h2 style="font-size: 35px; color: #222; font-weight: 900">지도</h2>

<div style="width: 100%; height: 450px; margin-top: 30px; margin-bottom: 50px">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.398429228417!2d105.7816041760545!3d21.016738088189953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab54e29650c5%3A0x453b5c2a98dc5e98!2zS2VhbmduYW0gSGFub2kgTGFuZG1hcmsgVG93ZXIsIE3hu4UgVHLDrCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1686118422500!5m2!1svi!2s"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

</div>

<?php 
    get_footer();
?>