<!DOCTYPE html>
<html>
<head>
	<title>Comprovante Pagamento {{$title}}</title>
</head>
<body>
	<div>
		<img src="http://csec.poli.br/wp-content/uploads/2018/02/csec_banner.png" style="width: 100%; height: 25%;">
	</div>
	<br>
	<br>
	
	<div style="width:100%;background-color:#cacaca;font-family:Arial,Helvetica,sans-serif">
		<table width="600" border="0" style="margin:0 auto;background-color:#ff2b34;border-collapse:collapse">
			<tbody><tr>
				<td style="padding:30px 60px;text-align:left;color:#ffffff;font-size:32px">
					<center>{{$name}}</center></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="width:100%;background-color:#cacaca;font-family:Arial,Helvetica,sans-serif"><span class="im">
		<table width="600" border="0" bgcolor="ffffff" style="font-size:14px;line-height:20px;color:#515050;margin:0 auto;padding:40px 60px;background-color:#ffffff">
			<tbody><tr>
				<td>
					<h1 style="font-size:19px;font-weight:bold">
						{{$email_send}},
						{{$title}}

					</h1>
				</td>
			</tr>
		</tbody></table>
	</span>
	

	</tbody>
</table>
</body>
</html>