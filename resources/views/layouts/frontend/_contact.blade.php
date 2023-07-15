<div class="container section-t4">
<div class="row">
    <div class="col-md-6">
        <div class="mb-4">
        <h1 class="title-single">Let's connect!</h1>
        <span class="color-text-a">
            Get in touch with me to plan your next real estate transaction
        </span>
        </div>

        <!-- CONTACT -->
        <div class="icon-box mb-2">
        <div class="icon-box-icon">
            <span class="ion-ios-paper-plane"></span>
        </div>
        <div class="icon-box-content table-cell">
            <div class="icon-box-title">
            <h4 class="icon-title">Contact</h4>
            </div>
            <div class="icon-box-content">
            <p class="mb-3">
                <img src="{!! url('images/icons/phone2.svg')!!}" alt="phone" class="mx-auto w-4 h-4">
                Globe
                <a href="tel:{{ env('GLOBAL_MOBILE') }}" class="color-a">{{ env('GLOBAL_MOBILE') }}</a>
            </p>
            <p class="mb-3">
                <img src="{!! url('images/icons/whatsapp.svg')!!}" alt="phone" class="mx-auto w-4 h-4">
                Whatsapp
                <a href="https://api.whatsapp.com/send?phone=639950114098" class="color-a">
                {{ env('GLOBAL_MOBILE') }}
                </a>
            </p>
            <p class="mb-3">
                <img src="{!! url('images/icons/viber.svg')!!}" alt="phone" class="mx-auto w-4 h-4">
                Viber
                <a href="viber://contact?number={{ env('GLOBAL_MOBILE') }}" class="color-a">
                {{ env('GLOBAL_MOBILE') }}
                </a>
            </p>
            </div>
        </div>
        </div>

        <!-- SOCIAL NETWORKS -->
        <div class="icon-box">
        <div class="icon-box-icon">
            <span class="ion-ios-redo"></span>
        </div>
        <div class="icon-box-content table-cell">
            <div class="icon-box-title">
            <h4 class="icon-title">Social networks</h4>
            </div>
            <div class="icon-box-content">
            <div class="socials-footer">
                <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ env('GLOBAL_FACEBOOK') }}" class="link-one">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ env('GLOBAL_TWITTER') }}" class="link-one">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ env('GLOBAL_INSTAGRAM') }}" class="link-one">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ env('GLOBAL_PINTEREST') }}" class="link-one">
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://api.whatsapp.com/send?phone=639950114098" class="link-one">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </div>

        <!-- EMAIL -->
        <div class="icon-box">
        <div class="icon-box-icon">
            <span class="ion-ios-paper-plane"></span>
        </div>
        <div class="icon-box-content table-cell">
            <div class="icon-box-title">
            <h4 class="icon-title">Email</h4>
            </div>
            <div class="icon-box-content">
            <p class="mb-1">
                <a href="mailto:{{ env('GLOBAL_MAIL') }}" class="color-text-a"> {{ env('GLOBAL_MAIL') }}</a>
            </p>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-6">
    <img src="{!! url('images/property-1.jpg')!!}" alt="" class="agent-avatar img-fluid">
    </div>
</div>
</div>