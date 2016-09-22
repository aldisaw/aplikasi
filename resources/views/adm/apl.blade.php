<div id="js"></div>
<div id="jsa"></div>
<div id="notification-trigger"></div>
    @include('adm.menu')
    @include('adm.menu_bwh')
<div class="isi_konten">
    <div id="konten_kiri">
        @include('adm.konten_kiri')
    </div>
    <div id="data">
    	<div loading-indicator tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: relative;"></div>
        
        <div ng-view>

        </div>
        
    </div>
</div>
