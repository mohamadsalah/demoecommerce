<div class="footer">
<div class="container-fluid" style="color: white;background-color: rgba(0,0,0,.5);">
  <div class="row" >

  </div>
  <div class="row">
       <div class="col">
      <ul >
        <p class="footer-heads">Follow us</p>
      <li class="contact-li Social-accounts" > <a href="https://www.facebook.com/mohamad.salah.11"><img src="{{asset('fa.svg')}}" style="max-width: 100%;max-height: 100%;"></a></li>
      <li class="Social-accounts" > <a href=""><img src="{{asset('in.svg')}}" style="max-width: 100%;max-height: 100%;"></a></li>
      <li class="Social-accounts" > <a href=""><img src="{{asset('gmail.svg')}}" style="max-width: 100%;max-height: 100%;"></a></li>
      <li class="Social-accounts" > <a href=""><img src="{{asset('tw.svg')}}" style="max-width: 100%;max-height: 100%;"></a></li>
    </ul>
    </div>
    <div class="col login">
      <ul>
        <p class="footer-heads">LOG IN</p>
        <li >
        <a  href="http://127.0.0.1:8000/login/twitter" class="btn twitter">
          <i class="fab fa-twitter"></i>  login with twitter  
         </a>
        </li>
  <li >
        <a  href="http://127.0.0.1:8000/login/facebook
        " class="btn fb">
          <i class="fab fa-facebook-square"></i>  login with facebook
         </a>
        </li>
          <li >
        <a  href="http://127.0.0.1:8000/login/google" class="btn google">
        <i class="fab fa-google-plus-square"></i>  login with google  
         </a>
        </li>
        
      </ul>

      
    </div>
    <div class="col"></div>
        <div class="col"></div>

  </div>
  <div class="row">
<div class="col text-center">© 2019 MOhamad Salah</div>
  </div>
</div>
</div>


 <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script> new WOW().init(); </script>


</body>
</html>