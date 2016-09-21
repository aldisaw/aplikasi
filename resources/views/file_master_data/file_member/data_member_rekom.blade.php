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
     </tr>
     <tr bgcolor="#ADBA9A" ng-repeat="isi in dtl" style="cursor:pointer;" title="Pilih Member @{{isi.nama_member}}" ng-click="transfer(isi.nama_member, isi.id_member, '', '', 'form-member', 'coba');">  
          <td id='td' width="5%" align="center">@{{ nomor2+$index+1}}</td>
          <td id='td' width="10%">@{{isi.id_member}}</td>
          <td id='td' width="15%">@{{isi.nama_member}}</td>
          <td id='td' width="8%" align="left">@{{isi.jenis_member}}</td>
          <td id='td' width="8%">@{{isi.tgl_lahir | date:'dd/MM/yyyy'}}</td>
          <td id='td' width="8%" align="left">@{{isi.agama}}</td>
          <td id='td' width="8%" align="left">@{{isi.no_handpone}}</td>
          <td id='td' width="8%" align="left">@{{isi.alamat}}</td>
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
   ng-click="pageChanged_multi(currentPage, 'data/member/home/data.html', '2', '', '', '7')"
   style="margin-top:-30px;margin-bottom:-15px;">
</paging>  
<p align="center">@{{pesan_kosong}}</p>