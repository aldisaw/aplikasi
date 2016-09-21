<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Produk</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="10%">Harga Produk</th>
          <th class='th' width="10%">Kategori Produk</th>
          <th class='th' width="5%">Sisa</th>
     </tr>
     <tr bgcolor="#ADBA9A" ng-repeat="isi in dtl" style="cursor:pointer;" title="Pilih Member @{{isi.nama_produk}}" ng-click="transfer(isi.nama_produk, isi.kode_produk, isi.sisa, '', 'form-produk', 'produk-stok');">  
          <td id='td' align="center">@{{ nomor+$index+1}}</td>
          <td id='td' align="left">@{{isi.kode_produk}}</td>
          <td id='td' align="left">@{{isi.nama_produk}}</td>
          <td id='td' align="right">@{{isi.harga | currency:"Rp "}}</td>
          <td id='td' align="center">@{{isi.kategori_produk}}</td>
          <td id='td' align="center">@{{isi.sisa}}</td>
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
   ng-click="pageChanged_multi(currentPage, 'data/produk-stok/home/data.html', '2', '', '', '7')"
   style="margin-top:-30px;margin-bottom:-15px;">
</paging>  
<p align="center">@{{pesan_kosong}}</p>