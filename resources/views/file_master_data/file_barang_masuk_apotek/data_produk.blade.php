<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Produk</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="12%">Harga</th>
          <th class='th' width="10%">Satuan</th>
          <th class='th' width="8%">Jenis Produk</th>
          <th class='th' width="8%">Dis M.Umum</th>
          <th class='th' width="8%">Dis M.Family</th>
          <th class='th' width="8%">Dis M.Student</th>
          <th class='th' width="8%">Dis M.Vip</th>
          <th class='th' width="6%">Dis Krw</th>
     </tr>
     <tr bgcolor="#ADBA9A" ng-repeat="isi in dtl" style="cursor:pointer;" title="Pilih Member @{{isi.nama_produk}}" ng-click="transfer(isi.nama_produk, isi.kode_produk, '', '', 'form-produk', 'produk');">  
          <td id='td' align="center">@{{ nomor2+$index+1}}</td>
          <td id='td'>@{{isi.kode_produk}}</td>
          <td id='td'>@{{isi.nama_produk}}</td>
          <td id='td' align="right">@{{isi.harga | currency:"Rp " }}</td>
          <td id='td'>@{{isi.satuan}}</td>
          <td id='td'>@{{isi.kategori_produk }}</td>
          <td id='td' align="center">@{{isi.dis_umum}}</td>
          <td id='td' align="center">@{{isi.dis_family}}</td>
          <td id='td' align="center">@{{isi.dis_student}}</td>
          <td id='td' align="center">@{{isi.dis_vip}}</td>
          <td id='td' align="center">@{{isi.dis_karyawan}}</td>
</table>

     <hr style=" height: 12px;
         border: 0;
         box-shadow: inset 0 8px 8px -8px rgba(0, 0, 0, 0.5);
         background:green;">
     </hr>

<paging
   class="pagination pull-right small"
   page="currentPage" 
   page-size="1" 
   total="totalItems"
   hide-if-empty="hideIfEmpty"
   ul-class="ulClass"
   active-class="activeClass"
   disabled-class="disabledClass"
   show-prev-next="showPrevNext"
   show-first-last="showFirstLast"
   ng-click="pageChanged_multi(currentPage, 'data/produk/home/data.html', '2', '', '', '7')"
   style="margin-top:-30px;margin-bottom:-15px;">
</paging>  
<p align="center">@{{pesan_kosong}}</p>