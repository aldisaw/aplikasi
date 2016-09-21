<style type="text/css">
	.text
	{
	    font-size: 13px;
	    width: 300px;
	    background: #fff;
	    border: 1px solid #ccc;
	    padding: 2%;
	    color: #555;
	    margin-bottom: 10px;
	 
	}
	.text:focus
	{
	    background: #fff;
	    border: 1px solid #ccc;
	    color: #555;
	    box-shadow: 0 0 5px #43D1AF;
	    
	}
	.text2
	{
	    font-size: 13px;
	    width: 650px;
	    background: #fff;
	    border: 1px solid #ccc;
	    padding: 1%;
	    color: #555;
	    margin-top: 10px;
	    margin-bottom: 10px;
	 
	}
	.text2:focus
	{
	    background: #fff;
	    border: 1px solid #ccc;
	    color: #555;
	    box-shadow: 0 0 5px #43D1AF;
	    
	}

	.tombol{
	    box-sizing: border-box;
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    width: 100%;
	    padding: 1%;
	    background: #43D1AF;
	    border-bottom: 2px solid #30C29E;
	    border-top-style: none;
	    border-right-style: none;
	    border-left-style: none;    
	    color: #fff;
	    font-size: 15px;
	}
	.tombol:hover{
	    background: #2EBC99;
	}
</style>

