<style type='text/css'>

#video_thumb{
	width: 30%;
	height:310px;
	width:413px;
}
input{
	float:left;
}
.submit{
	float:left !important;
	padding: 0px;
	margin: 0px;
}
#thumbThumbForm{
	display:none;
	margin-top:70px;
}
</style>
<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', function(){
    var v = document.getElementById('video_thumb');
    v.volume=0;
    var canvas = document.getElementById('canvas_thumb_video');
    var context = canvas.getContext('2d');

    var cw = Math.floor(v.clientWidth);
    var ch = Math.floor(v.clientHeight);
    canvas.width = v.clientWidth;
    canvas.height = ch;

    v.addEventListener('play', function(){
        draw(this,context,cw,ch);
    },false);

},false);

var stop = null;
function draw(v,c,w,h) {
    if(v.paused || v.ended) return false;
    c.drawImage(v,0,0,w,h);
    stop = setTimeout(draw,20,v,c,w,h);
}	

var tirarFoto = function(){
	var v = document.getElementById('video_thumb');
    var canvas = document.getElementById('canvas_thumb_video');
    var context = canvas.getContext('2d');

    var cw = Math.floor(v.clientWidth);
    var ch = Math.floor(v.clientHeight);
    canvas.width = v.clientWidth;
    canvas.height = ch;

    context.drawImage(v, 0, 0, cw, ch);

    var thumbThumbForm = document.getElementById('thumbThumbForm');
    thumbThumbForm.style.display = 'block';

	clearTimeout(stop);
}

var getCodeImg = function(){
	var canvas = document.getElementById('canvas_thumb_video');
	var jpegUrl = canvas.toDataURL();
	jpegUrl = jpegUrl.replace("data:image/png;base64,", "");
	var VideoImgBase64 = document.getElementById('VideoImgBase64');
	VideoImgBase64.value = jpegUrl;
}
</script>

<div class='videos_thumb videos view'>
	<h2>Escolha a imagem para o vídeo: <?php echo $video['Video']['nome'];?></h2>

	<h3>Vídeo</h3>
	<video controls autoplay id="video_thumb">
		<source src="<?php echo $this->webroot.'upload_videos/'.$video['Video']['arquivo']; ?>" type="video/mp4">
		Seu navegador não suporta vídeos
	</video>
	<br /><br />
	<hr />
	<br />
	<h3>Foto</h3>
	<canvas id="canvas_thumb_video"></canvas>

	<br /><br />

	<input type='submit' id='tirar_foto' onclick='javascript: tirarFoto();' value='Tirar Foto' />

	<?php
		echo $this->Form->create('thumb', array('onsubmit' => 'javascript: return getCodeImg();'));
			echo $this->Form->input('Video.id', array('type' => 'hidden'));
			echo $this->Form->input('Video.img_base64', array('type' => 'hidden'));
		echo $this->Form->end('Salvar Imagem');
	?>
</div>

<?php echo $this->element('menu');?>