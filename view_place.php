<div class="col-xs-12 np article_page">
    <div class="col-xs-12 col-sm-12 col-md-8 np">
        <div class="col-xs-12 main-article">
            <header class="col-xs-12 np article_header">
                <a href="<?php echo base_url() . 'locuri/' . $city_name . '/' . $place->category_url; ?>" class="section-label"><?php echo $place->category_name; ?></a>
                <h1 class="article_headline"><?php echo $place->name; ?></h1>
            </header>
            <div class="col-xs-12 np article_head">

                <?php if (isset($place_images) && count($place_images) > 0) { ?>
                    <div class="col-xs-12 np article_cover <?php echo (count($place_images) > 1) ? "swiper_cover" : ""; ?>">
                        <?php if (count($place_images) > 1) { ?>
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <?php foreach ($place_images as $place_image) { ?>
                                        <div class="swiper-slide" style="background-image:url('<?php echo base_url(); ?>assets/images/places/<?php echo (!empty($place_image->path)) ? $place_image->path : "no_image.png"; ?>')"></div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs gallery-thumbs-place">
                                <div class="swiper-wrapper">
                                    <?php foreach ($place_images as $place_image) { ?>
                                        <div class="swiper-slide" style="background-image:url('<?php echo base_url(); ?>assets/images/places/<?php echo (!empty($place_image->thumb_path)) ? $place_image->thumb_path : "no_image.png"; ?>')"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <img src="<?php echo base_url(); ?>assets/images/places/<?php echo (!empty($place_images[0]->path)) ? $place_images[0]->path : "no_image.png"; ?>" alt="<?php echo $place->name; ?>" title="<?php echo $place->name; ?>">
                        <?php } ?>
                    </div>
                    <input type="hidden" id="share-img" value="<?php echo base_url(); ?>assets/images/places/<?php echo (!empty($place_images[0]->path)) ? $place_images[0]->path : "no_image.png"; ?>" />
                <?php } ?>

                <div class="col-xs-12 np article_info">
                    <div class="share-btns pull-right">
                        <?php echo Modules::run('template/social_media_block'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 np article_content fr-view">
                <?php echo (isset($place->description) && !empty($place->description)) ? $place->description : '-'; ?>
            </div>
            <div class="col-xs-12 np article_content place_details">
                <?php if (isset($place->address) && !empty($place->address)) { ?>
                    <div class="col-xs-12 col-sm-2 np detail-left">
                        <strong>Adresă:</strong>
                    </div>
                    <div class="col-xs-12 col-sm-10 np detail-right">
                        <?php echo $place->address; ?>
                    </div>
                <?php } ?>

                <?php if (isset($place->phone) && !empty($place->phone)) { ?>
                    <div class="col-xs-12 col-sm-2 np detail-left">
                        <strong>Telefon:</strong>
                    </div>
                    <div class="col-xs-12 col-sm-10 np detail-right">
                        <?php echo $place->phone; ?>
                    </div>
                <?php } ?>

                <?php if (isset($place->schedule) && !empty($place->schedule)) { ?>
                    <div class="col-xs-12 col-sm-2 np detail-left">
                        <strong>Program:</strong>
                    </div>
                    <div class="col-xs-12 col-sm-10 np detail-right">
                        <?php echo $place->schedule; ?>
                    </div>
                <?php } ?>

                <?php if (isset($place->website) && !empty($place->website)) { ?>
                    <div class="col-xs-12 col-sm-2 np detail-left">
                        <strong>Website:</strong>
                    </div>
                    <div class="col-xs-12 col-sm-10 np detail-right">
                        <a href="<?php echo $place->website; ?>" target="_blank">
                            <?php echo $place->website; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <?php if ((isset($place->address) && !empty($place->address))) { ?>
                <div class="col-xs-12 np place-map">
                    <div class="overlay-map" onclick="style.pointerEvents='none'"></div>
                    <iframe width="100%" height="450" frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAea6eOhRnuRcQvwi0PFHLZW28gFc0FFes
                        &q=<?php echo str_replace(' ', '+', $place->address); ?>,<?php echo $city_name; ?>" allowfullscreen>
                    </iframe>
                </div>
            <?php } ?>

            <footer class="col-xs-12 np article_footer">
                <div class="share-btns pull-left">
                    <?php echo Modules::run('template/social_media_block'); ?>
                </div>
            </footer>
        </div>
        <div class="black-separator"></div>
        <?php echo Modules::run('template/place_events_list_block', $place_events); ?>
        <?php if (isset($similar_places) && count($similar_places) > 0) { ?>
            <?php echo Modules::run('template/similar_places_block', $similar_places); ?>
        <?php } ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="col-xs-12 ad-col-300">
            <?php echo Modules::run('template/ads/ad_300x250_sec_places_1'); ?>
            <?php echo Modules::run('template/ads/ad_300x250_sec_places_2'); ?>
            <?php echo Modules::run('template/ads/ad_300x600_sec_places'); ?>
            <?php echo Modules::run('template/ads/ad_300x250_sec_places_3'); ?>
            <?php echo Modules::run('template/ads/ad_300x250_sec_places_4'); ?>
            <?php echo Modules::run('template/ads/ad_300x250_sec_places_5'); ?>
        </div>
    </div>
</div>

<?php echo Modules::run('template/trending_block'); ?>
<?php echo Modules::run('template/social_media_vertical_block'); ?>

<script src="<?php echo base_url(); ?>assets/js/view_article.js"></script>
