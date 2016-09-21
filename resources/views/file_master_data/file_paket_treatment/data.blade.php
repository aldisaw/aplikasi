<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Paket</th>
          <th class='th' width="20%">Nama Paket</th>
          <th class='th' width="8%">Kategori</th>
          <th class='th' width="10%">Jenis</th>
          <th class='th' width="8%">Harga</th>
          <th class='th' width="8%">Dis M.Umum</th>
          <th class='th' width="8%">Dis M.Family</th>
          <th class='th' width="8%">Dis M.Student</th>
          <th class='th' width="8%">Dis M.Vip</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td' width="5%" align="center">@{{ nomor+$index+1}}</td>
          <td id='td' width="10%">@{{value.kode_paket}}</td>
          <td id='td' width="20%">@{{value.nama_paket}}</td>
          <td id='td' width="8%">@{{value.keterangan}}</td>
          <td id='td' width="10%">@{{value.jenis_paket}}</td>
          <td id='td' width="12%" align="right">@{{value.harga_paket | currency:"Rp " }}</td>
          <td id='td' width="8%" align="center">@{{value.dis_umum}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_family}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_student}}</td>
          <td id='td' width="8%" align="center">@{{value.dis_vip}}</td>
          <td id='td' width="5%" align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_paket}}" ng-click="konfirmasi_hapus(value.nama_paket, 'data/paket-treatment', value.kode_paket);"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_paket}}" ng-click="toggle('edit', value.kode_paket, 'form-edit', 'data/paket-treatment/')" /></td>
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/paket-treatment/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>