<style type="text/css">
        #formasas{
            float: right;
            width: 33%;
            height: 540px;
            border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border: 0px solid #000000;
            background: white;
            margin: -35px 10px 0px;
            border-top: 4px solid green;
            border-left: 1px solid #D8D7D7;
            border-right: 1px solid #D8D7D7;
            border-bottom: 1px solid #D8D7D7;
            padding: 10px 10px 10px;
            font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        }
        #forma{
            float: left;
            width: 63%;
            height: 540px;
            border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border: 0px solid #000000;
            margin: -35px 10px 0px;
            padding: -35px 10px 10px;
            font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        }
        #form{
            float: left;
            width: 30%;
            height: 260px;
            border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border: 0px solid #000000;
            background: white;
            position: relative;
            margin: 10px 10px 0px;
            border-top: 4px solid green;
            border-left: 1px solid #D8D7D7;
            border-right: 1px solid #D8D7D7;
            border-bottom: 1px solid #D8D7D7;
            padding: 10px 0px 10px;
            font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
        }
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
        @keyframes spinner {
          0% {
            transform: rotateZ(0deg);
          }
          100% {
            transform: rotateZ(359deg);
          }
        }
        * {
          box-sizing: border-box;
        }

        .wrapper {
          display: flex;
          align-items: center;
          flex-direction: column;
          justify-content: center;
          width: 100%;
          min-height: 100%;
          padding: 20px;
          background: rgba(4, 40, 68, 0.85);
        }

        .login {
          border-radius: 2px 2px 5px 5px;
          padding: 10px 20px 20px 20px;
          width: 100%;
          background: #ffffff;
          position: relative;
          padding-bottom: 80px;
          box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
        }
        .login.loading button {
          max-height: 100%;
          padding-top: 50px;
        }
        .login.loading button .spinner {
          opacity: 1;
          top: 40%;
        }
        .login.ok button {
          background-color: #8bc34a;
        }
        .login.ok button .spinner {
          border-radius: 0;
          border-top-color: transparent;
          border-right-color: transparent;
          height: 20px;
          animation: none;
          transform: rotateZ(-45deg);
        }
        .login input {
          font-size: 1.5em;
          display: block;
          padding: 15px 10px;
          margin-bottom: 10px;
          width: 100%;
          border: 1px solid #ddd;
          transition: border-width 0.2s ease;
          border-radius: 2px;
          color: #ccc;
        }
        .login input + i.fa {
          color: #fff;
          font-size: 1em;
          position: absolute;
          margin-top: -47px;
          opacity: 0;
          left: 0;
          transition: all 0.1s ease-in;
        }
        .login input:focus {
          outline: none;
          color: #444;
          border-color: #2196F3;
          border-left-width: 35px;
        }
        .login input:focus + i.fa {
          opacity: 1;
          left: 30px;
          transition: all 0.25s ease-out;
        }
        .login a {
          font-size: 1.0em;
          color: #2196F3;
          text-decoration: none;
        }
        .login .title {
          color: #444;
          font-size: 2.2em;
          font-weight: bold;
          margin: 10px 0 30px 0;
          border-bottom: 1px solid #eee;
          padding-bottom: 20px;
        }
        .login button {
          width: 100%;
          height: 100%;
          padding: 10px 10px;
          background: #2196F3;
          color: #fff;
          display: block;
          border: none;
          margin-top: 20px;
          position: absolute;
          left: 0;
          bottom: 0;
          max-height: 60px;
          border: 0px solid rgba(0, 0, 0, 0.1);
          border-radius: 0 0 2px 2px;
          transform: rotateZ(0deg);
          transition: all 0.1s ease-out;
          border-bottom-width: 7px;
          font-size: 2.2em;
        }
        .login button .spinner {
          display: block;
          width: 40px;
          height: 40px;
          position: absolute;
          border: 4px solid #ffffff;
          border-top-color: rgba(255, 255, 255, 0.3);
          border-radius: 100%;
          left: 50%;
          font-size: 2.2em;
          top: 0;
          opacity: 0;
          margin-left: -20px;
          margin-top: -20px;
          animation: spinner 0.6s infinite linear;
          transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
          box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
        }
        .login:not(.loading) button:hover {
          box-shadow: 0px 1px 3px #2196F3;
        }
        .login:not(.loading) button:focus {
          border-bottom-width: 4px;
        }
        .tinggi{
          height: 40px;
          color: white;
          font-size: 1.3em;
        }
        .judul{
          width: 100%;
          height: 30px;
          /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#207cca+93,0c051c+100 */
          background: rgb(32,124,202); /* Old browsers */
          background: -moz-linear-gradient(top,  rgba(32,124,202,1) 93%, rgba(12,5,28,1) 100%); /* FF3.6-15 */
          background: -webkit-linear-gradient(top,  rgba(32,124,202,1) 93%,rgba(12,5,28,1) 100%); /* Chrome10-25,Safari5.1-6 */
          background: linear-gradient(to bottom,  rgba(32,124,202,1) 93%,rgba(12,5,28,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#207cca', endColorstr='#0c051c',GradientType=0 ); /* IE6-9 */
          border-top: 2px solid black;
        }

    </style>

    <div id='konten_kanan'>
        <div id='konten_kanan_isi'>
            <table width="99%" border="0" style='' style="background:white;" bgcolor=white>
                <tr>
                    <td><div class="judul">
                          <font size="4" face=arial color="white"><marquee>Sistem Informasi Aurellyn Clinic Version 1.4, AURELLYN CLINIC BEDAH ESTETIKA. aesthetics and surgary</marquee>
                        </div>
            </table>
            <br><br><br>
            <div id="forma">
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/kas_keluar.jpg" width="90px" height="100px">
                  <tr bgcolor="green" class="tinggi">
                    <td align=center>Mengolah Data Keuangan
                  <tr>
                    <td align=center><font color="#4E4D4D">Sistem ini dapat membantu mengolah data keuangan yang didukung format buku besar, jurnal dan neraca saldo. </font>
                </table>
              </div>
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/barang_masuk_apotek.png" width="90px" height="100px">
                  <tr bgcolor="#EBA75E" class="tinggi">
                    <td align=center>Mengolah Data Stok
                  <tr>
                    <td align=center><font color="#4E4D4D">Sistem ini dapat membantu mengolah data stok, dari mulai stok produk sampai stok treatment. Out put yang dihasilkan In/Out, Defecta dan Produk EXPAIRED.   </font>
                </table>
              </div>
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/pembayaran_bb.png" width="90px" height="100px">
                  <tr bgcolor="#0DC5C5" class="tinggi">
                    <td align=center>Mengolah Data Penggajian
                  <tr>
                    <td align=center><font color="#4E4D4D">Sistem ini dapat membantu mengolah data penggajian karyawan dan dapat menghitung potongan kehadiran, potongan pinjaman dan fee yang di dapat . </font>
                </table>
              </div>
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/meningkatkan-penjualan.png" width="100px" height="100px">
                  <tr bgcolor="#73513D" class="tinggi">
                    <td align=center>Mengolah Data Pencapaian
                  <tr>
                    <td align=center><font color="#4E4D4D">Mengontrol dan memonitoring data pencapaian dari setiap devisi. </font>
                </table>
              </div>
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/pgm.png" width="100px" height="100px">
                  <tr bgcolor="green" class="tinggi">
                    <td align=center>Mengolah Data Fee
                  <tr>
                    <td align=center><font color="#4E4D4D">Dapat mengolah data Fee dari resep yang di berikan oleh dokter. </font>
                </table>
              </div>
              <div id="form">
                <table width="100%" border="0">
                  <tr>
                    <td align=center><img src="images/absensi.jpg" width="90px" height="100px">
                  <tr bgcolor="#B92284" class="tinggi">
                    <td align=center>Mengolah Data Absensi
                  <tr>
                    <td align=center><font color="#4E4D4D">Dapat mengolah data absensi kehadiran karyawan yang di dukung dengan mesin FingerPrint </font>
                </table>
              </div>
            </div>
            
            @include('home.login')

        </div>
    </div>