<div id="konten_kanan">
    <div id="konten_kanan_isi">
		<form name="transaksi" id="transaksi">

			<div id="list">
				<div class="isi_divda">
					<table width="100%" border="0" align="center" bgcolor='' style="padding:10px 10px 10px;">
						<tr class="tinggi">
							<td width="20%">
								<font size="5" color="green">Menu Transaksi</font>
							<td width="10%"><img src="images/transaksi.jpg" width="45" height="45">
							<td width="33%"><font size="5" color="#BB7070">Point Of Sale Aurellyn Clinic
							<td width="10%"><img src='images/l.png' width="70" height="40">
							<td align=right><font size="5" color="green">Hari : </font>
							<td align=right><img src="images/event.jpg" width="45" height="40">
						<tr class='tinggi' >
							<td colspan="6"><hr color="green"></hr>
						<tr class='tinggi'>
							<td colspan="6">
							<div id='detil_cari'>
								@include('file_master_data.file_transaksi.main_menu')
						</div>
					</table>
				</div>
			</div>

			<div id="list">
				<div class="isi_divda">
					<table width="100%" border="0" align=center bgcolor="" style="padding:10px 10px 10px;">
						<tr class="tinggi">
							<td width="20%">
								<font size="5" color="green">Pembayaran</font>
							<td width="10%"><img src="images/transaksi.jpg" width="45" height="45">
							<td width="33%"><font size="3" color=black><li></font><font size="3" color="#BB7070"> </font><br><font size="5" color="black"><li></font><font size="3" color="green"> </font>
										<br><input type=button  value="List Transaki" >
							<td width="10%" align=right valign=top><input type=button value='Batalkan Transaksi'  onclick=pesan_konfirmasi('$faktur%ATAS%NAMA%$br','fungsi/js.php?ua=../module/manajemen_transaksi/simpan.php&haydbbewun=batal&kode=$faktur','event'); title='Batalkan Transaksi'><input type=hidden name=mbr value='$member'>
							<td align=right><font color="green" size="5">Total :</font>  
							<td align=right><font color="red" size="5"></font>
						<tr>
							<td colspan="6"><hr color="green"></hr>
						<tr>
							<td colspan="6">
							<div id="detil_cari">
								<table width="100%" border="0" align=center style="background: rgb(246,230,180); /* Old browsers */background: -moz-linear-gradient(top,  rgba(246,230,180,1) 0%, rgba(237,144,23,1) 100%); /* FF3.6+ */background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(246,230,180,1)), color-stop(100%,rgba(237,144,23,1))); /* Chrome,Safari4+ */background: -webkit-linear-gradient(top,  rgba(246,230,180,1) 0%,rgba(237,144,23,1) 100%); /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(top,  rgba(246,230,180,1) 0%,rgba(237,144,23,1) 100%); /* Opera 11.10+ */background: -ms-linear-gradient(top,  rgba(246,230,180,1) 0%,rgba(237,144,23,1) 100%); /* IE10+ */background: linear-gradient(to bottom,  rgba(246,230,180,1) 0%,rgba(237,144,23,1) 100%); /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6e6b4', endColorstr='#ed9017',GradientType=0 ); /* IE6-9 */">
			                        <tr>
			                            <td>
			                                <table width="100%" border="0" align="center">
			                                    <tr>
			                                        <td width="12%">&nbsp;&nbsp;&nbsp;Tipe Pembayaran :
						                            <td width="7%"><input type="radio" name="type_beli" id="tipe_beli" Value="Cash"  required><font size="2">Cash
						                            <td width="7%"><input type="radio" name="type_beli" id="tipe_beli" Value="Card"  required><font size="2">Card
						                          	<td>
						                          		<div id='tmpl'>
						            	           		<td> | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												        <td><input type=radio name=bank id=bank Value='1002-3' required><font size=2> Mandiri &nbsp;&nbsp;
												        <td><input type=radio name=bank id=bank Value='1002-4' required><font size=2> BRI &nbsp;&nbsp;
												        <td><input type=radio name=bank id=bank Value='1002-5' required><font size=2> BCA
												        <td><input type=radio name=bank id=bank Value='1002-6' required><font size=2> BNI
												        <td><input type=radio name=bank id=bank Value='1002-7' required><font size=2> TRIBUN |
												        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=checkbox name=kas value='kas' >Cash
						                            	<td> | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						                            	<td><input type=radio name=bayar_pasien id=bayar_pasien Value='sesui' required><font size=2>Sesuai EDC &nbsp;&nbsp;
												        <td><input type=radio name=bayar_pasien id=bayar_pasien Value='tidak_sesuai' required><font size=2>Tidak Sesuai EDC &nbsp;&nbsp;
												        <td><input type=radio name=bayar_pasien id=bayar_pasien Value='kartu_kredit' required><font size=2>Melalui Kartu Kredit
						                            	</div>
			                                </table>
			                        </table>
			                        <br>
			                    
									<table width="100%" border="0" align="center" style=''>
			                            <tr>
			                               <td width="15%"><font size="2">Sub Total
			                               <td><input type="text" id="sub_total" name="sub_total" autocomplite="off" readonly="true" class="text" style="text-align:right;">
			                               <td width="15%"><font size=2>Voucher
			                               <td>
			                               		
			                               		<input type="text" id="vocer" onkeypress="return isNumberKey(event);"  style="text-align:right;" class="text" placeholder="Bayar Dengan Vhoucer" />
			                            <tr>
			                               <td width="15%" valign="top"><font size="2">Bayar
			                               <td><div id="fgthrye">
			                               			<input type="text" autocomplete="off" id="bayar" name="bayar" onkeypress="return isNumberKey(event)" style="text-align:right;" class="text" placeholder="Masukan Jumlah Bayar" onblur=formatrupiah(this.value,'Rp.','bayar','v'); />
			                            			<input type="hidden" name="card" value="0" id="card">
			                            		</div>
			                            	<td width="15%"><font size="2">Sisa / Kembali
			                                <td><div id="txtbank"><input type="hidden" name="text_bank"></div>
			                               		<input type="text" id="sisa" readonly="true" name="sisa" class="text" style="text-align:right;" placeholder="Sisa / Kembalian" />
			                            		
			                            <tr>
			                             	<td colspan="4">
			                             	<input type="button" class="tombol" value="Bayar Transaksi" />
			                        </table>
							</div>
						</table>
					</div>
				</div>	
			</div>
		</form>
	</div>
</div>
			
