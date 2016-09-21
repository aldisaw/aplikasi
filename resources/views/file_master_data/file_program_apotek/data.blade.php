<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Produk</th>
          <th class='th' width="20%">Nama Produk</th>
          <th class='th' width="8%">Harga</th>
          <th class='th' width="8%">Jenis Program</th>
          <th class='th' width="8%">Dis M.Umum</th>
          <th class='th' width="8%">Dis M.Family</th>
          <th class='th' width="8%">Dis M.Student</th>
          <th class='th' width="8%">Dis M.Vip</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td' align="center">@{{ nomor+$index+1}}</td>
          <td id='td' align="left">@{{value.kode_produk}}</td>
          <td id='td' align="left">@{{value.nama_produk}}</td>
          <td id='td' align="right">@{{value.harga | currency:"Rp " }}</td>
          <td id='td' align="left">@{{value.nama_program}}</td>
          <td id='td' align="center">@{{value.dis_member_umum}}</td>
          <td id='td' align="center">@{{value.dis_member_family}}</td>
          <td id='td' align="center">@{{value.dis_member_student}}</td>
          <td id='td' align="center">@{{value.dis_member_vip}}</td>
          
          <td id='td' width="5%" align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_produk}}" ng-click="konfirmasi_hapus(value.nama_produk, 'data/program-apotek', value.id);"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_produk}}" ng-click="toggle('edit', value.id, 'form-edit', 'data/program-apotek/', 'program-apotek')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/program-apotek/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>