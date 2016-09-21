<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">Kode Karyawan</th>
          <th class='th' width="15%">Nama Karyawan</th>
          <th class='th' width="18%">Alamat</th>
          <th class='th' width="8%">No. Handpone</th>
          <th class='th' width="8%">Devisi</th>
          <th class='th' width="8%">Status</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td'  align="center">@{{ nomor+$index+1}}</td>
          <td id='td'  align="left">@{{value.kode_karyawan}}</td>
          <td id='td'  align="left">@{{value.nama_karyawan}}</td>
          <td id='td'  align="left">@{{value.alamat}}</td>
          <td id='td'  align="left">@{{value.no_hp}}</td>
          <td id='td'  align="left">@{{value.jabatan}}</td>
          <td id='td'  align="center">@{{value.status}}</td>
          <td id='td'  align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_karyawan}}" ng-click="konfirmasi_hapus(value.nama_karyawan, 'data/karyawan', value.kode_karyawan);"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_karyawan}}" ng-click="toggle('edit', value.kode_karyawan, 'form-edit', 'data/karyawan/', '')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/karyawan/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>