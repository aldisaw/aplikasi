<table border="0" id='mytable' width="100%" style=border-collapse:collapse; ng-init="totalItem44s=value211.detail.total">
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Produk</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="40%">Keterangan</th>
          <th class='th' width="10%">Kelola</th>
     </tr>
     <tr ng-repeat="value2 in detail[$index].detail.data | limitTo:5" >  
          <td id='td' width="5%" align="center">@{{ nomor+$index+1}}</td>
          <td id='td' width="10%">@{{value2.kode_produk}}</td>
          <td id='td' width="20%"><a style="cursor:pointer;">@{{value2.nama_produk}}</a></td>
          <td id='td' width="40%" align="left">@{{value2.keterangan}}</td>
          <td id='td' width="10%" align="center">
               <img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value2.nama_produk}}" ng-click="konfirmasi_hapus(value2.nama_produk, 'data/produk-treatment', value2.id);"/> 
          </td>
     </tr>
</table>
