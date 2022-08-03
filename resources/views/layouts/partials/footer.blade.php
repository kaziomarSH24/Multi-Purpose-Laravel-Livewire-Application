    <footer class="main-footer">
        <!-- To the right -->
        <div class="footerRight float-right d-none d-sm-inline">
            <span>Contact Email: <a href="mailTo:{{setting('site_email')}}">{{setting('site_email')}}</a></span>
        </div>
        <!-- Default to the left -->
        <div class="footerLeft">
            {!!setting('footer_text')!!}
        </div>
        
  </footer>