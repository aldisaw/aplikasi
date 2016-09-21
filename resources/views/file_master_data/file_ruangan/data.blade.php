<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Ruangan</th>
          <th class='th' width="20%">Nama Ruangan</th>
          <th class='th' width="30%">Keterangan</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td' width="5%" align="center">@{{ nomor+$index+1}}</td>
          <td id='td' width="10%">@{{value.kode_ruangan}}</td>
          <td id='td' width="20%">@{{value.nama_ruangan}}</td>
          <td id='td' width="8%">@{{value.keterangan}}</td>
          <td id='td' width="5%" align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_ruangan}}" ng-click="konfirmasi_hapus(value.nama_ruangan, 'data/ruangan', value.kode_ruangan)"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_ruangan}}" ng-click="toggle('edit', value.kode_ruangan, 'form-edit', 'data/ruangan/')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/ruangan/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>