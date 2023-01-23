<!-- Footer section start -->
<footer class="footer-part">
    <div class="container">
        <div class="footer-top ptb-100">
            <div class="mb_-30">
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="footer-about mb-sm-30">
                            <div class="footer-logo">
                                <a href="/">
                                    <img alt="xpoge" width="100px" src="/templates/images/leoray2.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="footer-static-block">
                            <h3 class="head-three"><?=$this->lang_var[5]['text_val']?></h3>
                            <ul style="display: block" class="footer-menu footer-block-contant">
                                <li><a href="/contact"><?=$this->lang_var[6]['text_val']?></a></li>
                                <li><a href="/pages/?page=about"><?=$this->lang_var[7]['text_val']?></a></li>
                                <li><a href="/pages/?page=delivery"><?=$this->lang_var[8]['text_val']?></a></li>
                                <li><a href="/pages/?page=pay_and_rev"><?=$this->lang_var[9]['text_val']?></a></li>
                                <li><a href="/pages/?page=terms_and_cond"><?=$this->lang_var[20]['text_val']?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="footer-static-block">
                            <h3 class="head-three">Профиль пользователя</h3>
                            <ul style="display: block" id="foot_m" class="footer-menu footer-block-contant">
                                <?php if ($this->is_logined == false): ?>
                                    <li><a href="/user/login">Войти в аккаунт</a></li>
                                    <li><a href="/user/register">Зарегестрироватся</a></li>
                                <?php else: ?>
                                    <li><a href="/user/setting">Настройки</a></li>
                                    <li><a href="/user/orders">Заказы</a></li>
                                    <li><a href="/user/wishlist">Список желаемого</a></li>
                                    <li><a href="/sign-out">Выйти</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="footer-static-block">
                            <h3 class="head-three">Контакты</h3>
                            <div style="display: block" class="contact-box footer-block-contant">
                                <ul>
                                    <li>
                                        <div class="contact-thumb">
                                            <img src="/templates/images/address-icon.svg" alt="xpoge">
                                        </div>
                                        <div class="contact-box-detail">
                                            <h4 class="contact-title"><?=$this->lang['store_adress']?></h4>
                                            <p><?=$this->contact['adress']?></p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="contact-thumb">
                                            <img src="/templates/images/mail-icon.svg" alt="xpoge">
                                        </div>
                                        <div class="contact-box-detail">
                                            <h4 class="contact-title">Email</h4>
                                            <p><a href="mailto:<?=$this->contact['email']?>"><?=$this->contact['email']?></a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-thumb">
                                            <img src="/templates/images/phone-icon.svg" alt="xpoge">
                                        </div>
                                        <div class="contact-box-detail">
                                            <h4 class="contact-title">Номер телефона</h4>
                                            <p><a href="tel:<?=$this->contact['phone_1']?>"><?=$this->contact['phone_1']?></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-thumb">
                                            <img src="/templates/images/phone-icon.svg" alt="xpoge">
                                        </div>
                                        <div class="contact-box-detail">
                                            <h4 class="contact-title">Номер телефона</h4>
                                            <p><a href="tel:<?=$this->contact['phone_2']?>"><?=$this->contact['phone_2']?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom align-center">
            <div class="row">
                <div class="col-12">
                    <div class="w-100">
                        <p class="mb-0"><?=$this->lang_var[24]['text_val']?></p>
                    </div>
                </div>
                <!--<div class="col-12">
                    <div class="social-media">
                        <ul>
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="col-12">
                    <div class="social-media">
                        <ul>
                            <li><img src="https://www.tadviser.ru/images/c/ce/%D0%9A%D0%B0%D1%80%D1%82%D1%8B_%D0%BF%D0%BB%D0%B0%D1%82%D0%B5%D0%B6%D0%BD%D0%BE%D0%B9_%D1%81%D0%B8%D1%81%D1%82%D0%B5%D0%BC%D1%8B_%D0%9C%D0%98%D0%A0_%D0%BB%D0%BE%D0%B3%D0%BE.png" width="26px"></li>
                            <li><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/2560px-Visa.svg.png" width="26px"></li>
                            <li><img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/MasterCard_1979_logo.svg" width="26px"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section end -->