<!DOCTYPE html>
<html>
<head>
	<title>Scanner</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

	<video id="preview" autoplay="autoplay" class="active" style="transform: scaleX(-1); padding-right: 190px !important; width: 1183px;"></video>
	<script type="text/javascript" src="{{ asset('instascan.min.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

	<script type="text/javascript">

		let scanner = new Instascan.Scanner(
		{
			video: document.getElementById('preview')
		}
		);
		scanner.addListener('scan', function(content) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url:'/scan/dados/',
				method: 'POST',
				data: {user_id:content},

				success: function(result){
					alert('Presença confirmada!');
					console.log(result);
				},
				error: function(result){
					console.log(content);
					console.log(result);
				}
			});
		});
		Instascan.Camera.getCameras().then(cameras => 
		{
			if(cameras.length > 0){
				scanner.start(cameras[0]);
			} else {
				console.error("Não existe câmera no dispositivo!");
			}
		});
	</script>

</body>
</html>