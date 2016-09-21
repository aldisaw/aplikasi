<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="5%">Tanggal</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="5%">Jumlah</th>
          <th class='th' width="25%">Keterangan</th>
          <th class='th' width="8%">User</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr  bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:13" total-items="totalItems" style="cursor:pointer;" title="Produk @{{value.nama_produk}} ">  
          <td id='td' align="center">@{{ nomor+$index+1}}</td>
          <td id='td' align="left">@{{value.tgl | date:'dd/MM/yyyy'}}</td>
          <td id='td' align="left">@{{value.nama_produk}}</td>
          <td id='td' align="center">@{{value.jumlah}}</td>
          <td id='td' align="left">@{{value.keterangan}}</td>
          <td id='td' align="center">@{{value.user}}</td>
          <td id='td' align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_produk}}" ng-click="konfirmasi_hapus(value.nama_produk, 'data/barang-keluar-apotek', value.kode_transaksi);"/>  <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_produk}}" ng-click="transfer_edit(value.kode_produk,value.nama_produk,value.kode_transaksi,value.jumlah,value.tgl,value.keterangan,'','','','','','','','','','','','','','','','','','','', '', '', 'produk-keluar', 'form-edit')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/barang-keluar-apotek/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>