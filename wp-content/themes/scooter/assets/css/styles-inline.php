<?php
$acc    = px_opt('style-accent-color');//Accent color
$accRgb = implode(', ', PxColor::Px_HexToRgb($acc));
$hc     = px_opt('style-highlight-color');//Highlight color
$lc     = px_opt('style-link-color');//Link color
$lhc    = px_opt('style-link-hover-color');//Link hover color

//Fonts
$bodyFont = px_opt('font-body');
$navFont  = px_opt('font-navigation');
$headFont = px_opt('font-headings');
$ShortcodeFont = px_opt('shortcode-font');

?>

/* Text Selection */

::-moz-selection { background: <?php echo $hc; ?>; /* Firefox */ }
::selection { background: <?php echo $hc; ?>; /* Safari */ }

/* Anchor */

a{ color:<?php echo $lc; ?>; }
a:hover{ color:<?php echo $lhc; ?>; }


/* accent color  */ 

/* Headings */

h1, h2, h3, h4, h5, h6{ margin:0 0 10px; color: <?php echo $acc; ?> }

.search-form input[type="submit"]:hover{
	background-color: <?php echo $acc; ?>;
}

header .navigation-button:hover{
	color: <?php echo $acc; ?>;
}

.navigation-mobile a:hover{
	color: <?php echo $acc; ?>;
}

.scrollDown a:hover{
	color:<?php echo $acc; ?>;
}

header .navigation li li:hover > a{
	color:<?php echo $acc; ?>;
}

.social-icons a:hover span  , .socialLinkShortcode a:hover span {
	background-color: <?php echo $acc; ?>;
	border-color: <?php echo $acc; ?>;
}	

.widget-area a:hover {
    color:<?php echo $acc; ?>;
}

.widget-area .search-form input[type="submit"]:hover {
	background-color: <?php echo $acc; ?>;
}

.tagcloud a:hover {
	color:<?php echo $acc; ?>;
}

.iconbox .glyph {
	color: <?php echo $acc; ?>;
}

.iconbox:hover .title {
	color:<?php echo $acc; ?>;
}

.iconbox .more-link a:hover {
	color: <?php echo $acc; ?>;
}

.team-member .job-title {
    color:<?php echo $acc; ?>;                                                                    
}                                                                      


.team-member .icons a:hover {
	color:<?php echo $acc; ?>;
}

.progressbar .progress-inner {
	background-color: <?php echo $acc; ?>;
}

.search-item .count {
    color: <?php echo $acc; ?>;
}

.post-pagination a:hover,
.post-pagination .this-page {
    background-color: <?php echo $acc; ?>;
    border-color: <?php echo $acc; ?>;
}

header .navigation > ul > li:hover > a , header .navigation > ul > li.active > a{
	border-bottom:4px solid <?php echo $acc; ?>;
}

header .navigation > ul > li.active > a {
	color: <?php echo $acc; ?>;
}

header .navigation > ul > li:hover > a {
	border-bottom:4px solid <?php echo $acc; ?>;
}

header .navigation > ul > li.current_page_item > a {
	border-bottom:4px solid <?php echo $acc; ?>;
}

.sticky .accordion_box10 .blogTitle , .sticky .accordion_box2 .accordion_title  {
    color: <?php echo $acc; ?> !important;
}

.sticky .blogAccordion .rightBorder {
    border-right: 2px solid <?php echo $acc; ?> !important;
}

body , .button,form input[type="submit"]  , .imageBox .content .subtitle  ,  .pieChartBox .title , .pieChartBox .subtitle , .postphoto .skills { font-family:'<?php echo $bodyFont; ?>', sans-serif; }

/* Headings */

h1, h2, h3, h4, h5, h6 , .desktopBlog .blogAccordion  .accordion_box10  .blogTitle  , .tabletBlog  .blogAccordion  .blogTitle { font-family:'<?php echo $headFont; ?>', sans-serif; }

/* Navigation */

header .navigation { font-family:'<?php echo $navFont; ?>', sans-serif; }

/* Shortcode Font */ 

<?php if ( $ShortcodeFont !== 'Oswald') { ?>
 
    .imageBox .content .subtitle , .pieChartBox .title , .pieChartBox .subtitle , .testimonial .talkerName , .counterBoxDetails , .postphoto .title {
         font-family:'<?php echo $ShortcodeFont; ?>', sans-serif;
    }

<?php } ?>

.imageBox .content .title ,.textBox .title , .iconbox.iconbox-top .title, .iconbox.iconbox-left .title , .team-member .name , .team-member .job-title , .counterBox  .counterBoxNumber  , .pieChart .perecent , .testimonial .name  {
    font-family:'<?php echo $ShortcodeFont; ?>', sans-serif;
}

/*==== Style Overrides ====*/

<?php px_eopt('additional-css'); ?>