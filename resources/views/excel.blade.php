<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">var Croogo = {"basePath":"\/","params":{"controller":"inscricoes","action":"imprimir_voucher","named":[]}};
</script>
</head>
<body>
  <button onclick="window.print()"><i class="fa fa-print" aria-hidden="true" style="color: #83807F"></i>Imprimir</button>
  </div>
<table  class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody> 
                 @foreach($i as $q)
                 @if($q->status == 1)
                 <tr>
                 <td scope="row"><center><p style="margin-top: 3%; font-size:30px">{{substr($q->user->name,0,18)}}<p style="align-items: center;margin-bottom: 27%">{!!QrCode::size(170)->generate($q->id)!!}</p></p></center></td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            <div class="button-print">
</body>
</html>

