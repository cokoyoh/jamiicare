<template>
    <div class="contact-us" id="contact-us">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <h4>Contact us here</h4>
                <form class="form-horizontal">
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.8s">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"
                                                                                          aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon1"
                                           placeholder="Full Name"
                                           name="full_name" required>
                                </div>

                                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="1.2s">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope-open"
                                                                                          aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon2"
                                           placeholder="Email Address" name="email_address" required>
                                </div>

                                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="1.6s">
                                    <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-phone"
                                                                                          aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon3"
                                           placeholder="Phone Number" name="phone_number" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-group wow fadeInUp" data-wow-delay="2.0s">
                                <textarea class="form-control" cols="80" rows="6" name="message" required
                                          placeholder="Write message here..."></textarea>
                                </div>
                                <button class="btn btn-success btn-lg btn-block wow fadeInUp"  data-wow-delay="2.4s" name="send">Send Message</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>

<style lang="sass">
    .contact-us
        padding: 100px 0 60px
        height: 500px

    .contact-us p
         padding-bottom: 80px
         color: #737373
         font-family: 'Lato', sans-serif
    .contact-us h2
         color: #4c4c4c
         margin: 20px 0 20px
         font-family: 'Noto Sans', sans-serif

    .contact-us .input-group
       margin-bottom: 25px
    .contact-us .form-control
        border-radius: 0 !important
    span
       border-radius: 0 !important

    .contact-us .btn
        border-radius: 0 !important
        width: 100%
        font-size: 15px
            /*background-color: #f08080*/
        color: #fff
</style>