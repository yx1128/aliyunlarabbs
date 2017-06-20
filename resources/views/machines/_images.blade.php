<style type="text/css">
.img1{
     cursor: pointer;
     transition: all 0.6s;
}
.img1:hover{
      transform: scale(1.4);
 }
 </style>

 <img class="img-responsive center-block img1 " src="{{ img_crop($machine->image) }}">
