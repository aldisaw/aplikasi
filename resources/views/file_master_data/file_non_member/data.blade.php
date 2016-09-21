<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">ID Pasien</th>
          <th class='th' width="15%">Nama Pasien</th>
          <th class='th' width="8%">Jenis Kelamin</th>
          <th class='th' width="8%">No. Handpone</th>
          <th class='th' width="8%">Tanggal Kunjungan</th>
          <th class='th' width="18%">Alamat</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td'  align="center">@{{ nomor+$index+1}}</td>
          <td id='td'>@{{value.kode}}</td>
          <td id='td'>@{{value.nama}}</td>
          <td id='td'  align="left">@{{value.jenis_kelamin}}</td>
          <td id='td'  align="left">@{{value.no_handpone}}</td>
          <td id='td'  align="center">@{{value.tgl | date:'dd/MM/yyyy'}}</td>
          <td id='td'  align="left">@{{value.alamat}}</td>
          <td id='td'  align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama}}" ng-click="konfirmasi_hapus(value.nama, 'data/non-member', value.kode);"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama}}" ng-click="toggle('edit', value.kode, 'form-edit', 'data/non-member/', '')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/non-member/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>