<table align="center" border="0" cellspacing="0" cellpadding="5" width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:1px solid #cccccc; border-collapse:collapse">
  <tr style="background:#333">
    <td align="center"><img src="http://www.srgit.biz/demo/jewellery/template/images/logo.png" width="180"></td>
  </tr>
  <tr>
    <td><hr style="opacity:0.3;" /></td>
  </tr>
  <tr>
    <td style="background:#EEEEEE; padding:10px 0" align="center"><strong style="font-size:17px">Date : '.date("F j, Y", strtotime(date("Y-m-d"))).' </strong></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="5" width="100%" >
        <tr>
          <td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello ,</b></font></td>
        </tr>
        <tr>
          <td colspan="2"><font face="Verdana" style="font-size:12px">Thank you for subscribing. We will get back to you soon. </font></td>
        </tr>
        <tr>
          <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>Subscriber details are as follows:</b></font></p>
            <table border="0" cellspacing="0" cellpadding="0" width="300">
              <tr>
                <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                    <tr>
                      <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font>
                        </th>
                      <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['subsemail'].'</font>
                        </th>
                    </tr>
                    <tr>
                      <td colspan="2"><br />
                        <font face="Verdana" style="font-size:12px" color="#666666"><b>From Jewellery Shoppe auto-email</b><br />
                        </font> </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
