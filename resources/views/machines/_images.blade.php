<style type="text/css">
.img1{
     cursor: pointer;
     transition: all 0.6s;
}
.img1:active{
      transform: scale(1.4);
 }
 </style>
   <h4>设备图片<small>（按住放大）</small></h4>
   <img class="img-responsive center-block img1 " src="{{ img_crop($machine->image) }}">
