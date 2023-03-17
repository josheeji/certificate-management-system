<footer id="footer" class="footer" data-bg-color="#121212" style="background: rgb(18, 18, 18) !important;">
    <div class="container pt-60 pb-30" style="display:none">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">

                <p class="font-12 mt-20 mb-20">Conference Nepal is a library of corporate and business templates with
                    predefined web elements which helps you to build your own site. Lorem ipsum dolor sit amet elit.</p>


                <ul class="social-icons flat medium list-inline mb-40">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a> </li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a> </li>
                    <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a> </li>

                    <li><a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a> </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="widget dark">
                    <h6 class="widget-title line-bottom">Quick Links</h6>



                    <!--   <ul class="list-border list theme-colored angle-double-right">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Donor Privacy Policy</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Copyright Notice</a></li>
          </ul> -->
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="widget dark">
                    <h6 class="widget-title line-bottom">Latest News</h6>
                    <div class="latest-posts">
                        <article class="post media-post clearfix pb-0 mb-10">



                            <a class="post-thumb" href="#"><img src="http://placehold.it/77x50"
                                    alt=""></a>



                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a
                                        href="https://conferencenepal.com/news/detail/4/denton-sparks">Denton Sparks</a>
                                </h5>
                                <p class="post-date mb-0 font-12">2019-11-08 06:05:29</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">



                            <a class="post-thumb" href="#"><img src="http://placehold.it/77x50"
                                    alt=""></a>



                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a
                                        href="https://conferencenepal.com/news/detail/2/xanthus-glass-1">Xanthus
                                        Glass</a></h5>
                                <p class="post-date mb-0 font-12">2019-11-08 05:59:44</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">



                            <a class="post-thumb" href="#"><img src="http://placehold.it/77x50"
                                    alt=""></a>



                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a
                                        href="https://conferencenepal.com/news/detail/1/xanthus-glass">Xanthus Glass</a>
                                </h5>
                                <p class="post-date mb-0 font-12">2019-11-08 05:42:13</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="widget dark">
                    <h6 class="widget-title line-bottom">Quick Contact</h6>
                    <form id="contact" name="contact" class="quick-contact-form"
                        action="https://conferencenepal.com/pages/contact-us" method="post">
                        <div class="form-group">
                            <input id="form_email" name="email" class="form-control" type="text" required=""
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <textarea id="form_message" name="message" class="form-control" required="" placeholder="Enter Message"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                value="">
                            <button type="submit"
                                class="btn btn-default btn-flat btn-xs btn-transparent text-gray pt-5 pb-5"
                                data-loading-text="Please wait...">Send Message</button>
                            <input type="hidden" name="_token" value="HwXKxchydjCbF32lbeKHjOAmLBsAwSCoDXf3UL6I">
                        </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                        $("#quick_contact_form2").validate({
                            submitHandler: function(form) {
                                var form_btn = $(form).find('button[type="submit"]');
                                var form_result_div = '#form-result';
                                $(form_result_div).remove();
                                form_btn.before(
                                    '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
                                    );
                                var form_btn_old_msg = form_btn.html();
                                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                $(form).ajaxSubmit({
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.status == 'true') {
                                            $(form).find('.form-control').val('');
                                        }
                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                                        $(form_result_div).html(data.message).fadeIn('slow');
                                        setTimeout(function() {
                                            $(form_result_div).fadeOut('slow')
                                        }, 6000);
                                    }
                                });
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-20" data-bg-color="#181818" style="background: rgb(24, 24, 24) !important;">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="font-11 m-0" data-text-color="#555" style="color: rgb(85, 85, 85);">Copyright ©2023 <a
                        class="font-11" href="#">Conference Nepal</a>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#" style="display: inline;"><i class="fa fa-angle-up"></i></a>