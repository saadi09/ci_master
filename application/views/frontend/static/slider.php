<!-- Slideshow  -->
<div class="main-slider" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 banner-left hidden-xs"><img src="<?= base_url() ?>frontend_assets/theme1/images/banner-left.jpg" alt="banner"></div>
            <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12 jtv-slideshow">
                <div id="jtv-slideshow">
                    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                            <ul>
                                <?php for ($i = 0; $i < count($slider_image); $i++) {
                                    if ($slider_image[$i]['status'] == 'Enable') {
                                        ?>
                                            <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='<?= base_url() ?>uploads/<?= $slider_image[$i]['image']?>' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                                <?php if($slider_image[$i]['align'] == 'center') { ?>
                                                <div class="caption-inner">
                                                    <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='200'  data-y='110'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Template for your business</div>
                                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='200'  data-y='160'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#fff; text-shadow:none;'>Easy to modify</div>
                                                    <div class='tp-caption' data-x='310'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#f8f8f8;'>Perfect website solution for your</div>
                                                    <div class='tp-caption sfb  tp-resizeme ' data-x='370'  data-y='280'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Get Started</a> </div>
                                                </div>
                                            <?php } elseif($slider_image[$i]['align'] == 'left') { ?>
                                                    <div class="caption-inner left">
                                                        <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='50'  data-y='110'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Smooth, Rich & Loud Audio</div>
                                                        <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='50'  data-y='160'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>headphone</div>
                                                        <div class='tp-caption' data-x='72'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>World's Most advanced Wireless earbuds.</div>
                                                        <div class='tp-caption sfb  tp-resizeme ' data-x='72'  data-y='280'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">EXPLORE NOW</a> </div>
                                                    </div>
                                                <?php } elseif($slider_image[$i]['align'] == 'right') { ?>
                                                    <div class="caption-inner">
                                                        <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='450'  data-y='100'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>It’s Time To Look</div>
                                                        <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='450'  data-y='140'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New</div>
                                                        <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='450'  data-y='185'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>Standard</div>
                                                        <div class='tp-caption' data-x='475'  data-y='245'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New Standard. under favorable smartwatches</div>
                                                        <div class='tp-caption sfb  tp-resizeme ' data-x='480'  data-y='290'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Start Buying </a> </div>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                    <?php }
                                    else
                                    {

                                    }
                                } ?>
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>