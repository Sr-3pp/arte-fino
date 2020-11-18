@extends('layouts.email')

@section('content')
  <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
    <tr style="border-collapse:collapse;"> 
     <td align="left" style="padding:5px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#999999;"><strong>Nombre:</strong>  {{$contact->name}}</p></td> 
    </tr> 
    <tr style="border-collapse:collapse;"> 
     <td align="left" style="padding:5px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#999999;"><strong>Asunto:</strong>    {{$contact->afair}}</p></td> 
    </tr> 
    <tr style="border-collapse:collapse;"> 
     <td align="left" style="padding:5px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#999999;"><strong>E-mail:</strong>    {{$contact->email}}</p></td> 
    </tr> 
    <tr style="border-collapse:collapse;"> 
     <td align="left" style="padding:5px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#999999;"><strong>Mensaje:</strong></p> <p>{{$contact->name}}</p></td> 
    </tr> 
  </table>
@endsection