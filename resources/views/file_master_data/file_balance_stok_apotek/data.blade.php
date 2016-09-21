<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Produk</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="10%">Harga Produk</th>
          <th class='th' width="10%">Kategori Produk</th>
          <th class='th' width="5%">Sisa</th>
          <th class='th' width="10%">Expired</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:13" total-items="totalItems" style="cursor:pointer;" title="Produk @{{value.nama_produk}} ( @{{value.bulan}} ) bulan lagi akan expired">  
          <td id='td' align="center">@{{ nomor+$index+1}}</td>
          <td id='td' align="left">@{{value.kode_produk}}</td>
          <td id='td' align="left">@{{value.nama_produk}}</td>
          <td id='td' align="right">@{{value.harga | currency:"Rp "}}</td>
          <td id='td' align="center">@{{value.kategori_produk}}</td>
          <td id='td' align="center">@{{value.sisa}}</td>
          <td id='td' align="center">@{{value.exd | date:'MM-yyyy'}}</td>
          <td id='td' align="center"><img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_produk}}" ng-click="transfer(value.kode_produk, value.nama_produk, value.sisa, value.exd, 'form-edit', 'edit_stok')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/balance-stok-apotek/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>