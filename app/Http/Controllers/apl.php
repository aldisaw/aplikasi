<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class apl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //return view('adm.home');
    }
    public function master(Request $request, $ket, $name){
        if ($ket=="home") {
            return view('adm.home');
        }
    	elseif ($ket=="treatment") {
    		return view('file_master_data.file_treatment.form');
    	}
        elseif ($ket=="ruangan") {
            return view('file_master_data.file_ruangan.form');
        }
        elseif ($ket=="produk") {
            return view('file_master_data.file_produk.form');
        }
        elseif ($ket=="paket-produk") {
            return view('file_master_data.file_paket_produk.form');
        }

        elseif ($ket=="sub-paket-produk") {
            return view('file_master_data.file_sub_paket_produk.form');
        }

        elseif ($ket=="produk-treatment") {
            return view('file_master_data.file_produk_treatment.form');
        }

        elseif ($ket=="paket-treatment") {
            return view('file_master_data.file_paket_treatment.form');
        }
        elseif ($ket=="sub-paket-treatment") {
            return view('file_master_data.file_sub_paket_treatment.form');
        }
        elseif ($ket=="member") {
            return view('file_master_data.file_member.form');
        }
        elseif ($ket=="non-member") {
            return view('file_master_data.file_non_member.form');
        }
        elseif ($ket=="karyawan") {
            return view('file_master_data.file_karyawan.form');
        }
        elseif ($ket=="program-bowl") {
            return view('file_master_data.file_program_bowl.form');
        }
        elseif ($ket=="program-happy-hours") {
            return view('file_master_data.file_program_happy_hours.form');
        }
        elseif ($ket=="program-apotek") {
            return view('file_master_data.file_program_apotek.form');
        }
        elseif ($ket=="program-customer-birtday") {
            return view('file_master_data.file_program_customer_birtday.form');
        }
        elseif ($ket=="paket-promo") {
            return view('file_master_data.file_paket_promo.form');
        }
        elseif ($ket=="transaksi") {
            return view('file_master_data.file_transaksi.transaksi');
        }
        elseif ($ket=="balance-stok-apotek") {
            return view('file_master_data.file_balance_stok_apotek.form');
        }
        elseif ($ket=="barang-masuk-apotek") {
            return view('file_master_data.file_barang_masuk_apotek.form');
        }
        elseif ($ket=="barang-keluar-apotek") {
            return view('file_master_data.file_barang_keluar_apotek.form');
        }
        elseif ($ket=="permintaan-produk-treatment") {
            return view('file_master_data.file_permintaan_produk_treatment.form');
        }
        
    	
    }

    public function data(Request $request, $ket, $aksi, $name ){
    	if ($ket=="home") {
            return view('adm.home');
        }

        elseif ($ket=="treatment") {
            if ($name == 'kode') {
                $data = DB::table('tabel_treatment')
                    ->select(DB::raw('CONCAT("TRM-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(tabel_treatment.kode_treatment,5,5)))+1,1)),4)) as kode_treatment'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_treatment'        => 'required',
                    'nama_treatment'        => 'required|unique:tabel_treatment',
                    'kategori'              => 'required',
                    'kategori_treatment'    => 'required'
                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{
                DB::table('tabel_treatment')
                    ->insert([
                        ['kode_treatment'       => $request->get('kode_treatment'), 
                         'nama_treatment'       => $request->get('nama_treatment'),
                         'harga'                => $request->get('harga'),
                         'dis_umum'             => $request->get('dis_umum'),
                         'dis_family'           => $request->get('dis_family'),
                         'dis_student'          => $request->get('dis_student'),
                         'dis_vip'              => $request->get('dis_vip'),
                         'dis_karyawan'         => $request->get('dis_karyawan'),
                         'kategori'             => $request->get('kategori'),
                         'kategori_treatment'   => $request->get('kategori_treatment'),
                         'keterangan'           => $request->get('keterangan'),
                         'waktu_buat'           => date('Y-m-d H:i:s'),
                         'user'                 => Auth::user()->name,
                         'kode_cabang'          => Auth::user()->kode_cabang
                        ]
                ]);

                return DB::table('tabel_treatment')->orderBy('nama_treatment','asc')->paginate();
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_treatment')
                    ->select('kode_treatment as kode_treatment','nama_treatment','harga as harga1','dis_umum','dis_family','dis_student','dis_vip','dis_karyawan','kategori','kategori_treatment','keterangan')
                    ->where('tabel_treatment.kode_treatment', '=', $aksi)
                    ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_treatment'        => 'required',
                    'nama_treatment'        => 'required',
                    'kategori'              => 'required',
                    'kategori_treatment'    => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;   
                }
                else{
                    
                    DB::table('tabel_treatment')
                        ->where('kode_treatment',$request->get('kode_treatment'))
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->update(
                            ['nama_treatment'        => $request->get('nama_treatment'),
                             'harga'                 => $request->get('harga1'),
                             'dis_umum'              => $request->get('dis_umum'),
                             'dis_family'            => $request->get('dis_family'),
                             'dis_student'           => $request->get('dis_student'),
                             'dis_vip'               => $request->get('dis_vip'),
                             'dis_karyawan'          => $request->get('dis_karyawan'),
                             'kategori'              => $request->get('kategori'),
                             'kategori_treatment'    => $request->get('kategori_treatment'),
                             'keterangan'            => $request->get('keterangan'),
                             'waktu_edit'            => date('Y-m-d H:i:s'),
                             'user'                 => Auth::user()->name,
                             'kode_cabang'          => Auth::user()->kode_cabang
                            
                    ]);

                    return DB::table('tabel_treatment')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_treatment','asc')
                            ->paginate();
                }
            }
            elseif ($name == 'hapus') {
                DB::table('tabel_treatment')
                ->where('kode_treatment', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                DB::table('tabel_produk_treatment')
                ->where('kode_treatment', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();   
                return DB::table('tabel_treatment')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_treatment','asc')
                        ->paginate(7);
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_treatment')
                            ->where("nama_treatment", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_treatment', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_treatment')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_treatment', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_treatment')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_treatment','asc')
                        ->paginate(7);
                }
            }	
    	}

        elseif ($ket=="ruangan") {
            if ($name == 'kode') {
                $data = DB::table('tabel_ruangan')
                    ->select(DB::raw('CONCAT("RW-",right(CONCAT("000000000",IFNULL(MAX(ABS(mid(tabel_ruangan.kode_ruangan,10,10)))+1,1)),9)) as kode_ruangan'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_ruangan'        => 'required',
                    'nama_ruangan'        => 'required|unique:tabel_ruangan'
                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{
                DB::table('tabel_ruangan')
                    ->insert([
                        ['kode_ruangan'         => $request->get('kode_ruangan'), 
                         'nama_ruangan'         => $request->get('nama_ruangan'),
                         'keterangan'           => $request->get('keterangan'),
                         'created_at'           => date('Y-m-d H:i:s'),
                         'user'                 => Auth::user()->name,
                         'kode_cabang'          => Auth::user()->kode_cabang
                        ]
                ]);

                return DB::table('tabel_ruangan')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_ruangan','asc')
                        ->paginate();
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_ruangan')
                    ->select('kode_ruangan as kode_ruangan','nama_ruangan','keterangan')
                    ->where('tabel_ruangan.kode_ruangan', '=', $aksi)
                    ->where('tabel_ruangan.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_ruangan'        => 'required',
                    'nama_ruangan'        => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;   
                }
                else{
                    
                    DB::table('tabel_ruangan')
                        ->where('kode_ruangan',$request->get('kode_ruangan'))
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->update(
                            ['nama_ruangan'         => $request->get('nama_ruangan'),
                             'keterangan'           => $request->get('keterangan'),
                             'updated_at'           => date('Y-m-d H:i:s'),
                             'user'                 => Auth::user()->name    
                    ]);

                    return DB::table('tabel_ruangan')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_ruangan','asc')
                            ->paginate();
                }
            }
            elseif ($name == 'hapus') {
                DB::table('tabel_ruangan')
                    ->where('kode_ruangan', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();
                return DB::table('tabel_ruangan')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_ruangan','asc')
                        ->paginate();
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_ruangan')
                            ->where("nama_ruangan", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_ruangan', 'asc')
                            ->paginate());
                    }
                    else{
                        return response(DB::table('tabel_ruangan')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_ruangan', 'asc')
                            ->paginate());
                    } 
                }
                else{
                    return DB::table('tabel_ruangan')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_ruangan','asc')
                            ->paginate();
                }
            }   
        }

        elseif ($ket=="produk") {
            if ($name == 'kode') {
                $data = DB::table('tabel_produk')
                    ->select(DB::raw('CONCAT("PRD-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_produk,5,5)))+1,1)),4)) as kode_produk'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_produk'       => 'required',
                    'nama_produk'       => 'required|unique:tabel_produk',
                    'satuan'            => 'required',
                    'jenis_promo'       => 'required',
                    'kategori_produk'   => 'required',
                    'item_produk'       => 'required'

                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    if ($request->get('dalam_stok')>0) {

                        $tgl            = explode('T', $request->get('exd'));

                        $bln= mktime(0,0,0, date('m')+2,date('d'),date('Y'));
                        
                        $exd_min        = date('Y-m-d',$bln);;
                        
                        if ($tgl['0']<=$exd_min) {
                            $arr['errors'] = 'Expired tidak di izinkan';
                            return $arr;   
                        }

                        DB::table('tabel_stok_produk')
                            ->insert([
                                    'id_detail_transaksi'   => '1', 
                                    'id_produk'             => $request->get('kode_produk'),
                                    'tgl'                   => date('Y-m-d'),
                                    'exd'                   => $request->get('exd'),
                                    'masuk'                 => $request->get('dalam_stok'),
                                    'keluar'                => '0',
                                    'kode_cabang'           => Auth::user()->kode_cabang,
                                    'user'                  => Auth::user()->name,
                                    'waktu'                 => date('Y-m-d H:i:s'),
                                    'keterangan'            => 'Penginputan pertama dalam setok' 
                            ]);
                    }

                    DB::table('tabel_produk')
                        ->insert([
                                'kode_produk'          => $request->get('kode_produk'), 
                                'nama_produk'          => $request->get('nama_produk'),
                                'harga'                => $request->get('harga'),
                                'satuan'               => $request->get('satuan'),
                                'pemakaian'            => $request->get('pemakaian'),
                                'berat'                => $request->get('berat'),
                                'jenis_promo'          => $request->get('jenis_promo'),
                                'kategori_produk'      => $request->get('kategori_produk'),
                                'dis_umum'             => $request->get('dis_umum'),
                                'dis_family'           => $request->get('dis_family'),
                                'dis_student'          => $request->get('dis_student'),
                                'dis_vip'              => $request->get('dis_vip'),
                                'dis_karyawan'         => $request->get('dis_karyawan'),
                                'item_produk'          => $request->get('item_produk'),
                                'kode_cabang'          => Auth::user()->kode_cabang,
                                'user'                 => Auth::user()->name,
                                'waktu'                => date('Y-m-d H:i:s')
                        ]);

                    return DB::table('tabel_produk')
                            ->orderBy('nama_produk','asc')
                            ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                            ->paginate();
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_produk')
                    ->select('kode_produk','nama_produk','harga as harga1','satuan','pemakaian','berat','jenis_promo','kategori_produk','dis_umum','dis_family','dis_student','dis_vip','dis_karyawan','item_produk')
                    ->where('kode_produk', '=', $aksi)
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_produk'       => 'required',
                    'nama_produk'       => 'required',
                    'satuan'            => 'required',
                    'jenis_promo'       => 'required',
                    'kategori_produk'   => 'required',
                    'item_produk'       => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;   
                }
                else{
                    
                    return DB::table('tabel_produk')
                        ->where('kode_produk',$request->get('kode_produk'))
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->update(
                            ['nama_produk'          => $request->get('nama_produk'),
                             'harga'                => $request->get('harga1'),
                             'satuan'               => $request->get('satuan'),
                             'pemakaian'            => $request->get('pemakaian'),
                             'berat'                => $request->get('berat'),
                             'jenis_promo'          => $request->get('jenis_promo'),
                             'kategori_produk'      => $request->get('kategori_produk'),
                             'dis_umum'             => $request->get('dis_umum'),
                             'dis_family'           => $request->get('dis_family'),
                             'dis_student'          => $request->get('dis_student'),
                             'dis_vip'              => $request->get('dis_vip'),
                             'dis_karyawan'         => $request->get('dis_karyawan'),
                             'item_produk'          => $request->get('item_produk'),
                             'kode_cabang'          => Auth::user()->kode_cabang, 
                             'user'                 => Auth::user()->name,
                             'waktu'                => date('Y-m-d H:i:s')
                    ]);
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_stok_produk')
                    ->where('id_produk', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                return DB::table('tabel_produk')
                        ->where('kode_produk', '=', $aksi)
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->delete();
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_produk')
                            ->where("nama_produk", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_produk', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_produk')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_produk', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_produk')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_produk','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="paket-produk") {
            if ($name == 'kode') {
                $data = DB::table('tabel_paket_produk')
                    ->select(DB::raw('CONCAT("PRP-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_paket,5,5)))+1,1)),4)) as kode_paket'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_paket'        => 'required',
                    'nama_paket'        => 'required|unique:tabel_paket_produk'
                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                DB::table('tabel_paket_produk')
                    ->insert([
                        ['kode_paket'         => $request->get('kode_paket'), 
                         'nama_paket'         => $request->get('nama_paket'),
                         'harga_paket'        => $request->get('harga'),
                         'dis_umum'           => $request->get('dis_umum'),
                         'dis_family'         => $request->get('dis_family'),
                         'dis_student'        => $request->get('dis_student'),
                         'dis_vip'            => $request->get('dis_vip'),
                         'kode_cabang'        => Auth::user()->kode_cabang,
                         'user'               => Auth::user()->name,
                         'waktu'              => date('Y-m-d H:i:s')
                        ]
                ]);

                return DB::table('tabel_paket_produk')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_paket','asc')
                        ->paginate(7);
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_paket_produk')
                    ->select('kode_paket','nama_paket','dis_umum','dis_family','dis_student','dis_vip','harga_paket as harga1')
                    ->where('kode_paket', '=', $aksi)
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_paket'        => 'required',
                    'nama_paket'        => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;   
                }
                else{
                    
                    return DB::table('tabel_paket_produk')
                            ->where('kode_paket',$request->get('kode_paket'))
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->update(
                                ['kode_paket'         => $request->get('kode_paket'), 
                                 'nama_paket'         => $request->get('nama_paket'),
                                 'harga_paket'        => $request->get('harga1'),
                                 'dis_umum'           => $request->get('dis_umum'),
                                 'dis_family'         => $request->get('dis_family'),
                                 'dis_student'        => $request->get('dis_student'),
                                 'dis_vip'            => $request->get('dis_vip'),
                                 'kode_cabang'        => Auth::user()->kode_cabang,
                                 'user'               => Auth::user()->name,
                                 'waktu'              => date('Y-m-d H:i:s')
                                ]);
                }
            }
            elseif ($name == 'hapus') {
                    DB::table('tabel_detail_paket_produk')
                    ->where('kode_paket', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                return DB::table('tabel_paket_produk')
                        ->where('kode_paket', '=', $aksi)
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->delete(7);
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_paket_produk')
                            ->where("nama_paket", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_paket', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_paket_produk')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_paket', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_paket_produk')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_paket','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="sub-paket-produk") {
            
            if ($name == 'kode') {
                $data = DB::table('tabel_detail_paket_produk')
                ->select(DB::raw('CONCAT("SPP-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_detail_paket,5,5)))+1,1)),4)) as kode_detail_paket'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                foreach ($data as $key => $value) {
                    $file = array(
                        $key                => $value,
                        'kode_paket'    => $aksi
                    );
                }
                return \Response::json($file);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_detail_paket'     => 'required',
                    'jumlah'                => 'required',
                    'kode_paket'            => 'required',
                    'kode_produk'           => 'required',
                    'nama_produk'           => 'required'
                );
                $dbcek = DB::table('tabel_detail_paket_produk')
                ->select('kode_detail_paket')
                ->where('kode_cabang',  '=', auth::user()->kode_cabang)
                ->where('kode_produk',  '=', $request->get('kode_produk'))
                ->where('kode_paket',   '=', $request->get('kode_paket'))
                ->first();

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if (empty($dbcek)) {
                         DB::table('tabel_detail_paket_produk')
                        ->insert([
                            ['kode_detail_paket'    => $request->get('kode_detail_paket'), 
                             'kode_paket'           => $request->get('kode_paket'),
                             'kode_produk'          => $request->get('kode_produk'),
                             'jumlah'               => $request->get('jumlah'),
                             'keterangan'           => $request->get('keterangan'),
                             'kode_cabang'          => Auth::user()->kode_cabang,
                             'user'                 => Auth::user()->name,
                             'waktu'                => date('Y-m-d H:i:s')
                            ]
                        ]);
                        $data = DB::table('tabel_detail_paket_produk')
                        ->select('kode_detail_paket')
                        ->where('kode_cabang',  '=', auth::user()->kode_cabang)
                        ->where('kode_produk',  '=', $request->get('kode_produk'))
                        ->where('kode_paket',   '=', $request->get('kode_paket'))
                        ->first();
                        return response()->json($data);
                    }
                    else{
                        $arr['errors'] = 'Produk sudah ada';
                        return $arr;
                    }

                   
                }
            }
            elseif ($name == 'hapus') {
                return DB::table('tabel_detail_paket_produk')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();
            }
            elseif ($name == 'paging') {  
                $detail=DB::table('tabel_detail_paket_produk')
                ->join('tabel_produk', function ($join) {
                    $join->on('tabel_produk.kode_produk', '=', 'tabel_detail_paket_produk.kode_produk');
                })
                ->where('tabel_detail_paket_produk.kode_paket', '=', $aksi)
                ->where('tabel_detail_paket_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_detail_paket_produk.jumlah', 'tabel_detail_paket_produk.keterangan', 'tabel_detail_paket_produk.id')
                ->orderby('tabel_produk.nama_produk', 'asc')
                ->paginate(5);

                $tr = DB::table('tabel_paket_produk')
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('kode_paket', '=', $aksi)
                ->select('nama_paket')
                ->first();
                foreach ($tr as $key => $value) {
                    $tr = $value;
                }
                $data['data']['detail'] = $detail;
                $data['data']['kode_paket'] = $aksi;
                $data['data']['nama_paket'] = $tr;
                return response()->json($data);
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data = DB::table('tabel_paket_produk')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where('nama_paket', 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_paket', 'nama_paket')
                        ->orderBy('nama_paket','asc')
                        ->paginate();                          

                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_detail_paket_produk')
                                ->join('tabel_produk', function ($join) {
                                    $join->on('tabel_produk.kode_produk', '=', 'tabel_detail_paket_produk.kode_produk');
                                })
                                ->where('tabel_detail_paket_produk.kode_paket', '=', $value->kode_paket)
                                ->where('tabel_detail_paket_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_detail_paket_produk.jumlah', 'tabel_detail_paket_produk.keterangan', 'tabel_detail_paket_produk.id')
                                ->orderby('tabel_produk.nama_produk', 'asc')
                                ->paginate(5);
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }
                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return); 
                    }
                    else{
                        $data = DB::table('tabel_paket_produk')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where($request->get('par'), 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_paket', 'nama_paket')
                        ->orderBy('nama_paket','asc')
                        ->paginate();                          

                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_detail_paket_produk')
                                ->join('tabel_produk', function ($join) {
                                    $join->on('tabel_produk.kode_produk', '=', 'tabel_detail_paket_produk.kode_produk');
                            })
                            ->where('tabel_detail_paket_produk.kode_paket', '=', $value->kode_paket)
                            ->where('tabel_detail_paket_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_detail_paket_produk.jumlah', 'tabel_detail_paket_produk.keterangan', 'tabel_detail_paket_produk.id')
                            ->orderby('tabel_produk.nama_produk', 'asc')
                            ->paginate(5);
                            
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }

                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return);
                    } 
                }
                else{
                    $data = DB::table('tabel_paket_produk')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->select('kode_paket', 'nama_paket')
                    ->orderBy('nama_paket','asc')
                    ->paginate();                          

                    foreach ($data as $key => $value) {
                        $detail=DB::table('tabel_detail_paket_produk')
                            ->join('tabel_produk', function ($join) {
                                $join->on('tabel_produk.kode_produk', '=', 'tabel_detail_paket_produk.kode_produk');
                            })
                            ->where('tabel_detail_paket_produk.kode_paket', '=', $value->kode_paket)
                            ->where('tabel_detail_paket_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_detail_paket_produk.jumlah', 'tabel_detail_paket_produk.keterangan', 'tabel_detail_paket_produk.id')
                            ->orderby('tabel_produk.nama_produk', 'asc')
                            ->paginate(5);
                        $produk_treatment=$value;
                        $produk_treatment->detail=$detail;
                        $return['data'][]=$produk_treatment;
                    }
                    if (empty($return)) {
                        $return['errors'] = 'Field Tidak Boleh Kosong';
                    }
                    return response()->json($return);                 
                }
            }   
        }

        elseif ($ket=="produk-treatment") {
            if ($name == 'kode') {
                $data = DB::table('tabel_produk_treatment')
                ->select(DB::raw('CONCAT("PRT-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_produk_treatment,5,5)))+1,1)),4)) as kode_produk_treatment'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                foreach ($data as $key => $value) {
                    $file = array(
                        $key                => $value,
                        'kode_treatment'    => $aksi
                    );
                }
                return \Response::json($file);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_produk_treatment'         => 'required',
                    'nama_produk'                   => 'required',
                    'kode_treatment'                => 'required',
                    'kode_produk'                   => 'required'
                );

                $dbcek = DB::table('tabel_produk_treatment')
                ->select('kode_treatment')
                ->where('kode_cabang', '=', auth::user()->kode_cabang)
                ->where('kode_produk', '=', $request->get('kode_produk'))
                ->where('kode_treatment', '=', $request->get('kode_treatment'))
                ->first();

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;
                }
                else{
                    if (empty($dbcek)) {
                        DB::table('tabel_produk_treatment')
                        ->insert([
                            ['kode_produk_treatment'    => $request->get('kode_produk_treatment'), 
                             'kode_treatment'           => $request->get('kode_treatment'),
                             'kode_produk'              => $request->get('kode_produk'),
                             'keterangan'               => $request->get('keterangan'),
                             'kode_cabang'              => Auth::user()->kode_cabang,
                             'user'                     => Auth::user()->name,
                             'waktu'                    => date('Y-m-d H:i:s')
                            ]
                        ]);

                        $data = DB::table('tabel_produk_treatment')
                        ->select('kode_treatment')
                        ->where('kode_cabang', '=', auth::user()->kode_cabang)
                        ->where('kode_produk', '=', $request->get('kode_produk'))
                        ->where('kode_treatment', '=', $request->get('kode_treatment'))
                        ->first();

                        return response()->json($data);

                    }
                    else{
                        $arr['errors'] = 'Produk sudah ada';
                        return $arr;
                    }
                }
            }

            elseif ($name == 'hapus') {
                return DB::table('tabel_produk_treatment')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();
            }

            elseif ($name == 'paging') {  
                $detail=DB::table('tabel_produk_treatment')
                ->join('tabel_produk', function ($join) {
                    $join->on('tabel_produk.kode_produk', '=', 'tabel_produk_treatment.kode_produk');
                })
                ->where('tabel_produk_treatment.kode_treatment', '=', $aksi)
                ->where('tabel_produk_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk_treatment.keterangan', 'tabel_produk_treatment.id')
                ->orderby('tabel_produk.nama_produk', 'asc')
                ->paginate(5);

                $tr = DB::table('tabel_treatment')
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('kode_treatment', '=', $aksi)
                ->select('nama_treatment')
                ->first();
                foreach ($tr as $key => $value) {
                    $tr = $value;
                }
                $data['data']['detail'] = $detail;
                $data['data']['kode_treatment'] = $aksi;
                $data['data']['nama_treatment'] = $tr;
                return response()->json($data);
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data = DB::table('tabel_treatment')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where('nama_treatment', 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_treatment', 'nama_treatment')
                        ->orderBy('nama_treatment','asc')
                        ->paginate(5);                          


                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_produk_treatment')
                                ->join('tabel_produk', function ($join) {
                                    $join->on('tabel_produk.kode_produk', '=', 'tabel_produk_treatment.kode_produk');
                                })
                                ->where('tabel_produk_treatment.kode_treatment', '=', $value->kode_treatment)
                                ->where('tabel_produk_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk_treatment.keterangan', 'tabel_produk_treatment.id')
                                ->orderby('tabel_produk.nama_produk', 'asc')
                                ->paginate(5);
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }
                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return); 
                    }
                    else{
                        $data = DB::table('tabel_treatment')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where($request->get('par'), 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_treatment', 'nama_treatment')
                        ->orderBy('nama_treatment','asc')
                        ->paginate(5);                          
                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_produk_treatment')
                                ->join('tabel_produk', function ($join) {
                                    $join->on('tabel_produk.kode_produk', '=', 'tabel_produk_treatment.kode_produk');
                                })
                                ->where('tabel_produk_treatment.kode_treatment', '=', $value->kode_treatment)
                                ->where('tabel_produk_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk_treatment.keterangan', 'tabel_produk_treatment.id')
                                ->orderby('tabel_produk.nama_produk', 'asc')
                                ->paginate(5);
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }
                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return); 
                    } 
                }
                else{
                    $data = DB::table('tabel_treatment')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->select('kode_treatment', 'nama_treatment')
                    ->orderBy('nama_treatment','asc')
                    ->paginate(5);                          

                    foreach ($data as $key => $value) {
                        $detail=DB::table('tabel_produk_treatment')
                            ->join('tabel_produk', function ($join) {
                                $join->on('tabel_produk.kode_produk', '=', 'tabel_produk_treatment.kode_produk');
                            })
                            ->where('tabel_produk_treatment.kode_treatment', '=', $value->kode_treatment)
                            ->where('tabel_produk_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk_treatment.keterangan', 'tabel_produk_treatment.id')
                            ->orderby('tabel_produk.nama_produk', 'asc')
                            ->paginate(5);
                        $produk_treatment=$value;
                        $produk_treatment->detail=$detail;
                        $return['data'][]=$produk_treatment;
                    }
                    return response()->json($return);                 
                }
            }   
        }

        elseif ($ket=="paket-treatment") {
            if ($name == 'kode') {
                $data = DB::table('tabel_paket')
                    ->select(DB::raw('CONCAT("AuT-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_paket,5,5)))+1,1)),4)) as kode_paket'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_paket'        => 'required',
                    'keterangan'        => 'required',
                    'jenis_paket'       => 'required',
                    'nama_paket'        => 'required|unique:tabel_paket'
                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                DB::table('tabel_paket')
                    ->insert([
                        ['kode_paket'         => $request->get('kode_paket'), 
                         'nama_paket'         => $request->get('nama_paket'),
                         'harga_paket'        => $request->get('harga_paket'),
                         'dis_umum'           => $request->get('dis_umum'),
                         'dis_family'         => $request->get('dis_family'),
                         'dis_student'        => $request->get('dis_student'),
                         'dis_vip'            => $request->get('dis_vip'),
                         'keterangan'         => $request->get('keterangan'),
                         'jenis_paket'        => $request->get('jenis_paket'),
                         'kode_cabang'        => Auth::user()->kode_cabang,
                         'user'               => Auth::user()->name,
                         'waktu'              => date('Y-m-d H:i:s')
                        ]
                ]);

                return DB::table('tabel_paket')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->orderBy('nama_paket','asc')
                        ->paginate(1);
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_paket')
                    ->select('kode_paket','nama_paket','dis_umum','dis_family','dis_student','dis_vip','harga_paket as harga_paket', 'keterangan as keterangan', 'jenis_paket')
                    ->where('kode_paket', '=', $aksi)
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();
                return \Response::json($data);
            }

            elseif ($name == 'update') {
               $Valid = array(
                    'kode_paket'        => 'required',
                    'keterangan'        => 'required',
                    'jenis_paket'       => 'required',
                    'nama_paket'        => 'required'
                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    return DB::table('tabel_paket')
                            ->where('kode_paket',$request->get('kode_paket'))
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->update(
                                ['kode_paket'         => $request->get('kode_paket'), 
                                 'nama_paket'         => $request->get('nama_paket'),
                                 'harga_paket'        => $request->get('harga_paket'),
                                 'dis_umum'           => $request->get('dis_umum'),
                                 'dis_family'         => $request->get('dis_family'),
                                 'dis_student'        => $request->get('dis_student'),
                                 'dis_vip'            => $request->get('dis_vip'),
                                 'keterangan'         => $request->get('keterangan'),
                                 'jenis_paket'        => $request->get('jenis_paket'),
                                 'kode_cabang'        => Auth::user()->kode_cabang,
                                 'user'               => Auth::user()->name,
                                 'waktu'              => date('Y-m-d H:i:s')
                                ]);
                }
            }

            elseif ($name == 'hapus') {
                    DB::table('tabel_paket')
                    ->where('kode_paket', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                return DB::table('tabel_paket')
                        ->where('kode_paket', '=', $aksi)
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->delete();
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_paket')
                            ->where("nama_paket", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_paket', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_paket')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_paket', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_paket')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_paket','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="sub-paket-treatment") {
            
            if ($name == 'kode') {
                $data = DB::table('tabel_detail_paket')
                ->select(DB::raw('CONCAT("SPT-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_detail_paket,5,5)))+1,1)),4)) as kode_detail_paket'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                foreach ($data as $key => $value) {
                    $file = array(
                        $key                => $value,
                        'kode_paket'    => $aksi
                    );
                }
                return \Response::json($file);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_detail_paket'     => 'required',
                    'jumlah'                => 'required',
                    'kode_paket'            => 'required',
                    'kode_treatment'        => 'required',
                    'nama_treatment'        => 'required'
                );
                $dbcek = DB::table('tabel_detail_paket')
                ->select('kode_detail_paket')
                ->where('kode_cabang',      '=', auth::user()->kode_cabang)
                ->where('kode_treatment',   '=', $request->get('kode_treatment'))
                ->where('kode_paket',       '=', $request->get('kode_paket'))
                ->first();

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if (empty($dbcek)) {
                         DB::table('tabel_detail_paket')
                        ->insert([
                            ['kode_detail_paket'    => $request->get('kode_detail_paket'), 
                             'kode_paket'           => $request->get('kode_paket'),
                             'kode_treatment'       => $request->get('kode_treatment'),
                             'jumlah'               => $request->get('jumlah'),
                             'keterangan'           => $request->get('keterangan'),
                             'kode_cabang'          => Auth::user()->kode_cabang,
                             'user'                 => Auth::user()->name,
                             'waktu'                => date('Y-m-d H:i:s')
                            ]
                        ]);
                        $data = DB::table('tabel_detail_paket')
                        ->select('kode_detail_paket')
                        ->where('kode_cabang',      '=', auth::user()->kode_cabang)
                        ->where('kode_treatment',   '=', $request->get('kode_treatment'))
                        ->where('kode_paket',       '=', $request->get('kode_paket'))
                        ->first();
                        return response()->json($data);
                    }
                    else{
                        $arr['errors'] = 'Produk sudah ada';
                        return $arr;
                    }
                }
            }
            elseif ($name == 'hapus') {
                return DB::table('tabel_detail_paket')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();
            }
            elseif ($name == 'paging') {  
                $detail=DB::table('tabel_detail_paket')
                ->join('tabel_treatment', function ($join) {
                    $join->on('tabel_treatment.kode_treatment', '=', 'tabel_detail_paket.kode_treatment');
                })
                ->where('tabel_detail_paket.kode_paket', '=', $aksi)
                ->where('tabel_detail_paket.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_detail_paket.jumlah', 'tabel_detail_paket.keterangan', 'tabel_detail_paket.id')
                ->orderby('tabel_treatment.nama_treatment', 'asc')
                ->paginate(5);

                $tr = DB::table('tabel_paket')
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('kode_paket', '=', $aksi)
                ->select('nama_paket')
                ->first();

                foreach ($tr as $key => $value) {
                    $tr = $value;
                }
                $data['data']['detail'] = $detail;
                $data['data']['kode_paket'] = $aksi;
                $data['data']['nama_paket'] = $tr;
                return response()->json($data);
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data = DB::table('tabel_paket')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where('nama_paket', 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_paket', 'nama_paket')
                        ->orderBy('nama_paket','asc')
                        ->paginate();                          

                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_detail_paket')
                            ->join('tabel_treatment', function ($join) {
                                $join->on('tabel_treatment.kode_treatment', '=', 'tabel_detail_paket.kode_treatment');
                            })
                            ->where('tabel_detail_paket.kode_paket', '=', $value->kode_paket)
                            ->where('tabel_detail_paket.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_detail_paket.jumlah', 'tabel_detail_paket.keterangan', 'tabel_detail_paket.id')
                            ->orderby('tabel_treatment.nama_treatment', 'asc')
                            ->paginate(5);
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }
                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return); 
                    }
                    else{
                        $data = DB::table('tabel_paket')
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->where($request->get('par'), 'LIKE', "%{$request->get('search')}%")
                        ->select('kode_paket', 'nama_paket')
                        ->orderBy('nama_paket','asc')
                        ->paginate();                          

                        foreach ($data as $key => $value) {
                            $detail=DB::table('tabel_detail_paket')
                            ->join('tabel_treatment', function ($join) {
                                $join->on('tabel_treatment.kode_treatment', '=', 'tabel_detail_paket.kode_treatment');
                            })
                            ->where('tabel_detail_paket.kode_paket', '=', $value->kode_paket)
                            ->where('tabel_detail_paket.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_detail_paket.jumlah', 'tabel_detail_paket.keterangan', 'tabel_detail_paket.id')
                            ->orderby('tabel_treatment.nama_treatment', 'asc')
                            ->paginate(5);
                            
                            $produk_treatment=$value;
                            $produk_treatment->detail=$detail;
                            $return['data'][]=$produk_treatment;
                        }

                        if (empty($return)) {
                            $return['errors'] = 'Field Tidak Boleh Kosong';
                        }
                        return response()->json($return);
                    } 
                }
                else{
                    $data = DB::table('tabel_paket')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->select('kode_paket', 'nama_paket')
                    ->orderBy('nama_paket','asc')
                    ->paginate();                          

                    foreach ($data as $key => $value) {
                        $detail=DB::table('tabel_detail_paket')
                            ->join('tabel_treatment', function ($join) {
                                $join->on('tabel_treatment.kode_treatment', '=', 'tabel_detail_paket.kode_treatment');
                            })
                            ->where('tabel_detail_paket.kode_paket', '=', $value->kode_paket)
                            ->where('tabel_detail_paket.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                            ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_detail_paket.jumlah', 'tabel_detail_paket.keterangan', 'tabel_detail_paket.id')
                            ->orderby('tabel_treatment.nama_treatment', 'asc')
                            ->paginate(5);
                        $produk_treatment=$value;
                        $produk_treatment->detail=$detail;
                        $return['data'][]=$produk_treatment;
                    }
                    if (empty($return)) {
                        $return['errors'] = 'Field Tidak Boleh Kosong';
                    }
                    return response()->json($return);                 
                }
            }   
        }

        elseif ($ket=="member") {
            if ($name == 'kode') {
                $data = DB::table('tabel_member')
                ->select(DB::raw('CONCAT("AC/'.date('m').'/'.date('Y').'/",right(CONCAT("000",IFNULL(MAX(ABS(mid(tabel_member.id_member,12,3)))+1,1)),3)) as id_member'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->whereMonth('waktu', '=', date('m'))
                ->whereYear('waktu', '=', date('Y'))
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'id_member'     => 'required|unique:tabel_member',
                    'nama_member'   => 'required',
                    'tgl_lahir'     => 'required',
                    'jenis_kelamin' => 'required',
                    'agama'         => 'required',
                    'alamat'        => 'required',
                    'biaya'         => 'required',
                    'informasi'     => 'required',
                    'tgl_gabung'    => 'required',
                    'jenis_member'  => 'required',
                    'pekerjaan'     => 'required'

                );
                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if ($request->get('informasi') == 'Rekom Customer') {
                        $Valid = array(
                            'kode_member_rekom'     => 'required'
                        );

                        $validator = \Validator::make($request->all(),$Valid);
                        if ($validator->fails()) {
                            foreach ($validator->errors()->all() as $key => $value) {
                                $msg[] = $value;
                            }
                            $arr['errors'] = $arr['errors'] = 'Data gagal di simpan, Rekom member belum di isi';
                            return $arr;      
                        }
                    }

                    DB::table('tabel_member')
                        ->insert(
                            [
                            'id_member'         => $request->get('id_member'), 
                            'nama_member'       => $request->get('nama_member'),
                            'tgl_lahir'         => $request->get('tgl_lahir'),
                            'jk'                => $request->get('jenis_kelamin'),
                            'agama'             => $request->get('agama'),
                            'alamat'            => $request->get('alamat'),
                            'pekerjaan'         => $request->get('pekerjaan'),
                            'riwayat_treatment' => $request->get('informasi'),
                            'tgl_pendaftaran'   => $request->get('tgl_gabung'),
                            'biaya'             => $request->get('biaya'),
                            'jenis_member'      => $request->get('jenis_member'),
                            'user'              => Auth::user()->name,
                            'kode_cabang'       => Auth::user()->kode_cabang,
                            'waktu'             => date('Y-m-d H:i:s'),
                            'no_handpone'       => $request->get('no_hp'),
                            'kode_member'       => $request->get('kode_member_rekom')
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_member')
                ->select('id_member', 'nama_member', 'tgl_lahir', 'jk as jenis_kelamin', 'agama', 'alamat', 'pekerjaan', 'riwayat_treatment as informasi', 'tgl_pendaftaran as tgl_gabung', 'biaya', 'jenis_member', 'kode_member', 'no_handpone as no_hp')
                ->where('id', '=', $aksi)
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                foreach ($data as $key => $value) {
                    $data1[$key] = $value; 
                }

                if (!empty($data1['kode_member'])) {
                    $member_rekom = DB::table('tabel_member')
                    ->select('nama_member')
                    ->where('id_member', '=', $data1['kode_member'])
                    ->first();

                    foreach ($member_rekom as $key => $value) {
                        $data1['member_rekom']      = $value;
                    }

                    $data1['kode_member_rekom'] = $data1['kode_member'];
                }
                 

                return \Response::json($data1);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'id_member'     => 'required',
                    'nama_member'   => 'required',
                    'tgl_lahir'     => 'required',
                    'jenis_kelamin' => 'required',
                    'agama'         => 'required',
                    'alamat'        => 'required',
                    'biaya'         => 'required',
                    'informasi'     => 'required',
                    'tgl_gabung'    => 'required',
                    'jenis_member'  => 'required',
                    'pekerjaan'     => 'required'

                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{
                    if ($request->get('informasi') == 'Rekom Customer') {
                        $Valid = array(
                            'kode_member_rekom'     => 'required'
                        );

                        $validator = \Validator::make($request->all(),$Valid);
                        if ($validator->fails()) {
                            $arr['errors'] = 'Data gagal di ubah, Rekom member belum di isi';
                            return $arr;      
                        }
                    }

                    DB::table('tabel_member')
                    ->where('id_member', $request->get('id_member'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'nama_member'       => $request->get('nama_member'),
                        'tgl_lahir'         => $request->get('tgl_lahir'),
                        'jk'                => $request->get('jenis_kelamin'),
                        'agama'             => $request->get('agama'),
                        'alamat'            => $request->get('alamat'),
                        'pekerjaan'         => $request->get('pekerjaan'),
                        'riwayat_treatment' => $request->get('informasi'),
                        'tgl_pendaftaran'   => $request->get('tgl_gabung'),
                        'biaya'             => $request->get('biaya'),
                        'jenis_member'      => $request->get('jenis_member'),
                        'user'              => Auth::user()->name,
                        'kode_cabang'       => Auth::user()->kode_cabang,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'no_handpone'       => $request->get('no_hp'),
                        'kode_member'       => $request->get('kode_member_rekom')
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_member')
                    ->where('id', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                return DB::table('tabel_member')
                        ->where('id_member', '=', $aksi)
                        ->where('kode_cabang',Auth::user()->kode_cabang)
                        ->delete();
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_member')
                            ->where("nama_member", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_member', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_member')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama_member', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_member')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama_member','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="non-member") {
            if ($name == 'kode') {
                $data = DB::table('tabel_non_member')
                ->select(DB::raw('CONCAT("ACNM-",right(CONCAT("000000000",IFNULL(MAX(ABS(mid(tabel_non_member.kode,6,9)))+1,1)),9)) as kode_pasien'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_pasien'       => 'required',
                    'nama_pasien'       => 'required',
                    'tgl_lahir'         => 'required',
                    'jenis_kelamin'     => 'required',
                    'agama'             => 'required',
                    'pekerjaan'         => 'required',
                    'no_hp'             => 'required',
                    'tanggal_kunjungan' => 'required',
                    'alamat'            => 'required',
                    'informasi'         => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    DB::table('tabel_non_member')
                        ->insert(
                            [
                            'kode'          => $request->get('kode_pasien'), 
                            'nama'          => $request->get('nama_pasien'),
                            'jenis_kelamin' => $request->get('jenis_kelamin'),
                            'alamat'        => $request->get('alamat'),
                            'no_handpone'   => $request->get('no_hp'),
                            'tgl'           => $request->get('tanggal_kunjungan'),
                            'tgl_lahir'     => $request->get('tgl_lahir'),
                            'agama'         => $request->get('agama'),
                            'pekerjaan'     => $request->get('pekerjaan'),
                            'informasi'     => $request->get('informasi'),
                            'user'          => Auth::user()->name,
                            'kode_cabang'   => Auth::user()->kode_cabang,
                            'waktu'         => date('Y-m-d H:i:s')
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_non_member')
                ->select('kode as kode_pasien', 'nama as nama_pasien', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'pekerjaan', 'informasi', 'tgl as tanggal_kunjungan', 'no_handpone as no_hp')
                ->where('kode', '=', $aksi)
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_pasien'       => 'required',
                    'nama_pasien'       => 'required',
                    'tgl_lahir'         => 'required',
                    'jenis_kelamin'     => 'required',
                    'agama'             => 'required',
                    'pekerjaan'         => 'required',
                    'no_hp'             => 'required',
                    'tanggal_kunjungan' => 'required',
                    'alamat'            => 'required',
                    'informasi'         => 'required'

                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_non_member')
                    ->where('kode', $request->get('kode_pasien'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'nama'          => $request->get('nama_pasien'),
                        'jenis_kelamin' => $request->get('jenis_kelamin'),
                        'alamat'        => $request->get('alamat'),
                        'no_handpone'   => $request->get('no_hp'),
                        'tgl'           => $request->get('tanggal_kunjungan'),
                        'tgl_lahir'     => $request->get('tgl_lahir'),
                        'agama'         => $request->get('agama'),
                        'pekerjaan'     => $request->get('pekerjaan'),
                        'informasi'     => $request->get('informasi'),
                        'user'          => Auth::user()->name,
                        'kode_cabang'   => Auth::user()->kode_cabang,
                        'waktu'         => date('Y-m-d H:i:s')
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_non_member')
                    ->where('kode', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_non_member')
                            ->where("nama", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_non_member')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderby('nama', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_non_member')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->orderBy('nama','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="karyawan") {
            if ($name == 'kode') {
                $data = DB::table('tabel_karyawan')
                ->select(DB::raw('CONCAT("KRW-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(tabel_karyawan.kode_karyawan,5,5)))+1,1)),4)) as kode_karyawan'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'kode_karyawan'         => 'required|unique:tabel_karyawan',
                    'nama_karyawan'         => 'required',
                    'tgl_lahir'             => 'required',
                    'jenis_kelamin'         => 'required',
                    'alamat'                => 'required',
                    'no_hp'                 => 'required',
                    'devisi'                => 'required',
                    'gaji_pokok'            => 'required',
                    'kordinator'            => 'required',
                    'set_penggajian'        => 'required',
                    'status'                => 'required',
                    'no_rek'                => 'required',
                    'cabang'                => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    DB::table('tabel_karyawan')
                        ->insert(
                            [
                            'kode_karyawan'         => $request->get('kode_karyawan'), 
                            'nama_karyawan'         => $request->get('nama_karyawan'),
                            'jk'                    => $request->get('jenis_kelamin'),
                            'tgl_lahir'             => $request->get('tgl_lahir'),
                            'alamat'                => $request->get('alamat'),
                            'no_hp'                 => $request->get('no_hp'),
                            'jabatan'               => $request->get('devisi'),
                            'gaji_pokok'            => $request->get('gaji_pokok'),
                            'keterangan'            => $request->get('keterangan'),
                            'kordinator'            => $request->get('kordinator'),
                            'set_penggajian'        => $request->get('set_penggajian'),
                            'no_rek'                => $request->get('no_rek'),
                            'status'                => $request->get('status'),
                            'user'                  => Auth::user()->name,
                            'waktu'                 => date('Y-m-d H:i:s'),
                            'kode_cabang'           => Auth::user()->kode_cabang,
                            'cabang'                => $request->get('cabang'),
                            'stt'                   => '1'
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data = DB::table('tabel_karyawan')
                ->select('id', 'kode_karyawan', 'nama_karyawan', 'jk as jenis_kelamin', 'tgl_lahir', 'alamat', 'no_hp', 'jabatan as devisi', 'gaji_pokok', 'keterangan', 'kordinator', 'set_penggajian', 'no_rek', 'status', 'cabang')
                ->where('kode_karyawan', '=', $aksi)
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'kode_karyawan'         => 'required',
                    'nama_karyawan'         => 'required',
                    'tgl_lahir'             => 'required',
                    'jenis_kelamin'         => 'required',
                    'alamat'                => 'required',
                    'no_hp'                 => 'required',
                    'devisi'                => 'required',
                    'gaji_pokok'            => 'required',
                    'kordinator'            => 'required',
                    'set_penggajian'        => 'required',
                    'status'                => 'required',
                    'no_rek'                => 'required',
                    'cabang'                => 'required'

                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_karyawan')
                    ->where('kode_karyawan', $request->get('kode_karyawan'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'nama_karyawan'         => $request->get('nama_karyawan'),
                        'jk'                    => $request->get('jenis_kelamin'),
                        'tgl_lahir'             => $request->get('tgl_lahir'),
                        'alamat'                => $request->get('alamat'),
                        'no_hp'                 => $request->get('no_hp'),
                        'jabatan'               => $request->get('devisi'),
                        'gaji_pokok'            => $request->get('gaji_pokok'),
                        'keterangan'            => $request->get('keterangan'),
                        'kordinator'            => $request->get('kordinator'),
                        'set_penggajian'        => $request->get('set_penggajian'),
                        'no_rek'                => $request->get('no_rek'),
                        'status'                => $request->get('status'),
                        'user'                  => Auth::user()->name,
                        'waktu'                 => date('Y-m-d H:i:s'),
                        'kode_cabang'           => Auth::user()->kode_cabang,
                        'cabang'                => $request->get('cabang'),
                        'stt'                   => '1'
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_karyawan')
                    ->where('kode_karyawan', '=', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                            'stt'   => '2',
                        ]);

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        return response(DB::table('tabel_karyawan')
                            ->where("nama_karyawan", "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->where('stt', '1')
                            ->orderby('nama_karyawan', 'asc')
                            ->paginate(7));
                    }
                    else{
                        return response(DB::table('tabel_karyawan')
                            ->where($request->get('par'), "LIKE", "%{$request->get('search')}%")
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->where('stt', '1')
                            ->orderby('nama_karyawan', 'asc')
                            ->paginate(7));
                    } 
                }
                else{
                    return DB::table('tabel_karyawan')
                            ->where('kode_cabang',Auth::user()->kode_cabang)
                            ->where('stt', '1')
                            ->orderBy('nama_karyawan','asc')
                            ->paginate(7);
                }
            }   
        }

        elseif ($ket=="program-bowl") {
            if ($name == 'kode') {
                $arr['data'] = 'kode';

                return \Response::json($arr);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'nama_produk'           => 'required',
                    'jumlah_pencapaian'     => 'required',
                    'kode_produk'           => 'required|unique:tabel_program_bowl',
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    $data = DB::table('tabel_program_bowl')
                    ->select(DB::raw('CONCAT("PPB-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_bowl,5,5)))+1,1)),4)) as kode_bowl'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();

                    foreach ($data as $key => $value) {
                        $kode = $value;
                    }

                    DB::table('tabel_program_bowl')
                        ->insert(
                            [
                            'kode_bowl'         => $kode, 
                            'kode_produk'       => $request->get('kode_produk'),
                            'dis_member_umum'   => $request->get('dis_umum'),
                            'dis_member_family' => $request->get('dis_family'),
                            'dis_member_student'=> $request->get('dis_student'),
                            'dis_member_vip'    => $request->get('dis_vip'),
                            'user'              => Auth::user()->name,
                            'waktu'             => date('Y-m-d H:i:s'),
                            'kode_cabang'       => Auth::user()->kode_cabang,
                            'jumlah_pencapaian' => $request->get('jumlah_pencapaian'),
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data=DB::table('tabel_produk')
                ->join('tabel_program_bowl', function ($join) {
                    $join->on('tabel_produk.kode_produk', '=', 'tabel_program_bowl.kode_produk');
                })
                ->where('tabel_program_bowl.id', "=", $aksi)
                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_program_bowl.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_program_bowl.jumlah_pencapaian', 'tabel_produk.harga', 'tabel_program_bowl.dis_member_umum as dis_umum', 'tabel_program_bowl.dis_member_family as dis_family', 'tabel_program_bowl.dis_member_student as dis_student', 'tabel_program_bowl.dis_member_vip as dis_vip', 'tabel_produk.satuan', 'tabel_program_bowl.id')
                ->orderby('tabel_produk.nama_produk', 'asc')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'nama_produk'           => 'required',
                    'jumlah_pencapaian'     => 'required',
                    'kode_produk'           => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_program_bowl')
                    ->where('id', $request->get('id'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_produk'       => $request->get('kode_produk'),
                        'dis_member_umum'   => $request->get('dis_umum'),
                        'dis_member_family' => $request->get('dis_family'),
                        'dis_member_student'=> $request->get('dis_student'),
                        'dis_member_vip'    => $request->get('dis_vip'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang,
                        'jumlah_pencapaian' => $request->get('jumlah_pencapaian'),
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_program_bowl')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data=DB::table('tabel_produk')
                        ->join('tabel_program_bowl', function ($join) {
                            $join->on('tabel_produk.kode_produk', '=', 'tabel_program_bowl.kode_produk');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_bowl.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_program_bowl.jumlah_pencapaian', 'tabel_produk.harga', 'tabel_program_bowl.dis_member_umum', 'tabel_program_bowl.dis_member_family', 'tabel_program_bowl.dis_member_student', 'tabel_program_bowl.dis_member_vip', 'tabel_produk.satuan', 'tabel_program_bowl.id')
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(7);

                        return response($data);
                    }
                    else{
                        $data=DB::table('tabel_produk')
                        ->join('tabel_program_bowl', function ($join) {
                            $join->on('tabel_produk.kode_produk', '=', 'tabel_program_bowl.kode_produk');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_bowl.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_program_bowl.jumlah_pencapaian', 'tabel_produk.harga', 'tabel_program_bowl.dis_member_umum', 'tabel_program_bowl.dis_member_family', 'tabel_program_bowl.dis_member_student', 'tabel_program_bowl.dis_member_vip', 'tabel_produk.satuan', 'tabel_program_bowl.id')
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(7);

                        return response($data);
                    } 
                }
                else{
                    $data=DB::table('tabel_produk')
                    ->join('tabel_program_bowl', function ($join) {
                        $join->on('tabel_produk.kode_produk', '=', 'tabel_program_bowl.kode_produk');
                    })
                    ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->where('tabel_program_bowl.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_program_bowl.jumlah_pencapaian', 'tabel_produk.harga', 'tabel_program_bowl.dis_member_umum', 'tabel_program_bowl.dis_member_family', 'tabel_program_bowl.dis_member_student', 'tabel_program_bowl.dis_member_vip', 'tabel_produk.satuan', 'tabel_program_bowl.id')
                    ->orderby('tabel_produk.nama_produk', 'asc')
                    ->paginate(7);

                    return response($data);
                }
            }   
        }

        elseif ($ket=="program-happy-hours") {
            if ($name == 'kode') {
                $arr['data'] = 'kode';

                return \Response::json($arr);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required|unique:tabel_happy_hour',
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    $data = DB::table('tabel_happy_hour')
                    ->select(DB::raw('CONCAT("PHH-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_happy_hour,5,5)))+1,1)),4)) as kode'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();

                    foreach ($data as $key => $value) {
                        $kode = $value;
                    }

                    DB::table('tabel_happy_hour')
                        ->insert(
                            [
                            'kode_happy_hour'   => $kode, 
                            'kode_treatment'    => $request->get('kode_treatment'),
                            'dis_member_umum'   => $request->get('dis_umum'),
                            'dis_member_family' => $request->get('dis_family'),
                            'dis_member_student'=> $request->get('dis_student'),
                            'dis_member_vip'    => $request->get('dis_vip'),
                            'user'              => Auth::user()->name,
                            'waktu'             => date('Y-m-d H:i:s'),
                            'kode_cabang'       => Auth::user()->kode_cabang,
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data=DB::table('tabel_happy_hour')
                ->join('tabel_treatment', function ($join) {
                    $join->on('tabel_treatment.kode_treatment', '=', 'tabel_happy_hour.kode_treatment');
                })
                ->where('tabel_happy_hour.id', '=', $aksi)
                ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_happy_hour.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_happy_hour.dis_member_umum as dis_umum', 'tabel_happy_hour.dis_member_family as dis_family', 'tabel_happy_hour.dis_member_student as dis_student', 'tabel_happy_hour.dis_member_vip as dis_vip', 'tabel_happy_hour.id')
                ->orderby('tabel_treatment.nama_treatment', 'asc')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_happy_hour')
                    ->where('id', $request->get('id'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_treatment'    => $request->get('kode_treatment'),
                        'dis_member_umum'   => $request->get('dis_umum'),
                        'dis_member_family' => $request->get('dis_family'),
                        'dis_member_student'=> $request->get('dis_student'),
                        'dis_member_vip'    => $request->get('dis_vip'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_happy_hour')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data=DB::table('tabel_happy_hour')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_happy_hour.kode_treatment');
                        })
                        ->where('tabel_treatment.nama_treatment', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_happy_hour.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_happy_hour.dis_member_umum', 'tabel_happy_hour.dis_member_family', 'tabel_happy_hour.dis_member_student', 'tabel_happy_hour.dis_member_vip', 'tabel_happy_hour.id')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);
                        return response($data);
                    }
                    else{
                        $data=DB::table('tabel_happy_hour')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_happy_hour.kode_treatment');
                        })
                        ->where('tabel_treatment.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_happy_hour.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_happy_hour.dis_member_umum', 'tabel_happy_hour.dis_member_family', 'tabel_happy_hour.dis_member_student', 'tabel_happy_hour.dis_member_vip', 'tabel_happy_hour.id')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);

                        return response($data);
                    } 
                }
                else{
                    $data=DB::table('tabel_happy_hour')
                    ->join('tabel_treatment', function ($join) {
                        $join->on('tabel_treatment.kode_treatment', '=', 'tabel_happy_hour.kode_treatment');
                    })
                    ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->where('tabel_happy_hour.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_happy_hour.dis_member_umum', 'tabel_happy_hour.dis_member_family', 'tabel_happy_hour.dis_member_student', 'tabel_happy_hour.dis_member_vip', 'tabel_happy_hour.id')
                    ->orderby('tabel_treatment.nama_treatment', 'asc')
                    ->paginate(7);

                    return response($data);
                }
            }   
        }

        elseif ($ket=="program-apotek") {
            if ($name == 'kode') {
                $arr['data'] = 'kode';

                return \Response::json($arr);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'nama_produk'     => 'required',
                    'kode_produk'     => 'required|unique:tabel_program_apotek',
                    'jenis_program'   => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    $data = DB::table('tabel_program_apotek')
                    ->select(DB::raw('CONCAT("PPB-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_program_apotek,5,5)))+1,1)),4)) as kode'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();

                    foreach ($data as $key => $value) {
                        $kode = $value;
                    }

                    DB::table('tabel_program_apotek')
                        ->insert(
                            [
                            'kode_program_apotek'   => $kode, 
                            'kode_produk'           => $request->get('kode_produk'),
                            'dis_member_umum'       => $request->get('dis_umum'),
                            'dis_member_family'     => $request->get('dis_family'),
                            'dis_member_student'    => $request->get('dis_student'),
                            'dis_member_vip'        => $request->get('dis_vip'),
                            'user'                  => Auth::user()->name,
                            'waktu'                 => date('Y-m-d H:i:s'),
                            'kode_cabang'           => Auth::user()->kode_cabang,
                            'nama_program'          => $request->get('jenis_program')
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data=DB::table('tabel_program_apotek')
                ->join('tabel_produk', function ($join) {
                    $join->on('tabel_program_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                })
                ->where('tabel_program_apotek.id', '=', $aksi)
                ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_program_apotek.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_program_apotek.dis_member_umum as dis_umum', 'tabel_program_apotek.dis_member_family as dis_family', 'tabel_program_apotek.dis_member_student as dis_student', 'tabel_program_apotek.dis_member_vip as dis_vip', 'tabel_program_apotek.id', 'tabel_program_apotek.nama_program as jenis_program')
                ->orderby('tabel_produk.nama_produk', 'asc')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'nama_produk'     => 'required',
                    'kode_produk'     => 'required',
                    'jenis_program'   => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_program_apotek')
                    ->where('id', $request->get('id'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_produk'           => $request->get('kode_produk'),
                        'dis_member_umum'       => $request->get('dis_umum'),
                        'dis_member_family'     => $request->get('dis_family'),
                        'dis_member_student'    => $request->get('dis_student'),
                        'dis_member_vip'        => $request->get('dis_vip'),
                        'user'                  => Auth::user()->name,
                        'waktu'                 => date('Y-m-d H:i:s'),
                        'kode_cabang'           => Auth::user()->kode_cabang,
                        'nama_program'          => $request->get('jenis_program')
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_program_apotek')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data=DB::table('tabel_program_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_program_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_apotek.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_program_apotek.dis_member_umum', 'tabel_program_apotek.dis_member_family', 'tabel_program_apotek.dis_member_student', 'tabel_program_apotek.dis_member_vip', 'tabel_program_apotek.id', 'tabel_program_apotek.nama_program')
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(7);

                        return response($data);
                    }
                    else{
                        $data=DB::table('tabel_program_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_program_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_apotek.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_program_apotek.dis_member_umum', 'tabel_program_apotek.dis_member_family', 'tabel_program_apotek.dis_member_student', 'tabel_program_apotek.dis_member_vip', 'tabel_program_apotek.id', 'tabel_program_apotek.nama_program')
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(7);

                        return response($data);
                    } 
                }
                else{
                    $data=DB::table('tabel_program_apotek')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_program_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->where('tabel_program_apotek.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_program_apotek.dis_member_umum', 'tabel_program_apotek.dis_member_family', 'tabel_program_apotek.dis_member_student', 'tabel_program_apotek.dis_member_vip', 'tabel_program_apotek.id', 'tabel_program_apotek.nama_program')
                    ->orderby('tabel_produk.nama_produk', 'asc')
                    ->paginate(7);

                    return response($data);
                }
            }   
        }
    	
        elseif ($ket=="program-customer-birtday") {
            if ($name == 'kode') {
                $arr['data'] = 'kode';

                return \Response::json($arr);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required|unique:tabel_program_customer_birthday'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    $data = DB::table('tabel_program_customer_birthday')
                    ->select(DB::raw('CONCAT("PPB-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_birthday,5,5)))+1,1)),4)) as kode'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();

                    foreach ($data as $key => $value) {
                        $kode = $value;
                    }

                    DB::table('tabel_program_customer_birthday')
                        ->insert(
                            [
                            'kode_birthday'   => $kode, 
                            'kode_treatment'    => $request->get('kode_treatment'),
                            'dis_member_umum'   => $request->get('dis_umum'),
                            'dis_member_family' => $request->get('dis_family'),
                            'dis_member_student'=> $request->get('dis_student'),
                            'dis_member_vip'    => $request->get('dis_vip'),
                            'user'              => Auth::user()->name,
                            'waktu'             => date('Y-m-d H:i:s'),
                            'kode_cabang'       => Auth::user()->kode_cabang
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data=DB::table('tabel_program_customer_birthday')
                ->join('tabel_treatment', function ($join) {
                    $join->on('tabel_treatment.kode_treatment', '=', 'tabel_program_customer_birthday.kode_treatment');
                })
                ->where('tabel_program_customer_birthday.id', '=', $aksi)
                ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_program_customer_birthday.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_program_customer_birthday.dis_member_umum as dis_umum', 'tabel_program_customer_birthday.dis_member_family as dis_family', 'tabel_program_customer_birthday.dis_member_student as dis_student', 'tabel_program_customer_birthday.dis_member_vip as dis_vip', 'tabel_program_customer_birthday.id')
                ->orderby('tabel_treatment.nama_treatment', 'asc')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_program_customer_birthday')
                    ->where('id', $request->get('id'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_treatment'    => $request->get('kode_treatment'),
                        'dis_member_umum'   => $request->get('dis_umum'),
                        'dis_member_family' => $request->get('dis_family'),
                        'dis_member_student'=> $request->get('dis_student'),
                        'dis_member_vip'    => $request->get('dis_vip'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_program_customer_birthday')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data=DB::table('tabel_program_customer_birthday')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_program_customer_birthday.kode_treatment');
                        })
                        ->where('tabel_treatment.nama_treatment', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_customer_birthday.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_program_customer_birthday.dis_member_umum', 'tabel_program_customer_birthday.dis_member_family', 'tabel_program_customer_birthday.dis_member_student', 'tabel_program_customer_birthday.dis_member_vip', 'tabel_program_customer_birthday.id')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);
                        return response($data);
                    }
                    else{
                        $data=DB::table('tabel_program_customer_birthday')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_program_customer_birthday.kode_treatment');
                        })
                        ->where('tabel_treatment.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_program_customer_birthday.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_program_customer_birthday.dis_member_umum', 'tabel_program_customer_birthday.dis_member_family', 'tabel_program_customer_birthday.dis_member_student', 'tabel_program_customer_birthday.dis_member_vip', 'tabel_program_customer_birthday.id')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);

                        return response($data);
                    } 
                }
                else{
                    $data=DB::table('tabel_program_customer_birthday')
                    ->join('tabel_treatment', function ($join) {
                        $join->on('tabel_treatment.kode_treatment', '=', 'tabel_program_customer_birthday.kode_treatment');
                    })
                    ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->where('tabel_program_customer_birthday.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_treatment.harga', 'tabel_program_customer_birthday.dis_member_umum', 'tabel_program_customer_birthday.dis_member_family', 'tabel_program_customer_birthday.dis_member_student', 'tabel_program_customer_birthday.dis_member_vip', 'tabel_program_customer_birthday.id')
                    ->orderby('tabel_treatment.nama_treatment', 'asc')
                    ->paginate(7);

                    return response($data);
                }
            }   
        }

        elseif ($ket=="paket-promo") {
            if ($name == 'kode') {
                $arr['data'] = 'kode';

                return \Response::json($arr);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required',
                    'jumlah_treatment'   => 'required',
                    'nama_promo'         => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{

                    $data = DB::table('tabel_paket_promo')
                    ->select(DB::raw('CONCAT("PPB-",right(CONCAT("0000",IFNULL(MAX(ABS(mid(kode_paket_promo,5,5)))+1,1)),4)) as kode'))
                    ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                    ->first();

                    foreach ($data as $key => $value) {
                        $kode = $value;
                    }

                    DB::table('tabel_paket_promo')
                        ->insert(
                            [
                            'kode_paket_promo'  => $kode,
                            'kode_treatment'    => $request->get('kode_treatment'),
                            'dis_member_umum'   => $request->get('dis_umum'),
                            'dis_member_family' => $request->get('dis_family'),
                            'dis_member_student'=> $request->get('dis_student'),
                            'nama_promo'        => $request->get('nama_promo'),
                            'harga'             => $request->get('harga'),
                            'jumlah'            => $request->get('jumlah_treatment'),
                            'dis_member_vip'    => $request->get('dis_vip'),
                            'user'              => Auth::user()->name,
                            'waktu'             => date('Y-m-d H:i:s'),
                            'kode_cabang'       => Auth::user()->kode_cabang
                            ]
                        );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'edit') {
                $data=DB::table('tabel_paket_promo')
                ->join('tabel_treatment', function ($join) {
                    $join->on('tabel_treatment.kode_treatment', '=', 'tabel_paket_promo.kode_treatment');
                })
                ->where('tabel_paket_promo.id', '=', $aksi)
                ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('tabel_paket_promo.kode_cabang', '=', Auth::user()->kode_cabang)
                ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_paket_promo.harga', 'tabel_paket_promo.dis_member_umum as dis_umum', 'tabel_paket_promo.dis_member_family as dis_family', 'tabel_paket_promo.dis_member_student as dis_student', 'tabel_paket_promo.dis_member_vip as dis_vip', 'tabel_paket_promo.id', 'tabel_paket_promo.jumlah as jumlah_treatment', 'tabel_paket_promo.nama_promo')
                ->orderby('tabel_treatment.nama_treatment', 'asc')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'nama_treatment'     => 'required',
                    'kode_treatment'     => 'required',
                    'jumlah_treatment'   => 'required',
                    'nama_promo'         => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    DB::table('tabel_paket_promo')
                    ->where('id', $request->get('id'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_treatment'    => $request->get('kode_treatment'),
                        'dis_member_umum'   => $request->get('dis_umum'),
                        'dis_member_family' => $request->get('dis_family'),
                        'dis_member_student'=> $request->get('dis_student'),
                        'nama_promo'        => $request->get('nama_promo'),
                        'harga'             => $request->get('harga'),
                        'jumlah'            => $request->get('jumlah_treatment'),
                        'dis_member_vip'    => $request->get('dis_vip'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {

                DB::table('tabel_paket_promo')
                ->where('id', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data=DB::table('tabel_paket_promo')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_paket_promo.kode_treatment');
                        })
                        ->where('tabel_treatment.nama_treatment', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_paket_promo.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_paket_promo.harga', 'tabel_paket_promo.dis_member_umum', 'tabel_paket_promo.dis_member_family', 'tabel_paket_promo.dis_member_student', 'tabel_paket_promo.dis_member_vip', 'tabel_paket_promo.id', 'tabel_paket_promo.jumlah', 'tabel_paket_promo.nama_promo')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);

                        return response($data);
                    }
                    else{
                        $data=DB::table('tabel_paket_promo')
                        ->join('tabel_treatment', function ($join) {
                            $join->on('tabel_treatment.kode_treatment', '=', 'tabel_paket_promo.kode_treatment');
                        })
                        ->where('tabel_treatment.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->where('tabel_paket_promo.kode_cabang', '=', Auth::user()->kode_cabang)
                        ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_paket_promo.harga', 'tabel_paket_promo.dis_member_umum', 'tabel_paket_promo.dis_member_family', 'tabel_paket_promo.dis_member_student', 'tabel_paket_promo.dis_member_vip', 'tabel_paket_promo.id', 'tabel_paket_promo.jumlah', 'tabel_paket_promo.nama_promo')
                        ->orderby('tabel_treatment.nama_treatment', 'asc')
                        ->paginate(7);

                        return response($data);
                    } 
                }
                else{
                    $data=DB::table('tabel_paket_promo')
                    ->join('tabel_treatment', function ($join) {
                        $join->on('tabel_treatment.kode_treatment', '=', 'tabel_paket_promo.kode_treatment');
                    })
                    ->where('tabel_treatment.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->where('tabel_paket_promo.kode_cabang', '=', Auth::user()->kode_cabang)
                    ->select('tabel_treatment.kode_treatment', 'tabel_treatment.nama_treatment', 'tabel_paket_promo.harga', 'tabel_paket_promo.dis_member_umum', 'tabel_paket_promo.dis_member_family', 'tabel_paket_promo.dis_member_student', 'tabel_paket_promo.dis_member_vip', 'tabel_paket_promo.id', 'tabel_paket_promo.jumlah', 'tabel_paket_promo.nama_promo')
                    ->orderby('tabel_treatment.nama_treatment', 'asc')
                    ->paginate(7);

                    return response($data);
                }
            }   
        }

        elseif ($ket=="balance-stok-apotek") {
            if ($name == 'update') {
                $Valid = array(
                    'kode_produk'       => 'required',
                    'jumlah'            => 'required',
                    'exd'               => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    $arr['errors'] = 'Field Tidak Boleh Kosong';
                    return $arr;   
                }
                else{
                    //begitu expire lebih kecil dari tanggal sekarang maka stok langsung akan dihapus
                    $exd_parm = explode("-", $request->get('payet'));
                    $thn = '2010-'.date('m-d');

                    if ($request->get('exd') <= date('Y-m-d')) {
                        DB::table('tabel_stok_produk')
                        ->where('kode_cabang',  Auth::user()->kode_cabang)
                        ->where('id_produk',    $request->get('kode_produk'))
                        ->where(DB::raw('MONTH(tabel_stok_produk.exd)'),     $exd_parm['1'])
                        ->where(DB::raw('YEAR(tabel_stok_produk.exd)'),      $exd_parm['0'])
                        ->delete();
                    }
                    else{
                        if ($request->get('exd') == $request->get('payet')) {
                            if ($request->get('jlh') == $request->get('jumlah')) {
                                # code...
                            }
                            else{
                                // dikeluarkan untuk penyesuaian
                                DB::table('tabel_stok_produk')
                                ->insert(
                                    [
                                    'id_detail_transaksi'   => 'edit',
                                    'id_produk'             => $request->get('kode_produk'),
                                    'tgl'                   => $thn,
                                    'exd'                   => $request->get('exd'),
                                    'masuk'                 => 0,
                                    'keluar'                => $request->get('jlh'),
                                    'keterangan'            => $request->get('keterangan'),
                                    'user'                  => Auth::user()->name,
                                    'waktu'                 => date('Y-m-d H:i:s'),
                                    'kode_cabang'           => Auth::user()->kode_cabang
                                    ]
                                );
                                //dimasukan jumlah sebenarnya
                                DB::table('tabel_stok_produk')
                                ->insert(
                                    [
                                    'id_detail_transaksi'   => 'edit',
                                    'id_produk'             => $request->get('kode_produk'),
                                    'tgl'                   => $thn,
                                    'exd'                   => $request->get('exd'),
                                    'masuk'                 => $request->get('jumlah'),
                                    'keluar'                => 0,
                                    'keterangan'            => $request->get('keterangan'),
                                    'user'                  => Auth::user()->name,
                                    'waktu'                 => date('Y-m-d H:i:s'),
                                    'kode_cabang'           => Auth::user()->kode_cabang
                                    ]
                                );
                            }
                        }
                        else{
                            if ($request->get('jlh') == $request->get('jumlah')) {
                                DB::table('tabel_stok_produk')
                                ->where(DB::raw('MONTH(tabel_stok_produk.exd)'),     $exd_parm['1'])
                                ->where(DB::raw('YEAR(tabel_stok_produk.exd)'),      $exd_parm['0'])
                                ->where('kode_cabang',  Auth::user()->kode_cabang)
                                ->where('id_produk',    $request->get('kode_produk'))
                                ->update(
                                    [
                                    'exd'    =>         $request->get('exd')
                                    ]
                                );
                            }
                            else{
                                DB::table('tabel_stok_produk')
                                ->where(DB::raw('MONTH(tabel_stok_produk.exd)'),     $exd_parm['1'])
                                ->where(DB::raw('YEAR(tabel_stok_produk.exd)'),      $exd_parm['0'])
                                ->where('kode_cabang',  Auth::user()->kode_cabang)
                                ->where('id_produk',    $request->get('kode_produk'))
                                ->update(
                                    [
                                    'exd'    =>         $request->get('exd')
                                    ]
                                );

                                DB::table('tabel_stok_produk')
                                ->insert(
                                    [
                                    'id_detail_transaksi'   => 'edit',
                                    'id_produk'             => $request->get('kode_produk'),
                                    'tgl'                   => $thn,
                                    'exd'                   => $request->get('exd'),
                                    'masuk'                 => 0,
                                    'keluar'                => $request->get('jlh'),
                                    'keterangan'            => $request->get('keterangan'),
                                    'user'                  => Auth::user()->name,
                                    'waktu'                 => date('Y-m-d H:i:s'),
                                    'kode_cabang'           => Auth::user()->kode_cabang
                                    ]
                                );
                                //dimasukan jumlah sebenarnya
                                DB::table('tabel_stok_produk')
                                ->insert(
                                    [
                                    'id_detail_transaksi'   => 'edit',
                                    'id_produk'             => $request->get('kode_produk'),
                                    'tgl'                   => $thn,
                                    'exd'                   => $request->get('exd'),
                                    'masuk'                 => $request->get('jumlah'),
                                    'keluar'                => 0,
                                    'keterangan'            => $request->get('keterangan'),
                                    'user'                  => Auth::user()->name,
                                    'waktu'                 => date('Y-m-d H:i:s'),
                                    'kode_cabang'           => Auth::user()->kode_cabang
                                    ]
                                );

                            }
                        }

                    }

                    $arr['data'] = 'tersimpan';
                    return $arr;
                }
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data= DB::table('tabel_stok_produk')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                        ->groupBy(DB::raw('tabel_produk.kode_produk'))
                        ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(13);
                    }
                    else{
                        $data= DB::table('tabel_stok_produk')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                        ->groupBy(DB::raw('tabel_produk.kode_produk'))
                        ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                        ->orderby('tabel_produk.nama_produk', 'asc')
                        ->paginate(13);
                    } 
                }
                else{
                    $data= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                    ->orderby('tabel_produk.nama_produk', 'asc')
                    ->paginate(13);
                }
                return($data);
            }   
        }

        elseif ($ket=="barang-masuk-apotek") {
            if ($name == 'kode') {
                $data = DB::table('tabel_transaksi_barang_masuk_apotek')
                ->select(DB::raw('CONCAT("ACBA-",right(CONCAT("000000000",IFNULL(MAX(ABS(mid(tabel_transaksi_barang_masuk_apotek.kode_transaksi,6,9)))+1,1)),9)) as no_transaksi'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_masuk'     => 'required',
                    'exd'               => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if ($request->get('tanggal_masuk') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal masuk.';
                        return $arr; 
                    }

                    if ($request->get('exd') <= date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan EXPIRED produk.';
                        return $arr; 
                    }

                    //simpan transaksi
                    DB::table('tabel_transaksi_barang_masuk_apotek')
                    ->insert(
                        [
                        'kode_transaksi'    => $request->get('no_transaksi'),
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_masuk'),
                        'jumlah'            => $request->get('jumlah'),
                        'exd'               => $request->get('exd'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    //simpan stok
                    DB::table('tabel_stok_produk')
                    ->insert(
                        [
                        'id_detail_transaksi'   => $request->get('no_transaksi'),
                        'id_produk'             => $request->get('kode_produk'),
                        'tgl'                   => $request->get('tanggal_masuk'),
                        'exd'                   => $request->get('exd'),
                        'masuk'                 => $request->get('jumlah'),
                        'keluar'                => 0,
                        'keterangan'            => 'barang_masuk',
                        'user'                  => Auth::user()->name,
                        'waktu'                 => date('Y-m-d H:i:s'),
                        'kode_cabang'           => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_masuk'     => 'required',
                    'exd'               => 'required'
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    if ($request->get('tanggal_masuk') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal masuk.';
                        return $arr; 
                    }
                    if ($request->get('exd') <= date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan EXPIRED produk.';
                        return $arr; 
                    }

                    DB::table('tabel_transaksi_barang_masuk_apotek')
                    ->where('kode_transaksi', $aksi)
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_masuk'),
                        'jumlah'            => $request->get('jumlah'),
                        'exd'               => $request->get('exd'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    DB::table('tabel_stok_produk')
                    ->where('id_detail_transaksi', $aksi)
                    ->where('keterangan', 'barang_masuk')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->update(
                        [
                        'id_produk'             => $request->get('kode_produk'),
                        'tgl'                   => $request->get('tanggal_masuk'),
                        'exd'                   => $request->get('exd'),
                        'masuk'                 => $request->get('jumlah'),
                        'keluar'                => 0,
                        'keterangan'            => 'barang_masuk',
                        'user'                  => Auth::user()->name,
                        'waktu'                 => date('Y-m-d H:i:s'),
                        'kode_cabang'           => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }
            elseif ($name == 'hapus') {
                DB::table('tabel_transaksi_barang_masuk_apotek')
                ->where('kode_transaksi', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                DB::table('tabel_stok_produk')
                ->where('id_detail_transaksi', '=', $aksi)
                ->where('keterangan', 'barang_masuk')
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data= DB::table('tabel_transaksi_barang_masuk_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_transaksi_barang_masuk_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_transaksi_barang_masuk_apotek.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_masuk_apotek.tgl', 'tabel_transaksi_barang_masuk_apotek.jumlah', 'tabel_transaksi_barang_masuk_apotek.exd', 'tabel_transaksi_barang_masuk_apotek.keterangan', 'tabel_transaksi_barang_masuk_apotek.id', 'tabel_transaksi_barang_masuk_apotek.user', 'tabel_transaksi_barang_masuk_apotek.kode_transaksi')
                        ->orderby('tabel_transaksi_barang_masuk_apotek.tgl', 'DESC')
                        ->paginate(13);
                    }
                    else{
                        $data= DB::table('tabel_transaksi_barang_masuk_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_transaksi_barang_masuk_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_transaksi_barang_masuk_apotek.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_masuk_apotek.tgl', 'tabel_transaksi_barang_masuk_apotek.jumlah', 'tabel_transaksi_barang_masuk_apotek.exd', 'tabel_transaksi_barang_masuk_apotek.keterangan', 'tabel_transaksi_barang_masuk_apotek.id', 'tabel_transaksi_barang_masuk_apotek.user', 'tabel_transaksi_barang_masuk_apotek.kode_transaksi')
                        ->orderby('tabel_transaksi_barang_masuk_apotek.tgl', 'DESC')
                        ->paginate(13);
                    } 
                }
                else{
                    $data= DB::table('tabel_transaksi_barang_masuk_apotek')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_transaksi_barang_masuk_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_transaksi_barang_masuk_apotek.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_masuk_apotek.tgl', 'tabel_transaksi_barang_masuk_apotek.jumlah', 'tabel_transaksi_barang_masuk_apotek.exd', 'tabel_transaksi_barang_masuk_apotek.keterangan', 'tabel_transaksi_barang_masuk_apotek.id', 'tabel_transaksi_barang_masuk_apotek.user', 'tabel_transaksi_barang_masuk_apotek.kode_transaksi')
                    ->orderby('tabel_transaksi_barang_masuk_apotek.tgl', 'DESC')
                    ->paginate(13);
                }
                return($data);
            }   
        }

        elseif ($ket=="barang-keluar-apotek") {
            if ($name == 'kode') {
                $data = DB::table('tabel_transaksi_barang_keluar_apotek')
                ->select(DB::raw('CONCAT("ACBK-",right(CONCAT("000000000",IFNULL(MAX(ABS(mid(tabel_transaksi_barang_keluar_apotek.kode_transaksi,6,9)))+1,1)),9)) as no_transaksi'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_keluar'    => 'required',
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if ($request->get('tanggal_keluar') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal Keluar.';
                        return $arr; 
                    }

                    if ($request->get('sisa')<$request->get('jumlah')) {
                        $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup.';
                        return $arr;
                    }


                    $stok= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                    ->orderby('tabel_stok_produk.exd', 'asc')
                    ->paginate(13);

                    $jumlah = $request->get('jumlah');
                    foreach ($stok as $key => $value) {
                        if ($value->sisa < $jumlah) {
                            $jumlah = $jumlah-$value->sisa;
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $value->sisa,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );
                        }
                        else{
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $jumlah,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );

                            break;
                        }
                    }

                    //simpan transaksi
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->insert(
                        [
                        'kode_transaksi'    => $request->get('no_transaksi'),
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_keluar'),
                        'jumlah'            => $request->get('jumlah'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_keluar'    => 'required',
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    if ($request->get('tanggal_keluar') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal Keluar.';
                        return $arr; 
                    }

                    if (empty($request->get('sisa'))) {
                         //uji stok
                        $stok= DB::table('tabel_stok_produk')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                        ->groupBy(DB::raw('tabel_produk.kode_produk'))
                        ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                        ->orderby('tabel_stok_produk.exd', 'asc')
                        ->paginate(13);

                        $ssitk = 0;
                        foreach ($stok as $key => $value) {
                            $ssitk+=$value->sisa;
                        }
                        $ssitk+=$request->get('jlh');
                        if ($ssitk < $request->get('jumlah')) {
                            $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup. ';
                            return $arr;
                        }

                    }
                    else{
                        $sisa = $request->get('sisa')+$request->get('jlh');
                        if ($sisa < $request->get('jumlah')) {
                            $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup. ';
                            return $arr;
                        }
                    }
                    
                     //hapus stok
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->where('kode_transaksi', '=', $request->get('no_transaksi'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                    DB::table('tabel_stok_produk')
                    ->where('id_detail_transaksi', '=', $request->get('no_transaksi'))
                    ->where('keterangan', 'produk_keluar')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                    //tampil stok
                    $stok= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                    ->orderby('tabel_stok_produk.exd', 'asc')
                    ->paginate(13);

                    $jumlah = $request->get('jumlah');
                    foreach ($stok as $key => $value) {
                        if ($value->sisa < $jumlah) {
                            $jumlah = $jumlah-$value->sisa;
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $value->sisa,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );
                        }
                        else{
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $jumlah,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );

                            break;
                        }
                    }

                    //simpan transaksi
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->insert(
                        [
                        'kode_transaksi'    => $request->get('no_transaksi'),
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_keluar'),
                        'jumlah'            => $request->get('jumlah'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'hapus') {
                DB::table('tabel_transaksi_barang_keluar_apotek')
                ->where('kode_transaksi', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                DB::table('tabel_stok_produk')
                ->where('id_detail_transaksi', '=', $aksi)
                ->where('keterangan', 'produk_keluar')
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data= DB::table('tabel_transaksi_barang_keluar_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_transaksi_barang_keluar_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_transaksi_barang_keluar_apotek.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_keluar_apotek.tgl', 'tabel_transaksi_barang_keluar_apotek.jumlah', 'tabel_transaksi_barang_keluar_apotek.keterangan', 'tabel_transaksi_barang_keluar_apotek.id', 'tabel_transaksi_barang_keluar_apotek.user', 'tabel_transaksi_barang_keluar_apotek.kode_transaksi')
                        ->orderby('tabel_transaksi_barang_keluar_apotek.tgl', 'DESC')
                        ->paginate(13);
                    }
                    else{
                        $data= DB::table('tabel_transaksi_barang_keluar_apotek')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_transaksi_barang_keluar_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_transaksi_barang_keluar_apotek.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_keluar_apotek.tgl', 'tabel_transaksi_barang_keluar_apotek.jumlah', 'tabel_transaksi_barang_keluar_apotek.keterangan', 'tabel_transaksi_barang_keluar_apotek.id', 'tabel_transaksi_barang_keluar_apotek.user', 'tabel_transaksi_barang_keluar_apotek.kode_transaksi')
                        ->orderby('tabel_transaksi_barang_keluar_apotek.tgl', 'DESC')
                        ->paginate(13);
                    } 
                }
                else{
                    $data= DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_transaksi_barang_keluar_apotek.kode_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_transaksi_barang_keluar_apotek.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_transaksi_barang_keluar_apotek.tgl', 'tabel_transaksi_barang_keluar_apotek.jumlah', 'tabel_transaksi_barang_keluar_apotek.keterangan', 'tabel_transaksi_barang_keluar_apotek.id', 'tabel_transaksi_barang_keluar_apotek.user', 'tabel_transaksi_barang_keluar_apotek.kode_transaksi')
                    ->orderby('tabel_transaksi_barang_keluar_apotek.tgl', 'DESC')
                    ->paginate(13);
                }
                return($data);
            }   
        }

        elseif ($ket=="produk-stok") {
            if($request->get('search') and $request->get('par')){
                if ($request->get('par')=="undefined") {
                    $data= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->orderby('tabel_produk.nama_produk', 'asc')
                    ->paginate(7);
                }
                else{
                    $data= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->orderby('tabel_produk.nama_produk', 'asc')
                    ->paginate(7);
                } 
            }
            else{
                $data= DB::table('tabel_stok_produk')
                ->join('tabel_produk', function ($join) {
                    $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                })
                ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.harga', 'tabel_produk.kategori_produk','tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                ->groupBy(DB::raw('tabel_produk.kode_produk'))
                ->orderby('tabel_produk.nama_produk', 'asc')
                ->paginate(7);
            }
            return($data);
        }

        elseif ($ket=="permintaan-produk-treatment") {
            if ($name == 'kode') {
                $data = DB::table('tabel_stok_tritment')
                ->select(DB::raw('CONCAT("ACMK-",right(CONCAT("000000000",IFNULL(MAX(ABS(mid(tabel_stok_tritment.kode_transaksi,6,9)))+1,1)),9)) as no_transaksi'))
                ->where('kode_cabang', '=', Auth::user()->kode_cabang)
                ->where('keterangan', '=', 'masuk')
                ->first();

                return \Response::json($data);
            }

            elseif ($name == 'simpan') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_keluar'    => 'required',
                );

                $validator = \Validator::make($request->all(),$Valid);
                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;      
                }
                else{
                    if ($request->get('tanggal_keluar') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal Keluar.';
                        return $arr; 
                    }

                    if ($request->get('sisa')<$request->get('jumlah')) {
                        $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup.';
                        return $arr;
                    }


                    $stok= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                    ->orderby('tabel_stok_produk.exd', 'asc')
                    ->paginate(13);

                    $jumlah = $request->get('jumlah');
                    foreach ($stok as $key => $value) {
                        if ($value->sisa < $jumlah) {
                            $jumlah = $jumlah-$value->sisa;
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $value->sisa,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );
                        }
                        else{
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $jumlah,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );

                            break;
                        }
                    }

                    //simpan transaksi
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->insert(
                        [
                        'kode_transaksi'    => $request->get('no_transaksi'),
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_keluar'),
                        'jumlah'            => $request->get('jumlah'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'update') {
                $Valid = array(
                    'no_transaksi'      => 'required',
                    'nama_produk'       => 'required',
                    'tanggal_keluar'    => 'required',
                );

                $validator = \Validator::make($request->all(),$Valid);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $key => $value) {
                        $msg[] = $value;
                    }
                    $arr['errors'] = $msg['0'];
                    return $arr;   
                }
                else{

                    if ($request->get('tanggal_keluar') > date('Y-m-d')) {
                        $arr['errors'] = 'Oopss..., perhatikan tanggal Keluar.';
                        return $arr; 
                    }

                    if (empty($request->get('sisa'))) {
                         //uji stok
                        $stok= DB::table('tabel_stok_produk')
                        ->join('tabel_produk', function ($join) {
                            $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                        ->groupBy(DB::raw('tabel_produk.kode_produk'))
                        ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                        ->orderby('tabel_stok_produk.exd', 'asc')
                        ->paginate(13);

                        $ssitk = 0;
                        foreach ($stok as $key => $value) {
                            $ssitk+=$value->sisa;
                        }
                        $ssitk+=$request->get('jlh');
                        if ($ssitk < $request->get('jumlah')) {
                            $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup. ';
                            return $arr;
                        }

                    }
                    else{
                        $sisa = $request->get('sisa')+$request->get('jlh');
                        if ($sisa < $request->get('jumlah')) {
                            $arr['errors'] = 'Oopss..., Maaf stok barang tidak cukup. ';
                            return $arr;
                        }
                    }
                    
                     //hapus stok
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->where('kode_transaksi', '=', $request->get('no_transaksi'))
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                    DB::table('tabel_stok_produk')
                    ->where('id_detail_transaksi', '=', $request->get('no_transaksi'))
                    ->where('keterangan', 'produk_keluar')
                    ->where('kode_cabang',Auth::user()->kode_cabang)
                    ->delete();

                    //tampil stok
                    $stok= DB::table('tabel_stok_produk')
                    ->join('tabel_produk', function ($join) {
                        $join->on('tabel_stok_produk.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->where('tabel_produk.kode_produk', "=", $request->get('kode_produk'))
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_produk.kategori_produk', 'tabel_stok_produk.exd', DB::raw('SUM(tabel_stok_produk.masuk)-SUM(tabel_stok_produk.keluar) as sisa'), DB::raw('TIMESTAMPDIFF(MONTH, CURDATE(),tabel_stok_produk.exd) as bulan'))
                    ->groupBy(DB::raw('tabel_produk.kode_produk'))
                    ->groupBy(DB::raw('DATE_FORMAT(tabel_stok_produk.exd,"%m-%Y")'))
                    ->orderby('tabel_stok_produk.exd', 'asc')
                    ->paginate(13);

                    $jumlah = $request->get('jumlah');
                    foreach ($stok as $key => $value) {
                        if ($value->sisa < $jumlah) {
                            $jumlah = $jumlah-$value->sisa;
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $value->sisa,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );
                        }
                        else{
                            //simpan stok
                            DB::table('tabel_stok_produk')
                            ->insert(
                                [
                                'id_detail_transaksi'   => $request->get('no_transaksi'),
                                'id_produk'             => $request->get('kode_produk'),
                                'tgl'                   => $request->get('tanggal_keluar'),
                                'exd'                   => $value->exd,
                                'masuk'                 => 0,
                                'keluar'                => $jumlah,
                                'keterangan'            => 'produk_keluar',
                                'user'                  => Auth::user()->name,
                                'waktu'                 => date('Y-m-d H:i:s'),
                                'kode_cabang'           => Auth::user()->kode_cabang
                                ]
                            );

                            break;
                        }
                    }

                    //simpan transaksi
                    DB::table('tabel_transaksi_barang_keluar_apotek')
                    ->insert(
                        [
                        'kode_transaksi'    => $request->get('no_transaksi'),
                        'kode_produk'       => $request->get('kode_produk'),
                        'tgl'               => $request->get('tanggal_keluar'),
                        'jumlah'            => $request->get('jumlah'),
                        'keterangan'        => $request->get('keterangan'),
                        'user'              => Auth::user()->name,
                        'waktu'             => date('Y-m-d H:i:s'),
                        'kode_cabang'       => Auth::user()->kode_cabang
                        ]
                    );

                    $arr['data'] = 'tersimpan';
                    return $arr; 
                }
            }

            elseif ($name == 'hapus') {
                DB::table('tabel_transaksi_barang_keluar_apotek')
                ->where('kode_transaksi', '=', $aksi)
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                DB::table('tabel_stok_produk')
                ->where('id_detail_transaksi', '=', $aksi)
                ->where('keterangan', 'produk_keluar')
                ->where('kode_cabang',Auth::user()->kode_cabang)
                ->delete();

                $arr['data'] = 'terhapus';
                return $arr; 
            }
            else{
                if($request->get('search') and $request->get('par')){
                    if ($request->get('par')=="undefined") {
                        $data= DB::table('tabel_stok_tritment')
                        ->join( 'tabel_produk', function ($join){
                            $join->on('tabel_stok_tritment.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->join( 'tabel_ruangan', function($join){
                            $join->on('tabel_ruangan.kode_ruangan', '=', 'tabel_stok_tritment.kode_ruangan');
                        })
                        ->where('tabel_produk.nama_produk', "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_tritment.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_ruangan.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_tritment.keterangan', 'Masuk')
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_stok_tritment.tgl', 'tabel_stok_tritment.masuk', 'tabel_stok_tritment.keterangan', 'tabel_stok_tritment.id_stok', 'tabel_stok_tritment.user', 'tabel_stok_tritment.kode_transaksi', 'tabel_stok_tritment.jenis_bet', 'tabel_ruangan.nama_ruangan')
                        ->orderby('tabel_stok_tritment.tgl', 'DESC')
                        ->paginate(13);
                    }
                    else{
                        $data= DB::table('tabel_stok_tritment')
                        ->join( 'tabel_produk', function ($join){
                            $join->on('tabel_stok_tritment.id_produk', '=', 'tabel_produk.kode_produk');
                        })
                        ->join( 'tabel_ruangan', function($join){
                            $join->on('tabel_ruangan.kode_ruangan', '=', 'tabel_stok_tritment.kode_ruangan');
                        })
                        ->where('tabel_produk.'.$request->get('par'), "LIKE", "%{$request->get('search')}%")
                        ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_tritment.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_ruangan.kode_cabang',Auth::user()->kode_cabang)
                        ->where('tabel_stok_tritment.keterangan', 'Masuk')
                        ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_stok_tritment.tgl', 'tabel_stok_tritment.masuk', 'tabel_stok_tritment.keterangan', 'tabel_stok_tritment.id_stok', 'tabel_stok_tritment.user', 'tabel_stok_tritment.kode_transaksi', 'tabel_stok_tritment.jenis_bet', 'tabel_ruangan.nama_ruangan')
                        ->orderby('tabel_stok_tritment.tgl', 'DESC')
                        ->paginate(13);
                    } 
                }
                else{
                    $data= DB::table('tabel_stok_tritment')
                    ->join( 'tabel_produk', function ($join){
                        $join->on('tabel_stok_tritment.id_produk', '=', 'tabel_produk.kode_produk');
                    })
                    ->join( 'tabel_ruangan', function($join){
                        $join->on('tabel_ruangan.kode_ruangan', '=', 'tabel_stok_tritment.kode_ruangan');
                    })
                    ->where('tabel_produk.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_tritment.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_ruangan.kode_cabang',Auth::user()->kode_cabang)
                    ->where('tabel_stok_tritment.keterangan', 'Masuk')
                    ->select('tabel_produk.kode_produk', 'tabel_produk.nama_produk', 'tabel_stok_tritment.tgl', 'tabel_stok_tritment.masuk', 'tabel_stok_tritment.keterangan', 'tabel_stok_tritment.id_stok', 'tabel_stok_tritment.user', 'tabel_stok_tritment.kode_transaksi', 'tabel_stok_tritment.jenis_bet', 'tabel_ruangan.nama_ruangan')
                    ->orderby('tabel_stok_tritment.tgl', 'DESC')
                    ->paginate(13);
                }
                return($data);
            }   
        }
    }
}
