import './bootstrap';



 window.updateAvatar=function(){
	
	$("#profile_picture").trigger("click");

}

$("#search-input").on('keyup',function(){
var value=$(this).val();
if (value !='') {

$.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
method: 'GET',
dataType:'json',
url : '/product/search',
data:{'search':value},
success:function(data){

$('#searchtbody').html(data.output);

}
});
}
})


$("#avatarForm").on('submit',function(event){
    event.preventDefault();
    $("#submitAvatar").hide();
    $("#cancelAvatar").hide();
    $.ajax({
    	  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },

          type:'POST',
          url:'/profile/updateAvatar',
          contentType: false,
          processData: false,
          cache: false,
           data:new FormData(this),
           success:function(data){
            $('#avatar').load(document.URL +  ' #avatar');
           }

        });
  });
 var avatar;
window.previewAvatar=function (input){
  if (input.files && input.files[0]) {

   var reader = new FileReader();

   reader.onload = function (e) {
   avatar=$("#avatar").css('background-image');
   $("#avatar").css('background-image', "url(" +e.target.result +")");
   $("#submitAvatar").show();
    $("#cancelAvatar").show();
   }
    reader.readAsDataURL(input.files[0]);  
        }
  }

$("#cancelAvatar").on('click',function(event){
	 $("#submitAvatar").hide();
    $("#cancelAvatar").hide();
       $("#avatar").css('background-image', avatar);

});

window.scroll_right=function(el){
  event.preventDefault();
 var a=document.querySelector("#"+el).parentElement.id;
$('#'+a).animate({
    scrollLeft: "+=200px"
  }, "slow");
};

window.scroll_Left=function(el){
    event.preventDefault();
    var a=document.querySelector("#"+el).parentElement.id;
    $('#'+a).animate({
    scrollLeft: "-=200px"
    }, "slow");
    };



window.click_upload=function(el){

 $("#"+el).next().trigger("click");

}

window.removeSelectedImg=function(id){
  $('#'+id).hide();
  var preview_img=$('#'+id).siblings('.cir');
  preview_img.css('background-image', "");
  $('#'+id).prev().val("");
  $('#'+id).siblings('.uploadedimg').show();
}

 window.readurl=function(input){
  var id=input.id;
  if (input.files && input.files[0]) {
   var reader2 = new FileReader();
   reader2.onload = function (e) {
    var preview_img=$('#'+id).siblings('.cir');
    preview_img.css('border','1px solid green');
    preview_img.css('background-image', "url(" +e.target.result+")");
    $('#'+id).prev().hide();
    $('#'+id).next().css("display","block");
  }

    reader2.readAsDataURL(input.files[0]);
        }

  }


    $("#category").change(function () {
        var val = $(this).val();
        if (val == "cars") {
            $("#brand").html("<option value='bmw'>bmw</option><option value='toyota'>toyota</option><option value='nissan'>nissan</option><option value='mercedes'>mercedes</option><option value='honda'>honda</option><option value='toyota'>toyota</option><option value='nissan'>nissan</option><option value='mercedes'>mercedes</option><option value='toyota'>toyota</option>");
        } else if (val == "mobiles") {
            $("#brand").html("<option value='lg'>lg</option><option value='samsung'>samsung</option><option value='iphone'>iphone</option><option value='sony'>sony</option>");
        } else if (val == "computers") {
            $("#brand").html("<option value='dell'>Dell</option<option value='lg'>lg</option><option value='hp'>hp</option><option value='sony'>sony</option>");
        } else if (val == "home") {
            $("#brand").html("<option value='microwave'>microwave</option><option value='aircondition'>aircondition</option><option value='cooler'>cooler</option>");
        }
        else if (val == "clothes") {
            $("#brand").html("<option value='nike'>nike</option><option value='ravin'>Ravin</option><option value='addidas'>addidas</option>");
        }
        else if (val == "buldings") {
            $("#brand").html("<option value='garden'>garden</option><option value='house'>House</option><option value='flat'>flat</option>");
        }

    });







// function to change main image in product page
var checkedimg='';

window.change_main_image= function (img){
if (checkedimg == img){}
else {
var f=$(img).attr('src');
$("#myimage").attr("src",f);
imageZoom("myimage", "myresult");
checkedimg =img;

}



}


 // here the image zoom div and lense from w3 schoole and customized  by me

function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
 $( "DIV" ).remove(".img-zoom-lens");

  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  lens.addEventListener("mousemove",showres);
  lens.addEventListener("mouseleave",hidres);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
 
 function hidres(e){
    $(".resultcont").css("display","none");
  }
  function showres(e){
    $(".resultcont").css("display","block");
  }
  function moveLens(e) {
    var pos, x, y;
    
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
$('.notification-li').on('click',function () {
  $('#noti-icon').removeClass( "redback" );
});
var noti='';

    window.Echo.private('user.' + window.Laravel.user)
    .listen('test', (e) => {
     $('#noti-icon').addClass( "redback" );
     noti='<div class="col-12">'+e.message+'</div>';
    $('#notitbody').append(noti);
    });

