    <?php 
        $page_id = 395;
        $imageFooter = get_field('logo_footer', $page_id);
        $footerMenu = get_field('list_footer_menu', $page_id);
        $footerData = get_field('footer_data', $page_id);
        // echo "<pre>";
        // print_r($footerData);
        // echo "</pre>";
    ?>
    <div id="footer">
        <ul class="footer-menu-area">
            <?php foreach ($footerMenu as $key => $value): ?>
                <li><a href="#"><?=$value?></a></li>
            <?php endforeach ?>
        </ul>

        <h1><a href="#"><img src="<?=$imageFooter['url']?>" alt="강남파이낸스센터" /></a></h1>
        <address>
            <?=$footerData['address']?> </br>
            <?=$footerData['contact']?> </br>
            <?=$footerData['copy_right']?>
        </address>

    </div>

	</div>

    <?php wp_footer() ?>
</body>
</html>
