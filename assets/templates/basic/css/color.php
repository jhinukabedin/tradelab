<?php
header("Content-Type:text/css");
$color = "#f0f";
$secondColor = "#ff8";

function checkhexcolor($color)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) and $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color or !checkhexcolor($color)) {
    $color = "#336699";
}

?>


.cmn--btn, .cmn--table thead tr th, .trade--tabs .nav-item .nav-link.active, .faq__item.open .faq__title, .faq__item .faq__title .right__icon::before, .faq__item .faq__title .right__icon::after, div[class*="col"]:nth-child(2) .footer__contact__item, .dashboard__item .dashboard__thumb, .dashboard-dashboard-icon .dashboard-menu li:hover > a,.page-item.active .page-link
{
background-color: <?php echo $color ?> !important;
}

.predict-type-item .icon, .feature__item .feature__thumb i, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .post__item .post__content .meta__date .meta__item i, .post__item .post__read, .highlow-time-duration li a i, .text--base,.btn--base-outline,.menu li a.active{
color: <?php echo $color ?> !important;
}

.post__item .post__content .meta__date {
border-left: 5px solid <?php echo $color ?> !important;
}

.btn--base, .badge--base, .bg--base, .register-disable-footer-link
{
background-color: <?php echo $color ?> !important;
}

.text--base,.cmn--outline--btn {
color: <?php echo $color ?> !important;
}

.btn--info, .badge--info, .bg--info,.cmn--outline--btn:hover {
background-color: <?php echo $color ?> !important;
}

.menu li .submenu li:hover > a,.scrollToTop,.pagination .page-item a.active, .pagination .page-item a:hover, .pagination .page-item span.active, .pagination .page-item span:hover, .scrollToTop{
background: <?php echo $color ?> !important;

}

.cmn--btn:hover,.btn--base-outline,.verification-code span,.cmn--outline--btn,.cmn--outline--btn:hover,.page-item.active .page-link,.btn--base-outline{
border-color: <?php echo $color ?> !important;
}

.footer__widget .widget__links li a:hover,.btn--base-outline:hover,.flip-clock-label,.widget__post .widget__post__content span{
color: <?php echo $color ?> !important;
}

.pagination .page-item.disabled span {
background: <?php echo $color ?>4d !important;
}

.cmn--form--control:focus{
border-color: <?php echo $color ?>33
}

.payment-item:has(.payment-item__radio:checked) {
    border-left: 3px solid <?php echo $color ?>;
}

.payment-item:has(.payment-item__radio:checked) .payment-item__check {
    border: 3px solid <?php echo $color ?>;
}

.payment-item__check {
    border: 1px solid <?php echo $color ?>;
}

.dropdown-list>.dropdown-list__item:hover{
    background-color: <?php echo $color ?> !important;
}

.cmn--form--group .input-group-text, .form-check-input:checked{
    background: <?php echo $color ?> !important;
    border-color: <?php echo $color ?> !important;
}

.form-check-input:focus {
    border-color: <?php echo $color ?>;
    box-shadow: 0 0 0 .25rem <?php echo $color ?>63;
}

.social-login-btn:hover {
    border-color: <?php echo $color ?> !important;
    color: <?php echo $color ?> !important;
}
