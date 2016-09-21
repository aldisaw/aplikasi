<table border="0" id='mytable' width="100%" style=border-collapse:collapse;>
     <tr bgcolor="#ADBA9A">  
          <th class='th' width="5%">No</th>
          <th class='th' width="10%">ID Member</th>
          <th class='th' width="15%">Nama Member</th>
          <th class='th' width="8%">Jenis Member</th>
          <th class='th' width="8%">Tgl Lahir</th>
          <th class='th' width="8%">Agama</th>
          <th class='th' width="8%">No. Handpone</th>
          <th class='th' width="8%">Alamat</th>
          <th class='th' width="8%">Biaya</th>
          <th class='th' width="5%">Kelola</th>
     </tr>
     <tr bgcolor="#ADBA9A" dir-paginate="value in data | itemsPerPage:7" total-items="totalItems">  
          <td id='td' width="5%" align="center">@{{ nomor+$index+1}}</td>
          <td id='td' width="10%">@{{value.id_member}}</td>
          <td id='td' width="15%">@{{value.nama_member}}</td>
          <td id='td' width="8%" align="left">@{{value.jenis_member}}</td>
          <td id='td' width="8%">@{{value.tgl_lahir | date:'dd/MM/yyyy'}}</td>
          <td id='td' width="8%" align="left">@{{value.agama}}</td>
          <td id='td' width="8%" align="left">@{{value.no_handpone}}</td>
          <td id='td' width="8%" align="left">@{{value.alamat}}</td>
          <td id='td' width="8%" align="right">@{{value.biaya | currency:"Rp " }}</td>
          
          <td id='td' width="5%" align="center"><img src="images/cross.png" width="25px" height="25px" style="cursor:pointer;" title="Hapus @{{value.nama_member}}" ng-click="konfirmasi_hapus(value.nama_member, 'data/member', value.id);"/> <img src="images/e.png" width="17px" height="17px" style="cursor:pointer;" title="Update @{{value.nama_member}}" ng-click="toggle('edit', value.id, 'form-edit', 'data/member/', 'member')" /></td>
     
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber, 'data/member/home/data.html')" template-url="templates/dirPagination.html" ></dir-pagination-controls>
<p align="center">@{{pesan_kosong}}</p>