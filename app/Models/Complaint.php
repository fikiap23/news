<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'complaint';

    // Kolom-kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'name',            // Nama pengguna yang membuat pengaduan
        'email',           // Email pengguna
        'phone',           // Nomor telepon pengguna
        'address',         // Alamat pengguna
        'district',        // Kecamatan
        'village',         // Kelurahan
        'message',         // Pesan pengaduan
        'type',            // Jenis (complaint/appreciation)
        'image',           // Gambar yang diunggah (opsional)
        'name_admin',      // Nama admin yang merespon (opsional)
        'response_details' // Detail respon dari admin (opsional)
    ];

    // Format default timestamp
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
