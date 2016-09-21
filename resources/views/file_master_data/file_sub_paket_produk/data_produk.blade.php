<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A" >  
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
     <tr bgcolor="#ADBA9A" dir-paginate="value in dtl | itemsPerPage:7" total-items="totalItems" style="cursor:pointer;" title="Pilih @{{value.nama_produk}}" ng-click="transfer(value.kode_produk, value.nama_produk, form.kode_detail_paket, form.kode_paket, 'form-produk', 'produk-transfer-paket-produk');">  
          <td id='td' width="5%" align="center">@{{ nomor2+$index+1}}</td>
          <td id='td' width="10%">@{{value.kode_produk}}</td>
          <td id='td' width="20%">@{{value.nama_produk}}</td>
          <td id='td' width="8%" align="right">@{{value.harga | currency:"Rp " }}</td>
          <td id='td' width="10%">@{{value.satuan}}</td>
          <td id='td' width="12%" >@{{value.kategori_produk }}</td>
          <td id='td' width="8%" align="center">@{{value.dis_umum}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_family}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_student}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_vip}}</td>
          <td id='td' width="6%" align="center">@{{value.dis_karyawan}}</td>
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged_multi(newPageNumber, 'data/produk/home/data.html', '2', '', '', '7')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>